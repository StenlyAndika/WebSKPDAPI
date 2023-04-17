@extends('layout.main')

@section('container')
    <section id="portfolio" class="col-md-9 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <h2 class="font-weight-bold mb-4" style="text-align: center;">Galeri Foto<br>Kota Sungai Penuh</h2>
                <?php
                    $tmpkegiatan = [];
                    $a = "";
                    foreach ($foto as $row) {
                        if($a!=$row->kegiatan) {
                            array_push($tmpkegiatan,$row->kegiatan);
                            $a=$row->kegiatan;
                        }
                    }
                    
                    ?>

                    @foreach ($tmpkegiatan as $rowx)
                        <div class="col-lg-12">
                            <h4 class="font-weight-bold mt-5" style="text-align: left;"><?= $rowx ?></h4>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-duration="500">
                            @foreach (App\Models\AdminFoto::fotobyid($rowx) as $rowz)
                                <div class="col-lg-4 col-md-6 portfolio-item card-animated">
                                    <div class="portfolio-wrap">
                                        <img src="/upload/foto/{{ Carbon\Carbon::parse($rowz->created_at)->isoFormat('DD-MM-Y') }}/{{ $rowz->namafile }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection