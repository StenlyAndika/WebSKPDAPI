@extends('layout.admin')

@section('container')
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h1 class="mt-3">Profil Instansi</h1>
					</div>
					<div class="card-body card-block">
                        @if ($profil == null)
                            <form method="post" action="{{ route('admin.profil.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama" value="{{ old('nama') }}">
                                            <label for="nama">Nama Instansi</label>
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('kepala') is-invalid @enderror" id="kepala" name="kepala" placeholder="Kepala" value="{{ old('kepala') }}">
                                            <label for="kepala">Nama Kepala Instansi</label>
                                            @error('kepala')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}">
                                            <label for="alamat">Alamat Instansi</label>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                            <label for="email">Email</label>
                                            @error('email')
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
                                            <label for="logo">Logo Instansi</label>
                                            <input type="file" id="logo" class="form-control @error('logo') is-invalid @enderror" name="logo" onchange="previewLogo()">
                                            @error('logo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <img class="img-preview-logo img-fluid col-lg-8 mt-2 w-50">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-1">
                                            <label for="kepala">Foto Kepala Instansi</label>
                                            <input type="file" id="fotokepala" class="form-control @error('fotokepala') is-invalid @enderror" name="fotokepala" onchange="previewKepala()">
                                            @error('fotokepala')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <img class="img-preview img-fluid col-lg-8 mt-2 w-50">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="sejarah">Sejarah Instansi</label>
                                    <input type="hidden" id="sejarah" name="sejarah" value="{{ old('sejarah') }}">
                                    <trix-editor input="sejarah"></trix-editor>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-2">
                                            <label for="visi">Visi</label>
                                            <input type="hidden" id="visi" name="visi" value="{{ old('visi') }}">
                                            <trix-editor input="visi"></trix-editor>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-2">
                                            <label for="misi">Misi</label>
                                            <input type="hidden" id="misi" name="misi" value="{{ old('misi') }}">
                                            <trix-editor input="misi"></trix-editor>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <label for="struktur">Gambar Struktur Organisasi</label>
                                    <input type="file" id="struktur" class="form-control @error('struktur') is-invalid @enderror" name="struktur" onchange="previewStruktur()">
                                    @error('struktur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <img class="img-preview-struktur img-fluid col-lg-8 mt-2 w-50">
                                </div>
                                <div class="form-group mb-1">
                                    <label for="tugas">Tugas dan Fungsi</label>
                                    <input type="hidden" id="tugas" name="tugas" value="{{ old('tugas') }}">
                                    <trix-editor input="tugas"></trix-editor>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('wa') is-invalid @enderror" id="wa" name="wa" placeholder="Wa" value="{{ old('wa') }}">
                                            <label for="wa">Nomor HP/WA</label>
                                            @error('wa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('fb') is-invalid @enderror" id="fb" name="fb" placeholder="Fb" value="{{ old('fb') }}">
                                            <label for="fb">Facebook</label>
                                            @error('fb')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('ig') is-invalid @enderror" id="ig" name="ig" placeholder="Ig" value="{{ old('ig') }}">
                                            <label for="ig">Instagram</label>
                                            @error('ig')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('tw') is-invalid @enderror" id="tw" name="tw" placeholder="Tw" value="{{ old('tw') }}">
                                            <label for="tw">Twitter</label>
                                            @error('tw')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('peta') is-invalid @enderror" id="peta" name="peta" placeholder="Peta" value="{{ old('peta') }}">
                                            <label for="peta">Peta Lokasi</label>
                                            @error('peta')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <a href="{{ route('admin.tutorial') }}" target="_blank" class="btn btn-md btn-success">Tutorial Pengambilan Lokasi</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-sm btn-success" href="{{ route('admin.profil.index') }}">Kembali</a>
                                </div>
                            </form>
                        @else
                            <form method="post" action="{{ route('admin.profil.update', $profil->id) }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama" value="{{ $profil->nama }}">
                                            <label for="nama">Nama Instansi</label>
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('kepala') is-invalid @enderror" id="kepala" name="kepala" placeholder="Kepala" value="{{ $profil->kepala }}">
                                            <label for="kepala">Nama Kepala Instansi</label>
                                            @error('kepala')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat" value="{{ $profil->alamat }}">
                                            <label for="alamat">Alamat Instansi</label>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $profil->email }}">
                                            <label for="email">Email</label>
                                            @error('email')
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
                                            <label for="logo">Logo Instansi</label>
                                            <input type="file" id="logo" class="form-control @error('logo') is-invalid @enderror" name="logo" onchange="previewLogo()">
                                            @error('logo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <input type="hidden" name="oldImage" value="{{ $profil->logo }}">
                                            @if ($profil->logo)
                                                <img class="img-preview-logo img-fluid col-lg-8 mt-2 w-50" src="{{ asset('storage/'.$profil->logo) }}">
                                            @else
                                                <img class="img-preview-logo img-fluid col-lg-8 mt-2 w-50">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-1">
                                            <label for="kepala">Foto Kepala Instansi</label>
                                            <input type="file" id="fotokepala" class="form-control @error('fotokepala') is-invalid @enderror" name="fotokepala" onchange="previewKepala()">
                                            @error('fotokepala')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <input type="hidden" name="oldImage" value="{{ $profil->fotokepala }}">
                                            @if ($profil->fotokepala)
                                                <img class="img-preview img-fluid col-lg-8 mt-2 w-50" src="{{ asset('storage/'.$profil->fotokepala) }}">
                                            @else
                                                <img class="img-preview img-fluid col-lg-8 mt-2 w-50">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="sejarah">Sejarah Instansi</label>
                                    <input type="hidden" id="sejarah" name="sejarah" value="{{ $profil->sejarah }}">
                                    <trix-editor input="sejarah"></trix-editor>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-2">
                                            <label for="visi">Visi</label>
                                            <input type="hidden" id="visi" name="visi" value="{{ $profil->visi }}">
                                            <trix-editor input="visi"></trix-editor>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-2">
                                            <label for="misi">Misi</label>
                                            <input type="hidden" id="misi" name="misi" value="{{ $profil->misi }}">
                                            <trix-editor input="misi"></trix-editor>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <label for="struktur">Gambar Struktur Organisasi</label>
                                    <input type="file" id="struktur" class="form-control @error('struktur') is-invalid @enderror" name="struktur" onchange="previewStruktur()">
                                    @error('struktur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input type="hidden" name="oldImage" value="{{ $profil->struktur }}">
                                    @if ($profil->struktur)
                                        <img class="img-preview-struktur img-fluid col-lg-8 mt-2 w-50" src="{{ asset('storage/'.$profil->struktur) }}">
                                    @else
                                        <img class="img-preview-struktur img-fluid col-lg-8 mt-2 w-50">
                                    @endif
                                </div>
                                <div class="form-group mb-1">
                                    <label for="tugas">Tugas dan Fungsi</label>
                                    <input type="hidden" id="tugas" name="tugas" value="{{ $profil->tugas }}">
                                    <trix-editor input="tugas"></trix-editor>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('wa') is-invalid @enderror" id="wa" name="wa" placeholder="Wa" value="{{ $profil->wa }}">
                                            <label for="wa">Nomor HP/WA</label>
                                            @error('wa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('fb') is-invalid @enderror" id="fb" name="fb" placeholder="Fb" value="{{ $profil->fb }}">
                                            <label for="fb">Facebook</label>
                                            @error('fb')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('ig') is-invalid @enderror" id="ig" name="ig" placeholder="Ig" value="{{ $profil->ig }}">
                                            <label for="ig">Instagram</label>
                                            @error('ig')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('tw') is-invalid @enderror" id="tw" name="tw" placeholder="Tw" value="{{ $profil->tw }}">
                                            <label for="tw">Twitter</label>
                                            @error('tw')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input type="text" class="form-control @error('peta') is-invalid @enderror" id="peta" name="peta" placeholder="Peta" value="{{ base64_decode($profil->peta) }}">
                                            <label for="peta">Peta Lokasi</label>
                                            @error('peta')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <style>
                                                iframe {
                                                    width: 100% !important;
                                                    max-height: 400px !important;
                                                }
                                            </style>
                                            <div class="card-body">
                                                {!! base64_decode($profil->peta) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <a href="{{ route('admin.tutorial') }}" target="_blank" class="btn btn-md btn-success">Tutorial Pengambilan Lokasi</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
                                    <a class="btn btn-md btn-success" href="{{ route('admin.profil.index') }}">Kembali</a>
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
        function previewKepala() {
            const image = document.querySelector('#fotokepala');
            const imagePreview = document.querySelector('.img-preview');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
        function previewStruktur() {
            const image = document.querySelector('#struktur');
            const imagePreview = document.querySelector('.img-preview-struktur');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
        function previewLogo() {
            const image = document.querySelector('#logo');
            const imagePreview = document.querySelector('.img-preview-logo');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection