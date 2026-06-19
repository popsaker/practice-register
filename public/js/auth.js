document.addEventListener('DOMContentLoaded', function () {
  const loginForm = document.getElementById('loginForm');
  const registerForm = document.getElementById('registerForm');

  function handleAuthForm(form, endpoint, successRedirect, fallbackMessage) {
    const msg = form.querySelector('.msg');

    form.addEventListener('submit', async function (e) {
      e.preventDefault();

      const formData = new FormData(form);
      const payload = {};
      formData.forEach((value, key) => {
        payload[key] = value;
      });

      try {
        const response = await fetch(endpoint, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(payload),
        });

        const result = await response.json();
        if (result.success) {
          if (result.role === 'admin') {
            window.location.href = '/admin';
          } else if (successRedirect) {
            window.location.href = successRedirect;
          } else {
            window.location.href = '/catalog';
          }
        } else {
          msg.textContent = result.message || fallbackMessage;
          msg.style.color = '#e10600';
        }
      } catch (err) {
        msg.textContent = 'Ошибка соединения с сервером';
        msg.style.color = '#e10600';
      }
    });
  }

  if (loginForm) {
    handleAuthForm(loginForm, '/login.php', '/catalog', 'Неверный логин или пароль');
  }

  if (registerForm) {
    handleAuthForm(registerForm, '/register.php', '/login', 'Ошибка регистрации');
  }
});