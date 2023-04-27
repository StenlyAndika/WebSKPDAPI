@extends('layout.admin')

@section('container')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.berita.create') }}" class="d-inline align-middle btn btn-sm btn-success mb-2"><i class="bi bi-plus-lg"></i></a>
                            <h3 class="mt-3 d-inline align-middle">Berita</h3>
                        </div>
                        <div class="card-body card-block">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">#</th>
                                            <th style="text-align: center;">Tgl Publikasi</th>
                                            <th style="text-align: center;">Judul</th>
                                            <th style="text-align: center;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($berita as $row)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: center;">{{ Carbon\Carbon::parse($row->created_at)->isoFormat('D MMMM Y') }}</td>
                                            <td style="text-align: left;">{{ $row->judul }}</td>
                                            <td>
                                                <a href="{{ route('admin.berita.edit', $row->slug) }}" class="btn btn-block btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                <form action="{{ route('admin.berita.destroy', $row->slug) }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-block btn-sm btn-danger" onclick="return confirm('Hapus Data ini?');"><i class="bi bi-x-square"></i></button>
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