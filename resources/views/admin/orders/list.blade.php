@extends('layouts.admin')

@section('content')
    <h2 class="mt-2 mb-5 text-center">
        Заказы
    </h2>
    @foreach($orders as $order)
        <div class="row my-1">
            <div class="col-md-9">
                {{ $order->created_at->format('d-m-Y H:i') }}
            </div>
            <div class="col-md-3 text-right">
                <form action="{{ route('admin.orders.delete', ['order' => $order->id]) }}" method="delete" class="d-inline-block">
                    {!! csrf_field() !!}
                    <button class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
