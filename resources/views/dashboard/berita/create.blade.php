@extends('layout.admin')

@section('container')
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h1 class="mt-3">Form Berita</h1>
					</div>
					<div class="card-body card-block">            
                        <form method="post" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul" name="judul" value="{{ old('judul') }}">
                                <label for="judul">Judul</label>
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="slug" name="slug" value="{{ old('slug') }}" readonly>
                                <label for="slug">Judul</label>
                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-1">
                                <input type="hidden" id="isi" name="isi" value="{{ old('isi') }}">
                                <trix-editor input="isi"></trix-editor>
                            </div>
                            <div class="form-group mb-1">
                                <input type="file" id="gambar" class="form-control @error('gambar') is-invalid @enderror" name="gambar" onchange="previewImage()">
                                @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <img class="img-preview img-fluid col-lg-8 mt-2">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a class="btn btn-sm btn-success" href="{{ route('admin.berita.index') }}">Kembali</a>
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
        
        let timer, timeoutVal = 500;
        judul.addEventListener('keyup', function(e) {
            window.clearTimeout(timer);
            timer = window.setTimeout(() => {
                fetch('/admin/berita/checkSlug/' + judul.value)
                .then(response => response.json())
                .then(data => slugs.value = data.slug)
            }, timeoutVal);
        })

        function previewImage() {
            const image = document.querySelector('#gambar');
            const imagePreview = document.querySelector('.img-preview');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection