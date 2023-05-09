@extends('layout.main')

@section('container')
    <section class="col-md-9 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <h2 class="fw-bold mb-4" style="text-align: center;">Struktur Organisasi<br>@if ($profil) {{ $profil->nama }} @else Instansi @endif</h2>
                    <div class="table-responsive" style="text-align: center;">
                        <img class="img-fluid img-responsive center-block" src="@if ($profil) {{ asset('storage/'.$profil->struktur) }} @endif" alt="" width="800px">
                    </div>
                    <br>
                    <p class="mb-2" style="text-align: center; font-size: 26px; font-weight: bold;">TUGAS DAN FUNGSI</p>
                    <div class="table-responsive" style="text-align: justify">
                        @if ($profil) {!! $profil->tugas !!} @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection