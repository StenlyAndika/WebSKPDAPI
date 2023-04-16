@extends('layout.main')

@section('container')
    <style>
        .card {
            border: none;
        }
        .row {
            justify-content: center;
        }
    </style>
    <section class="col-lg-12 section gradient-banner" id="menu">
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
                <div class="col-md-6 order-1 order-md-2 text-center text-md-left" data-aos="fade-left" data-aos-duration="700">
                    <h2 class="text-white font-weight-bold mb-4">Website Resmi Pemerintah Kota Sungai Penuh</h2>
                    <h3 class="text-white font-weight-bold mb-1">sungaipenuhkota<span style="color: #2fb8f2;">.go.id</span></h3>
                    <h2 class="cd-headline clip is-full-width mb-4">
                        <span class="cd-words-wrapper text-color">
                            <b class="is-visible font-weight-bold">Sahalun Suhak</b>
                            <b class="font-weight-bold">Saletuh Bedil</b>
                        </span>
                    </h2>
                </div>
                <div class="col-md-6 text-center order-2 order-md-1" data-aos="fade-right" data-aos-duration="700">
                    <img class="img-fluid" src="/img/bg-pemerintahan.webp" alt="screenshot">
                </div>
            </div>
        </div>
    </section>
    <section class="col-lg-12 section pt-0 mb-4 position-relative pull-top" data-aos="fade-up" data-aos-duration="700">
        <div class="container">
            <div class="rounded shadow bg-white">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <a href="/pemerintahan">
                                <div class="card-animated">
                                    <img src="/img/pemerintahan.webp" width="150px" alt="image-icon">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <a href="/layanan_publik">
                                <div class="card-animated">
                                    <img src="/img/layananpublik.webp" width="150px" alt="image-icon">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <a href="/layanan_pegawai">
                                <div class="card-animated">
                                    <img src="/img/layananpegawai.webp" width="150px" alt="image-icon">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <a href="/lpse">
                                <div class="card-animated">
                                    <img src="/img/lpse.webp" width="150px" alt="image-icon">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <a href="/perencanaan_pembangunan">
                                <div class="card-animated">
                                    <img src="/img/perencanaan.webp" width="150px" alt="image-icon">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <a href="/kotaku">
                                <div class="card-animated">
                                    <img src="/img/kotaku.webp" width="150px" alt="image-icon">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection