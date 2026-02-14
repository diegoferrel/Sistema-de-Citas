<?php
require_once __DIR__ . '/conexion.php';

$nombre   = $_POST['nombre'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$fecha    = $_POST['fecha'] ?? '';
$hora     = $_POST['hora'] ?? '';
$motivo   = $_POST['motivo'] ?? '';

if (!$nombre || !$telefono || !$fecha || !$hora) {
    echo "datos_incompletos";
    exit;
}

/* Validar hora en punto */
if (date('i', strtotime($hora)) !== '00') {
    echo "hora_invalida";
    exit;
}

/* Validar horario */
$stmt = $conn->prepare("SELECT id FROM citas WHERE fecha = ? AND hora = ?");
$stmt->bind_param("ss", $fecha, $hora);
$stmt->execute();
if ($stmt->get_result()->num_rows > 0) {
    echo "horario_ocupado";
    exit;
}

/* Validar si cliente ya tiene cita ese día */
$stmt = $conn->prepare("SELECT id FROM citas WHERE telefono = ? AND fecha = ?");
$stmt->bind_param("ss", $telefono, $fecha);
$stmt->execute();
if ($stmt->get_result()->num_rows > 0) {
    echo "persona_ya_agendada";
    exit;
}

/* Guardar cliente si no existe */
$stmt = $conn->prepare("SELECT id FROM clientes WHERE telefono = ?");
$stmt->bind_param("s", $telefono);
$stmt->execute();

if ($stmt->get_result()->num_rows === 0) {
    $stmt = $conn->prepare("INSERT INTO clientes (nombre, telefono) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $telefono);
    $stmt->execute();
}

/* Guardar cita */
$stmt = $conn->prepare(
    "INSERT INTO citas (nombre, telefono, fecha, hora, motivo, estado)
     VALUES (?, ?, ?, ?, ?, 'pendiente')"
);
$stmt->bind_param("sssss", $nombre, $telefono, $fecha, $hora, $motivo);

echo $stmt->execute() ? "ok" : "error";
