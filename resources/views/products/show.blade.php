@extends('layouts.master')

@section('content')
    @include('blocks.header')
        <div class="container">
            <div class="row">
                <div class="col-lg">
                  <div class="product__name">
                      {{ $product->name }}
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg">

                </div>
                <div class="col-lg">
                    <div class="class row">
                        <div class="col-lg-12">
                            <div class="product__price">
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
                    </div>
                </div>

            </div>
        </div>
    @include('blocks.footer')
@endsection
