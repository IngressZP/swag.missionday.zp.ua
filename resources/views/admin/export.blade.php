@extends('layouts.admin')

@section('content')
  <h2 class="text-center my-2">
    Выгрузка
  </h2>
  <div class="card container mt-5">
    <div class="row card-body">
      <div class="col-md-9">
        <h3>
          Товары по количесву
        </h3>
      </div>
      <div class="col-md-3 text-right">
        <a href="{{ route('admin.export.quantity') }}" class="btn btn-primary">Загрузить</a>
      </div>
    </div>
  </div>
@endsection
