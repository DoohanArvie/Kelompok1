@extends('admin.layout.app')

@section('title', 'Job')

@section('after-style')
<link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endsection

@include('admin.components.sidebar')

@section('content')

<div class="page-heading">
    <h3>Halaman Job</h3>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Job</h4>
    </div>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('dashboard.job.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="job">Job</label>
                            <input type="text" class="form-control @error('job') is-invalid @enderror" id="job" placeholder="Job" name="job" value="{{ old('job', $job->job) }}" autofocus>
                        </div>
                        @error('job')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="tbl_category_id">Category</label>
                            <select name="tbl_category_id" class="form-control" id="tbl_category_id" required>
                                <option>Pilih Category Job</option>
                                @foreach(App\Models\tblCategory::all() as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $job->tbl_category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="tbl_company_id">Company</label>
                            <select name="tbl_company_id" class="form-control" id="tbl_company_id" required>
                                <option>Pilih Company Job</option>
                                @foreach(App\Models\tblCompany::all() as $company)
                                <option value="{{ $company->id }}" {{ $company->id == $job->tbl_company_id ? 'selected' : '' }}>{{ $company->company }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <textarea class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi">{{ old('lokasi', $job->lokasi) }}</textarea>
                        </div>

                        @error('lokasi')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
                <div class="col-md-6">

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="tbl_company_id">Open Job</label>
                            <select name="is_open" class="form-control" id="is_open" required>
                                <option>Pilih</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $job->description) }}</textarea>
                        </div>

                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="requirement">Requirement</label>
                            <textarea class="form-control @error('requirement') is-invalid @enderror" id="requirement" name="requirement">{{ old('requirement', $job->requirement) }}</textarea>
                        </div>

                        @error('requirement')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>



@endsection

@section('after-script')
<script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/static/js/pages/simple-datatables.js"></script>
@endsection
