@extends('layout.main')

@section('container')
    <section class="col-md-9 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <h2 class="fw-bold mb-4" style="text-align: center;">Layanan Kesehatan<br>Kota Sungai Penuh</h2>
                    <div class="table-responsive">
                        <table class="table" style="text-align: left;">
                            <thead>
                                <tr class="table-primary">
                                <th scope="col">No</th>
                                <th scope="col">Nama Instansi Kesehatan</th>
                            </thead>
                            <tbody>
                            <?php $i=0; foreach ($kesehatan as $row) : $i++; ?>
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $row; }}</td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection