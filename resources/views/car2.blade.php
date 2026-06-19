@extends('layouts.app')

@section('title', 'Tank 500 — RED LEASING')

@section('content')
  <div class="container">
    <div class="breadcrumb"><a href="{{ url('/catalog') }}">Каталог</a> / Tank 500</div>

    <div class="top">
      <div class="left">
        <h1>Tank 500 Premium 3.0T в лизинг</h1>
        <p class="subtitle">Бензиновый 3.0 л, 354 л.с., автомат, полный привод, внедорожник · Новый</p>
        <img src="{{ asset('cars/suv.png') }}" alt="Tank 500" class="main-img">
        <span class="stock in">В наличии: 2 шт. · Санкт-Петербург</span>
      </div>

      <div class="calc car-calc" data-price="3980000" data-rate="0.04">
        <div class="big-price">3 980 000 ₽</div>
        <span class="badge">Онлайн-оформление</span>

        <label>Аванс</label>
        <div class="val" data-calc="advance-val">1 200 000 ₽</div>
        <input type="range" data-calc="advance" min="400000" max="2000000" step="10000" value="1200000">
        <div class="row"><span>400 тыс</span><span>2 млн</span></div>

        <label>Срок лизинга</label>
        <div class="val" data-calc="term-val">36 месяца</div>
        <input type="range" data-calc="term" min="12" max="59" step="1" value="36">
        <div class="row"><span>12 мес.</span><span>59 мес.</span></div>

        <div class="summary">
          <div><span>Платёж</span><span class="accent" data-calc="payment">— ₽/мес.</span></div>
          <div><span>Сумма договора</span><span data-calc="total">— ₽</span></div>
        </div>

        <button class="btn-red">Оставить заявку</button>
        <button class="btn-out">Получить консультацию</button>
      </div>
    </div>

    <div class="specs-block">
      <h2>Характеристики</h2>
      <div class="specs-grid">
        <div class="spec-item"><div class="k">Двигатель</div><div class="v">Бензиновый, 3.0 л, 354 л.с.</div></div>
        <div class="spec-item"><div class="k">Коробка</div><div class="v">Автомат</div></div>
        <div class="spec-item"><div class="k">Привод</div><div class="v">Полный</div></div>
        <div class="spec-item"><div class="k">Кузов</div><div class="v">Внедорожник</div></div>
        <div class="spec-item"><div class="k">Год выпуска</div><div class="v">2024</div></div>
        <div class="spec-item"><div class="k">Разгон 0-100</div><div class="v">8.3 с</div></div>
        <div class="spec-item"><div class="k">Расход</div><div class="v">12.8 л/100км</div></div>
        <div class="spec-item"><div class="k">Цвет</div><div class="v">Чёрный</div></div>
      </div>
    </div>

    <div class="desc">
      <h2>Описание</h2>
      <p>Tank 500 — премиальный рамный внедорожник с мощным турбомотором, полным приводом и блокировками. Комфортный салон премиум-класса и отличная проходимость. Выгодный лизинг для бизнеса и внедорожных поездок.</p>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/car-calc.js') }}"></script>
@endpush
