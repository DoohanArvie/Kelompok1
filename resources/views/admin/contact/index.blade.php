@extends('admin.layout.app')

@section('title', 'Contact')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css    ') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endsection

@include('admin.components.sidebar')

@section('content')

    <div class="page-heading">
        <h3>Halaman Contacts</h3>
    </div>

    <div class="page-content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Contacts</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-lg">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Fauzan</td>
                                    <td class="col-auto">
                                        <p class=" mb-0">fauzan@gmail.com</p>
                                    </td>
                                    <td>Saya terkendala login gmn dong min.. -__-</td>
                                </tr>
                                <tr>
                                    <td>Vannie</td>
                                    <td>Vannie@gmail</td>
                                    <td>wah ga sia" dgn web ini saya jadi satpol pp min😍</td>
                                </tr>

                            </tbody>
                        </table>
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
