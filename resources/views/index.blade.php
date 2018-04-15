@extends('layouts.master')

@section('title')
    Mission Day Zaporizhzhia Swag Shop
@endsection

@section('content')
    <header>
        <div class="container">
            <div class="row header">
                <div class="col-md-3">
                    <img class="header__logo"src="/img/md-logo-hex.png" alt="Mission Day Zaporizhzhia" class="header__logo">
                </div>
                <div class="col-md-6">
                    <div class="header__title">
                        <span>MD</span> Zaporizhzhia Swag Shop
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="header-contacts">
                        <a href="https://t.me/missiondayzpchat" target="__blank"><i class="fab fa-telegram"></i></a>
                        <a href="mailto:info@missionday.zp.ua" target="__blank"><i class="fas fa-at"></i></a>
                        <a href="https://www.instagram.com/missiondayzp/" target="__blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.facebook.com/events/166075047320559/" target="__blank"><i class="fab fa-facebook-square"></i></a>
                    </div>
                    <div class="header__site-link">
                        <a href="https://missionday.zp.ua" target="__blank">Основной сайт</a>
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                </div>
            </div>
            <!-- <ul class="nav nav-pills justify-content-center">
                <li class="nav-item"><a href="#" class="nav-link">Одежда, нашивки</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Чашки, бокалы</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Сувениры, наклейки</a></li>
            </ul> -->
        </div>
    </header>
    <div class="container category_navigation">
      <div class="row">
        @foreach ($cats as $cat)
          <a href="/category/{{$cat->slug}}"class="col-lg d-flex align-items-center justify-content-center category">
              <span>{{$cat->title}}</span>
          </a>

          @if (!$loop->last)
            <div class="category_separator d-flex align-items-center"><div></div></div>
          @endif

        @endforeach
      </div>
    </div>

    <div class="container content">
      <div class="row">
        @foreach ($products as $product)
        <div class="col-lg-3 product">
          <div class="product_thumb">
            <img src="/img/{{$product->main_image}}">
          </div>
          <div class="product_title">{{$product->name}}</div>

          <div class="product_price">225 ₴</div>
          <a class="button order" href="#">ЗАКАЗАТЬ</a>
        </div>
        @endforeach
      </div>
    </div>
@endsection
