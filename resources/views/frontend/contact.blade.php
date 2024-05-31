@extends('frontend.layouts.main')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
    <div class="slider-area">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
            data-background="assets/img/hero/kontak.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Kontak Kami</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- ================ contact section start ================= -->
    <div class="container py-5 d-flex justify-content-center">
        <div class="form">
            <div class="contact-info">
                <h3 class="title">Mari hubungi kami</h3>
                <p class="text">
                    Kami di sini untuk mendengar anda. Apakah anda memiliki kritik,
                    saran, komplain, atau pujian, kami sangat menghargai masukan anda
                    dan berkomitmen untuk meningkatkan layanan kami.
                </p>

                <div class="info">
                    <div class="information">
                        <i class="fas fa-map-marker-alt"></i>
                        &nbsp &nbsp

                        <p>92 Cherry Drive Uniondale, NY 11553</p>
                    </div>
                    <div class="information">
                        <i class="fas fa-envelope"></i>
                        &nbsp &nbsp
                        <p>lorem@ipsum.com</p>
                    </div>
                    <div class="information">
                        <i class="fas fa-phone"></i>
                        &nbsp&nbsp
                        <p>123-456-789</p>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form action="index.html" autocomplete="off">
                    <h3 class="title">Contact us</h3>
                    <div class="input-container">
                        <input type="text" name="name" class="input" />
                        <label for="">Username</label>
                        <span>Username</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" />
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>

                    <div class="input-container textarea">
                        <textarea name="message" class="input"></textarea>
                        <label for="">Message</label>
                        <span>Message</span>
                    </div>
                    <input type="submit" value="Send" class="btn" />
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/contacts.js') }}"></script>
@endsection
