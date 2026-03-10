<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Klantonderhoudsysteem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Klantonderhoudsysteem</h1>
        <p>Welkom bij het klantonderhoudsysteem. Log in om verder te gaan.</p>

        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;">Verkeerde gebruikersnaam of wachtwoord!</p>
        <?php endif; ?>

        <?php if (isset($_GET['logout'])): ?>
            <p style="color: green;">Je bent uitgelogd.</p>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label>Gebruikersnaam:</label><br>
            <input type="text" name="gebruikersnaam" required><br><br>

            <label>Wachtwoord:</label><br>
            <input type="password" name="wachtwoord" required><br><br>

            <button type="submit">Inloggen</button>
        </form>
    </div>
</body>
</html>
