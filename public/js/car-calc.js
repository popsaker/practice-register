document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.car-calc').forEach(function (block) {
    const carPrice = Number(block.dataset.price);
    const rate = Number(block.dataset.rate || 0.04);
    const advance = block.querySelector('[data-calc="advance"]');
    const term = block.querySelector('[data-calc="term"]');
    const advanceVal = block.querySelector('[data-calc="advance-val"]');
    const termVal = block.querySelector('[data-calc="term-val"]');
    const payment = block.querySelector('[data-calc="payment"]');
    const total = block.querySelector('[data-calc="total"]');

    if (!carPrice || !advance || !term || !advanceVal || !termVal || !payment || !total) {
      return;
    }

    function formatMoney(value) {
      return Math.round(value).toLocaleString('ru-RU') + ' ₽';
    }

    function updateCalculator() {
      const adv = Number(advance.value);
      const months = Number(term.value);
      const body = carPrice - adv;
      const totalSum = body * (1 + rate);
      const monthly = totalSum / months;

      advanceVal.textContent = formatMoney(adv);
      termVal.textContent = `${months} месяца`;
      payment.textContent = `${formatMoney(monthly)}/мес.`;
      total.textContent = formatMoney(totalSum + adv);
    }

    advance.addEventListener('input', updateCalculator);
    term.addEventListener('input', updateCalculator);
    updateCalculator();
  });
});