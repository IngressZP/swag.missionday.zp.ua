@extends('layouts.admin')

@section('content')
    <h2 class="text-center mt-2 mb-5">
        Новая категория
    </h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('admin.categories.store') }}"
                  method="post" class="mb-5">
                {!! csrf_field() !!}
                <input type="hidden" name="lang" value="{{ App::getLocale() }}">

                <div class="form-group">
                    <label for="title">
                        Название
                    </label>
                    <input type="text" name="title" class="form-control" id="title" required
                           placeholder="Название категории">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Сохранить
                </button>
            </form>
        </div>
    </div>
@endsection
