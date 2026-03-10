<?php
session_start();
include 'db.php';

// check of gebruiker klant is
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'klant') {
    header("Location: index.php");
    exit();
}

$login_id = $_SESSION['login_id'];

// eigen gegevens ophalen
$sql = "SELECT * FROM Klant_File WHERE login_id = $login_id";
$result = mysqli_query($conn, $sql);
$klant = mysqli_fetch_assoc($result);

// als formulier is verstuurd, gegevens updaten
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $telefoon = $_POST['telefoon'];
    $adres = $_POST['adres'];
    $woonplaats = $_POST['woonplaats'];

    $update = "UPDATE Klant_File SET voornaam='$voornaam', achternaam='$achternaam', email='$email', telefoon='$telefoon', adres='$adres', woonplaats='$woonplaats' WHERE login_id=$login_id";
    mysqli_query($conn, $update);

    // gegevens opnieuw ophalen
    $result = mysqli_query($conn, $sql);
    $klant = mysqli_fetch_assoc($result);
    $melding = "Gegevens opgeslagen!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mijn Gegevens</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Mijn Gegevens</h1>
        <p>Welkom, <?php echo $_SESSION['gebruikersnaam']; ?>! <a href="logout.php">Uitloggen</a></p>

        <?php if (isset($melding)): ?>
            <p style="color: green;"><?php echo $melding; ?></p>
        <?php endif; ?>

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
