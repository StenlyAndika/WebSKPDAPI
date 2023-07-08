@extends('layout.admin')

@section('container')
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h1 class="mt-3">Form Pengumuman</h1>
					</div>
					<div class="card-body card-block">            
                        <form method="post" action="{{ route('admin.pengumuman.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Judul" value="{{ old('judul') }}">
                                <label for="judul">Judul</label>
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Slug" value="{{ old('slug') }}" readonly>
                                <label for="judul">Slug</label>
                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-1">
                                <label for="namafile">File (pdf) / Gambar (jpg,jpeg,png)</label>
                                <input type="file" id="namafile" class="form-control @error('namafile') is-invalid @enderror" name="namafile">
                                @error('namafile')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a class="btn btn-sm btn-success" href="{{ route('admin.pengumuman.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    <script>
        const judul = document.querySelector('#judul');
        const slugs = document.querySelector('#slug');
        
        judul.addEventListener('change', function(e) {
            fetch('/admin/pengumuman/checkSlug/' + judul.value)
            .then(response => response.json())
            .then(data => slugs.value = data.slug)
        })
    </script>
@endsection