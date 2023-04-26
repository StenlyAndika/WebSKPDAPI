@extends('layout.main')

@section('container')
    <section class="col-md-9 section page-title mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <h2 class="fw-bold mb-4" style="text-align: center;">Hotel<br>Kota Sungai Penuh</h2>
                    <div class="table-responsive">
                        <table class="table" style="text-align: left;">
                            <thead>
                                <tr class="table-primary">
                                <th scope="col">#</th>
                                <th scope="col">Nama Hotel</th>
                            </thead>
                            <tbody>
                                @foreach ($hotel as $row)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $row; }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection