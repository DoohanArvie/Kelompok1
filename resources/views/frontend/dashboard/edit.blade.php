@extends('frontend.layouts.main')

@section('content')

<div class="card pb-3">
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
            <div class="row m-5">
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <div class="avatar avatar-xl">
                                    @if (Auth::user()->foto === null)
                                    <img class="gambar" src="{{ asset('assets/no-cover.jpg') }}" alt="Avatar">
                                    @else
                                    <img src="{{ Storage::url($user->foto) }}" alt="Avatar" style="width: 10rem; height: 10rem">
                                    @endif
                                </div>
                                <div class="mt-3">
                                    <input type="file" class="form-control py-1 @error('foto') is-invalid @enderror" name="foto" id="foto" onchange="previewImg()">
                                    @error('foto')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="mt-3">
                                        <img src="" class="img-preview img-thumbnail" alt="" width="250px" height="50px" hidden>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" name="name" value="{{ old('name', $user->name) }}" autofocus>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email', $user->email) }}" autofocus>

                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address">{{ old('address', $user->address) }}</textarea>

                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="no_hp">No Handphone</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" autofocus>

                                @error('no_hp')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tgl_lahir">Birthday (YYYY-MM-DD)</label>
                                <input type="text" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" placeholder="tanggal lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $user->tgl_lahir) }}" autofocus>

                                @error('tgl_lahir')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label d-block" for="no_hp">Gender</label>
                                <select name="gender" id="gender" class="form-control form-select @error('gender') is-invalid @enderror">
                                    <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group m-2">
                            <button type="submit" class="btn-primary" style="width:125px; border-radius:8px; height: 38px">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function previewImg() {
        const sampul = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(sampul.files[0]);

        fileSampul.onload = function(e) {
            imgPreview.src = e.target.result;
            imgPreview.hidden = false;
        }
    }

</script>

@endsection
