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
    <div class="container content">
      <div class="row">
        <a href="/category/clothes"class="col-lg d-flex align-items-center justify-content-center category">
            <span>Одежда</span>
        </a>
        <div class="category_separator d-flex align-items-center"><div></div></div>
        <div class="col-lg d-flex align-items-center justify-content-center category">
            <span>Наклейки</span>
        </div>
        <div class="category_separator d-flex align-items-center"><div></div></div>
        <div class="col-lg d-flex align-items-center justify-content-center category">
            <span>Аксессуары</span>
        </div>
        <div class="category_separator d-flex align-items-center"><div></div></div>
        <div class="col-lg d-flex align-items-center justify-content-center category">
            <span>Хрупкое</span>
        </div>
        <div class="category_separator d-flex align-items-center"><div></div></div>
        <div class="col-lg d-flex align-items-center justify-content-center category">
            <span>Биокарты</span>
        </div>
      </div>
    </div>
@endsection
