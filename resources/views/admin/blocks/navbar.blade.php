    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="/android-icon-192x192.png" class="mr-2" alt="" width="40" height="40">
    <a href="#" class="navbar-brand">
        MD ZP Shop
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.orders.index') }}">
                    Заказы
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    Категории
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.products.index') }}">
                    Товары
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.settings') }}">
                    Настройки
                </a>
            </li>
        </ul>

        <span class="navbar-text mr-3">
            <i class="fas fa-user"></i> {{ Auth::user()->name }}
        </span>
        <ul class="navbar-nav mr-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="/img/flags/flag-{{ App::getLocale() }}.png" alt="" height="16"> {{ App::getLocale() }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><img src="/img/flags/flag-uk.png" alt="" height="16"> UK</a>
                    <a class="dropdown-item" href="#"><img src="/img/flags/flag-ru.png" alt="" height="16"> RU</a>
                    <a class="dropdown-item" href="#"><img src="/img/flags/flag-en.png" alt="" height="16"> EN</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="/logout" method="post">
            {!! csrf_field() !!}
            <button class="btn btn-warning my-2 my-sm-0" type="submit">
                Выйти <i class="fas fa-sign-out-alt"></i>
            </button>
        </form>
    </div>
</nav>