@extends('layout.admin')

@section('container')
    <section class="col-md-12 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <h3 class="font-weight-bold mb-4" style="text-align: center;">Tutorial Pengambilan Lokasi<br></h3>
                    <h3 class="font-weight-bold mb-4" style="text-align: left;">1. Buka Google Map<br></h3>
                    <a href="https://www.google.com/maps/" class="btn btn-success mb-3" target="_blank">Klik disini untuk akses google maps</a>
                    <h3 class="font-weight-bold mb-4" style="text-align: left;">2. Klik lingkaran untuk memfokuskan lokasi<br></h3>
                    <img src="/img/tutorial/0.jpg" class="mb-4" width="30%" alt="...">
                    <h3 class="font-weight-bold mb-4" style="text-align: left;">3. Arahkan peta ke lokasi instansi<br></h3>
                    <img src="/img/tutorial/1.jpg" class="mb-4" width="70%" alt="...">
                    <h3 class="font-weight-bold mb-4" style="text-align: left;">4. Klik ikon lokasi instansi atau area sekitarnya lalu klik bagikan<br></h3>
                    <img src="/img/tutorial/2.jpg" class="mb-4" width="70%" alt="...">
                    <h3 class="font-weight-bold mb-4" style="text-align: left;">5. Klik Sematkan Peta lalu Klik SALIN HTML<br></h3>
                    <img src="/img/tutorial/3.jpg" class="mb-4" width="70%" alt="...">
                    <h3 class="font-weight-bold mb-4" style="text-align: left;">6. Pastekan teks yang disalin ke form peta lokasi<br></h3>
                    <img src="/img/tutorial/4.jpg" width="70%" alt="...">
                </div>
            </div>
        </div>
    </section>
@endsection