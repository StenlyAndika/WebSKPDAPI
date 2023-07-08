@extends('layout.main')

@section('container')
    <section class="col-md-9 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <h2 class="font-weight-bold mb-4" style="text-align: center;">Alur Pengaduan<br></h2>
                    <a href="#"><img src="@if(!empty($informasi->pengaduan)) {{ asset('storage/'.$informasi->pengaduan) }} @endif" width="80%" alt="..."></a>
                </div>
            </div>
        </div>
    </section>
@endsection