@extends('admin.layout.app')

@section('title', 'Job')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">

    {{-- summernote --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/summernote/summernote-lite.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('assets/compiled/css/form-editor-summernote.css') }}">
@endsection

@include('admin.components.sidebar')

@section('content')

    <div class="page-heading">
        <h3>Halaman Job</h3>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Job</h4>
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
        <form action="{{ route('dashboard.job.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="job">Job</label>
                                <input type="text" class="form-control @error('job') is-invalid @enderror" id="job"
                                    placeholder="Job" name="job" value="{{ old('job') }}" autofocus>
                            </div>
                            @error('job')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="tbl_category_id">Category</label>
                                <select name="tbl_category_id" class="form-control" id="tbl_category_id" required>
                                    <option>Pilih Category Job</option>
                                    @foreach (App\Models\tblCategory::all() as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="tbl_company_id">Company</label>
                                <select name="tbl_company_id" class="form-control" id="tbl_company_id" required>
                                    <option selected hidden>Pilih Company </option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->company }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="tbl_company_id">Open Job</label>
                                <select name="is_open" class="form-control" id="is_open" required>
                                    <option selected disabled>Pilih</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <textarea class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi">{{ old('lokasi') }}</textarea>
                            </div>

                            @error('lokasi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <input type="text" class="form-control @error('salary') is-invalid @enderror"
                                    id="job" placeholder="Salary" name="salary" value="{{ old('salary') }}"
                                    autofocus>
                            </div>
                            @error('salary')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea style="height: 150px;" class="form-control @error('description') is-invalid @enderror" id="description"
                                    name="description">{{ old('description') }}</textarea>
                            </div>

                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="requirement">Requirement</label>
                                <textarea style="height: 180px;" class="form-control @error('requirement') is-invalid @enderror" id="requirement"
                                    name="requirement">{{ old('requirement') }}</textarea>
                            </div>

                            @error('requirement')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="benefit">Benefit</label>
                            <textarea style="height: 150px;" class="form-control @error('benefit') is-invalid @enderror" id="benefit"
                                name="benefit">{{ old('benefit') }}</textarea>
                        </div>

                        @error('benefit')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary btn-sm">Create</button>
                </div>

            </div>
        </form>
    </div>



@endsection

@section('after-script')
    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/static/js/pages/simple-datatables.js"></script>

    {{-- summernote --}}
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/summernote.js') }} "></script>

    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 200, // Atur tinggi editor
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            $('#requirement').summernote({
                height: 200, // Atur tinggi editor
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            $('#benefit').summernote({
                height: 200, // Atur tinggi editor
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection
