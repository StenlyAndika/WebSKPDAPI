@extends('layout.main')

@section('container')
    <section class="col-md-9 section mb-2">
        <div class="card shadow">
            <div class="card-body">
                <h2 class="font-weight-bold mb-2" style="text-align: center;">Pengumuman</h2>
                <div class="table-responsive">
                    @foreach ($pengumuman as $row)
                        <p class="font-weight-bold mb-2" style="text-align: left; color: black;">{{ $row->judul }}</p>
                        <embed type="application/pdf" src="/storage/upload/pengumuman/{{ $row->namafile }}" width="940" height="780"></embed>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection