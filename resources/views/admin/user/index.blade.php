@extends('admin.layout.app')

@section('title', 'Users')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css    ') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endsection

@include('admin.components.sidebar')

@section('content')

    <div class="page-heading">
        <h3>Halaman Category</h3>
    </div>

    {{-- <div class="page-content">
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
    </div> --}}

    <div class="container">
        

        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12 ">
                    <button class="btn" id="userButton">User</button>
                    <button class="btn" id="adminButton">Admin</button>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-end">
                        <a href="" class="btn btn-primary">Tambah User <i class="fa-solid fa-user-plus"></i></a>
                    </div>
                    
                    <table class="table table-striped text-center" id="userTable" >
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Falih Fauzan</td>
                                <td>falih@gmail.com</td>
                                <td>
                                   
                                    <a href="" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="" class="btn btn-danger" ><i class="fa-solid fa-trash"></i></a>
                                    <a href="" class="btn btn-info" ><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>

                    <table class="table table-striped text-center" id="adminTable" style="display: none;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Vany Sidiyanto</td>
                                <td>vany@example.com</td>
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
        </div>
    </div>
@endsection

@section('after-script')
    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/static/js/pages/simple-datatables.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userButton = document.getElementById('userButton');
            const adminButton = document.getElementById('adminButton');

            userButton.addEventListener('click', showUserTable);
            adminButton.addEventListener('click', showAdminTable);

            function showUserTable() {
                document.getElementById('userTable').style.display = 'table';
                document.getElementById('adminTable').style.display = 'none';
                userButton.classList.add('btn-primary');
                adminButton.classList.remove('btn-primary');
            }

            function showAdminTable() {
                document.getElementById('userTable').style.display = 'none';
                document.getElementById('adminTable').style.display = 'table';
                userButton.classList.remove('btn-primary');
                adminButton.classList.add('btn-primary');
            }
        });
    </script>



@endsection
