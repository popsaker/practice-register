@extends('admin.layout')

@section('admin-content')
  <table class="admin-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Марка</th>
        <th>Модель</th>
        <th>Категория</th>
        <th>Цена</th>
        <th>Наличие</th>
        <th>Город</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cars as $car)
        <tr>
          <td>{{ $car['id'] }}</td>
          <td>{{ $car['brand'] }}</td>
          <td>{{ $car['model'] }}</td>
          <td>{{ $car['type'] }}</td>
          <td>{{ number_format($car['price'], 0, '.', ' ') }} ₽</td>
          <td>{{ $car['stock_count'] }} шт.</td>
          <td>{{ $car['city'] }}</td>
          <td class="admin-actions">
            <a href="{{ url('/admin/cars/'.$car['id'].'/edit') }}">Ред.</a>
            <form action="{{ url('/admin/cars/'.$car['id'].'/delete') }}" method="post" style="display:inline-block; margin:0;">
              <button type="submit" class="delete">Удалить</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
