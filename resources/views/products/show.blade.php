@extends('layouts.master')

@section('content')
  @include('blocks.header')
  <div class="container categories">
    <div class="row">
      @foreach ($cats as $cat)
        <a href="/?category={{ $cat->id }}"
           class="col-lg d-flex align-items-center justify-content-center category @if($cat->id == $product->category->id) active @endif">
          <span>{{ $cat->title }}</span>
        </a>

        @if (!$loop->last)
          <div class="category-separator d-flex align-items-center"><div></div></div>
        @endif
      @endforeach
    </div>
  </div>

  <div class="container content">
    <div class="row">
      <div class="col-lg">
        <div class="product__name">
          {{ $product->name }}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="product__image">
          <img src="/img/{{ $product->main_image }}" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="class row">
          <div class="col-lg-12">
            <div class="product__price_main">
              {{ uah($product->price) }}
            </div>
          </div>
          {{--<div class="d-flex col-lg-12">--}}
            {{--<div class="product__size">--}}
              {{--<span>S</span>--}}
            {{--</div>--}}
            {{--<div class="product__size product__size_active">--}}
              {{--<span>M</span>--}}
            {{--</div>--}}
          {{--</div>--}}
          <div class="d-flex col-lg-12">
            <div class="product__description">
                {!! description($product->description) !!}
            </div>
          </div>
          <div class="d-flex col-lg-12">
            <form action="{{ route('cart.add') }}" method="post" class="product-form">
              {!! csrf_field() !!}
              <input type="hidden" name="product" value="{{ $product->id }}">

              <div class="product-quantity">
                <button class="product-quantity__control product-quantity__control_minus">-</button>
                <input type="number" class="form-control product-quantity__input" value="1" min="1" name="quantity">
                <button class="product-quantity__control product-quantity__control_plus">+</button>
              </div>

              <button class="btn btn-primary btn-lg product__buy" type="submit">
                  {{ trans('main.product.buy') }}
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('blocks.footer')
@endsection
