@extends('layouts.app')

@section('title', 'Профиль — RED LEASING')

@section('content')
  <div class="container">
    <div class="wrap profile-wrap">
      <div class="profile-card">
        <h1>Личный кабинет</h1>
        <div class="profile-field">
          <span class="label">Имя</span>
          <span class="value">{{ $user['name'] ?? '-' }}</span>
        </div>
        <div class="profile-field">
          <span class="label">Фамилия</span>
          <span class="value">{{ $user['secondname'] ?? '-' }}</span>
        </div>
        <div class="profile-field">
          <span class="label">E-mail</span>
          <span class="value">{{ $user['email'] ?? '-' }}</span>
        </div>
        <div class="profile-field">
          <span class="label">Телефон</span>
          <span class="value">{{ $user['phone'] ?? '-' }}</span>
        </div>
        <div class="profile-field">
          <span class="label">Роль</span>
          <span class="value">{{ $user['Role'] ?? 'user' }}</span>
        </div>
        <div class="profile-actions">
          <a class="btn-main" href="{{ url('/') }}">Вернуться на сайт</a>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('styles')
  <style>
    .profile-wrap {
      padding: 40px 0;
    }

    .profile-card {
      width: 100%;
      max-width: 760px;
      background: #111;
      border: 1px solid #2a2a2a;
      border-radius: 16px;
      padding: 36px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.35);
    }

    .profile-card h1 {
      font-size: 32px;
      margin-bottom: 26px;
    }

    .profile-field {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 18px 20px;
      border-radius: 12px;
      border: 1px solid #222;
      margin-bottom: 14px;
      background: #0f0f0f;
    }

    .profile-field .label {
      color: var(--gray);
      font-size: 14px;
    }

    .profile-field .value {
      color: var(--white);
      font-weight: 600;
      text-align: right;
    }

    .profile-actions {
      margin-top: 24px;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .profile-actions .btn-main {
      border-radius: 8px;
      padding: 14px 28px;
      text-align: center;
    }
  </style>
@endpush
