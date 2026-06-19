@extends('admin.layout')

@section('admin-content')
  <h2>Редактировать машину</h2>
  @include('admin.car-form', ['action' => url('/admin/cars/'.$car['id'].'/update'), 'car' => $car])
@endsection
