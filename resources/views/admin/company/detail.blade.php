@extends('admin.layout.app')

@section('title', 'DetailCompany')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">

    <style>
        .bg-grey {
            background-color: #231f20;
        }
    </style>
@endsection

@include('admin.components.sidebar')

@section('content')

    <div class="page-heading">
        <h3>Halaman Company</h3>
    </div>

    <div class="page-content ">
        <section class="section">
            <div class="card ">
                <div class="card-body">
                    <div class="row mb-5" style="display: flex; justify-content: space-between; ">
                        <div class="col-md-6 text-center" style="padding: 0 15px;">
                            <h5>Nama Company : </h5>
                            <h3 class="mb-3">{{ $company->company }}</h3>
                            <img class="w-25 img-thumbnail" style="border-radius: 50%;"
                                src="{{ Storage::url($company->cover) }}" alt="">
                            <div class="mt-5">
                                <p><i class="fas fa-external-link-alt me-2"></i>{{ $company->website }}</p>
                                <p><i class="fas fa-envelope me-2"></i>{{ $company->email }}</p>
                            </div>

                        </div>


                        <div class="col-md-6  text-center">

                            <div class="mt-3 text-center">
                                <h5>About Company</h5>
                                <p>{{ $company->about }}</p>
                            </div>
                        </div>

                    </div>

                    <div class="row mt-5 ">

                        @forelse ($jobs as $job)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <a href="{{ route('dashboard.job.show', $job->id) }}">
                                    <div class="card bg-dark shadow">
                                        <div class="card-content" style="height: 500px">
                                            <img style="height: 230px !important"
                                                class="card-img-top img-fluid object-fit-cover"
                                                src="{{ Storage::url($company->cover) }}" alt="Card image cap" />
                                            <div class="card-body">
                                                <h4 class="card-title">{{ $job->job }}</h4>

                                                <div class="job-tittle mb-3 ">

                                                    <ul class=" justify-content-between list-unstyled">

                                                        <li> <i class="bi bi-bookmark-dash-fill"></i>
                                                            {{ $job->Category->name }}</li>
                                                        <li>
                                                            <i class="fas fa-map-marker-alt"></i> {{ $job->lokasi }}
                                                        </li>

                                                    </ul>
                                                </div>
                                                <a href="{{ route('dashboard.daftarpelamar', $job->slug) }}"
                                                    class="btn btn-primary block btn-sm">Daftar
                                                    Pelamar</a>
                                                <p class="pt-3 mb-0">{{ $job->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        @empty
                            <h3>Tidak ada Lowongan</h3>
                        @endforelse


                    </div>
                </div>

        </section>
    </div>
@endsection

@section('after-script')
    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/static/js/pages/simple-datatables.js"></script>
@endsection
