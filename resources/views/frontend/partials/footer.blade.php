<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-bg footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between text-md-left text-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mr-md-30 mr-0">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <div class="footer-tittle">
                                <h4>Tentang Kami</h4>

                                <p>
                                    Temukan peluang karir terbaik bersama kami, karir impian menanti Anda.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Info Kontak</h4>
                            <ul>
                                <li>
                                    <p>Alamat : Jalan Sisingamangaraja No. 73, Kebayoran Baru, Jakarta Selatan Jakarta
                                        12120.</p>
                                </li>
                                <li><a href="tel:+628123456789">Phone : +62 812 3456 789</a></li>
                                <li><a href="mailto:singatidur@gmail.com">Email : singatidur@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Link Cepat</h4>
                            <ul>
                                <li><a href="/">Beranda</a></li>
                                <li><a href="{{ route('job-listing') }}">Cari Pekerjaan</a></li>
                                <li><a href="{{ route('about') }}">Tentang</a></li>
                                <li><a href="{{ route('contact') }}">Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Sosial Media</h4>
                            <div class="footer-pera footer-pera2">

                                <ul>
                                    <li><a href="https://facebook.com" target="_blank"><i
                                                class="fab fa-facebook-f mr-3"></i>Facebook</a></li>
                                    <li><a href="https://instagram.com " target="_blank"><i
                                                class="fab fa-instagram mr-3"></i>Instagram</a></li>
                                    <li><a href="https://linkedin.com mr-3" target="_blank"><i
                                                class="fab fa-linkedin-in mr-3"></i>Linkedin</a></li>
                                    <li><a href="https://x.com" target="_blank"><i class="fab fa-x-twitter mr-3"></i>X
                                            Twitter</a>
                                    </li>
                                </ul>


                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="row footer-wejed justify-content-between align-item-center align-items-center text-center">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                    <!-- logo -->
                    <div class="footer-logo mb-20">
                        <a href="#"><img src="{{ asset('assets/img/logo/logo.png') }}" alt=""
                                width="200" /></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                    <div class="footer-tittle-bottom">
                        <span>{{ $total_jobs }}</span>
                        <p>Lowongan Tersedia</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                    <div class="footer-tittle-bottom">
                        <span>{{ $total_companies }}</span>
                        <p>Perusahaan Terdaftar</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                    <!-- Footer Bottom Tittle -->
                    <div class="footer-tittle-bottom">
                        <span>{{ $total_users }}</span>
                        <p>Pengguna Terdaftar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom area -->
    <div class="footer-bottom-area footer-bg">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-10 col-lg-10">
                        <div class="footer-copy-right">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                All rights reserved | Kelompok 1
                                <i class="fas fa-briefcase mx-2" aria-hidden="true"></i> Gamelab Fullstack
                                Developer #4

                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <div class="footer-social f-right mr-3">
                            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://x.com" target="_blank"><i class="fab fa-x-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
