@extends('frontend.layouts.main')

@section('content')
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>About us</h2>
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
                                    [wilayah operasi, misalnya Indonesia/Asia Tenggara/global].
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
                            <span>Apply process</span>
                            <h2>How it works</h2>
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
                                <h5>1. Search a job</h5>
                                <p>
                                    Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod
                                    tempor incididunt ut laborea.
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
                                <h5>2. Apply for job</h5>
                                <p>
                                    Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod
                                    tempor incididunt ut laborea.
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
                                <h5>3. Get your job</h5>
                                <p>
                                    Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod
                                    tempor incididunt ut laborea.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- How  Apply Process End-->
        <!-- Testimonial Start -->
        <div class="testimonial-area testimonial-padding">
            <div class="container">
                <!-- Testimonial contents -->
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-10">
                        <div class="h1-testimonial-active dot-style">
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption">
                                    <!-- founder -->
                                    <div class="testimonial-founder">
                                        <div class="founder-img mb-30">
                                            <img src="assets/img/testmonial/testimonial-founder.png" alt="" />
                                            <span>Margaret Lawson</span>
                                            <p>Creative Director</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>
                                            “I am at an age where I just want to be fit and healthy
                                            our bodies are our responsibility! So start caring for
                                            your body and it will care for you. Eat clean it will
                                            care for you and workout hard.”
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption">
                                    <!-- founder -->
                                    <div class="testimonial-founder">
                                        <div class="founder-img mb-30">
                                            <img src="assets/img/testmonial/testimonial-founder.png" alt="" />
                                            <span>Margaret Lawson</span>
                                            <p>Creative Director</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>
                                            “I am at an age where I just want to be fit and healthy
                                            our bodies are our responsibility! So start caring for
                                            your body and it will care for you. Eat clean it will
                                            care for you and workout hard.”
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption">
                                    <!-- founder -->
                                    <div class="testimonial-founder">
                                        <div class="founder-img mb-30">
                                            <img src="assets/img/testmonial/testimonial-founder.png" alt="" />
                                            <span>Margaret Lawson</span>
                                            <p>Creative Director</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>
                                            “I am at an age where I just want to be fit and healthy
                                            our bodies are our responsibility! So start caring for
                                            your body and it will care for you. Eat clean it will
                                            care for you and workout hard.”
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
    </main>
@endsection
