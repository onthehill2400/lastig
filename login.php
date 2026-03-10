<?php
session_start();
include 'db.php';

$gebruikersnaam = $_POST['gebruikersnaam'];
$wachtwoord = $_POST['wachtwoord'];

$sql = "SELECT * FROM Login_File WHERE gebruikersnaam = '$gebruikersnaam' AND wachtwoord = '$wachtwoord'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $rij = mysqli_fetch_assoc($result);
    $_SESSION['login_id'] = $rij['id'];
    $_SESSION['gebruikersnaam'] = $rij['gebruikersnaam'];
    $_SESSION['rol'] = $rij['rol'];

    if ($rij['rol'] == 'admin') {
        header("Location: admin.php");
    } else {
        header("Location: klant.php");
    }
} else {
    header("Location: index.php?error=1");
}

mysqli_close($conn);
?>
