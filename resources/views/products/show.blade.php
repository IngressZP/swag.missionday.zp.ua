@extends('layouts.master')

@section('content')
    @include('blocks.header')
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
                        <img src="/img/{{ $product->main_image }}" alt="">
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
                    </div>
                </div>

            </div>
        </div>

@endsection
