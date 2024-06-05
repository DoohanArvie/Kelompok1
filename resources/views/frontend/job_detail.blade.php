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
                                <h2>{{ $job->job }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details mb-3">
                                    <a href="#"><img src="{{ Storage::url($job->Company->cover) }}"
                                            alt="" /></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4>{{ $job->job }}</h4>
                                    </a>
                                    <ul>
                                        <li>
                                            <i class="fas fa-building mr-2"></i>
                                            {{ $job->company->company }}
                                        </li>
                                        <li>
                                            <i class="fas fa-map-marker-alt mr-2"></i>{{ $job->lokasi }}
                                        </li>
                                        <li>
                                            <i class="fas fa-money-bill-alt"></i>Rp.
                                            {{ number_format((float) $job->salary, 2, '.', ',') }}
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- job single End -->

                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Deskripsi Pekerjaan</h4>
                                </div>
                                <p>
                                    {!! $job->description !!}
                                </p>
                            </div>
                            <div class="post-details2 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Ketentuan</h4>
                                </div>
                                <ul>

                                    <li>
                                        {!! $job->requirement !!}
                                    </li>

                                </ul>
                            </div>
                            <div class="post-details2 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Benefit</h4>
                                </div>
                                <ul>
                                    <li>{!! $job->benefit !!}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Ringkasan Pekerjaan</h4>
                            </div>
                            <ul>
                                <li>Perusahaan : <span>{{ $job->company->company }}</span></li>
                                <li>Diposting : <span>{{ $job->created_at->format('d-m-Y') }}</span></li>
                                <li>Lokasi : <span>{{ $job->lokasi }}</span></li>
                                <li>Gaji : <span>Rp. {{ number_format((float) $job->salary, 2, '.', ',') }}</span></li>
                                <li>Status Lowongan : <span>{{ $job->is_open == 1 ? 'Tersedia' : 'Ditutup' }}</span></li>
                            </ul>
                            <div class="apply-btn2">
                                <a href="#" class="btn">Lamar Sekarang</a>
                            </div>
                        </div>
                        <div class="post-details4 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Informasi Perusahaan</h4>
                            </div>
                            <span>{{ $job->company->company }}</span>
                            <p>
                                {{ $job->company->about }}
                            </p>
                            <ul>
                                <li>Web : <span> {{ $job->company->website }}</span></li>
                                <li>Email: <span>{{ $job->company->email }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- job post company End -->
    </main>
@endsection
