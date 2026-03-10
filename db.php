<?php
// database connectie
$server = "localhost";
$gebruiker = "root";
$wachtwoord = "";
$database = "klantonderhoud";

$conn = mysqli_connect($server, $gebruiker, $wachtwoord, $database);

if (!$conn) {
    die("Connectie mislukt: " . mysqli_connect_error());
}
?>
