@extends('layout.admin')

@section('container')
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h1 class="mt-3">Form Agenda Kegiatan</h1>
					</div>
					<div class="card-body card-block">            
                        <form method="post" action="{{ route('admin.agenda.update', $agenda->id) }}">
                            @method('put')
                            @csrf
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('tgl') is-invalid @enderror" id="tgl" name="tgl" placeholder="tgl" value="{{ $agenda->tgl }}">
                                <label for="tgl">Tanggal</label>
                                @error('tgl')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('jam') is-invalid @enderror" id="jam" name="jam" placeholder="jam" value="{{ $agenda->jam }}">
                                <label for="jam">Jam</label>
                                @error('jam')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('kegiatan') is-invalid @enderror" id="kegiatan" name="kegiatan" placeholder="kegiatan" value="{{ $agenda->kegiatan }}">
                                <label for="kegiatan">Kegiatan</label>
                                @error('kegiatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" placeholder="lokasi" value="{{ $agenda->lokasi }}">
                                <label for="lokasi">Lokasi</label>
                                @error('lokasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a class="btn btn-sm btn-success" href="{{ route('admin.agenda.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection