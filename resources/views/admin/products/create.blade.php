@extends('layouts.admin')

@section('content')
    <h2 class="text-center mt-2 mb-5">
        Новый товар
    </h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('admin.products.store') }}"
                  method="post" enctype="multipart/form-data" class="mb-5">
                {!! csrf_field() !!}
                <input type="hidden" name="lang" value="{{ App::getLocale() }}">

                <div class="form-group">
                    <label for="name">
                        Название
                    </label>
                    <input type="text" name="name" class="form-control" id="title" required
                           placeholder="Название товара">
                </div>
                <div class="form-group">
                    <label for="main_image">
                        Фотография
                    </label>
                    <input type="file" name="main_image" class="form-control" id="main_image" required>
                </div>
                <div class="form-group">
                    <label for="price">
                        Цена
                    </label>
                    <input type="number" name="price" class="form-control" id="price" required
                           placeholder="Цена товара" min="0">
                </div>
                <div class="form-group">
                    <label for="category">
                        Категория
                    </label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="" selected>
                            -
                        </option>
                        @foreach($cats as $cat)
                            <option value="{{ $cat->id }}">
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
                              required placeholder="Описание товара"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Сохранить
                </button>
            </form>
        </div>
    </div>
@endsection
