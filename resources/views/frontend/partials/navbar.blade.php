<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="javascript:;"><img src="assets/img/logo/logo.png" alt="logo" width="100" height="90"/></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-10">
                        <div class="menu-wrapper" style="display: flex; justify-content: space-between; align-items: center;">
                            <!-- Main-menu -->
                            <div class="main-menu" style="flex-grow: 1;">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation" style="display: flex; justify-content: space-between; width: 100%;">
                                        <span style="display: flex; gap: 20px;">
                                            <li><a href="/">Beranda</a></li>
                                            <li><a href="/job-listing">Cari Pekerjaan</a></li>
                                            <li><a href="/about">Tentang</a></li>
                                            <li><a href="/contact">Kontak</a></li>
                                        </span>
                                        <span style="display: flex; gap: 10px;">
                                            @guest
                                                <li><a href="{{ route('login') }}" class="login-btn">Masuk</a></li>
                                                <li><a href="{{ route('register') }}" class="register-btn">Daftar</a></li>
                                            @endguest
                                            @auth
                                                <li><a href="{{ route('dashboarduser') }}" class="dashboard-btn">Dashboard</a></li>
                                                <li>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                    <a class="logout-btn" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        Keluar <i class="fas fa-sign-out-alt"></i>
                                                    </a>
                                                </li>
                                            @endauth
                                        </span>
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
