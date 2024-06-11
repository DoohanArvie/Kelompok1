@extends('frontend.layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-between p-3">
            <div class="col-lg-7 col-md-12 col-sm-12 mb-3">
                <div class="card-body bg-dark mb-3" style="border-radius: 12px;">
                    <div class="p-0">
                        <h3 class="fw-bold text-white text-center">User Details</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-between">
                                <div>
                                    @if (Auth::user()->foto === null)
                                        <img class="border bg-white mb-3" src="{{ asset('assets/no-cover.jpg') }}"
                                            alt="Avatar" style="border-radius: 10px; height: 50px; width:50px">
                                    @else
                                        <img class="border bg-white mb-3" src="{{ asset('storage') . '/' . $user->foto }}"
                                            style="border-radius: 10px; height: 50px; width:50px" alt="Avatar">
                                    @endif
                                </div>
                                <div class="py-2">
                                    <a href="{{ route('dashboarduser.edit', $user->id) }}"><i class="ti-settings"
                                            style="color:white; font-size: 20px"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="row mb-2">
                                <label class="col-4 fw-bold text-muted">Nama</label>
                                <div class="col-8">
                                    <span class="fw-bold fs-6 text-white-50">: {{ $user->name }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row mb-2">
                                <label class="col-4 fw-bold text-muted">Email</label>
                                <div class="col-8">
                                    <span class="fw-bold fs-6 text-white-50">: {{ $user->email }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row mb-2">
                                <label class="col-4 fw-bold text-muted">Gender</label>
                                <div class="col-8">
                                    <span class="fw-bold fs-6 text-white-50">: {{ $user->gender }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="row mb-2">
                                <label class="col-4 fw-bold text-muted">Handphone</label>
                                <div class="col-8">
                                    <span class="fw-bold fs-6 text-white-50">: {{ $user->no_hp }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="row mb-2">
                                <label class="col-4 fw-bold  text-muted">Birthday</label>
                                <div class="col-8">
                                    <span class="fw-bold fs-6 text-white-50">: {{ $user->tgl_lahir }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="row mb-2">
                                <label class="col-4 fw-bold text-muted">Role</label>
                                <div class="col-8">
                                    <span class="fw-bold fs-6 text-white-50">: {{ $user->role }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 ml-3">
                            <div class="row mb-2">
                                <label class=" fw-bold text-muted">Alamat</label>
                                <div class="col-10">
                                    <span class="fw-bold fs-6 text-white-50">: {{ $user->address }}</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            @if ($cv)
                <div class="col-lg-5">
                    <div class="card-body bg-primary" style="border-radius: 12px;">
                        <h4 class="text-4xl text-center text-white">Lihat CV</h4>
                        <div class="d-flex justify-content-between">
                            <span class="align-items-end py-2 text-white">Lihat CV kamu disini</span>
                            <button class="btn-sm bg-danger shadow-xl"
                                style="width: 125px; border-style: none; border-radius: 8px; height: 44px;" type="button"
                                data-toggle="modal" data-target="#lihatCv">Lihat CV</button>
                        </div>
                    </div>
                </div>

                {{-- modal update --}}
                <div class="modal fade" id="lihatCv" tabindex="-1" aria-labelledby="lihatCvLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered justify-content-center align-items-center"
                        style="max-width: 800px;">
                        <div class="modal-content" style="border-radius: 12px;">
                            <form action="{{ route('dashboarduser.updateCv', $cv->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="lihatCvLabel">Update CV dan Dokumen Pendukung
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                        style="border-style: none"><i class="ti-close" style="font-size: 20px"></i></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="cv" class="form-label">CV</label>
                                        <iframe src="{{ asset('storage') . '/' . $cv->cv }}" width="100%"
                                            height="300px"></iframe>
                                        <input class="form-control p-1 @error('cv') is-invalid @enderror" type="file"
                                            id="cv" name="cv">
                                        <p class="text-danger" style="font-size: 10px">Catatan: Hanya file (doc, docx,
                                            pdf)
                                            dengan
                                            ukuran maksimal 2MB yang diperbolehkan.</p>
                                        @error('cv')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="document" class="form-label">Dokumen Pendukung</label>
                                        <iframe src="{{ asset('storage') . '/' . $cv->document }}" width="100%"
                                            height="300px"></iframe>
                                        <input class="form-control p-1 @error('document') is-invalid @enderror"
                                            type="file" id="document" name="document">
                                        <p class="text-danger" style="font-size: 10px">Catatan: Hanya file (doc, docx,
                                            pdf) dengan
                                            ukuran maksimal 2MB yang diperbolehkan.</p>
                                        @error('document')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center align-items-center">
                                    <button type="button" class="btn-secondary" data-dismiss="modal"
                                        style="border-radius: 8px; width:125px">Close</button>
                                    <button type="submit" class="btn-primary"
                                        style="border-radius: 8px; width:125px">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-5">
                    <div class="card-body bg-primary" style="border-radius: 12px;">
                        <h4 class="text-4xl text-center text-white">Upload CV</h4>
                        <div class="d-flex justify-content-between">
                            <span class="align-items-end py-2 text-white">Upload CV kamu disini</span>
                            <button class="btn-sm bg-danger shadow-xl"
                                style="width: 125px; border-style: none; border-radius: 8px; height: 44px;" type="button"
                                data-toggle="modal" data-target="#uploadCv">Upload CV</button>
                        </div>
                    </div>
                </div>
            @endif
        </div>



        {{-- Upload Cv Modal --}}
        <div class="modal fade" id="uploadCv" tabindex="-1" aria-labelledby="uploadCvLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 12px">
                    <form action="{{ route('dashboarduser.uploadcv') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="uploadCvLabel">Upload CV dan Dokumen Penting</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                style="border-style: none"><i class="ti-close" style="font-size: 20px"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="cv" class="form-label">CV</label>
                                <input class="form-control p-1 @error('cv') is-invalid @enderror" type="file"
                                    id="cv" name="cv">
                                <p class="text-danger" style="font-size: 10px">Catatan: Hanya file (doc, docx, pdf) dengan
                                    ukuran maksimal 2MB yang diperbolehkan.</p>
                                @error('cv')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="document" class="form-label">Dokumen Penting</label>
                                <input class="form-control p-1 @error('document') is-invalid @enderror" type="file"
                                    id="document" name="document">
                                <p class="text-danger" style="font-size: 10px">Catatan: Hanya file (doc, docx, pdf) dengan
                                    ukuran maksimal 2MB yang diperbolehkan.</p>
                                @error('document')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center align-items-center">
                            <button type="button" class="btn-secondary" data-dismiss="modal"
                                style="border-radius: 8px; width:125px">Close</button>
                            <button type="submit" class="btn-primary"
                                style="border-radius: 8px; width:125px">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

    <section class="my_jobs mt-5">
        <div class="container">
            <h2 class="fw-bold mb-4">Daftar Perusahaan Yang di Lamar</h2>
            <div class="row">
                @forelse ($my_jobs as $job)
                    <div class="col-sm-6 col-lg-4 col-md-6 p-2 d-flex justify-content-center">
                        <div class="card job-card p-lg-4 p-md-3 p-sm-4 single-job-items mb-20 col-sm-12 mx-auto">
                            <div class="job-items mb-3">
                                <div class="company-img mb-3">
                                    <a href="{{ route('job-detail', $job->slug) }}"><img class="img-thumbnail"
                                            src="{{ Storage::url($job->Company->cover) }}" alt="" /></a>
                                </div>
                                <div class="job-tittle job-tittle2">
                                    <a href="{{ route('job-detail', $job->slug) }}">
                                        <h4>{{ $job->job }}</h4>
                                    </a>
                                    <ul class="text-secondary">
                                        <li class="mb-2">
                                            <i class="fas fa-building mr-2"></i>
                                            {{ $job->company->company }}
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-map-marker-alt mr-2"></i>{{ $job->lokasi }}
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-money-bill-alt"></i>Rp.
                                            {{ number_format((float) $job->salary, 2, '.', ',') }}
                                        </li>
                                        <li class="mb-2">
                                            Status Lowongan:
                                            {{ $job->is_open == 1 ? 'Tersedia' : 'Ditutup' }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="items-link items-link2 f-right">
                                <a href="javascript:;" class="text-danger"">
                                    @if ($job->pivot->status == 1)
                                        <span class="text-success">Sudah di baca</span>
                                    @else
                                        <span class="text-danger">Belum di baca</span>
                                    @endif
                                </a>
                                <span></span>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="fw-bold">Belum ada perusahaan yang kamu lamar nih...</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
