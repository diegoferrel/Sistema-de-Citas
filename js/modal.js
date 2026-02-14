document.addEventListener('DOMContentLoaded', () => {

  const modal = document.getElementById('modal');
  const form = document.getElementById('formCita');
  const selectCliente = document.getElementById('clienteSelect');
  const inputNombre = document.getElementById('nombre');
  const inputTelefono = document.getElementById('telefono');

  // Abrir / cerrar modal
  window.abrirModal = () => modal.style.display = 'flex';
  window.cerrarModal = () => modal.style.display = 'none';

  // Autollenar cliente
  if (selectCliente) {
    selectCliente.addEventListener('change', () => {
      const opt = selectCliente.selectedOptions[0];
      inputNombre.value = opt?.dataset.nombre || '';
      inputTelefono.value = opt?.dataset.telefono || '';
    });
  }

  // Enviar formulario por fetch
  if (form) {
    form.addEventListener('submit', e => {
      e.preventDefault();

      const datos = new FormData(form);

      fetch('../php/guardar_cita.php', {
        method: 'POST',
        body: datos
      })
      .then(res => res.text())
      .then(resp => {
        console.log(resp);

        if (resp === 'ok') {
          alert('✅ Cita guardada');
          cerrarModal();
          location.reload();
        } else if (resp === 'horario_ocupado') {
          alert('⛔ Horario ocupado');
        } else if (resp === 'hora_invalida') {
          alert('⏰ La hora debe ser en punto');
        } else if (resp === 'persona_ya_agendada') {
          alert('⚠️ El cliente ya tiene cita ese día');
        } else if (resp === 'datos_incompletos') {
          alert('❌ Faltan datos');
        } else {
          alert('❌ Error inesperado');
        }
      });
    });
  }

});
