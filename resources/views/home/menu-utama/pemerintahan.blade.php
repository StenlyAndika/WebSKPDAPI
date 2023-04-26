@extends('layout.main')

@section('container')
    <section class="col-lg-12 section gradient-banner mb-4" style="padding: 100px 0;">
        <div class="shapes-container">
            <div class="shape" data-aos="fade-down-left" data-aos-duration="1500" data-aos-delay="100"></div>
            <div class="shape" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100"></div>
            <div class="shape" data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="200"></div>
            <div class="shape" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></div>
            <div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
            <div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
            <div class="shape" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"></div>
            <div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="200"></div>
            <div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="100"></div>
            <div class="shape" data-aos="zoom-out" data-aos-duration="2000" data-aos-delay="500"></div>
            <div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="200"></div>
            <div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="100"></div>
            <div class="shape" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0"></div>
            <div class="shape" data-aos="fade-down" data-aos-duration="500" data-aos-delay="0"></div>
            <div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="100"></div>
            <div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="0"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center order-1 order-md-1" data-aos="fade-right" data-aos-duration="700">
                    <h2 class="text-white fw-bold mb-2 mt-4">Pemerintahan</h2>
                    <img class="img-fluid" src="/img/bg-pemerintahan.webp" alt="screenshot">
                </div>
                <div class="col-md-6 order-2 order-md-2 text-center text-md-left" data-aos="fade-left" data-aos-duration="700">
                    <p class="title1 text-white fw-bold" style="text-align: center; color: black;">
                        Jl Gajah Mada No. 01 Sungai Penuh 37112,
                        <br>Telepon (0748) 323969 Fax (0748) 22126,
                        <br>Email: setko@sungaipenuh.go.id<br>Website: http://www.sungaipenuhkota.go.id
                    </p>
                    <br>
                    <a href="#profil-wako">
                        <div class="skills__data card-animated">
                            <div class="skills__names">
                                <span class="fw-bold">Profil Walikota</span>
                            </div>
                            <div class="skills__bar skills__html"></div>
                        </div>
                    </a>
                    <a href="#profil-wawako">
                        <div class="skills__data card-animated">
                            <div class="skills__names">
                                <span class="fw-bold">Profil Wakil Walikota</span>
                            </div>
                            <div class="skills__bar skills__html"></div>
                        </div>
                    </a>
                    <a href="#visi-misi">
                        <div class="skills__data card-animated">
                            <div class="skills__names">
                                <span class="fw-bold">Visi dan Misi</span>
                            </div>
                            <div class="skills__bar skills__html"></div>
                        </div>
                    </a>
                    <a href="#lambang">
                        <div class="skills__data card-animated">
                            <div class="skills__names">
                                <span class="fw-bold">Lambang dan Identitas</span>
                            </div>
                            <div class="skills__bar skills__html"></div>
                        </div>
                    </a>
                    <a href="https://youtu.be/Fpwq2avwOmA" target="_blank">
                        <div class="skills__data card-animated">
                            <div class="skills__names">
                                <span class="fw-bold">Profil Kota Sungai Penuh</span>
                            </div>
                            <div class="skills__bar skills__html"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-dark">
        @include('home.menu-utama.wako')
        @include('home.menu-utama.wawako')
        @include('home.menu-utama.lambang')
        @include('home.menu-utama.visimisi')
    </section>
@endsection