@extends('layouts.master')

@section('content')
  @include('blocks.header')
  @include('blocks.status')

  <div class="container content">
    <h2 class="text-center mb-3">
      {{ trans('main.cart.order-header') }}
    </h2>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <table class="checkout-table">
          <thead>
          <th>{{ trans('main.cart.table.product') }}</th>
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
                  <form action="{{ route('cart.update') }}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                    <input type="hidden" name="quantity" value="{{ max($item->qty - 1, 1) }}">
                    <button class="checkout-table-item-quantity checkout-table-item-quantity_minus" type="submit">-</button>
                  </form>
                  {{ $item->qty }}
                  <form action="{{ route('cart.update') }}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                    <input type="hidden" name="quantity" value="{{ $item->qty + 1 }}">
                    <button class="checkout-table-item-quantity checkout-table-item-quantity_plus" type="submit">+</button>
                  </form>
                </td>
                <td>
                  {{ uah($item->subtotal) }}
                </td>
                <td>
                  @if(!$form)
                    <form action="{{ route('cart.remove') }}" method="post">
                      {!! csrf_field() !!}
                      <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                      <button class="btn btn-danger" type="submit"><i class="fas fa-times"></i></button>
                    </form>
                  @endif
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="6" class="text-center py-4">
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
        <div class="col-md-8 text-right offset-md-2">
          <div style="font-size: 1.5rem;" class="mb-3">
            <strong>
              {{ trans('main.cart.total') }}:
            </strong>
            {{ uah(Cart::subtotal()) }}
          </div>
          <div>
            <a href="{{ route('cart.clear') }}" class="btn btn-secondary">
              {{ trans('main.cart.clear') }}
            </a>
            <a href="{{ route('cart.show', ['form' => 1]) }}" class="btn btn-primary btn-lg ml-2">
              {{ trans('main.cart.order') }}
            </a>
          </div>
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
              <label for="telegram_nick" class="col-md-4 col-form-label">
                {{ trans('main.cart.labels.telegram_nick') }} <span class="text-danger">*</span>
              </label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="telegram_nick" id="telegram_nick" required
                       placeholder="{{ trans('main.cart.placeholders.telegram_nick') }}" value="{{ old('telegram_nick') }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="ingress_nick" class="col-md-4 col-form-label">
                {{ trans('main.cart.labels.ingress_nick') }} <span class="text-danger">*</span>
              </label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="ingress_nick" id="ingress_nick" required
                       placeholder="{{ trans('main.cart.placeholders.ingress_nick') }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label">
                {{ trans('main.cart.labels.email') }} <span class="text-danger">*</span>
              </label>
              <div class="col-md-8">
                <input type="email" class="form-control" name="email" id="email" required
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
              <label for="city" class="col-md-4 col-form-label">
                {{ trans('main.cart.labels.city') }} <span class="text-danger">*</span>
              </label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="city" id="city" required
                       placeholder="{{ trans('main.cart.placeholders.city') }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="delivery" class="col-md-4 col-form-label">{{ trans('main.cart.labels.delivery.general') }}</label>
              <div class="col-md-8">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="delivery" id="delivery1" value="0" checked>
                  <label class="form-check-label" for="delivery1">
                    {{ trans('main.cart.labels.delivery.no') }}
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="delivery" id="delivery2" value="1">
                  <label class="form-check-label" for="delivery2">
                    {{ trans('main.cart.labels.delivery.yes') }}
                  </label>
                </div>
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

  @include('blocks.footer')
@endsection