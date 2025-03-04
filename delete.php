<?php

if (isset($_GET['id'])) {
  $id = $_GET['id'];


$host = "localhost";  // XAMPP runs MySQL on localhost
$user = "root";       // Default MySQL user in XAMPP
$pass = "";           // Default password is empty
$db = "thesis";   // Database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  $sql = "DELETE FROM user_db where id=$id";
  $conn->query($sql);
}

header("location: crud.php");
exit;
?>