@extends('admin.layout.app')

@section('title', 'Category')

@section('after-style')
<link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css    ') }}">
<link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endsection

@include('admin.components.sidebar')

@section('content')

<div class="page-heading">
    <h3>Halaman Category</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Category
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Web Developer</td>
                            <td>web-developer</td>
                            <td>
                                <a href="javascript:;" class="btn btn-primary "><i class="bi bi-plus-circle-dotted"></i></a>
                                <a href="javascript:;" class="btn btn-warning"> <i class="bi bi-pencil-square"></i></a>
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
