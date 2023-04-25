@extends('layout.main')

@section('container')
    <section class="col-md-9 section mb-2">
        <div class="card shadow">
            <div class="container">
                <div class="card-body row align-items-center">
                    <div class="col-md-10 order-1 order-md-1 text-md-left" data-aos="fade-left" data-aos-duration="500">
                        <h1 class="fw-bold" style="color: #000;">Website Resmi</h1>
                        <h1 class="fw-bold" style="color: #2e7eed;">Pemerintah Kota Sungai Penuh</h1>
                    </div>
                </div>
                <div class="container">
                    <div class="news-carousel owl-carousel owl-theme">
                        @foreach ($berita as $row)
                            <article class="post-sm">
                                <div class="post-thumb">
                                    <a href="{{ route('berita.read', $row->slug) }}">
                                        <div class="card-animated">
                                            <img class="image-responsive w-100" src="{{ asset('storage/'.$row->gambar) }}" alt="Post-Image">
                                        </div>
                                    </a>
                                </div>
                                <div class="post-title">
                                    <h4 class=""><a href="{{ route('berita.read', $row->slug) }}" class="fw-bold">{{ $row->judul }}</a></h4>
                                </div>
                                <div class="post-meta">
                                    <ul class="list-inline post-tag">
                                        <li class="list-inline-item">
                                            <a href="#" style="color: #3A5BA0; font-weight: bold;">{{ $row->nama }}</a>
                                        </li>
                                        <li class="list-inline-item" style="color: red; font-size: 14px;">
                                            <i class="bi bi-calendar"></i>
                                            {{ Carbon\Carbon::parse($row->created_at)->isoFormat('D MMMM Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-details">
                                    <p style="font-size: 14px">
                                        <?php
                                            $string = strip_tags($row->isi);
                                            if (strlen($string) > 200) {
                                                // truncate string
                                                $stringCut = substr($string, 0, 200);
                                                $endPoint = strrpos($stringCut, ' ');
                                                //if the string doesn't contain any space then it will cut without word basis.
                                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                $string .= '...';
                                            }
                                            echo $string;
                                        ?>
                                    </p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="container">
                    @foreach ($berita as $row)
                    <div class="card mb-4 news-card" data-aos="fade-up" data-aos-duration="500">
                        <img style="border-radius: 5px; padding: 3px;" src="{{ asset('storage/'.$row->gambar) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="post-title">
                                <h4 class="" style="text-align: left;"><a href="{{ route('berita.read', $row->slug) }}" class="fw-bold">{{ $row->judul }}</a></h4>
                            </div>
                            <p style="text-align: left; color: red; font-size: 14px;" class="mb-2"><i class="bi bi-calendar"></i> {{ Carbon\Carbon::parse($row->created_at)->isoFormat('D MMMM Y') }}</p>
                            <p class="card-text berita-mini" style="text-align: left;">
                                <?php
                                    $string = strip_tags($row->isi);
                                    if (strlen($string) > 300) {
                                        $stringCut = substr($string, 0, 300);
                                        $endPoint = strrpos($stringCut, ' ');
                                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $string .= '...';
                                    }
                                    echo $string;
                                ?>
                                <br>
                                <a href="{{ route('berita.read', $row->slug) }}" class="fw-bold">Baca selengkapnya...</a>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="d-flex justify-content-center">
                        {{ $berita->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection