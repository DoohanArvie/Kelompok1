@extends('admin.layout.app')

@section('title', 'My Profile')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css    ') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
    <style>
        .gambar {
            width: 10rem !important;
            height: 10rem !important;
        }
    </style>
@endsection

@include('admin.components.sidebar')

@section('content')

    {{-- <div class="page-heading">
        <h3>Halaman Profile</h3>
    </div> --}}

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Account Profile</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <form action="{{ route('dashboard.profile.update', Auth::user()->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <div class="avatar avatar-xl">
                                        @if (Auth::user()->foto === null)
                                            <img class="gambar" src="{{ asset('assets/no-cover.jpg') }}" alt="Avatar">
                                        @else
                                            <img src="{{ Storage::url(Auth::user()->foto) }}" alt="Avatar">
                                        @endif
                                    </div>

                                    <h5 class="mt-3">{{ Auth::user()->name }}</h5>

                                    <input type="file"
                                        class="form-control custom-file-input @error('foto') is-invalid @enderror"
                                        name="foto" id="foto" onchange="previewImg()">

                                    <div class="mt-3">
                                        <img src="" class="img-preview img-thumbnail" alt="" width="250px"
                                            height="50px" hidden>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Your Name"
                                        value="{{ Auth::user()->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Your Email"
                                        value="{{ Auth::user()->email }}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="no_hp" id="phone"
                                        class="form-control @error('no_hp') is-invalid @enderror" placeholder="Your Phone"
                                        value="{{ Auth::user()->no_hp }}">
                                    @error('no_hp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="birthday" class="form-label">Birthday (yyyy-mm-dd)</label>
                                    <input type="text" name="tgl_lahir" id="birthday"
                                        class="form-control @error('tgl_lahir') is-invalid @enderror"
                                        placeholder="Your Birthday" value="{{ Auth::user()->tgl_lahir }}">
                                    @error('tgl_lahir')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" id="gender"
                                        class="form-control @error('gender') is-invalid @enderror">
                                        <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="male" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>
                                            Female
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="role" class="form-label">Role</label>
                                    <input type="text" name="role" id="role"
                                        class="form-control @error('role') is-invalid @enderror" placeholder="Role"
                                        value="{{ Auth::user()->role }}" readonly>
                                    @error('role')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="address"
                                        id="address">{{ Auth::user()->address }}</textarea>
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </section>
    </div>
@endsection

@section('after-script')
    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/static/js/pages/simple-datatables.js"></script>

    <script>
        function previewImg() {

            const sampul = document.querySelector('#foto');
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
