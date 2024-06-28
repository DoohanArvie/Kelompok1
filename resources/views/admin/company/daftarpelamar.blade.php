@extends('admin.layout.app')

@section('title', 'DaftarPelamar')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}">
@endsection

@include('admin.components.sidebar')

@section('content')

    <div class="page-heading">
        <h3>Daftar Pelamar</h3>
    </div>

    <div class="page-content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pelamar</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-lg" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>CV</th>
                                    <th>Dokumen</th>
                                    <th>Action</th>
                                    <th>send email</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($jobs as $job)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $job->name }}</td>
                                        <td>{{ $job->email }}</td>
                                        <td>{{ $job->pivot->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            @if ($job->pivot->status == 1)
                                                <p class="text-success">Sudah di baca</p>
                                            @else
                                                <p class="text-danger">Belum di baca</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($job->cvs) && isset($job->cvs->id))
                                                <a href="{{ route('dashboard.download_cv', $job->cvs->id) }}"
                                                    class="btn btn-primary">CV</a>
                                            @else
                                                <span class="text-danger">CV not available</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($job->cvs) && isset($job->cvs->id))
                                                <a href="{{ route('dashboard.download_document', $job->cvs->id) }}"
                                                    class="btn btn-primary">Document</a>
                                            @else
                                                <span class="text-danger">Document not available</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form class="pt-3 pb-0"
                                                action="{{ route('dashboard.daftarpelamat.update', $job->pivot->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success fw-bold">Status <i
                                                        class="fa-solid fa-circle-check"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#emailModal{{ $job->id }}">
                                                Kirim Email
                                            </button>

                                            <!-- Email Modal -->
                                            <div class="modal fade" id="emailModal{{ $job->id }}" tabindex="-1"
                                                aria-labelledby="emailModalLabel{{ $job->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="emailModalLabel{{ $job->id }}">Kirim Email ke
                                                                {{ $job->name }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form
                                                            action="{{ route('dashboard.daftarpelamar.send_email', $job->pivot->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="subject" class="form-label">Subject</label>
                                                                    <input type="text" class="form-control"
                                                                        id="subject" name="subject" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="message" class="form-label">Pesan</label>
                                                                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Kirim
                                                                    Email</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td>1</td>
                                    <td>no data</td>
                                    <td>no data</td>
                                    <td>no data</td>
                                    <td>no data</td>
                                    <td>no data</td>
                                    <td>no data</td>
                                    <td>no data</td>
                                @endforelse

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-script')
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/datatables.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#table1').DataTable();
        });
    </script>
@endsection
