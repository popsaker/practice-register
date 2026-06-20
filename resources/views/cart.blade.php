@extends('layouts.app')

@section('title', 'Корзина — RED LEASING')

@section('content')
  <div class="container">
    <div class="breadcrumb"><a href="{{ url('/catalog') }}">Каталог</a> / Корзина</div>

    <div class="cart-page">
      <h1>Корзина</h1>

      @if(!empty($items))
        <div class="cart-table">
          <div class="cart-row cart-header">
            <div>Товар</div>
            <div>Цена</div>
            <div>Кол-во</div>
            <div>Сумма</div>
            <div></div>
          </div>
          @foreach($items as $item)
            <div class="cart-row">
              <div class="cart-item">
                <img src="{{ asset($item['image'] ?: 'cars/sedan.png') }}" alt="{{ $item['brand'] }} {{ $item['model'] }}">
                <div class="cart-item-details">
                  <div class="cart-item-title">{{ $item['brand'] }} {{ $item['model'] }}</div>
                  <div class="cart-item-meta">{{ $item['year'] }} · {{ $item['fuel'] }} · {{ $item['transmission'] }}</div>
                </div>
              </div>
              <div>{{ number_format($item['price'], 0, '.', ' ') }} ₽</div>
              <div>{{ $item['quantity'] }}</div>
              <div>{{ number_format($item['price'] * $item['quantity'], 0, '.', ' ') }} ₽</div>
              <div>
                <form action="{{ url('/cart/' . $item['id'] . '/remove') }}" method="post">
                  <button type="submit" class="btn-out">Удалить</button>
                </form>
              </div>
            </div>
          @endforeach
        </div>

        <div class="cart-summary">
          <div class="cart-total">
            <span>Итого</span>
            <strong>{{ number_format($total, 0, '.', ' ') }} ₽</strong>
          </div>
          <div class="cart-actions">
            <form action="{{ url('/cart/clear') }}" method="post">
              <button type="submit" class="btn-out">Очистить корзину</button>
            </form>
            <a href="#" class="btn-red">Оформить заказ</a>
          </div>
        </div>
      @else
        <p>В корзине пока нет товаров.</p>
        <a href="{{ url('/catalog') }}" class="btn-red">Вернуться в каталог</a>
      @endif
    </div>
  </div>
@endsection