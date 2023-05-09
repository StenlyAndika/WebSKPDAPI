@extends('layout.admin')

@section('container')
    <style>
        .aac {
            margin-left: 25px;
            margin-right: 25px;
            border-radius: 10px;
            background: #fff;
            position: relative;
        }
    </style>
    <section class="col-md-9 section bg-white" id="lambang">
        <div class="aac">
            <style>
                .asd {
                    padding-top: 10px;
                    padding-left: 10%;
                    padding-right: 10%;
                }
                .kntl {
                    padding: 10px;
                    font-size: 14px;
                }
                .ccx {
                    color: black !important;
                }
            </style>
            <div class="table-responsive asd">
                <h3 class="font-weight-bold mb-4" style="text-align: left;">{{ $pelayanan->jenis }}<br></h3>
                <a href="#"><img src="{{ asset('storage/'.$pelayanan->gambar) }}" width="250px"></a>
                <p class="ccx mt-4">{!! $pelayanan->standar !!}</p>
            </div>
            <a class="btn btn-sm btn-success" href="{{ route('admin.pelayanan.index') }}">Kembali</a>
            <br class="mb-4">
        </div>
    </section>
@endsection