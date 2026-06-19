document.addEventListener('DOMContentLoaded', function () {
  const buttons = document.querySelectorAll('.filter-btn');
  const cards = document.querySelectorAll('#carGrid .card');

  if (!buttons.length || !cards.length) {
    return;
  }

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      buttons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const type = btn.dataset.type;
      cards.forEach(card => {
        card.style.display = type === 'all' || card.dataset.type === type ? 'flex' : 'none';
      });
    });
  });
});