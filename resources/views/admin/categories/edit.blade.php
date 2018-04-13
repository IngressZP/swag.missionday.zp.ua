@extends('layouts.admin')

@section('content')
    <h3 class="text-center mt-2 mb-5">
        Категория: {{ $category->title }}
    </h3>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('admin.categories.update', ['category' => $category->id]) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="title">
                        Название
                    </label>
                    <input type="text" name="title" class="form-control" id="title"
                           placeholder="Название категории" value="{{ $category->title or '' }}">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Сохранить
                </button>
            </form>
        </div>
    </div>
@endsection
