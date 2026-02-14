<?php
require('../php/conexion.php');
$citas = $conn->query("SELECT * FROM citas ORDER BY fecha, hora");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Citas</title>
    <link rel="stylesheet" href="../css/panel.css">
</head>
<body>

<header class="top">
    <figure class="logo">
        <a href="#"><img src="../recursos/Logo.png" alt=""></a>
        <span>Panel de Citas</span>
    </figure>
    <a href="logout.php" class="logout">Cerrar Sesión</a>
</header>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Teléfono</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Motivo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($cita = $citas->fetch_assoc()): ?>
            <tr>
                <td><?= $cita['nombre'] ?></td>
                <td><?= $cita['telefono'] ?></td>
                <td><?= $cita['fecha'] ?></td>
                <td><?= $cita['hora'] ?></td>
                <td><?= $cita['motivo'] ?></td>
                <td class="estado"><?= $cita['estado'] ?></td>
                <td class="acciones">
                    <a class="btn confirmar" href="confirmar.php?id=<?= $cita['id'] ?>">✔</a>
                    <a class="btn eliminar" href="eliminar.php?id=<?= $cita['id'] ?>">✖</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <button class="btn-agregar" onclick="abrirModal()">Agregar Cita</button>
</div>

<?php include 'modal_agregar.php'; ?>

<script src="../js/modal.js"></script>
</body>
</html>
