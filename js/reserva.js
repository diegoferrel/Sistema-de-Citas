document.addEventListener('DOMContentLoaded', () => {

  const form = document.getElementById('formCita');
  if (!form) return;

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const horaInput = document.querySelector('input[name="hora"]').value;
    const minutos = horaInput.split(':')[1];

    if (minutos !== '00') {
      alert('Solo se pueden agendar citas en horas exactas');
      return;
    }

    const formData = new FormData(form);

    fetch('php/guardar_cita.php', {
      method: 'POST',
      body: formData
    })
    .then(res => res.text())
    .then(resp => {
      console.log('RESPUESTA:', resp);

      switch (resp) {
        case 'ok':
          alert('✅ Cita agendada correctamente');
          form.reset();
          break;
        case 'hora_invalida':
          alert('⏰ Solo se permiten citas cada 1 hora');
          break;
        case 'horario_ocupado':
          alert('⛔ Ese horario ya está ocupado');
          break;
        case 'persona_ya_agendada':
          alert('⚠️ Ya tienes una cita ese día');
          break;
        default:
          alert('❌ Error: ' + resp);
      }
    })
    .catch(err => {
      console.error(err);
      alert('❌ Error de conexión');
    });
  });

});
