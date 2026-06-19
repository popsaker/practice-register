@extends('admin.layout')

@section('admin-content')
  <h2>Добавить машину</h2>
  @include('admin.car-form', ['action' => url('/admin/cars/store'), 'car' => []])
@endsection
