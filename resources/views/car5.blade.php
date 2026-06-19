@extends('layouts.app')

@section('title', 'МТЗ Беларус 1221 — RED LEASING')

@section('content')
  <div class="container">
    <div class="breadcrumb"><a href="{{ url('/catalog') }}">Каталог</a> / МТЗ Беларус 1221</div>

    <div class="top">
      <div class="left">
        <h1>МТЗ Беларус 1221 трактор в лизинг</h1>
        <p class="subtitle">Дизельный 7 л, 130 л.с., механика, полный привод, спецтехника · Новый</p>
        <img src="{{ asset('cars/special.png') }}" alt="МТЗ Беларус 1221" class="main-img">
        <span class="stock in">В наличии: 3 шт. · Санкт-Петербург</span>
      </div>

      <div class="calc car-calc" data-price="4100000" data-rate="0.045">
        <div class="big-price">4 100 000 ₽</div>
        <span class="badge">Онлайн-оформление</span>

        <label>Аванс</label>
        <div class="val" data-calc="advance-val">1 200 000 ₽</div>
        <input type="range" data-calc="advance" min="410000" max="2050000" step="10000" value="1200000">
        <div class="row"><span>410 тыс</span><span>2 млн</span></div>

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
        <div class="spec-item"><div class="k">Двигатель</div><div class="v">Дизельный, 7 л, 130 л.с.</div></div>
        <div class="spec-item"><div class="k">Коробка</div><div class="v">Механика</div></div>
        <div class="spec-item"><div class="k">Привод</div><div class="v">Полный (4x4)</div></div>
        <div class="spec-item"><div class="k">Тип</div><div class="v">Спецтехника (трактор)</div></div>
        <div class="spec-item"><div class="k">Год выпуска</div><div class="v">2024</div></div>
        <div class="spec-item"><div class="k">Грузоподъёмность навески</div><div class="v">до 5 т</div></div>
        <div class="spec-item"><div class="k">Расход</div><div class="v">12 л/час</div></div>
        <div class="spec-item"><div class="k">Цвет</div><div class="v">Жёлтый</div></div>
      </div>
    </div>

    <div class="desc">
      <h2>Описание</h2>
      <p>МТЗ Беларус 1221 — универсальный трактор для сельхозработ, коммунального хозяйства и строительства. Совместим с широким набором навесного оборудования. Доступен в лизинг для агробизнеса и предприятий.</p>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/car-calc.js') }}"></script>
@endpush
