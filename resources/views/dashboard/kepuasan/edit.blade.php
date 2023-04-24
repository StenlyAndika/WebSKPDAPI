@extends('layout.admin')

@section('container')
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h1 class="mt-3">Form Index Kepuasan Masyarakat</h1>
					</div>
					<div class="card-body card-block">            
                        <form method="post" action="{{ route('admin.kepuasan.update', $kepuasan->tahun) }}">
                            @method('put')
                            @csrf
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" placeholder="tahun" value="{{ $kepuasan->tahun }}">
                                <label for="tahun">Tahun</label>
                                @error('tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('nilai') is-invalid @enderror" id="nilai" name="nilai" placeholder="nilai" value="{{ $kepuasan->nilai }}">
                                <label for="nilai">Nilai</label>
                                @error('nilai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('predikat') is-invalid @enderror" id="predikat" name="predikat" placeholder="predikat" value="{{ $kepuasan->predikat }}">
                                <label for="predikat">Predikat</label>
                                @error('predikat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a class="btn btn-sm btn-success" href="{{ route('admin.kepuasan.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection