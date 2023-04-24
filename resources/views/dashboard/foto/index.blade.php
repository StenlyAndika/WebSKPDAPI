@extends('layout.admin')

@section('container')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.foto.create') }}" class="d-inline align-middle btn btn-sm btn-success mb-2"><i class="fa-solid fa-plus"></i></a>
                            <h3 class="mt-3 d-inline align-middle">Galeri Foto</h3>
                        </div>
                        <div class="card-body card-block">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">#</th>
                                            <th style="text-align: center;">Tgl Publikasi</th>
                                            <th style="text-align: center;">Nama Kegiatan</th>
                                            <th style="text-align: center;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($foto as $row)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: center;">{{ Carbon\Carbon::parse($row->created_at)->isoFormat('D MMMM Y') }}</td>
                                            <td style="text-align: left;">{{ $row->kegiatan }}</td>
                                            <td>
                                                <form action="{{ route('admin.foto.destroy', $row->id) }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-block btn-sm btn-danger" onclick="return confirm('Hapus Data ini?');"><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection