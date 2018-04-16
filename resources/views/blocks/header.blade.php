<header>
  <div class="container">
    <div class="row header">
      <a href="{{ route('index') }}">
        <img class="header__logo" src="/img/md-logo.png" alt="Mission Day Zaporizhzhia">
      </a>
      <div class="header__title col-md-6">
        <p>MD</p> Zaporizhzhia Swag Shop
      </div>
      <div class="header-info">
        <div class="header-info-contacts">
          <a href="http://events.ingress.com/MissionDay/Zaporizhzhia" target="__blank" rel="noreferrer noopener">
            <img src="/img/ingress-logo.svg" alt="">
          </a>
          <a href="https://t.me/missiondayzpchat" rel="noreferrer noopener" target="__blank"><i class="fab fa-telegram"></i></a>
          <a href="mailto:info@missionday.zp.ua" rel="noreferrer noopener" target="__blank"><i class="fas fa-at"></i></a>
          {{--<a href="https://www.instagram.com/missiondayzp/" rel="noreferrer noopener" target="__blank"><i class="fab fa-instagram"></i></a>--}}
          <a href="https://www.facebook.com/events/166075047320559/" rel="noreferrer noopener" target="__blank"><i class="fab fa-facebook-square"></i></a>
        </div>

        <div class="header-info__site-link">
          <a href="https://missionday.zp.ua" target="__blank">
            {{ trans('main.header.main-site') }} <i class="fas fa-external-link-alt fa-xs"></i>
          </a>
        </div>

        <a href="/checkout" class="header-info__cart btn btn-primary btn-lg">
          {{--<i class="fas fa-shopping-cart"></i>--}}
          <img src="/img/cart.png" alt="" width="22" height="22">
          {{ trans('main.cart.button') }}
          @if(Cart::count())
            <span class="badge badge-light ml-2">{{ Cart::count() }}</span>
          @endif
        </a>
      </div>
    </div>

    <div class="dropdown header-language">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
        <img src="/img/flags/flag-{{ App::getLocale() }}.png" alt="" height="16"> {{ App::getLocale() }}
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="/lang/uk"><img src="/img/flags/flag-uk.png" alt="" height="16"> UK</a>
        <a class="dropdown-item" href="/lang/ru"><img src="/img/flags/flag-ru.png" alt="" height="16"> RU</a>
        <a class="dropdown-item" href="/lang/en"><img src="/img/flags/flag-en.png" alt="" height="16"> EN</a>
      </div>
    </div>
  </div>
</header>