@extends('layouts.app')

@section('title', 'Scania R500 + прицеп — RED LEASING')

@section('content')
  <div class="container">
    <div class="breadcrumb"><a href="{{ url('/catalog') }}">Каталог</a> / Scania R500 + прицеп</div>

    <div class="top">
      <div class="left">
        <h1>Scania R500 с прицепом в лизинг</h1>
        <p class="subtitle">Дизельный 13 л, 500 л.с., автомат, задний привод, тягач с полуприцепом · Новый</p>
        <img src="{{ asset('cars/trailer.png') }}" alt="Scania R500 с прицепом" class="main-img">
        <span class="stock in">В наличии: 1 шт. · Санкт-Петербург</span>
      </div>

      <div class="calc car-calc" data-price="9200000" data-rate="0.045">
        <div class="big-price">9 200 000 ₽</div>
        <span class="badge">Онлайн-оформление</span>

        <label>Аванс</label>
        <div class="val" data-calc="advance-val">2 800 000 ₽</div>
        <input type="range" data-calc="advance" min="920000" max="4600000" step="50000" value="2800000">
        <div class="row"><span>920 тыс</span><span>4.6 млн</span></div>

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
        <div class="spec-item"><div class="k">Двигатель</div><div class="v">Дизельный, 13 л, 500 л.с.</div></div>
        <div class="spec-item"><div class="k">Коробка</div><div class="v">Автомат (Opticruise)</div></div>
        <div class="spec-item"><div class="k">Привод</div><div class="v">Задний</div></div>
        <div class="spec-item"><div class="k">Тип</div><div class="v">Тягач + полуприцеп</div></div>
        <div class="spec-item"><div class="k">Год выпуска</div><div class="v">2024</div></div>
        <div class="spec-item"><div class="k">Грузоподъёмность</div><div class="v">до 24 т</div></div>
        <div class="spec-item"><div class="k">Расход</div><div class="v">26 л/100км</div></div>
        <div class="spec-item"><div class="k">Цвет</div><div class="v">Белый</div></div>
      </div>
    </div>

    <div class="desc">
      <h2>Описание</h2>
      <p>Scania R500 в сцепке с полуприцепом — надёжный комплект для дальних магистральных перевозок. Экономичный двигатель, автоматизированная КПП и просторная спальная кабина. Выгодный лизинг для транспортных компаний.</p>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/car-calc.js') }}"></script>
@endpush
