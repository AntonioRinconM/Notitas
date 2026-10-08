fetch('api/Obt.php')
  .then(respuesta => respuesta.json())
  .then(notas => {
    notas.forEach(nota => {
      const div = document.createElement('div');
      div.className = 'nota';
      div.dataset.id = nota.Id;
      const span = document.createElement('span');
      span.textContent = nota.Cont;
      div.appendChild(span);
      div.style.backgroundImage = `url('img/texturas/${nota.Textura}.png')`;
      div.style.backgroundSize = 'cover';
      div.style.left = nota.PosX + '%';
      div.style.top = nota.PosY + '%';
      div.style.transform = `rotate(${nota.Rotacion}deg)`;

      document.getElementById('board').appendChild(div);

      div.addEventListener('click', () => {
        div.classList.add('cayendo');

        div.addEventListener('animationend', () => {
          fetch('api/Bor.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: div.dataset.id })
          })
          .then(r => r.json())
          .then(resultado => {
            div.remove();
          });
        });
      });
    });
  });