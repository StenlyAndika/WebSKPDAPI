@extends('layout.admin')

@section('container')
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h1 class="mt-3">Form Smart Service</h1>
					</div>
					<div class="card-body card-block">            
                        <form method="post" action="{{ route('admin.service.update', $service->id) }}">
                            @method('put')
                            @csrf
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="nama" value="{{ $service->nama }}">
                                <label for="nama">Nama</label>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('ket') is-invalid @enderror" id="ket" name="ket" placeholder="ket" value="{{ $service->ket }}">
                                <label for="ket">Keterangan</label>
                                @error('ket')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" placeholder="link" value="{{ $service->link }}">
                                <label for="link">Link</label>
                                @error('link')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a class="btn btn-sm btn-success" href="{{ route('admin.service.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection