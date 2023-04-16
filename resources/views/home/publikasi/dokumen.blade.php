@extends('layout.main')

@section('container')
    <section class="col-md-9 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container" style="text-align: left;">
                    <h2 class="font-weight-bold mb-2" style="text-align: center;">Publikasi Dokumen</h2>
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-lg-8">
                                <h4 class="font-weight-bold mb-4 mt-2 aaz">Klik untuk mengunduh dokumen</h4>
                            </div>
                        </div>
                        <?php
                            $tmptahun = [];
                            $a = 0;
                            foreach ($dokumen as $row) {
                                if($a!=$row->tahun) {
                                    array_push($tmptahun,$row->tahun);
                                    $a=$row->tahun;
                                }
                            }
                            $tmpkategori = [];
                            $n = "";
                            foreach ($dokumen as $rowc) {
                                if($n!=$rowc->kategori) {
                                    array_push($tmpkategori,$rowc->kategori);
                                    $n=$rowc->kategori;
                                }
                            }
                        ?>
                        <table id="datatable" class="table-bordered" width="100%">
                        @foreach ($tmptahun as $rowx)
                            <td colspan="2" style="background-color: #3A5BA0;" class="text-white text-center font-weight-bold">Tahun {{ $rowx }}</td>
                            <tbody>
                                @foreach ($tmpkategori as $rowz)
                                    <tr>
                                    <td colspan="2" class="text-danger text-center font-weight-bold"><?= $rowz; ?></td>
                                        @foreach (App\Models\AdminDokumen::dokumenbyid($rowx, $rowz) as $row)
                                            <tr>
                                                <td class="text-center">-</td>
                                                <td><a class="font-weight-bold" target="_blank" href="/upload/dokumen/{{ $row->namafile }}">{{ $row->keterangan }}</a></td>
                                            </tr>
                                        @endforeach
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