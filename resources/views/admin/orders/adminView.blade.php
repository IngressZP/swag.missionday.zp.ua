@extends('layouts.admin')

@section('content')
    <h2 class="mt-2 mb-5 text-center">
        Заказ #{{ $order->id  }}
    </h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <table class="table">
                <tbody>
                    <tr>
                        <th>#</th>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr>
                        <th>Ник в Telegram</th>
                        <td>{{ $order->telegram_nick }}</td>
                    </tr>
                    <tr>
                        <th>Ник в Ingress</th>
                        <td>{{ $order->ingress_nick }}</td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td>{{ $order->email or '-' }}</td>
                    </tr>
                    <tr>
                        <th>Телефон</th>
                        <td>{{ $order->phone or '-' }}</td>
                    </tr>
                    <tr>
                        <th>Город</th>
                        <td>{{ $order->city or '-' }}</td>
                    </tr>
                    <tr>
                        <th>Сумма</th>
                        <td>{{ uah($order->total) }}</td>
                    </tr>
                    <tr>
                        <th>Комментарий</th>
                        <td>{{ $order->comment or '-' }}</td>
                    </tr>
                    <tr>
                        <th>Время</th>
                        <td>
                            {{ $order->created_at->format('d-m-Y H:i') }}
                        </td>
                    </tr>
                    <tr>
                        <th>Действия</th>
                        <td>
                            <form action="{{ route('admin.orders.delete', ['order' => $order->id]) }}" method="post" class="d-inline-block">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-warning">
                                    <i class="fas fa-archive"></i> В архив
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <h3 class="text-center">Товары</h3>
            <table class="table table-striped">
                <thead>
                    <th>Картинка</th>
                    <th>Название</th>
                    <th>Количество</th>
                    <th>Цена</th>
                </thead>`
                <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <td>
                                <img src="/img/{{ $product->main_image }}" alt="" style="max-width: 300px; max-height: 200px;">
                            </td>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>
                                {{ $product->pivot->quantity }}
                            </td>
                            <td>
                                {{ uah($product->pivot->price) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
