<?php
session_start();
include 'db.php';

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// als formulier is verstuurd
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $telefoon = $_POST['telefoon'];
    $adres = $_POST['adres'];
    $woonplaats = $_POST['woonplaats'];

    $sql = "UPDATE Klant_File SET voornaam='$voornaam', achternaam='$achternaam', email='$email', telefoon='$telefoon', adres='$adres', woonplaats='$woonplaats' WHERE id=$id";
    mysqli_query($conn, $sql);

    header("Location: admin.php");
    exit();
}

// klant ophalen
$sql = "SELECT * FROM Klant_File WHERE id = $id";
$result = mysqli_query($conn, $sql);
$klant = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Klant Bewerken</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Klant Bewerken</h1>
        <a href="admin.php">Terug naar overzicht</a>

        <form method="POST">
            <label>Voornaam:</label><br>
            <input type="text" name="voornaam" value="<?php echo $klant['voornaam']; ?>"><br><br>

            <label>Achternaam:</label><br>
            <input type="text" name="achternaam" value="<?php echo $klant['achternaam']; ?>"><br><br>

            <label>Email:</label><br>
            <input type="email" name="email" value="<?php echo $klant['email']; ?>"><br><br>

            <label>Telefoon:</label><br>
            <input type="text" name="telefoon" value="<?php echo $klant['telefoon']; ?>"><br><br>

            <label>Adres:</label><br>
            <input type="text" name="adres" value="<?php echo $klant['adres']; ?>"><br><br>

            <label>Woonplaats:</label><br>
            <input type="text" name="woonplaats" value="<?php echo $klant['woonplaats']; ?>"><br><br>

            <button type="submit">Opslaan</button>
        </form>
    </div>
</body>
</html>
<?php mysqli_close($conn); ?>
