@extends('layouts.admin')

@section('content')
    <h2 class="text-center mt-2 mb-5">
        Товар: {{ $product->name }}
    </h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('admin.products.update', ['product' => $product->id]) }}"
                  method="post" enctype="multipart/form-data" class="mb-5">
                {!! csrf_field() !!}
                <input type="hidden" name="lang" value="{{ App::getLocale() }}">

                <div class="form-group">
                    <label for="name">
                        Название
                    </label>
                    <input type="text" name="name" class="form-control" id="title" required
                           placeholder="Название товара" value="{{ $product->name or '' }}">
                </div>
                <div class="form-group">
                    <label for="main_image">
                        Фотография
                    </label>
                    <img src="/img/{{ $product->main_image }}" alt="" style="max-width: 100%; max-height: 400px;" class="d-block">
                    <input type="file" name="main_image" class="form-control" id="main_image">
                </div>
                <div class="form-group">
                    <label for="price">
                        Цена
                    </label>
                    <input type="number" name="price" class="form-control" id="price" required
                           placeholder="Цена товара" value="{{ $product->price }}" min="0">
                </div>
                <div class="form-group">
                    <label for="category">
                        Категория
                    </label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="">
                            -
                        </option>
                        @foreach($cats as $cat)
                            <option value="{{ $cat->id }}" @if($product->category_id == $cat->id) selected @endif>
                                {{ $cat->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">
                        Описание
                    </label>
                    <textarea name="description" id="description" class="form-control"
                              required placeholder="Описание товара">{{ $product->description or '' }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Сохранить
                </button>
            </form>

            <form class="my-5 justify-content-center text-center" action="{{ route('admin.products.hide', ['product' => $product]) }}" method="post">
                {!! csrf_field() !!}
                @if($product->hidden)
                    <input type="hidden" name="hidden" value="0">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-eye"></i> Отобразить товар
                    </button>
                @else
                    <input type="hidden" name="hidden" value="1">
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-eye-slash"></i> Скрыть товар
                    </button>
                @endif
            </form>
        </div>
    </div>
@endsection
