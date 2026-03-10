<?php
session_start();
include 'db.php';

// check of gebruiker admin is
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

// alle klanten ophalen
$sql = "SELECT * FROM Klant_File";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Klantoverzicht</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Welkom, <?php echo $_SESSION['gebruikersnaam']; ?>! <a href="logout.php">Uitloggen</a></p>

        <h2>Alle Klanten</h2>
        <a href="toevoegen.php">+ Nieuwe klant toevoegen</a>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Email</th>
                <th>Telefoon</th>
                <th>Adres</th>
                <th>Woonplaats</th>
                <th>Acties</th>
            </tr>
            <?php while ($rij = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $rij['id']; ?></td>
                <td><?php echo $rij['voornaam']; ?></td>
                <td><?php echo $rij['achternaam']; ?></td>
                <td><?php echo $rij['email']; ?></td>
                <td><?php echo $rij['telefoon']; ?></td>
                <td><?php echo $rij['adres']; ?></td>
                <td><?php echo $rij['woonplaats']; ?></td>
                <td>
                    <a href="bewerken.php?id=<?php echo $rij['id']; ?>">Bewerken</a>
                    <a href="verwijderen.php?id=<?php echo $rij['id']; ?>" onclick="return confirm('Weet je het zeker?')">Verwijderen</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
<?php mysqli_close($conn); ?>
