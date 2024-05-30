@extends('admin.layout.app')

@section('title', 'DetailJob')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css    ') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endsection

@include('admin.components.sidebar')

@section('content')

    <div class="page-heading">
        <h3>Halaman Job</h3>
    </div>

    <div class="page-content">
        <section class="section">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card border-1" style="border-radius: 10px">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <h5 class="fs-4 mb-2 ">Job <i class="fa-solid fa-laptop-file"></i></h5>
                                        <div class="fs-6"> {{ $job->job }}</div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <h5 class="fs-4 mb-2">Category <i class="fa-solid fa-layer-group"></i></h5>
                                        <div class="fs-6"> {{ $job->category->name }}</div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <h5 class="fs-4 mb-2">Company <i class="fa-solid fa-building"></i></h5>
                                        <div class="fs-6"> {{ $job->company->company }}</div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <h5 class="fs-4 mb-2">Lokasi <i class="fa-solid fa-location-dot"></i></h5>
                                        <div class="fs-6"> {{ $job->lokasi }}</div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <h5 class="fs-4 mb-2">Job status <i class="fa-solid fa-circle-check"></i></h5>
                                        <div class="fs-6">
                                            @if ($job->is_open == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <h5 class="fs-4 mb-2 ">Salary <i class="fa-solid fa-laptop-file"></i></h5>
                                        <div class="fs-6"> {{ $job->salary }}</div>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <h5 class="fs-4 mb-2">Description</h5>
                                        <div class="fs-5"> {!! $job->description !!}</div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <h5 class="fs-4 mb-2">Requirement</h5>
                                            <div class="fs-5"> {!! $job->requirement !!}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <h5 class="fs-4 mb-2">Benefit</h5>
                                        <div class="fs-5"> {!! $job->benefit !!}</div>
                                    </div>
                                </div>
                            </div>



                        </div>
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
