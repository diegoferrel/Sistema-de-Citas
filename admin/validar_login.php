<?php
session_start();
require '../php/conexion.php';

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['admin'] = true;
    header("Location: panel.php");
} else {
    echo "Credenciales incorrectas";
}