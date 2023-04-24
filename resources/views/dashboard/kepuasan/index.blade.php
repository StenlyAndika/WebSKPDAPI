@extends('layout.admin')

@section('container')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.kepuasan.create') }}" class="d-inline align-middle btn btn-sm btn-success mb-2"><i class="fa-solid fa-plus"></i></a>
                            <h3 class="mt-3 d-inline align-middle">Index Kepuasan Masyarakat</h3>
                        </div>
                        <div class="card-body card-block">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">#</th>
                                            <th style="text-align: center;">Tahun</th>
                                            <th style="text-align: center;">Nilai</th>
                                            <th style="text-align: center;">Predikat</th>
                                            <th style="text-align: center;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kepuasan as $row)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: left;">{{ $row->tahun }}</td>
                                            <td style="text-align: left;">{{ $row->nilai }}</td>
                                            <td style="text-align: left;">{{ $row->predikat }}</td>
                                            <td>
                                                <a href="{{ route('admin.kepuasan.edit', $row->tahun) }}" class="btn btn-block btn-sm btn-primary"><i class="fa-solid fa-pen"></i></a>
                                                <form action="{{ route('admin.kepuasan.destroy', $row->tahun) }}" method="post" class="d-inline">
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