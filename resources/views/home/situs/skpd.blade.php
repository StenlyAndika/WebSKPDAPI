@extends('layout.main')

@section('container')
    <section class="col-md-9 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <h2 class="font-weight-bold mb-4" style="text-align: center;">Domain dan Sub Domain SKPD<br>Kota Sungai Penuh</h2>
                    <div class="table-responsive">
                        <table id="datatable" class="table" style="text-align: left;">
                            <thead>
                                <tr class="table-primary">
                                <th scope="col">No</th>
                                <th scope="col">Nama Instansi</th>
                                <th scope="col">Domain</th>
                            </thead>
                            <tbody>
                            @foreach ($skpd as $row)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td style="text-align: left;">{{ $row->nama }}</td>
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