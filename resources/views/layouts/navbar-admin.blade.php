<nav class="navbar navbar-expand-xl bg-white custom-navbar-mobile">
    <div class="container-fluid container-navlink">
        <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" class="d-inline-block align-top navbar-logo" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/admin/dashboard') ? 'navActive' : '' }}"
                        href="{{ url('/admin/dashboard') }}">@lang('menuadmin.home')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/admin/attendances') ? 'navActive' : '' }}"
                        href="{{ url('/admin/attendances') }}">@lang('menuadmin.list')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/admin/qr') ? 'navActive' : '' }}"
                        href="{{ url('/admin/qr') }}">@lang('menuadmin.scan')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#logoutAdmin">@lang('menuadmin.logout')</a>
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
