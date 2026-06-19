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

    <div class="grid" id="carGrid">
      <div class="card" data-type="legkovoy">
        <img src="{{ asset('cars/sedan.png') }}" alt="Chery Arrizo 8">
        <div class="card-body">
          <div class="price">2 745 600 ₽ <small>от 41 651 ₽/мес.</small></div>
          <div class="brand">Chery Arrizo 8</div>
          <div class="specs">Седан · Бензин · 1.6 л · Автомат · Передний</div>
          <span class="stock in">В наличии: 5 шт.</span>
          <a href="{{ url('/car1') }}" class="btn">Подробнее</a>
        </div>
      </div>

      <div class="card" data-type="vnedorozhnik">
        <img src="{{ asset('cars/suv.png') }}" alt="Внедорожник">
        <div class="card-body">
          <div class="price">3 980 000 ₽ <small>от 58 200 ₽/мес.</small></div>
          <div class="brand">Tank 500</div>
          <div class="specs">Внедорожник · Бензин · 3.0 л · Автомат · Полный</div>
          <span class="stock in">В наличии: 2 шт.</span>
          <a href="{{ url('/car2') }}" class="btn">Подробнее</a>
        </div>
      </div>

      <div class="card" data-type="gruzovoy">
        <img src="{{ asset('cars/truck.png') }}" alt="Грузовик">
        <div class="card-body">
          <div class="price">6 450 000 ₽ <small>от 94 300 ₽/мес.</small></div>
          <div class="brand">КАМАЗ 5490</div>
          <div class="specs">Грузовой · Дизель · 12 л · Механика · Задний</div>
          <span class="stock out">Нет в наличии</span>
          <a href="{{ url('/car3') }}" class="btn">Подробнее</a>
        </div>
      </div>

      <div class="card" data-type="pricep">
        <img src="{{ asset('cars/trailer.png') }}" alt="Фура с прицепом">
        <div class="card-body">
          <div class="price">9 200 000 ₽ <small>от 134 000 ₽/мес.</small></div>
          <div class="brand">Scania R500 + прицеп</div>
          <div class="specs">С прицепом · Дизель · 13 л · Автомат · Задний</div>
          <span class="stock in">В наличии: 1 шт.</span>
          <a href="{{ url('/car4') }}" class="btn">Подробнее</a>
        </div>
      </div>

      <div class="card" data-type="spec">
        <img src="{{ asset('cars/special.png') }}" alt="Спецтехника трактор">
        <div class="card-body">
          <div class="price">4 100 000 ₽ <small>от 60 800 ₽/мес.</small></div>
          <div class="brand">МТЗ Беларус 1221</div>
          <div class="specs">Спецтехника · Дизель · 7 л · Механика · Полный</div>
          <span class="stock in">В наличии: 3 шт.</span>
          <a href="{{ url('/car5') }}" class="btn">Подробнее</a>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/catalog.js') }}"></script>
@endpush
