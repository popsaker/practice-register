@extends('layouts.app')

@section('title', 'Регистрация — RED LEASING')

@section('content')
  <div class="wrap">
    <form class="form-box" id="registerForm">
      <h1>Регистрация</h1>
      <p class="sub">Создайте аккаунт, чтобы оформить лизинг</p>

      <label for="name">Имя</label>
      <input type="text" id="name" name="name" placeholder="Иван" required>

      <label for="secondname">Фамилия</label>
      <input type="text" id="secondname" name="secondname" placeholder="Иванов" required>

      <label for="phone">Телефон</label>
      <input type="tel" id="phone" name="phone" placeholder="+7 (___) ___-__-__" required>

      <label for="email">E-mail</label>
      <input type="email" id="email" name="email" placeholder="example@mail.ru" required>

      <label for="password">Пароль</label>
      <input type="password" id="password" name="password" placeholder="Минимум 6 символов" required>

      <button type="submit" class="btn-red">Зарегистрироваться</button>
      <p class="msg"></p>

      <div class="switch">Уже есть аккаунт? <a href="{{ url('/login') }}">Войти</a></div>
    </form>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/auth.js') }}"></script>
@endpush
