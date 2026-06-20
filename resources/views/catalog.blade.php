@extends('layouts.app')

@section('title', 'Каталог авто — RED LEASING')

@section('content')
  <div class="container">
    <h1>Каталог автомобилей</h1>

    <div class="filters">
      <button class="filter-btn active" data-type="all">Все</button>
      <button class="filter-btn" data-type="legkovoy">Легковой</button>
      <button class="filter-btn" data-type="gruzovoy">Грузовой</button>
      <button class="filter-btn" data-type="vnedorozhnik">Внедорожник</button>
      <button class="filter-btn" data-type="pricep">С прицепом</button>
      <button class="filter-btn" data-type="spec">Спецтехника</button>
    </div>

    @php
      $typeLabels = [
        'legkovoy' => 'Легковой',
        'gruzovoy' => 'Грузовой',
        'vnedorozhnik' => 'Внедорожник',
        'pricep' => 'С прицепом',
        'spec' => 'Спецтехника',
      ];
    @endphp

    <div class="grid" id="carGrid">
      @if(!empty($cars) && count($cars) > 0)
        @foreach($cars as $car)
          <div class="card" data-type="{{ $car['type'] }}" data-id="{{ $car['id'] }}" data-brand="{{ $car['brand'] }}" data-model="{{ $car['model'] }}" data-price="{{ $car['price'] }}" data-fuel="{{ $car['fuel'] }}" data-engine="{{ $car['engine'] }}" data-transmission="{{ $car['transmission'] }}" data-drive="{{ $car['drive_type'] }}" data-stock="{{ $car['stock_count'] }}" data-image="{{ asset($car['image'] ?: 'cars/sedan.png') }}" data-description="{{ $car['description'] }}">
            <img src="{{ asset($car['image'] ?: 'cars/sedan.png') }}" alt="{{ $car['brand'] }} {{ $car['model'] }}">
            <div class="card-body">
              <div class="price">{{ number_format($car['price'], 0, '.', ' ') }} ₽</div>
              <div class="brand">{{ $car['brand'] }} {{ $car['model'] }}</div>
              <div class="specs">
                {{ $typeLabels[$car['type']] ?? $car['type'] }} · {{ $car['fuel'] }} · {{ $car['engine'] }} · {{ $car['transmission'] }} · {{ $car['drive_type'] }}
              </div>
              @if(intval($car['stock_count']) > 0)
                <span class="stock in">В наличии: {{ $car['stock_count'] }} шт.</span>
              @else
                <span class="stock out">Нет в наличии</span>
              @endif
              <a href="/car/{{ $car['id'] }}" class="btn view-details">Подробнее</a>
            </div>
          </div>
        @endforeach
      @else
        <p>В каталоге пока нет машин.</p>
      @endif
    </div>
  </div>

@endsection

@push('scripts')
  <script src="{{ asset('js/catalog.js') }}"></script>
@endpush
