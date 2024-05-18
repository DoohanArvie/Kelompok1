

<?php $__env->startSection('title', 'Users Management'); ?>

<?php $__env->startSection('after-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/extensions/simple-datatables/style.css    ')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/compiled/css/table-datatable.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-heading">
        <h3>Halaman Users Management</h3>
    </div>

    

    <div class="container">
        

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-script'); ?>
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



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\Kelompok1\resources\views/admin/user/index.blade.php ENDPATH**/ ?>