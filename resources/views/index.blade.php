@extends('layouts.master')

@section('title')
    Mission Day Zaporizhzhia Swag Shop
@endsection

@section('content')
    <div class="container">
        <div class="row header">
            <div class="col-md-2">
                <img src="/img/md-logo-hex.png" alt="Mission Day Zaporizhzhia" class="header__logo">
            </div>
            <div class="col-md-5">
                <h2>Mission Day Zaporizhzhia Swag Shop</h2>
            </div>
            <div class="col-md-4">
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
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item"><a href="#" class="nav-link">Одежда, нашивки</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Чашки, бокалы</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Сувениры, наклейки</a></li>
        </ul>
    </div>
@endsection
