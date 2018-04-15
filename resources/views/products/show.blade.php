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
      <div class="col-lg">
        <div class="product__image">
          <div>
            <img src="/img/{{ $product->main_image }}" alt="">
          </div>
        </div>
      </div>
      <div class="col-lg">
        <div class="class row">
          <div class="col-lg-12">
            <div class="product__price_main">
              {{ uah($product->price) }}
            </div>
          </div>
          <div class="d-flex col-lg-12">
            <div class="product__size">
              <span>S</span>
            </div>
            <div class="product__size product__size_active">
              <span>M</span>
            </div>
          </div>
          <div class="d-flex col-lg-12">
            <div class="product__description">
                {{ $product->description }}
            </div>
          </div>
          <div class="d-flex col-lg-12">
            <a href="javascript:void(0)" class="btn product__buy">
                КУПИТЬ
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('blocks.footer')
@endsection
