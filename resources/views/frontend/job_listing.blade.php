@extends('frontend.layouts.main')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/search.css') }}">

    <main>
        <!-- Hero Area Start-->
        <div class="slider-area">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Temukan Pekerjaanmu</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- Job List Area Start -->
        <div class="job-listing-area pt-120 pb-120">
            <div class="container-fluid">
                <div class="row">
                    <!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="small-section-tittle2 mb-45">
                                    <div class="ion">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="20px" height="12px">
                                            <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                                d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z" />
                                        </svg>
                                    </div>
                                    <h4>Filter Pekerjaan</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                                <div class="small-section-tittle2">
                                    <h4>Kategori Pekerjaan</h4>
                                </div>
                                <!-- Select job items start -->
                                {{-- <div class="select-job-items2 mb-5">
                                    <select name="select">
                                        <option value="">Semua Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div> --}}
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-expanded="false">
                                        Lihat Kategori
                                    </button>
                                    <div class="dropdown-menu">

                                        <li><a class="dropdown-item" href="{{ route('job-listing') }}">Semua Kategori</a>
                                        </li>
                                        @foreach ($categories as $category)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('job-category', $category->slug) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach

                                    </div>
                                </div>
                                <!--  Select job items End-->
                            </div>
                            <!-- single two -->
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    <div class="col-xl-9 col-lg-10 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                <div class="row justify-content-between ">
                                    <div class="count-job mb-35 text-center text-lg-start">
                                        <span>{{ $total_jobs }} Pekerjaan ditemukan</span>
                                    </div>

                                    <form action="{{ route('search') }}" method="GET" class="input-container">
                                        <input type="text" name="keyword" placeholder="Search Jobs..."
                                            class="form-control">
                                        <button type="submit" class="invite-btn ml-2">Search</button>
                                    </form>
                                </div>
                                <!-- Count of Job list End -->

                                <!-- single-job-content -->
                                <div class="row">
                                    @forelse ($jobs as $job)
                                        <div class="col-sm-6 col-lg-4 col-md-6 p-2 d-flex justify-content-center">
                                            <div
                                                class="card job-card p-lg-4 p-md-3 p-sm-4 single-job-items mb-20 col-sm-12 mx-auto">
                                                <div class="job-items mb-3">
                                                    <div class="company-img mb-3">
                                                        <a href="{{ route('job-detail', $job->slug) }}"><img
                                                                class="img-thumbnail"
                                                                src="{{ Storage::url($job->Company->cover) }}"
                                                                alt="" /></a>
                                                    </div>
                                                    <div class="job-tittle job-tittle2">
                                                        <a href="{{ route('job-detail', $job->slug) }}">
                                                            <h4>{{ $job->job }}</h4>
                                                        </a>
                                                        <ul class="text-secondary">
                                                            <li class="mb-2">
                                                                <i class="fas fa-building mr-2"></i>
                                                                {{ $job->company->company }}
                                                            </li>
                                                            <li class="mb-2">
                                                                <i
                                                                    class="fas fa-map-marker-alt mr-2"></i>{{ $job->lokasi }}
                                                            </li>
                                                            <li class="mb-2">
                                                                <i class="fas fa-money-bill-alt"></i>Rp.
                                                                {{ number_format((float) $job->salary, 2, '.', ',') }}
                                                            </li>
                                                            <li class="mb-2">
                                                                Status Lowongan:
                                                                {{ $job->is_open == 1 ? 'Tersedia' : 'Ditutup' }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="items-link items-link2 f-right">
                                                    <a href="{{ route('job-detail', $job->slug) }}">Lamar</a>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>Pekerjaan Tidak Tersedia.</p>
                                    @endforelse
                                </div>

                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Job List Area End -->
        <!--Pagination Start  -->
        <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            {{ $jobs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pagination End  -->
    </main>
@endsection
