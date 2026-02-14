<?php
$host = "localhost";
$user = "root";
$pass = "1234";
$db   = "dentista_integral";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión");
}
?>