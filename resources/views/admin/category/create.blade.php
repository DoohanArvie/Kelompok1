@extends('admin.layout.app')

@section('title', 'Category')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css    ') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endsection

@include('admin.components.sidebar')

@section('content')

    <div class="page-heading">
        <h3>Halaman Category</h3>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Category</h4>
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
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('dashboard.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="mb-2">Category</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Category" name="nama" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="name" class="mb-2">Category</label>
                            <input type="file"
                                class="form-control custom-file-input @error('cover') is-invalid @enderror" id="cover"
                                placeholder="Cover" name="coverr" value="{{ old('cover') }}" onchange="previewImg()">
                            <div class="mt-3">
                                <img src="" class="img-preview img-thumbnail" alt="" width="250px"
                                    height="150px" hidden>
                            </div>
                        </div>
                        @error('cover')
                            <div class="alert
                                alert-danger ">{{ $message }}</div>
                        @enderror
                        <div>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </form>

                </div>

            </div>
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
