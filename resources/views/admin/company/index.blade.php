@extends('admin.layout.app')

@section('title', 'Company')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css    ') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
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
                                <th>Cover</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @forelse ($companies as $company)
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $company->company }}</td>
                                    <td>
                                        <img width="150px" height="100px" src="{{ Storage::url($company->cover) }}"
                                            alt="img {{ $company->company }}">
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.company.edit', $company->id) }}"
                                            class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('dashboard.company.destroy', $company->id) }}"
                                            class="d-inline" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this Company?');">
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
                            <p>Belum ada perusahaan</p>
                        @endforelse
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection

@section('after-script')
    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/static/js/pages/simple-datatables.js"></script>
@endsection
