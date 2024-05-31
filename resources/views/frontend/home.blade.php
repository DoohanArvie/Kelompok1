@extends('frontend.layouts.main')

@section('content')
    <main>
        <!-- slider Area Start-->
        <div class="slider-area">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center"
<<<<<<< HEAD
                    data-background="assets/img/hero/hero_1.jpg">
=======
                    data-background="{{ asset('assets/img/hero/h1_hero.jpg') }}">
>>>>>>> 4903f95d7744fe111dd946f60f538f8524e4e33f
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <h1>Wujudkan Mimpimu Disini</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Search Box -->
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- form -->
                                <form action="#" class="search-box">
                                    <div class="input-form">
                                        <input type="text" placeholder="Cari Pekerjaan impianmu" />
                                    </div>
                                    <div class="search-form">
                                        <button>Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Our Services Start -->
        <div class="our-services " style="margin-top: 100px">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <h2>Jelajahi Kategori Utama</h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-contnet-center">
                    @forelse ($categories as $category)
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span>
                                        <img width="50px" src="{{ Storage::url($category->cover) }}" alt="">
                                    </span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html"{{ $category->name }}</a></h5>
                                    <span>{{ $category->name }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h5>Catagory belum tersedia</h5>
                    @endforelse
                </div>
                <!-- More Btn -->
                <!-- Section Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-50">
                            <a href="job_listing.html" class="border-btn2">Browse All Sectors</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Services End -->

        <!-- Featured_job_start -->
        <section class="featured-job-area feature-padding">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>Pekerjaan Terbaru</span>
                            <h2>Pekerjaan Unggulan</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">

                    <!-- single-job-content -->
                    @forelse ($jobs as $job)
                        <div class="card job-card single-job-items mb-30 col-md-5 p-4">
                            <div class="job-items mb-3  ">
                                <div class="company-img mb-3">
                                    <a href="job_details.html"><img class="img-thumbnail"
                                            src="{{ Storage::url($job->company->cover) }}" alt="" /></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="job_details.html">
                                        <h4>{{ $job->job }}</h4>

                                    </a>
                                    <span>{{ $job->category->name }}</span>
                                    <ul>
                                        <li>
                                            <i class="fas fa-building"></i> {{ $job->company->company }}
                                        </li>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>{{ $job->lokasi }}
                                        </li>
                                        <li>
                                            <i class="fas fa-money-bill-alt"></i>
                                            $3500 - $4000
                                        </li>
                                        <li>
                                            Status Lowongan : {{ $job->is_open == 1 ? 'Tersedia' : 'Ditutup' }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="items-link f-right">
                                <a href="job_details.html">Apply</a>
                                <span>{{ $job->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                    @empty
                        <h4>Belum ada lowongan yang di post</h4>
                    @endforelse


                </div>
                <div class="text-center">
                    <a href="/job-listing" class="btn btn-primary">All Jobs &raquo;</a>
                </div>

            </div>
        </section>
        <!-- Featured_job_end -->
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
    </main>
@endsection
