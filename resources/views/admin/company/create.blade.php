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
            <h4 class="card-title">Create Company</h4>
        </div>



        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('dashboard.company.store') }}">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company" class="mb-2">Company</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="company"
                                placeholder="Company" name="company" value="{{ old('company') }}">
                        </div>
                        @error('company')
                            <div class="alert alert-danger ">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cover" class="mb-2">Cover</label>
                                <input type="file"
                                    class="form-control custom-file-input @error('cover') is-invalid @enderror"
                                    name="cover" id="cover" onchange="previewImg()">

                                <div class="mt-3">
                                    <img src="" class="img-preview img-thumbnail" alt="" width="250px"
                                        height="150px" hidden>
                                </div>
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

    <script>
        function previewImg() {

            const sampul = document.querySelector('#cover');
            const sampulLabel = document.querySelector('.custom-file-input');
            const imgPreview = document.querySelector('.img-preview');

            //tulisan label
            sampulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
                imgPreview.hidden = false
            }
        }
    </script>
@endsection
