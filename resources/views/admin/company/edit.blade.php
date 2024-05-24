@extends('admin.layout.app')

@section('title', 'Create Company')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endsection

@include('admin.components.sidebar')

@section('content')

    <div class="page-heading">
        <h3>Halaman Company</h3>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Company</h4>
        </div>



        <div class="card-body">
            <form method="POST" enctype="multipart/form-data"
                action="{{ route('dashboard.company.update', $company->id) }}">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company" class="mb-2">Company</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="company"
                                placeholder="Company" name="company" value="{{ old('company', $company->company) }}">
                        </div>
                        @error('company')
                            <div class="alert alert-danger ">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cover" class="mb-2">Cover</label>
                                <img width="200px" class="d-block mb-4" src="{{ Storage::url($company->cover) }}"
                                    alt="">
                                <input type="file"
                                    class="form-control custom-file-input @error('cover') is-invalid @enderror"
                                    name="cover" id="cover">
                            </div>
                            @error('cover')
                                <div class="alert alert-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div>
                        <button type="submit" class="btn btn-primary btn-sm mt-5">Save</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    </div>



@endsection

@section('after-script')
    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/static/js/pages/simple-datatables.js"></script>

    <script></script>
@endsection
