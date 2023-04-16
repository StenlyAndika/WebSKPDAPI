@extends('layout.main')

@section('container')
    <section class="col-md-9 section blog-single mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <article class="single-post">
                        <div class="post-title text-center">
                            <h2>{{ $singleberita->judul }}</h2>
                            <ul class="list-inline post-tag">
                                <li class="list-inline-item">
                                    <img src="/img/avatar.webp" alt="author-thumb">
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" style="color: #3A5BA0; font-weight: bold;">{{ $singleberita->nama }}</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="bi bi-calendar"></i>
                                    <a href="#">{{ Carbon\Carbon::parse($singleberita->tgl)->isoFormat('D MMMM Y') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="post-body">
                            <div class="feature-image">
                                <img class="img-fluid" src="/upload/berita/{{ $singleberita->gambar }}" alt="feature-image">
                            </div>
                            <p>{!! $singleberita->isi !!}</p>
                        </div>
                    </article>
                </div>
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-12 title">
                            <h4 class="text-white">Baca Juga</h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="news-carousel owl-carousel owl-theme">
                            @foreach ($berita as $row)
                                <article class="post-sm">
                                    <div class="post-thumb">
                                        <a href="/read/{{ $row->slug }}"><img class="image-responsive w-100" src="/upload/berita/{{ $row->gambar }}" alt="Post-Image"></a>
                                    </div>
                                    <div class="post-title">
                                        <h4 class=""><a href="/read/{{ $row->slug }}" class="font-weight-bold">{{ $row->judul }}</a></h4>
                                    </div>
                                    <div class="post-meta">
                                        <ul class="list-inline post-tag">
                                            <li class="list-inline-item">
                                                <a href="#" style="color: #3A5BA0; font-weight: bold;">{{ $row->nama }}</a>
                                            </li>
                                            <li class="list-inline-item" style="color: red; font-size: 14px;">
                                                <i class="bi bi-calendar"></i>
                                                {{ Carbon\Carbon::parse($row->tgl)->isoFormat('D MMMM Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="post-details">
                                        <p style="font-size: 14px">
                                            <?php
                                                $string = strip_tags($row->isi);
                                                if (strlen($string) > 150) {
                                                    // truncate string
                                                    $stringCut = substr($string, 0, 150);
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
                </div>
            </div>
        </div>
    </section>
@endsection