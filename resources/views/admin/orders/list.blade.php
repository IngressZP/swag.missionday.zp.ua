@extends('layouts.admin')

@section('content')
  <h2 class="mt-2 mb-5 text-center">
      Заказы
  </h2>
  <table class="table table-striped thead-light mb-5 orders-table">
    <thead>
      <th>#</th>
      <th>Статус</th>
      <th>Ник в Telegram</th>
      <th>Ник в Ingress</th>
      <th>Сумма</th>
      <th>Время</th>
      <th>Детали</th>
      {{--<th>Действия</th>--}}
    </thead>
    <tbody>
      <tr class="orders-table-filter">
        <td>
          <i class="fas fa-filter"></i>
        </td>
        <td>
          <select name="order_status_filter" class="order_status_select">
            <option value="" selected>
              --
            </option>
            @foreach($statuses as $status)
              <option value="{{ $status->id }}">
                {{ $status->title }}
              </option>
            @endforeach
          </select>
        </td>
        <td>
          <input type="search" name="telegram_nick" placeholder="Ник в Telegram">
        </td>
        <td>
          <input type="search" name="ingress_nick" placeholder="Ник в Ingress">
        </td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      @foreach($orders as $order)
        <tr>
          <td>{{ $order->id }}</td>
          <td>
            <select name="order_status" class="order_status_select" data-order-id="{{ $order->id }}">
              @foreach($statuses as $status)
                <option value="{{ $status->id }}" @if($order->order_status_id == $status->id) selected @endif >
                  {{ $status->title }}
                </option>
              @endforeach
            </select>
          </td>
          <td>{{ $order->telegram_nick }}</td>
          <td>{{ $order->ingress_nick }}</td>
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
