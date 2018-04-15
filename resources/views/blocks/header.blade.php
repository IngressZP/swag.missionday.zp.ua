<header>
  <div class="container">
    <div class="row header">
      <a href="{{ route('index') }}">
        <img class="header__logo" src="/img/md-logo-hex.png" alt="Mission Day Zaporizhzhia">
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
          <a href="https://www.instagram.com/missiondayzp/" rel="noreferrer noopener" target="__blank"><i class="fab fa-instagram"></i></a>
          <a href="https://www.facebook.com/events/166075047320559/" rel="noreferrer noopener" target="__blank"><i class="fab fa-facebook-square"></i></a>
        </div>
        <div class="header-info__site-link">
          <a href="https://missionday.zp.ua" target="__blank">
            {{ trans('main.header.main-site') }}
          </a>
          <i class="fas fa-external-link-alt"></i>
        </div>
        <a href="/checkout" class="header-info__cart btn btn-primary">
          <i class="fas fa-shopping-cart"></i> {{ trans('main.cart.button') }}
          @if(Cart::count())
            <span class="badge badge-light ml-2">{{ Cart::count() }}</span>
          @endif
        </a>
      </div>
    </div>
  </div>
</header>