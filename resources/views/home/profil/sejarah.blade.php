@extends('layout.main')

@section('container')
    <section class="col-md-9 section page-title mb-2">
        <div class="card">
            <div class="card-body">
                <div class="container" style="text-align: left;">
                    <h2 class="fw-bold mb-4" style="text-align: center;">Sejarah<br>@if ($profil) {{ $profil->sejarah }} @else Instansi @endif
                    </h2>
                    <div class="table-responsive" style="text-align: justify">
                        <p class="xzx">@if ($profil) {!! $profil->sejarah !!} @endif</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection