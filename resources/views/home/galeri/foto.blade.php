@extends('layout.main')

@section('container')
    <section id="portfolio" class="col-md-9 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <h2 class="fw-bold mb-4" style="text-align: center;">Galeri Foto<br>{{ $profil->nama }}</h2>
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
                            <h4 class="fw-bold mt-5" style="text-align: left;"><?= $rowx ?></h4>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-delay="500">
                            @foreach (App\Models\Foto::fotobyid($rowx) as $rowz)
                                <div class="col-lg-4 col-md-6 portfolio-item card-animated">
                                    <div class="portfolio-wrap">
                                        <img src="/storage/{{ $rowz->namafile }}" class="img-fluid" alt="">
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