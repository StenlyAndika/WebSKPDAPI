@extends('layout.main')

@section('container')
    <section class="col-md-9 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <h2 class="font-weight-bold mb-4" style="text-align: center;">Standar Pelayanan Publik<br></h2>
                    <div class="table-responsive">
                        <table class="table" style="text-align: left;">
                            <thead>
                                <tr class="table-primary">
                                <th scope="col">NO</th>
                                <th scope="col">JENIS LAYANAN</th>
                                <th scope="col">STANDAR PELAYANAN</th>
                            </thead>
                            <tbody>
                                @foreach ($pelayanan as $row)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration; }}</th>
                                        <td>{{ $row->jenis }}</td>
                                        <td>
                                            <a href="{{ route('detail', $row->id) }}" class="btn btn-block btn-sm btn-primary"><i class="bi bi-eye"></i> Lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection