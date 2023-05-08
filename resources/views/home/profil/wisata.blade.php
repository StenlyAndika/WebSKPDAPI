@extends('layout.main')

@section('container')
    <section class="col-md-9 section page-title mb-2">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h2 class="fw-bold mb-4" style="text-align: center;">Tempat Wisata<br>Kota Sungai Penuh
                    </h2>
                    <div class="row">
                        @foreach ($wisata as $row)
                        <div class="col-md-6 col-xs-12">
                            <img class="card-img-bottom" src="/storage/{{ $row->gambar }}">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $row->lokasi }}</h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection