@extends('layout.main')

@section('container')
    <section class="col-md-9 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <h2 class="font-weight-bold mb-4" style="text-align: center;">Penghargaan</h2>
                    <div class="table-responsive">
                        @foreach ($penghargaan as $row)
                            <embed type="application/pdf" src="/storage/{{ $row->namafile }}" width="940" height="780"></embed>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection