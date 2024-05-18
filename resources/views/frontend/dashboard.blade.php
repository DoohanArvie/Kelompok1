<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">This is the main page.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="row">
            <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card bg-success">
                    <div class="card-body">
                        <h5 class="card-title text-white">Jumlah User</h5>
                        <h3 class="card-text mt-4 text-white">129</h3>
                        <a href="#" class="btn btn-primary shadow">Result &raquo;</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card bg-info">
                    <div class="card-body">
                        <h5 class="card-title text-white">Jumlah Company</h5>
                        <h3 class="card-text mt-4 text-white">21</h3>
                        <a href="#" class="btn btn-primary shadow">Result &raquo;</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card bg-warning">
                    <div class="card-body">
                        <h5 class="card-title text-white">Jumlah Lowongan</h5>
                        <h3 class="card-text mt-4 text-white">55</h3>
                        <a href="#" class="btn btn-primary shadow">Result &raquo;</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Example Content</h4>
                </div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur quas omnis
                    laudantium tempore
                    exercitationem, expedita aspernatur sed officia asperiores unde tempora maxime odio
                    reprehenderit
                    distinctio incidunt! Vel aspernatur dicta consequatur!
                </div>
            </div>
    </section>
</x-app-layout>
