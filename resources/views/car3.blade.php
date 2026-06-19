@extends('layouts.app')

@section('title', 'КАМАЗ 5490 — RED LEASING')

@section('content')
  <div class="container">
    <div class="breadcrumb"><a href="{{ url('/catalog') }}">Каталог</a> / КАМАЗ 5490</div>

    <div class="top">
      <div class="left">
        <h1>КАМАЗ 5490 NEO тягач в лизинг</h1>
        <p class="subtitle">Дизельный 12 л, 428 л.с., механика, задний привод, грузовой · Новый</p>
        <img src="{{ asset('cars/truck.png') }}" alt="КАМАЗ 5490" class="main-img">
        <span class="stock out">Нет в наличии · под заказ</span>
      </div>

      <div class="calc car-calc" data-price="6450000" data-rate="0.045">
        <div class="big-price">6 450 000 ₽</div>
        <span class="badge">Онлайн-оформление</span>

        <label>Аванс</label>
        <div class="val" data-calc="advance-val">1 900 000 ₽</div>
        <input type="range" data-calc="advance" min="650000" max="3200000" step="50000" value="1900000">
        <div class="row"><span>650 тыс</span><span>3.2 млн</span></div>

        <label>Срок лизинга</label>
        <div class="val" data-calc="term-val">48 месяца</div>
        <input type="range" data-calc="term" min="12" max="59" step="1" value="48">
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
        <div class="spec-item"><div class="k">Двигатель</div><div class="v">Дизельный, 12 л, 428 л.с.</div></div>
        <div class="spec-item"><div class="k">Коробка</div><div class="v">Механика</div></div>
        <div class="spec-item"><div class="k">Привод</div><div class="v">Задний</div></div>
        <div class="spec-item"><div class="k">Тип</div><div class="v">Грузовой (тягач)</div></div>
        <div class="spec-item"><div class="k">Год выпуска</div><div class="v">2024</div></div>
        <div class="spec-item"><div class="k">Грузоподъёмность</div><div class="v">до 18 т</div></div>
        <div class="spec-item"><div class="k">Расход</div><div class="v">28 л/100км</div></div>
        <div class="spec-item"><div class="k">Цвет</div><div class="v">Белый</div></div>
      </div>
    </div>

    <div class="desc">
      <h2>Описание</h2>
      <p>КАМАЗ 5490 NEO — современный седельный тягач для магистральных перевозок. Экономичный двигатель, комфортная кабина и высокая надёжность. Идеален для бизнеса в лизинг с минимальным авансом.</p>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/car-calc.js') }}"></script>
@endpush
