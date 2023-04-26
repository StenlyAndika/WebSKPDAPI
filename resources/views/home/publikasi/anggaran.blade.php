@extends('layout.main')

@section('container')
    <section class="col-md-9 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container" style="text-align: left;">
                    <h2 class="fw-bold mb-4" style="text-align: center;">Transparansi Anggaran</h2>
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-lg-8">
                                <h4 class="fw-bold mb-4 mt-2 aaz">Klik untuk mengunduh dokumen</h4>
                            </div>
                        </div>
                        <?php
                            $tmptahun = [];
                            $a = 0;
                            foreach ($anggaran as $row) {
                                if($a!=Carbon\Carbon::parse($row->created_at)->isoFormat('Y')) {
                                    array_push($tmptahun,Carbon\Carbon::parse($row->created_at)->isoFormat('Y'));
                                    $a=Carbon\Carbon::parse($row->created_at)->isoFormat('Y');
                                }
                            }
                        ?>
                        <table class="table" style="text-align: left;">
                            @foreach ($tmptahun as $rowx)
                                <thead>
                                    <tr class="table-primary">
                                    <th scope="col">Tahun <?= $rowx; ?></th>
                                </thead>
                                <tbody>
                                    @foreach (App\Models\Anggaran::anggaranbyid($rowx) as $row)
                                        <tr>
                                            <td>
                                                <a class="fw-bold" target="_blank" href="/storage/{{ $row->namafile }}">- {{ $row->keterangan }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection