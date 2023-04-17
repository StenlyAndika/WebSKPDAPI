@extends('layout.admin')

@section('container')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>DAFTAR PESAN DITERIMA</strong>
                        </div>
                        <div class="card-body card-block">
                            @foreach ($pesan as $row)
                                <div class="card cardx col-lg-12">
                                    <div class="card-body">
                                        <table border="0">
                                            <tr>
                                                <td><h6>Tanggal</h6></td>
                                                <td><h6>&nbsp;:&nbsp;</h6></td>
                                                <td><h6>{{ $row->created_at }}</h6></td>
                                            </tr>
                                            <tr>
                                                <td><h6>Email</h6></td>
                                                <td><h6>&nbsp;:&nbsp;</h6></td>
                                                <td><h6>{{ $row->email }}</h6></td>
                                            </tr>
                                            <tr>
                                                <td><h6>Nama</h6></td>
                                                <td><h6>&nbsp;:&nbsp;</h6></td>
                                                <td><h6>{{ $row->nama }}</h6></td>
                                            </tr>
                                            <tr>
                                                <td><h6>Nomor WA</h6></td>
                                                <td><h6>&nbsp;:&nbsp;</h6></td>
                                                <td><h6>{{ $row->wa }}</h6></td>
                                            </tr>
                                            <tr>
                                                <td><h6>Pesan</h6></td>
                                                <td><h6>&nbsp;:&nbsp;</h6></td>
                                            </tr>
                                        </table>
                                        <h6>
                                        <p class="card-text" style="text-align: left;">
                                            <?= $row['pesan'] ?>
                                        </p>
                                        </h6>
                                        <a href="/pesan/hapus/{{ $row->id }}" class="btn btn-danger" onclick="return confirm('Hapus pesan ini?');"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection