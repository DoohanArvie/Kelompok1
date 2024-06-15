@extends('frontend.layouts.main')

@section('content')
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                data-background="{{ asset('assets/img/hero/about.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Tentang Kami</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- Support Company Start-->
        <div class="support-company-area fix section-padding2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="right-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2">
                                <span>What we are doing</span>
                                <h2>Membuka Pintu Kesempatan Karir</h2>
                            </div>
                            <div class="support-caption">
                                <p class="pera-top">
                                    Kami adalah perusahaan penyedia layanan job portal terkemuka
                                    yang berkomitmen untuk menjadi jembatan penghubung antara
                                    pencari kerja dan perusahaan-perusahaan terbaik di seluruh
                                    wilayah operasi, Indonesia/Asia Tenggara/global.
                                </p>
                                <p>
                                    Dengan tim profesional yang berdedikasi dan berpengalaman,
                                    kami berkomitmen untuk memberikan layanan terbaik dan
                                    memastikan bahwa setiap klien kami mendapatkan hasil yang
                                    memuaskan. Bergabunglah dengan ribuan perusahaan dan pencari
                                    kerja lainnya yang telah merasakan manfaat dari layanan
                                    kami.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="support-location-img">
                            <img height="700px" class="rounded" src="{{ asset('assets/about-us.jpg') }}" alt="" />
                            {{-- <div class="support-img-cap text-center">
                                <p>Since</p>
                                <span>1994</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Support Company End-->
        <!-- How  Apply Process Start-->
        <div class="apply-process-area apply-bg pt-150 pb-150" data-background="assets/img/gallery/how-applybg.png">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle white-text text-center">
                            <span>Proses Pendaftaran</span>
                            <h2>Bagimana cara kerjanya</h2>
                        </div>
                    </div>
                </div>
                <!-- Apply Process Caption -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-search"></span>
                            </div>
                            <div class="process-cap">
                                <h5>1. Mencari Pekerjaan</h5>
                                <p>
                                    Website kami adalah gerbang menuju karir yang Anda impikan. Jelajahi ribuan lowongan
                                    terbaru dari berbagai perusahaan ternama di berbagai industri.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-curriculum-vitae"></span>
                            </div>
                            <div class="process-cap">
                                <h5>2. Melamar Pekerjaan</h5>
                                <p>
                                    Setelah menemukan lowongan impian, lamarlah dengan mudah melalui website kami. Ikuti
                                    panduan langkah demi langkah untuk membuat lamaran yang menarik.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-tour"></span>
                            </div>
                            <div class="process-cap">
                                <h5>3. Dapatkan Pekerjaan</h5>
                                <p>
                                    Mencari pekerjaan baru bisa menjadi proses yang menantang, tapi dengan persiapan dan
                                    strategi yang tepat, Anda dapat membuka pintu menuju karir Anda.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- How  Apply Process End-->
    </main>
@endsection
