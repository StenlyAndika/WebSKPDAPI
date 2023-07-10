@extends('layout.admin')

@section('container')
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h1 class="mt-3">Menu Informasi</h1>
					</div>
					<div class="card-body card-block">
                        @if ($informasi == null)
                            <form method="post" action="{{ route('admin.informasi.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('survey') is-invalid @enderror" id="survey" name="survey" placeholder="Link Survey" value="{{ old('survey') }}">
                                            <label for="survey">Link Survey Kepuasan Masyarakat</label>
                                            @error('survey')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-1">
                                            <label for="pengaduan">Alur Pengaduan (jpg, jpeg, png)</label>
                                            <input type="file" id="pengaduan" class="form-control @error('pengaduan') is-invalid @enderror" name="pengaduan" onchange="previewImage2()">
                                            @error('pengaduan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <img class="img-preview2 img-fluid col-lg-8 mt-2 w-50">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-1">
                                            <label for="maklumat">Maklumat Pelayanan (jpg, jpeg, png)</label>
                                            <input type="file" id="maklumat" class="form-control @error('maklumat') is-invalid @enderror" name="maklumat" onchange="previewImage()">
                                            @error('maklumat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <img class="img-preview img-fluid col-lg-8 mt-2 w-50">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-1">
                                            <label for="ikm">Indeks Kepuasan Masyarakat (jpg, jpeg, png)</label>
                                            <input type="file" id="ikm" class="form-control @error('ikm') is-invalid @enderror" name="ikm" onchange="previewImage3()">
                                            @error('ikm')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <img class="img-preview3 img-fluid col-lg-8 mt-2 w-50">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-1">
                                            <label for="pakta">Pakta Integritas (jpg, jpeg, png)</label>
                                            <input type="file" id="pakta" class="form-control @error('pakta') is-invalid @enderror" name="pakta" onchange="previewImage4()">
                                            @error('pakta')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <img class="img-preview4 img-fluid col-lg-8 mt-2 w-50">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-sm btn-success" href="{{ route('admin.informasi.index') }}">Kembali</a>
                                </div>
                            </form>
                        @else
                            <form method="post" action="{{ route('admin.informasi.update', $informasi->id) }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('survey') is-invalid @enderror" id="survey" name="survey" placeholder="Link Survey" value="{{ $informasi->survey }}">
                                            <label for="survey">Link Survey Kepuasan Masyarakat</label>
                                            @error('survey')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-1">
                                            <label for="pengaduan">Alur Pengaduan (jpg, jpeg, png)</label>
                                            <input type="file" id="pengaduan" class="form-control @error('pengaduan') is-invalid @enderror" name="pengaduan" onchange="previewImage2()">
                                            @error('pengaduan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <input type="hidden" name="oldImage2" value="{{ $informasi->pengaduan }}">
                                            @if ($informasi->pengaduan)
                                                <img class="img-preview2 img-fluid col-lg-8 mt-2 w-50" src="{{ asset('storage/'.$informasi->pengaduan) }}">
                                            @else
                                                <img class="img-preview2 img-fluid col-lg-8 mt-2 w-50">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-1">
                                            <label for="maklumat">Maklumat Pelayanan (jpg, jpeg, png)</label>
                                            <input type="file" id="maklumat" class="form-control @error('maklumat') is-invalid @enderror" name="maklumat" onchange="previewImage()">
                                            @error('maklumat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <input type="hidden" name="oldImage" value="{{ $informasi->maklumat }}">
                                            @if ($informasi->maklumat)
                                                <img class="img-preview img-fluid col-lg-8 mt-2 w-50" src="{{ asset('storage/'.$informasi->maklumat) }}">
                                            @else
                                                <img class="img-preview img-fluid col-lg-8 mt-2 w-50">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-1">
                                            <label for="ikm">Indeks Kepuasan Masyarakat (jpg, jpeg, png)</label>
                                            <input type="file" id="ikm" class="form-control @error('ikm') is-invalid @enderror" name="ikm" onchange="previewImage3()">
                                            @error('ikm')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <input type="hidden" name="oldImage3" value="{{ $informasi->ikm }}">
                                            @if ($informasi->ikm)
                                                <img class="img-preview3 img-fluid col-lg-8 mt-2 w-50" src="{{ asset('storage/'.$informasi->ikm) }}">
                                            @else
                                                <img class="img-preview3 img-fluid col-lg-8 mt-2 w-50">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-1">
                                            <label for="pakta">Pakta Integritas (jpg, jpeg, png)</label>
                                            <input type="file" id="pakta" class="form-control @error('pakta') is-invalid @enderror" name="pakta" onchange="previewImage4()">
                                            @error('pakta')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <input type="hidden" name="oldImage4" value="{{ $informasi->pakta }}">
                                            @if ($informasi->pakta)
                                                <img class="img-preview4 img-fluid col-lg-8 mt-2 w-50" src="{{ asset('storage/'.$informasi->pakta) }}">
                                            @else
                                                <img class="img-preview4 img-fluid col-lg-8 mt-2 w-50">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
                                    <a class="btn btn-md btn-success" href="{{ route('admin.informasi.index') }}">Kembali</a>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    <script>
        function previewImage() {
            const image = document.querySelector('#maklumat');
            const imagePreview = document.querySelector('.img-preview');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }

        function previewImage2() {
            const image = document.querySelector('#pengaduan');
            const imagePreview = document.querySelector('.img-preview2');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }

        function previewImage3() {
            const image = document.querySelector('#ikm');
            const imagePreview = document.querySelector('.img-preview3');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }

        function previewImage4() {
            const image = document.querySelector('#pakta');
            const imagePreview = document.querySelector('.img-preview4');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection