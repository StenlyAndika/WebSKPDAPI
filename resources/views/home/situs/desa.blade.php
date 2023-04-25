@extends('layout.main')

@section('container')
    <section class="col-md-9 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <h2 class="fw-bold mb-4" style="text-align: center;">Situs Web Desa<br>Kota Sungai Penuh</h2>
                    <div class="table-responsive">
                        <table id="datatable" class="table" style="text-align: left;">
                            <thead>
                                <tr class="table-primary">
                                <th scope="col">No</th>
                                <th scope="col">Nama Desa</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Domain</th>
                            </thead>
                            <tbody>
                            @foreach ($desa as $row)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td style="text-align: left;">{{ $row->nama }}</td>
                                <td style="text-align: left;">{{ $row->kecamatan }}</td>
                                <td style="text-align: left;"><a target="_blank" href="{{ $row->domain }}">{{ $row->domain }}</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection