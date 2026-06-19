@extends('layouts.app')

@section('title', 'Вход — RED LEASING')

@section('content')
  <div class="wrap">
    <form class="form-box" id="loginForm">
      <h1>Вход</h1>
      <p class="sub">Войдите в свой аккаунт RED LEASING</p>

      <label for="email">E-mail</label>
      <input type="email" id="email" name="email" placeholder="example@mail.ru" required>

      <label for="password">Пароль</label>
      <input type="password" id="password" name="password" placeholder="Ваш пароль" required>

      <button type="submit" class="btn-red">Войти</button>
      <p class="msg"></p>

      <div class="switch">Нет аккаунта? <a href="{{ url('/register') }}">Зарегистрироваться</a></div>
    </form>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/auth.js') }}"></script>
@endpush
