@extends('frontend.layouts.main')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit User</h4>
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

    <form action="{{ route('dashboarduser.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row-md-6">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="foto">Foto Profile</label>
                        <div class="form-group">
                            <img class="border img-thumbnail m-2" src="{{ asset('storage') . "/" . $user->foto }}" style="background-color: #E9FBF3; border-radius: 10px; height: 150px" alt="">
                            <input type="file" name="foto" class="form-control py-1 @error('foto') is-invalid @enderror">
                            <p class="text-danger" style="font-size: 10px">Catatan: Hanya file gambar (JPG, JPEG, PNG) dengan ukuran maksimal 2MB yang diperbolehkan.</p>
                        </div>
                        @error('foto')
                        <div class="alert alert-danger ">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" name="name" value="{{ old('name', $user->name) }}" autofocus>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email', $user->email) }}" autofocus>
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address">{{ old('address', $user->address) }}</textarea>
                        </div>
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="no_hp">No Handphone</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" autofocus>
                        </div>
                        @error('no_hp')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn-primary btn-sm" style="width:125px; border-radius:8px">Save</button>
            </div>
        </div>
    </form>
</div>

@endsection
