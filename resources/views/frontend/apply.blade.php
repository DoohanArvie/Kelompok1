@extends('frontend.layouts.main')

@section('content')
    <style>
        .btn-apply {
            padding: 10px 20px;
            border-radius: 30px;
            color: #fff;
            background: #ff5e14;
            border: 1px solid #ff5e14;
            cursor: pointer;
        }

        .btn-apply:hover {
            background: #ff5e14bb;
            transition: 0.5s;
        }
    </style>
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                data-background="{{ asset('assets/img/hero/about.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Please Apply Your Job</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- Support Company Start-->
        <div class="support-company-area fix section-padding2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 mx-auto mr">
                        <div class="right-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2">
                                <div class="d-flex justify-content-between ">
                                    <img class="rounded-circle  company-logo" width="200"
                                        src="{{ Storage::url($job->company->cover) }}" alt="{{ $job->company->company }}">
                                    <div class="d-flex flex-column mr-5">
                                        <p class="pt-4 fw-bold pl-3 pl-lg-5 " style="font-size: 25px !important">
                                            <strong class="title-company text-nowrap">{{ $job->job }}</strong>
                                        </p>
                                        <div class="pl-4 pt-3 mr-lg-1 d-flex justify-content-between mobile-column">
                                            <p class="category-title text-nowrap mx-lg-4"><i
                                                    class="fa-solid fa-layer-group"></i>
                                                {{ $job->category->name }}</p>
                                            <p class="pelamar-title"><i class="fa-solid fa-user-group"></i>
                                                {{ count($pelamar) }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="pl-lg-5 pt-4">

                                    @if ($errors->any())
                                        <div class="text-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form id="applyForm" action="{{ route('applyStore', $job->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Input Your
                                                Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('title') is-invalid @enderror" id="email"
                                                value="{{ old('email') }}" placeholder="email">

                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="checkbox" value="" id="warning1">
                                            <label class="form-check-label" for="warning1">
                                                Saya menyatakan bahwa semua informasi yang saya isi adalah benar dan saya
                                                memahami sepenuhnya bahwa informasi yang salah atau tidak akurat akan
                                                mengakibatkan sanksi sesuai dengan Peraturan Perusahaan yang berlaku.
                                            </label>
                                        </div>
                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="checkbox" value="" id="warning2">
                                            <label class="form-check-label" for="warning2">
                                                Jika data yang saya isi tidak benar, maka saya tidak berhak mengikuti proses
                                                seleksi selanjutnya dan dinyatakan gugur.
                                            </label>
                                        </div>

                                        <div>
                                            <button type="submit" id="btn-apply" class="btn-apply">Apply Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById("applyForm").addEventListener("submit", function(event) {
            var checkbox1 = document.getElementById("warning1");
            var checkbox2 = document.getElementById("warning2");

            if (!checkbox1.checked || !checkbox2.checked) {
                alert("Anda harus menyetujui semua syarat sebelum melanjutkan.");
                // Swal.fire({
                //     icon: 'error',
                //     title: 'Oops...',
                //     text: 'Anda harus menyetujui semua syarat sebelum melanjutkan.'
                // });
                event.preventDefault();
            }
        });
    </script>
    {{-- <script>
        document.getElementById("applyForm").addEventListener("submit", function(event) {
            var checkbox1 = document.getElementById("warning1");
            var checkbox2 = document.getElementById("warning2");

            if (!checkbox1.checked || !checkbox2.checked) {
                // Tampilkan SweetAlert jika salah satu checkbox tidak dicentang
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Anda harus menyetujui semua syarat sebelum melanjutkan.'
                });
                event.preventDefault(); // Mencegah formulir dikirim
            }
        });
    </script> --}}
@endsection
