<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
<<<<<<< HEAD
                            <a href="javascript:;"><img src="assets/img/logo/logo.png" alt="logo" width="100" height="90"/></a>
=======
                            <a href="javascript:;"><img src="assets/img/logo/logo.png" alt="logo" width="100"
                                    height="90" /></a>
>>>>>>> 4903f95d7744fe111dd946f60f538f8524e4e33f
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-10">
                        <div class="menu-wrapper" style="">
                            <!-- Main-menu -->
                            <div class="main-menu" style="flex-grow: 1;">
                                <nav class="d-none d-lg-block">
<<<<<<< HEAD
                                    <ul id="navigation">
                                        @guest
                                            <li><a href="/">Beranda</a></li>
                                            <li><a href="/job-listing">Cari Lowongan Kerja</a></li>
                                            <li><a href="/about">Tentang</a></li>
                                            <li><a href="/contact">Kontak</a></li>
                                            <li><a href="/login">Login</a></li>
                                        @endguest
                                        @auth
                                            <li><a href="/">Beranda</a></li>
                                            <li><a href="/job-listing">Cari Lowongan Kerja</a></li>
                                            <li><a href="/about">Tentang</a></li>
                                            <li><a href="/contact">Kontak</a></li>
                                            <li><a href="{{ route('dashboarduser') }}">Dashboard</a></li>
                                            <li><a href="{{ route('coba2') }}">Coba2</a></li>
                                            <li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                                <a class="sidebar-link" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="fa-solid fa-right-from-bracket"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        @endauth
=======
                                    <ul id="navigation" style="">
                                        <span style="">
                                            <li><a class="{{ Route::currentRouteName() === 'home' ? 'text-danger' : '' }}"
                                                    href="/">Beranda</a></li>
                                            <li><a class="{{ Route::currentRouteName() === 'job-listing' ? 'text-danger' : '' }}"
                                                    href="/job-listing">Cari Pekerjaan</a></li>
                                            <li><a class="{{ Route::currentRouteName() === 'about' ? 'text-danger' : '' }}"
                                                    href="{{ route('about') }}">Tentang</a></li>
                                            <li><a class="{{ Route::currentRouteName() === 'contact' ? 'text-danger' : '' }}"
                                                    href="{{ route('contact') }}">Kontak</a></li>
                                        </span>
                                        <span>
                                            @guest
                                                <li><a href="{{ route('login') }}" class="login-btn mb-3 mb-lg-0">Masuk</a>
                                                </li>
                                                <li><a href="{{ route('register') }}" class="register-btn">Daftar</a></li>
                                            @endguest
                                            @auth
                                                <li><a href="{{ route('dashboarduser') }}"
                                                        class="dashboard-btn mt-lg-2 mb-2">Dashboard <i
                                                            class="fa-solid fa-address-book"></i></a>
                                                </li>
                                                <li>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                    <a class="logout-btn" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        Keluar <i class="fas fa-sign-out-alt"></i>
                                                    </a>
                                                </li>
                                            @endauth
                                        </span>
>>>>>>> 4903f95d7744fe111dd946f60f538f8524e4e33f
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
