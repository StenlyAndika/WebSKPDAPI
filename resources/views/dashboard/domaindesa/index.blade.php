@extends('layout.admin')

@section('container')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.domaindesa.create') }}" class="d-inline align-middle btn btn-sm btn-success mb-2"><i class="fa-solid fa-plus"></i></a>
                            <h3 class="mt-3 d-inline align-middle">Domain Desa Kota Sungai Penuh</h3>
                        </div>
                        <div class="card-body card-block">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">#</th>
                                            <th style="text-align: center;">Nama Desa</th>
                                            <th style="text-align: center;">Kecamatan</th>
                                            <th style="text-align: center;">Domain</th>
                                            <th style="text-align: center;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($domaindesa as $row)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: left;">{{ $row->nama }}</td>
                                            <td style="text-align: left;">{{ $row->kecamatan }}</td>
                                            <td style="text-align: left;">
                                            @if ($row->status == 1)
                                                <form action="{{ route('admin.domaindesa.status', $row->id) }}" method="post" class="d-inline">
                                                    @method('patch')
                                                    @csrf
                                                    <button type="submit" class="btn btn-block btn-sm btn-success">Online</button>
                                                </form>
                                                <a target="_blank" href="{{ $row->domain }}">{{ $row->domain }}</a>
                                            @else
                                                <form action="{{ route('admin.domaindesa.status', $row->id) }}" method="post" class="d-inline">
                                                    @method('patch')
                                                    @csrf
                                                    <button type="submit" class="btn btn-block btn-sm btn-danger">Offline</button>
                                                </form>
                                                <a target="_blank" href="{{ $row->domain }}">{{ $row->domain }}</a>
                                            @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.domaindesa.edit', $row->id) }}" class="btn btn-block btn-sm btn-primary"><i class="fa-solid fa-pen"></i></a>
                                                <form action="{{ route('admin.domaindesa.destroy', $row->id) }}" method="post" class="d-inline">
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