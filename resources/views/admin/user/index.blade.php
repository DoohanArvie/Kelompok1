@extends('admin.layout.app')

@section('title', 'Users Management')

@section('after-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}">
@endsection

@include('admin.components.sidebar')

@section('content')

    <div class="page-heading">
        <h3>Halaman Users Management</h3>
    </div>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12 ">
                <button class="btn btn-primary" id="userButton">User</button>
                <button class="btn" id="adminButton">Admin</button>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('dashboard.user.create') }}" class="btn btn-primary mb-3">Tambah User <i
                            class="fa-solid fa-user-plus"></i></a>
                </div>
                <div class="table-responsive">

                    <table class="table table-striped text-center table1" id="userTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>

                                        <form action="{{ route('dashboard.user.destroy', $user->id) }}" class="d-inline"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this User?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete-btn"><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Data Kosong</td>
                                    <td>Data Kosong</td>
                                    <td>Data Kosong</td>
                                    <td>Data Kosong</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

                <table class="table table-striped text-center" id="adminTable" style="display: none;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($admins as $admin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>


                                    <form action="{{ route('dashboard.user.destroy', $admin->id) }}" class="d-inline"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this User?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Data Kosong</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
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
        // datatable
        document.addEventListener('DOMContentLoaded', function() {
            $('#userTable').DataTable();

            $('.delete-btn').on('click', function(e) {
                e.preventDefault();
                let form = $(this).closest('form');

                Swal.fire({
                    title: 'Warning?',
                    text: "Apakah anda yakin ingin mengahapus akun ini",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

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
