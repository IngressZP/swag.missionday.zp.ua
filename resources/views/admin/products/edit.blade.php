@extends('layouts.admin')

@section('content')
    <h3 class="text-center mt-2 mb-5">
        Товар: {{ $product->name }}
    </h3>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="name">
                        Название
                    </label>
                    <input type="text" name="name" class="form-control" id="title"
                           placeholder="Название товара" value="{{ $product->name or '' }}">
                </div>
                <div class="form-group">
                    <label for="description">
                        Название
                    </label>
                    <input type="text" name="name" class="form-control" id="title"
                           placeholder="Название товара" value="{{ $product->name or '' }}">
                    <textarea name="description" id="description" cols="30" rows="10">{{ $product->description or '' }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Сохранить
                </button>
            </form>
        </div>
    </div>
@endsection
