@extends('layout.main')

@section('container')
    <section class="col-md-9 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <h2 class="fw-bold mb-4" style="text-align: center;">Visi dan Misi<br>@if ($profil) {{ $profil->nama }} @else Instansi @endif</h2>
                    <div class="table-responsive">
                        @if ($profil) {!! $profil->visi !!} @endif
                    </div>
                    <br>
                    <div class="table-responsive" style="text-align: justify">
                        @if ($profil) {!! $profil->misi !!} @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection