@extends('admin.layout.app')

@section('title', 'Jobs')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css    ') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
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
                      <a href="javascript:;" class="btn btn-primary font-bold ">Add Job <i class="fa-solid fa-circle-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped text-center" id="table1">
                        <thead class="thead-center">
                            <tr>
                                <th>Job</th>
                                <th>Category</th>
                                <th>Company</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>Back-End Developer (internship)</td>
                                <td>Progammer</td>
                                <td>PT. TIFICO</td>
                                <td>
                                    <a href="" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="" class="btn btn-danger" ><i class="fa-solid fa-trash"></i></a>
                                    <a href="" class="btn btn-info" ><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        </tbody>
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