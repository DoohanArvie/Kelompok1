@extends('admin.layout.app')

@section('title', 'Jobs')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}">
@endsection

@include('admin.components.sidebar')

@section('content')
    <div class="page-heading">
        <h3>Halaman Jobs</h3>
    </div>

    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between ">
                        <h5>Jobs</h5>
                        <a href="{{ route('dashboard.job.create') }}" class="btn btn-primary font-bold ">Add Job <i
                                class="fa-solid fa-circle-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped text-center" id="table1">
                        <thead class="thead-center">
                            <tr>
                                <th>No</th>
                                <th>Job</th>
                                <th>Category</th>
                                <th>Company</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jobs as $job)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $job->job }}</td>
                                    <td>{{ $job->category->name }}</td>
                                    <td>{{ $job->company->company }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.job.edit', $job->id) }}" class="btn btn-warning"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('dashboard.job.destroy', $job->id) }}" class="d-inline"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this Job?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                        <a href="{{ route('dashboard.job.show', $job->id) }}" class="btn btn-info"><i
                                                class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No jobs available</td>
                                </tr>
                            @endforelse
                        </tbody>
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
