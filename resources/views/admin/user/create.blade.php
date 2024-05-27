@extends('admin.layout.app')

@section('title', 'Category')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css    ') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endsection

@include('admin.components.sidebar')

@section('content')

    <div class="page-heading">
        <h3>Halaman User</h3>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create User</h4>
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
                    <form action="{{ route('dashboard.user.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" placeholder="Name" name="name" value="{{ old('name') }}" autofocus>
                            </div>
                            @error('name')
                                <div class="alert alert-danger ">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                            </div>

                            @error('email')
                                <div class="alert alert-danger ">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="no_hp">Phone</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                    id="no_hp" placeholder="Phone" name="no_hp" value="{{ old('no_hp') }}">
                            </div>
                            @error('no_hp')
                                <div class="alert alert-danger ">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address">{{ old('address') }}</textarea>
                            </div>
                            @error('address')
                                <div class="alert alert-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="tgl_lahir">Birthday</label>
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                        </div>
                        @error('tgl_lahir')
                            <div class="alert alert-danger ">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        @error('role')
                            <div class="alert alert-danger ">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror" id="gender"
                                name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        @error('gender')
                            <div class="alert alert-danger ">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" placeholder="password" name="password">
                        </div>
                        @error('password')
                            <div class="alert alert-danger ">{{ $message }}</div>
                        @enderror
                    </div>



                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Create</button>
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
@endsection
