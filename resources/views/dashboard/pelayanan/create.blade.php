@extends('layout.admin')

@section('container')
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h1 class="mt-3">Standar Pelayanan</h1>
					</div>
					<div class="card-body card-block">            
                        <form method="post" action="{{ route('admin.pelayanan.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="Jenis" name="jenis" value="{{ old('jenis') }}">
                                <label for="jenis">Jenis Layanan</label>
                                @error('jenis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-1">
                                <label for="standar">Standar Pelayanan</label>
                                <input type="hidden" id="standar" name="standar" value="{{ old('standar') }}">
                                <trix-editor input="standar"></trix-editor>
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
                                <a class="btn btn-sm btn-success" href="{{ route('admin.pelayanan.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    <script>
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