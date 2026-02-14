<?php
require 'auth.php';
require '../php/conexion.php';

$id = $_GET['id'];
$conn->query("UPDATE citas SET estado='Confirmada' WHERE id=$id");

header("Location: panel.php");