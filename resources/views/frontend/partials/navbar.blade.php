<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="javascript:;"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper" style="justify-content: flex-end">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        @guest
                                            <span style="margin-right: 200px">
                                                <li><a href="/">Home</a></li>
                                                <li><a href="/job-listing">Find a Jobs </a></li>
                                                <li><a href="{{ route('about') }}">About</a></li>
                                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                            </span>
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                        @endguest
                                        @auth
                                            <span style="margin-right: 200px">
                                                <li><a href="/">Home</a></li>
                                                <li><a href="/job-listing">Find a Jobs </a></li>
                                                <li><a href="{{ route('about') }}">About</a></li>
                                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                            </span>
                                            <li><a href="{{ route('dashboarduser') }}" class="">Dashboard</a>
                                            </li>
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
