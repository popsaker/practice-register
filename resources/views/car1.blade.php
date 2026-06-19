@extends('layouts.app')

@section('title', 'Chery Arrizo 8 — RED LEASING')

@section('content')
  <div class="container">
    <div class="breadcrumb"><a href="{{ url('/catalog') }}">Каталог</a> / Chery Arrizo 8</div>

    <div class="top">
      <div class="left">
        <h1>Chery Arrizo 8 Комфорт 1.6T AT в лизинг</h1>
        <p class="subtitle">Бензиновый 1.6 л, 150 л.с., автомат, передний привод, седан · Новый</p>
        <img src="{{ asset('cars/sedan.png') }}" alt="Chery Arrizo 8" class="main-img">
        <span class="stock in">В наличии: 5 шт. · Санкт-Петербург</span>
      </div>

      <div class="calc car-calc" data-price="2745600" data-rate="0.04">
        <div class="big-price">2 745 600 ₽</div>
        <span class="badge">Онлайн-оформление</span>

        <label>Аванс</label>
        <div class="val" data-calc="advance-val">870 000 ₽</div>
        <input type="range" data-calc="advance" min="270000" max="1400000" step="10000" value="870000">
        <div class="row"><span>270 тыс</span><span>1.4 млн</span></div>

        <label>Срок лизинга</label>
        <div class="val" data-calc="term-val">24 месяца</div>
        <input type="range" data-calc="term" min="12" max="59" step="1" value="24">
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
        <div class="spec-item"><div class="k">Двигатель</div><div class="v">Бензиновый, 1.6 л, 150 л.с.</div></div>
        <div class="spec-item"><div class="k">Коробка</div><div class="v">Автомат</div></div>
        <div class="spec-item"><div class="k">Привод</div><div class="v">Передний</div></div>
        <div class="spec-item"><div class="k">Кузов</div><div class="v">Седан</div></div>
        <div class="spec-item"><div class="k">Год выпуска</div><div class="v">2024</div></div>
        <div class="spec-item"><div class="k">Разгон 0-100</div><div class="v">9.8 с</div></div>
        <div class="spec-item"><div class="k">Расход</div><div class="v">7.5 л/100км</div></div>
        <div class="spec-item"><div class="k">Цвет</div><div class="v">Чёрный</div></div>
      </div>
    </div>

    <div class="desc">
      <h2>Описание</h2>
      <p>Chery Arrizo 8 — современный бизнес-седан с турбированным двигателем 1.6T и роботизированной коробкой. Просторный салон, богатое оснащение и выгодные условия лизинга делают его отличным выбором для бизнеса и такси.</p>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/car-calc.js') }}"></script>
@endpush
