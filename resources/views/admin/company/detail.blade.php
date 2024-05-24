@extends('admin.layout.app')

@section('title', 'DetailCompany')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css    ') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endsection

@include('admin.components.sidebar')

@section('content')

    <div class="page-heading">
        <h3>Halaman Company</h3>
    </div>

    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between ">
                        <h5>Detail Companies</h5>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-6">
                            <h1>Nama Company : {{ $company->company }}</h1>
                        </div>
                        <div class="col-md-6">
                            <img class="w-50" src="{{ Storage::url($company->cover) }}" alt="">
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-6">
                            <h5>Company tersebut belum post lowongan pekerjaan</h5>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

@section('after-script')
    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/static/js/pages/simple-datatables.js"></script>
@endsection
