@extends('admin.layout.app')

@section('title', 'Company')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}">
@endsection

@include('admin.components.sidebar')

@section('content')

    <div class="page-heading">
        <h3>Halaman Company</h3>
    </div>

    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between ">
                        <h5>Companies</h5>
                        <a href="{{ route('dashboard.company.create') }}" class="btn btn-primary font-bold ">Add Company <i
                                class="fa-solid fa-circle-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped text-center" id="table1">
                        <thead class="thead-center">
                            <tr>
                                <th>No</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Cover</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @forelse ($companies as $company)
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $company->company }}</td>
                                    <td>{{ $company->email }}</td>

                                    <td>
                                        <img width="150px" height="100px" src="{{ Storage::url($company->cover) }}"
                                            alt="img {{ $company->company }}">
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.company.edit', $company->id) }}"
                                            class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('dashboard.company.destroy', $company->id) }}"
                                            class="d-inline" method="POST"
                                            onsubmit="return confirm('Jika kamu menghapus company, akun mu juga akan terhapus. Lebih baik edit saja. Apakah kamu yakin ingin menghapus company ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                        <a href="{{ route('dashboard.company.show', $company->id) }}"
                                            class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                    </td>

                            </tbody>
                        @empty
                            <td>No data</td>
                            <td>No data</td>
                            <td>No data</td>
                            <td>No data</td>
                            <td>No data</td>
                        @endforelse
                    </table>
                </div>
            </div>

        </section>
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
