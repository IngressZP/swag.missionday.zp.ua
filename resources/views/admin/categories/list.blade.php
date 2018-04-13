@extends('layouts.admin')

@section('content')
    <h2 class="mt-2 mb-5 text-center">
        Категории
    </h2>
    @foreach($cats as $cat)
        <div class="row my-1">
            <div class="col-md-9">
                {{ $cat->title }}
            </div>
            <div class="col-md-3 text-right">
                <a href="{{ route('admin.categories.edit', ['category' => $cat->id]) }}" class="btn btn-primary">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <form action="{{ route('admin.categories.delete', ['category' => $cat->id]) }}" method="delete" class="d-inline-block">
                    {!! csrf_field() !!}
                    <button class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
