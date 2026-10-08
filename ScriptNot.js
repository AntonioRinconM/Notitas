document.getElementById('btnGuardar').addEventListener('click', () => {
  const texto = document.getElementById('texto').value;

  fetch('api/Gua.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({contenido: texto})
  })
  .then(r => r.json())
  .then(notaNueva => {
    alert('Nota guardada');
    document.getElementById('texto').value = '';
  });
});