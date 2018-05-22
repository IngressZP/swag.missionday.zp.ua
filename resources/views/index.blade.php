@extends('layouts.master')

@section('title')
    Mission Day Zaporizhzhia Swag Shop
@endsection

@section('content')
  @include('blocks.header')
  @include('blocks.status')

  <div class="container categories">
    <div class="row">
      @if($category != 0)
        <a href="{{ route('index') }}"
           class="col-lg d-flex align-items-center justify-content-center category">
          <span>{{ trans('main.categories.all') }}</span>
        </a>
      @endif
      @foreach ($cats as $cat)
        <a href="/?category={{ $cat->id }}"
           class="col-lg d-flex align-items-center justify-content-center category @if($cat->id == $category) active @endif">
          <span>{{ $cat->title }}</span>
        </a>
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
            @if($product->hidden)
              <button class="button order btn btn-secondary product__order" disabled>
                {{ trans('main.product.out') }}
              </button>
            @else
              <form action="{{ route('cart.add') }}" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="product" value="{{ $product->id }}">
                <button class="button order btn btn-primary product__order" type="submit">
                  <i class="fas fa-shopping-cart"></i> {{ trans('main.product.order') }}
                </button>
              </form>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>

  @include('blocks.footer')
@endsection
