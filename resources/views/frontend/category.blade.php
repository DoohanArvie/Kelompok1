@extends('frontend.layouts.main')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/search.css') }}">
    <div class="d-flex justify-content-center flex-column align-items-center  py-5">
        <h1 class="fw-bolder">Search : <b>"{{ $category->name }}"</b> </h1>

        <div class="mt-3">
            <form action="{{ route('search') }}" method="GET">
                <div class="search_wrap search_wrap_6">
                    <div class="search_box">
                        <input type="text" name="keyword" class="input" placeholder="search...">
                        <button class="btn-search" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row ">
            @forelse ($job_categories as $job)
                <div class="col-lg-3 col-md-6 p-2 d-flex justify-content-center">
                    <div class="card job-card p-lg-4 p-md-3 p-sm-4 single-job-items mb-20 col-sm-12 mx-auto">
                        <div class="job-items mb-3">
                            <div class="company-img mb-3">
                                <a href="{{ route('job-detail', $job->slug) }}"><img class="img-thumbnail"
                                        src="{{ Storage::url($job->Company->cover) }}" alt="" /></a>
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
                                        <i class="fas fa-map-marker-alt mr-2"></i>{{ $job->lokasi }}
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
                <h5>Pekerjaan "<b>{{ $keyword }}</b>" tidak ditemukan.</h5>
            @endforelse
        </div>

        <!--Pagination Start  -->
        <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            {{ $job_categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pagination End  -->
    </div>
@endsection
