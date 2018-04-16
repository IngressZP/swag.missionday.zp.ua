@extends('layouts.admin')

@section('content')
    <h2 class="mt-2 mb-5 text-center">
        Заказы
    </h2>
    <table class="table table-striped thead-light mb-5">
        <thead>
            <th>#</th>
            <th>Ник в Telegram</th>
            <th>Ник в Ingress</th>
            <th>E-mail</th>
            <th>Телефон</th>
            <th>Город</th>
            <th>Сумма</th>
            <th>Время</th>
            <th>Детали</th>
            {{--<th>Действия</th>--}}
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->telegram_nick }}</td>
                    <td>{{ $order->ingress_nick }}</td>
                    <td>{{ $order->email or '-' }}</td>
                    <td>{{ $order->phone or '-' }}</td>
                    <td>{{ $order->city or '-' }}</td>
                    <td>{{ uah($order->total) }}</td>
                    <td>
                        {{ $order->created_at->format('d-m-Y H:i') }}
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.view', ['order' => $order->id]) }}">Просмотр</a>
                    </td>
                    {{--<td>--}}
                        {{--<form action="{{ route('admin.orders.delete', ['order' => $order->id]) }}" method="post" class="d-inline-block">--}}
                            {{--{!! csrf_field() !!}--}}
                            {{--<input type="hidden" name="_method" value="delete">--}}
                            {{--<button class="btn btn-warning">--}}
                                {{--<i class="fas fa-archive"></i>--}}
                            {{--</button>--}}
                        {{--</form>--}}
                    {{--</td>--}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
