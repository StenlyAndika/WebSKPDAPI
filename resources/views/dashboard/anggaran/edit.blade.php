@extends('layout.admin')

@section('container')
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h1 class="mt-3">Form Transparansi Anggaran</h1>
					</div>
					<div class="card-body card-block">            
                        <form method="post" action="{{ route('admin.anggaran.update', $anggaran->slug) }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{ $anggaran->keterangan }}">
                                <label for="keterangan">Keterangan</label>
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Slug" value="{{ $anggaran->slug }}" readonly>
                                <label for="slug">Slug</label>
                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-1">
                                <input type="file" id="namafile" class="form-control @error('namafile') is-invalid @enderror" name="namafile">
                                @error('namafile')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="hidden" name="oldFile" value="{{ $anggaran->namafile }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a class="btn btn-sm btn-success" href="{{ route('admin.anggaran.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    <script>
        const keterangan = document.querySelector('#keterangan');
        const slugs = document.querySelector('#slug');
        
        let timer, timeoutVal = 500;
        keterangan.addEventListener('keyup', function(e) {
            window.clearTimeout(timer);
            timer = window.setTimeout(() => {
                fetch('/admin/anggaran/checkSlug/' + keterangan.value)
                .then(response => response.json())
                .then(data => slugs.value = data.slug)
            }, timeoutVal);
        })

    </script>
@endsection