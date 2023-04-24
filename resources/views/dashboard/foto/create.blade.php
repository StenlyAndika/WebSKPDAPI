@extends('layout.admin')

@section('container')
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h1 class="mt-3">Form Foto</h1>
					</div>
					<div class="card-body card-block">            
                        <form method="post" action="{{ route('admin.foto.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('kegiatan') is-invalid @enderror" id="kegiatan" name="kegiatan" placeholder="kegiatan" value="{{ old('kegiatan') }}">
                                <label for="kegiatan">Nama Kegiatan</label>
                                @error('kegiatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-1">
                                <input type="file" id="namafile" class="form-control @error('namafile') is-invalid @enderror" name="namafile[]" multiple>
                                @error('namafile')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a class="btn btn-sm btn-success" href="{{ route('admin.foto.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection