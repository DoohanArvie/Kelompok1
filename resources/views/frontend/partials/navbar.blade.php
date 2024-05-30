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
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper" style="justify-content: flex-end">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
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
