@extends('layouts.master')

@section('content')
  @include('blocks.header')

  <div class="container content">
    <h2 class="text-center mb-3">
      {{ trans('main.cart.order-header') }}
    </h2>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <table class="table table-striped table-bordered">
          <thead>
          <th>{{ trans('main.cart.table.image') }}</th>
          <th>{{ trans('main.cart.table.name') }}</th>
          <th>{{ trans('main.cart.table.price') }}</th>
          <th>{{ trans('main.cart.table.quantity') }}</th>
          <th>{{ trans('main.cart.table.total') }}</th>
          <th></th>
          </thead>
          <tbody>
          @if(count($cart))
            @foreach($cart as $item)
              <tr>
                <td>
                  <img src="{{ productImage($item->id) }}" alt="" style="max-height: 160px; max-width: 200px;">
                </td>
                <td>
                  {{ $item->name }}
                </td>
                <td>
                  {{ uah($item->price) }}
                </td>
                <td>
                  {{--<input type="number" name="qty" class="form-control" value="{{ $item->qty }}" style="max-width: 100px;">--}}
                  {{ $item->qty }}
                </td>
                <td>
                  {{ uah($item->subtotal) }}
                </td>
                <td></td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="6" class="text-center">
                {{ trans('main.cart.empty') }} <br>
                <a href="{{ route('index') }}" class="btn btn-primary mt-2">{{ trans('main.cart.to-index') }}</a>
              </td>
            </tr>
          @endif
          </tbody>
        </table>
      </div>
    </div>
    @if(count($cart) && !$form)
      <div class="row">
        <div class="col-md-6 offset-md-2" style="padding-top: .375rem; padding-bottom: .375rem; font-size: 1.2rem;">
          <strong>
            {{ trans('main.cart.total') }}:
          </strong>
          {{ uah(Cart::subtotal()) }}
        </div>
        <div class="col-md-2 justify-content-end text-right">
          <a href="{{ route('cart.show', ['form' => 1]) }}" class="btn btn-primary">
            {{ trans('main.cart.order') }}
          </a>
        </div>
      </div>
    @endif
    @if($form)
      <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{ route('cart.submit') }}" method="post">
            {!! csrf_field() !!}

            <div class="row my-2">
              <div class="col-md-4">
                <strong>{{ trans('main.cart.total') }}:</strong>
              </div>
              <div class="col-md-8">
                {{ uah(Cart::subtotal()) }}
              </div>
            </div>

            <div class="form-group row">
              <label for="telegram_nick" class="col-md-4 col-form-label">{{ trans('main.cart.labels.telegram_nick') }}</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="telegram_nick" id="telegram_nick"
                       placeholder="{{ trans('main.cart.placeholders.telegram_nick') }}" required value="{{ old('telegram_nick') }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="ingress_nick" class="col-md-4 col-form-label">{{ trans('main.cart.labels.ingress_nick') }}</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="ingress_nick" id="ingress_nick"
                       placeholder="{{ trans('main.cart.placeholders.ingress_nick') }}" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label">{{ trans('main.cart.labels.email') }}</label>
              <div class="col-md-8">
                <input type="email" class="form-control" name="email" id="email"
                       placeholder="{{ trans('main.cart.placeholders.email') }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label">{{ trans('main.cart.labels.phone') }}</label>
              <div class="col-md-8">
                <input type="tel" class="form-control" name="phone" id="phone"
                       placeholder="{{ trans('main.cart.placeholders.phone') }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="city" class="col-md-4 col-form-label">{{ trans('main.cart.labels.city') }}</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="city" id="city"
                       placeholder="{{ trans('main.cart.placeholders.city') }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="comment" class="col-md-4 col-form-label">{{ trans('main.cart.labels.comment') }}</label>
              <div class="col-md-8">
                <textarea name="comment" id="comment" class="form-control"
                          placeholder="{{ trans('main.cart.placeholders.comment') }}"></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 offset-md-4">
                <button type="submit" class="btn btn-primary btn-lg">
                  <i class="fas fa-check"></i> {{ trans('main.cart.order') }}
                </button>
              </div>
            </div>
          </form>
        </div>
    </div>
    @endif
  </div>
@endsection