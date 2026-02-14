<?php
require 'auth.php';
require '../php/conexion.php';

$id = $_GET['id'];
$conn->query("DELETE FROM citas WHERE id=$id");

header("Location: panel.php");