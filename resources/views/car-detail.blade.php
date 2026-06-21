@extends('layouts.app')

@section('title', $car['brand'] . ' ' . $car['model'] . ' — RED LEASING')

@section('content')
  <div class="container">
    <div class="breadcrumb"><a href="{{ url('/catalog') }}">Каталог</a> / {{ $car['brand'] }} {{ $car['model'] }}</div>

    <div class="top">
      <div class="left">
        <h1>{{ $car['brand'] }} {{ $car['model'] }}</h1>
        <p class="subtitle">{{ $car['fuel'] }} · {{ $car['engine'] }} · {{ $car['transmission'] }} · {{ $car['drive_type'] }} · {{ $car['body_type'] }}</p>
        <img src="{{ asset($car['image'] ?: 'cars/sedan.png') }}" alt="{{ $car['brand'] }} {{ $car['model'] }}" class="main-img">
        <span class="stock {{ intval($car['stock_count']) > 0 ? 'in' : 'out' }}">
          {{ intval($car['stock_count']) > 0 ? 'В наличии: ' . $car['stock_count'] . ' шт.' : 'Нет в наличии' }}
          @if(!empty($car['city'])) · {{ $car['city'] }} @endif
        </span>
      </div>

      <div class="calc car-calc" data-price="{{ (int) $car['price'] }}" data-rate="0.04">
        <div class="big-price">{{ number_format($car['price'], 0, '.', ' ') }} ₽</div>
        <span class="badge">Онлайн-оформление</span>

        <div class="summary">
          <div><span>Год</span><span>{{ $car['year'] }}</span></div>
          <div><span>Мощность</span><span>{{ $car['horsepower'] }} л.с.</span></div>
          <div><span>Привод</span><span>{{ $car['drive_type'] }}</span></div>
        </div>

        <div class="detail-actions">
          <form action="{{ url('/cart/add') }}" method="post">
            <input type="hidden" name="id" value="{{ $car['id'] }}">
            <button type="submit" class="btn-red">Положить в корзину</button>
          </form>
          <a href="#" class="btn-out" data-placeholder="consult">Получить консультацию</a>
        </div>
      </div>
    </div>

    <div class="specs-block">
      <h2>Характеристики</h2>
      <div class="specs-grid">
        <div class="spec-item"><div class="k">Двигатель</div><div class="v">{{ $car['fuel'] }}, {{ $car['engine'] }}, {{ $car['horsepower'] }} л.с.</div></div>
        <div class="spec-item"><div class="k">Коробка</div><div class="v">{{ $car['transmission'] }}</div></div>
        <div class="spec-item"><div class="k">Привод</div><div class="v">{{ $car['drive_type'] }}</div></div>
        <div class="spec-item"><div class="k">Кузов</div><div class="v">{{ $car['body_type'] }}</div></div>
        <div class="spec-item"><div class="k">Год выпуска</div><div class="v">{{ $car['year'] }}</div></div>
        <div class="spec-item"><div class="k">Разгон 0-100</div><div class="v">{{ $car['acceleration'] ?: '—' }}</div></div>
        <div class="spec-item"><div class="k">Расход</div><div class="v">{{ $car['consumption'] ?: '—' }}</div></div>
        <div class="spec-item"><div class="k">Цвет</div><div class="v">{{ $car['color'] ?: '—' }}</div></div>
      </div>
    </div>

    <div class="desc">
      <h2>Описание</h2>
      <p>{{ $car['description'] ?: 'Описание товара отсутствует.' }}</p>
    </div>
  </div>
@endsection
