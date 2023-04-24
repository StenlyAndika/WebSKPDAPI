@extends('layout.admin')

@section('container')
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h1 class="mt-3">Form Domain Desa</h1>
					</div>
					<div class="card-body card-block">            
                        <form method="post" action="{{ route('admin.domainskpd.update', $domainskpd->id) }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="nama" value="{{ $domainskpd->nama }}">
                                <label for="nama">Nama Desa</label>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" placeholder="kecamatan" value="{{ $domainskpd->kecamatan }}">
                                <label for="kecamatan">Kecamatan</label>
                                @error('kecamatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('domain') is-invalid @enderror" id="domain" name="domain" placeholder="domain" value="{{ $domainskpd->domain }}">
                                <label for="domain">Domain</label>
                                @error('domain')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a class="btn btn-sm btn-success" href="{{ route('admin.domainskpd.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection