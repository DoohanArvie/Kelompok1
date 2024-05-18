

<?php $__env->startSection('title', 'Category'); ?>

<?php $__env->startSection('after-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/extensions/simple-datatables/style.css    ')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/compiled/css/table-datatable.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-heading">
        <h3>Halaman Category</h3>
    </div>

    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between ">
                        <h5>Category</h5>
                        <a href="javascript:;" class="btn btn-primary font-bold ">Add Category <i class="fa-solid fa-circle-plus"></i></a>
                      </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped text-center" id="table1">
                        <thead class="thead-center">
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
                                    <a href="" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="" class="btn btn-danger" ><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-script'); ?>
    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/static/js/pages/simple-datatables.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\OneDrive\Desktop\sementara laragon\job-vacany-app\resources\views/admin/category/index.blade.php ENDPATH**/ ?>