<?php
session_start();
include 'db.php';

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $telefoon = $_POST['telefoon'];
    $adres = $_POST['adres'];
    $woonplaats = $_POST['woonplaats'];

    $sql = "INSERT INTO Klant_File (voornaam, achternaam, email, telefoon, adres, woonplaats) VALUES ('$voornaam', '$achternaam', '$email', '$telefoon', '$adres', '$woonplaats')";
    mysqli_query($conn, $sql);

    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Klant Toevoegen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Nieuwe Klant Toevoegen</h1>
        <a href="admin.php">Terug naar overzicht</a>

        <form method="POST">
            <label>Voornaam:</label><br>
            <input type="text" name="voornaam" required><br><br>

            <label>Achternaam:</label><br>
            <input type="text" name="achternaam" required><br><br>

            <label>Email:</label><br>
            <input type="email" name="email" required><br><br>

            <label>Telefoon:</label><br>
            <input type="text" name="telefoon"><br><br>

            <label>Adres:</label><br>
            <input type="text" name="adres"><br><br>

            <label>Woonplaats:</label><br>
            <input type="text" name="woonplaats"><br><br>

            <button type="submit">Toevoegen</button>
        </form>
    </div>
</body>
</html>
<?php mysqli_close($conn); ?>
