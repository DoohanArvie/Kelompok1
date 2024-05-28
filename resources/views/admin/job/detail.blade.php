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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label class="fs-6 mb-2">Job</label>
                                    <div class="fs-5"> {{ $job->job }}</div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fs-6 mb-2">Category</label>
                                    <div class="fs-5"> {{ $job->category->name }}</div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fs-6 mb-2">Company</label>
                                    <div class="fs-5"> {{ $job->company->company }}</div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fs-6 mb-2">Requirement</label>
                                    <div class="fs-5"> {{ $job->requirement }}</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label class="fs-6 mb-2">Lokasi</label>
                                    <div class="fs-5"> {{ $job->lokasi }}</div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fs-6 mb-2">Job status</label>
                                    <div class="fs-5">
                                        @if($job->is_open == 1)
                                        Yes
                                        @else
                                        No
                                        @endif</div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fs-6 mb-2">Description</label>
                                    <div class="fs-5"> {{ $job->description }}</div>
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
