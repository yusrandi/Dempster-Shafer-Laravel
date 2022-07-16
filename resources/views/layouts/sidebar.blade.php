<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" height="50px">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Child Care</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Tabel Master</span>
        </li>
        <li class="menu-item {{ request()->routeIs('penyakits.*') || request()->routeIs('gejalas.*')? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Penyakit</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('penyakits.*') ? 'active' : '' }}">
                    <a href="{{ route('penyakits.index') }}" class="menu-link">
                        <div data-i18n="Account">Data Penyakit</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('gejalas.*') ? 'active' : '' }}">
                    <a href="{{ route('gejalas.index') }}" class="menu-link">
                        <div data-i18n="Notifications">Data Evidence</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-item {{ request()->routeIs('rule.*') ? 'active' : '' }} ">
            <a href="{{ route('rule.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Rule</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('basisPengetahuans.*') ? 'active' : '' }}">
            <a href="{{ route('basisPengetahuans.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Basis Pengetahuan</div>
            </a>
        </li>

        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Tabel Diagnosa</span></li>
        <!-- Cards -->
        
       
        <li class="menu-item {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
            <a href="{{ route('laporan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Basic">Data Diagnosa</div>
            </a>
        </li>
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Tabel User</span></li>
        <!-- Cards -->
        
       
        <li class="menu-item {{ request()->routeIs('user.*') ? 'active' : '' }}">
            <a href="{{ route('user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Basic">Data User</div>
            </a>
        </li>

    </ul>
</aside>
<!-- / Menu -->
