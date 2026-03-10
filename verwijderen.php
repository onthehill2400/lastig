<?php
session_start();
include 'db.php';

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM Klant_File WHERE id = $id";
mysqli_query($conn, $sql);

header("Location: admin.php");

mysqli_close($conn);
?>
