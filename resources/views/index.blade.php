@extends('layouts.master')

@section('title')
    Mission Day Zaporizhzhia Swag Shop
@endsection

@section('content')
    <header>
        <div class="container">
            <div class="row header">
                <div class="col-md-3">
                    <img class="header__logo" src="/img/md-logo-hex.png" alt="Mission Day Zaporizhzhia">
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
        </div>
    </header>
    <div class="container content">
        <div class="row">
            @foreach($cats as $cat)
                <a href="/?category={{ $cat->id }}" class="col-lg d-flex align-items-center justify-content-center category">
                    <span>{{ $cat->title }}</span>
                </a>
                <div class="category_separator d-flex align-items-center"><div></div></div>
            @endforeach
        </div>
        <div class="products">
            @foreach($products as $product)
                <p>{{ $product->name }}</p>
            @endforeach
        </div>
    </div>
@endsection
