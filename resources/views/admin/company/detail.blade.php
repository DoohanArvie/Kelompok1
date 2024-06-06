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
                    <div class="row" style="display: flex; justify-content: space-between; ">
                        <div class="col-md-6 text-center" style="padding: 0 15px;">
                            <h5>Nama Company : </h5>
                            <h3>{{ $company->company }}</h3>
                        </div>
                        <div class="col-md-6  text-center">
                            <h5>Cover Perusahaan</h5>
                            <img class="w-25" style="border-radius: 50%;" src="{{ Storage::url($company->cover) }}"
                                alt="">
                        </div>
                        <div class="col-md-6  text-center">
                            <h5>About Company</h5>
                            <p>{{ $company->about }}</p>
                        </div>
                    </div>

                    <div class="row mt-5">

                        @forelse ($jobs as $job)
                            <div class="col-md-4 col-sm-12">
                                <a href="{{ route('dashboard.job.show', $job->id) }}">
                                    <div class="card bg-dark">
                                        <div class="card-content">
                                            <img style="height: 230px !important"
                                                class="card-img-top img-fluid object-fit-cover"
                                                src="{{ Storage::url($company->cover) }}" alt="Card image cap" />
                                            <div class="card-body">
                                                <h4 class="card-title">{{ $job->job }}</h4>

                                                <div class="job-tittle mb-3 ">

                                                    <ul class="d-flex justify-content-between list-unstyled">

                                                        <li> <i class="bi bi-bookmark-dash-fill"></i>
                                                            {{ $job->Category->name }}</li>
                                                        <li>
                                                            <i class="fas fa-map-marker-alt"></i> {{ $job->lokasi }}
                                                        </li>

                                                    </ul>
                                                </div>
                                                <a href="{{ route('dashboard.daftarpelamar') }}" class="btn btn-primary block btn-sm">Daftar
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
