<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'RED LEASING')</title>
  <link rel="stylesheet" href="{{ asset('css/site.css') }}">
  @stack('styles')
</head>
<body>
  <header>
    <div class="logo"><a href="{{ url('/') }}">RED<span>LEASING</span></a></div>
    <nav>
      <a href="{{ url('/') }}">Главная</a>
      <a href="{{ url('/catalog') }}">Каталог</a>
      <a href="{{ url('/cart') }}">Корзина @if(!empty($cartCount))<span class="cart-count">{{ $cartCount }}</span>@endif</a>
      @if($currentUser)
        <a href="{{ url('/profile') }}">Профиль</a>
        @if(($currentUser['Role'] ?? '') === 'admin')
          <a href="{{ url('/admin') }}">Админ</a>
        @endif
        <a href="{{ url('/logout.php') }}">Выйти</a>
      @else
        <a href="{{ url('/login') }}">Вход</a>
        <a href="{{ url('/register') }}">Регистрация</a>
      @endif
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    © 2026 RED LEASING. Все права защищены.
  </footer>

  @stack('scripts')
</body>
</html>
