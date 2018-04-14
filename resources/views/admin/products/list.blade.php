@extends('layouts.admin')

@section('content')
    <h2 class="my-3 text-center">
        Товары
    </h2>

    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show">
            {!! session('status') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {!! session('error') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row justify-content-center my-3">
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Добавить
        </a>
    </div>

    <table class="table table-striped mb-5">
        <thead>
            <th>Изображение</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Детали</th>
            <th>Действия</th>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        <img src="/img/{{ $product->main_image }}" alt="" style="max-width: 300px; max-height: 200px;">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->title }}</td>
                    <td>{{ uah($product->price) }}</td>
                    <td><a href="{{ route('admin.products.edit', ['product' => $product]) }}">Просмотр</a></td>
                    <td>
                        <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn btn-primary">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('admin.products.delete', ['product' => $product->id]) }}" method="post" class="d-inline-block">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="delete">
                            <button class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
