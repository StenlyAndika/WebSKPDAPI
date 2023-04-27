@extends('layout.admin')

@section('container')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.domainskpd.create') }}" class="d-inline align-middle btn btn-sm btn-success mb-2"><i class="bi bi-plus-lg"></i></a>
                            <h3 class="mt-3 d-inline align-middle">Domain SOPD Kota Sungai Penuh</h3>
                        </div>
                        <div class="card-body card-block">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">#</th>
                                            <th style="text-align: center;">SOPD Pengelola</th>
                                            <th style="text-align: center;">Domain</th>
                                            <th style="text-align: center;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($domainskpd as $row)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: left;">{{ $row->nama }}</td>
                                            <td style="text-align: left;">
                                            @if ($row->status == 1)
                                                <form action="{{ route('admin.domainskpd.status', $row->id) }}" method="post" class="d-inline">
                                                    @method('patch')
                                                    @csrf
                                                    <button type="submit" class="btn btn-block btn-sm btn-success">Online</button>
                                                </form>
                                                <a target="_blank" href="{{ $row->domain }}">{{ $row->domain }}</a>
                                            @else
                                                <form action="{{ route('admin.domainskpd.status', $row->id) }}" method="post" class="d-inline">
                                                    @method('patch')
                                                    @csrf
                                                    <button type="submit" class="btn btn-block btn-sm btn-danger">Offline</button>
                                                </form>
                                                <a target="_blank" href="{{ $row->domain }}">{{ $row->domain }}</a>
                                            @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.domainskpd.edit', $row->id) }}" class="btn btn-block btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                <form action="{{ route('admin.domainskpd.destroy', $row->id) }}" method="post" class="d-inline">
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