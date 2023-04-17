@extends('layout.main')

@section('container')
    <section class="col-md-9 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container" style="text-align: left;">
                    <h2 class="font-weight-bold mb-4" style="text-align: center;">Transparansi Anggaran</h2>
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-lg-8">
                                <h4 class="font-weight-bold mb-4 mt-2 aaz">Klik untuk mengunduh dokumen</h4>
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
                        <table id="datatable" class="table-bordered" width="100%">
                        @foreach ($tmptahun as $rowx)
                            <td colspan="2" style="background-color: #3A5BA0;" class="text-white text-center font-weight-bold">Tahun <?= $rowx; ?></td>
                            <tbody>
                                <tr>
                                    @foreach (App\Models\AdminAnggaran::anggaranbyid($rowx) as $row)
                                        <tr>
                                            <td class="text-center">-</td>
                                            <td><a class="font-weight-bold" target="_blank" href="/upload/anggaran/{{ $row->namafile }}">{{ $row->keterangan }}</a></td>
                                        </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection