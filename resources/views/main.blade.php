@extends('layouts.app')

@section('title', 'RED LEASING — Лизинг автомобилей и спецтехники')

@section('content')
  <section class="hero">
    <div class="hero-text">
      <h1>RED<span>LEASING</span><br>лизинг авто и спецтехники</h1>
      <p>Оформите лизинг легкового авто, грузовика, внедорожника, фуры с прицепом или спецтехники быстро и без переплат.</p>
      <a href="{{ url('/catalog') }}" class="btn-main">Взять лизинг</a>
    </div>
    <div class="hero-img">
      <img src="{{ asset('cars/hero.png') }}" alt="Премиальный автомобиль">
    </div>
  </section>
@endsection
