@extends('layouts.master')

@section('title')
    Mission Day Zaporizhzhia Swag Shop
@endsection

@section('content')
  @include('blocks.header')

  <div class="container categories">
    <div class="row">
      @if($category != 0)
        <a href="{{ route('index') }}"
           class="col-lg d-flex align-items-center justify-content-center category">
          <span>{{ trans('main.categories.all') }}</span>
        </a>
        <div class="category-separator d-flex align-items-center"><div></div></div>
      @endif
      @foreach ($cats as $cat)
        <a href="/?category={{ $cat->id }}"
           class="col-lg d-flex align-items-center justify-content-center category @if($cat->id == $category) active @endif">
          <span>{{ $cat->title }}</span>
        </a>

        @if (!$loop->last)
          <div class="category-separator d-flex align-items-center"><div></div></div>
        @endif
      @endforeach
    </div>
  </div>

  <div class="container content">
    <div class="row products">
      @foreach ($products as $product)
        <div class="product card">
          <div class="product__thumb card-img-top">
            <img src="/img/{{$product->main_image}}" class="">
          </div>
          <div class="card-body">
            <a class="product__title" href="{{ route('product.view', ['product' => $product->id]) }}">{{$product->name}}</a>
            <div class="product__price">{{ uah($product->price) }}</div>
            <a class="button order btn btn-primary product__order" href="{{ route('cart.add', ['product' => $product->id]) }}">
              <i class="fas fa-shopping-cart"></i> {{ trans('main.product.order') }}
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  @include('blocks.footer')
@endsection
