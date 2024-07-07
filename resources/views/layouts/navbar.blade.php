<nav class="navbar navbar-expand-xl bg-white custom-navbar">
    <div class="container-fluid container-navlink">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" class="d-inline-block align-top navbar-logo" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('home') ? 'navActive' : '' }}"
                        href="/home">@lang('menu.home')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? 'navActive' : '' }}"
                        href="{{ route('about') }}">@lang('menu.about')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('rundown') ? 'navActive' : '' }}"
                        href="{{ route('rundown') }}">@lang('menu.schedule')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('login') ? 'navActive' : '' }}"
                        href="{{ route('login') }}">@lang('menu.login')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('register') ? 'navActive' : '' }}"
                        href="{{ route('register') }}">@lang('menu.register')</a>
                </li>
                <li class="nav-item ms-3">
                    <div class="languageToggle">
                        <a href="{{ url('/change-locale/id') }}"
                            class="btn languageButton {{ config('app.locale') === 'id' ? 'languageActive' : '' }}"
                            name="language" value="ID">ID</a>
                        <a href="{{ url('/change-locale/en') }}"
                            class="btn languageButton {{ config('app.locale') === 'en' ? 'languageActive' : '' }}"
                            name="language" value="EN">EN</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
