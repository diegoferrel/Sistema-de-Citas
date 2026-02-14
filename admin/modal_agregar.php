<?php
require_once '../php/conexion.php';
$clientes = $conn->query("SELECT nombre, telefono FROM clientes ORDER BY nombre");
?>

<div class="overlay" id="modal">
  <div class="modal">

    <div class="modal-header">
      <span>🦷 AGREGAR NUEVA CITA</span>
      <button onclick="cerrarModal()">✖</button>
    </div>

    <form id="formCita" class="modal-body">

      <div class="fila">
        <select id="clienteSelect">
          <option value="">Seleccionar Cliente</option>
          <?php while ($c = $clientes->fetch_assoc()): ?>
            <option 
              data-nombre="<?= htmlspecialchars($c['nombre']) ?>"
              data-telefono="<?= htmlspecialchars($c['telefono']) ?>">
              <?= htmlspecialchars($c['nombre']) ?>
            </option>
          <?php endwhile; ?>
        </select>

        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
      </div>

      <div class="fila">
        <input type="text" name="telefono" id="telefono" placeholder="Teléfono" required>
        <input type="date" name="fecha" required>
      </div>

      <div class="fila">
        <input type="time" name="hora" required>
        <input type="text" name="motivo" placeholder="Motivo">
      </div>

      <div class="acciones-modal">
        <button type="submit" class="btn-guardar">Agendar Cita</button>
        <button type="button" class="btn-cancelar" onclick="cerrarModal()">Cancelar</button>
      </div>

    </form>
  </div>
</div>
<script>
document.getElementById('formCita').addEventListener('submit', function(e) {
  e.preventDefault();

  const formData = new FormData(this);

  fetch('../php/guardar_cita.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.text())
  .then(resp => {
    if (resp === 'ok') {
      alert('Cita guardada correctamente');
      location.reload();
    } else if (resp === 'horario_ocupado') {
      alert('Ese horario ya está ocupado');
    } else if (resp === 'persona_ya_agendada') {
      alert('Ese cliente ya tiene cita ese día');
    } else if (resp === 'hora_invalida') {
      alert('La hora debe ser exacta (en punto)');
    } else {
      alert('Error al guardar');
      console.log(resp);
    }
  });
});
</script>

