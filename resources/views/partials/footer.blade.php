<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-info">
                    <a aria-label="home" href="/"><img src="@if ($profil) {{ asset('storage/'.$profil->logo) }} @else /img/tablogo.webp @endif" alt="" class="img-fluid" width="150px"></a>
                    <p>
                        Website resmi @if ($profil) {{ $profil->nama }} @else Instansi @endif.<br>
                        Menyediakan seputar informasi dalam pemerintahan kota sungai penuh.
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Link Terkait</h4>
                    <ul>
                        <li><a href="http://sungaipenuhkota.go.id">Website Kota Sungai Penuh</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Tentang Kami</h4>
                    <p>
                        @if ($profil) {{ $profil->alamat }} @else Instansi @endif
                    </p>

                    <div class="social-links">
                        <a aria-label="mail" href="https://mail.google.com/mail/?view=cm&fs=1&to=@if ($profil) {{ $profil->email }} @else Instansi @endif" target="_blank" class="email"><i class="bi bi-envelope-fill"></i></a>
                        <a aria-label="facebook" href="@if ($profil) {{ $profil->fb }} @else Instansi @endif" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a aria-label="twitter" href="@if ($profil) {{ $profil->tw }} @else Instansi @endif" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a aria-label="instagram" href="@if ($profil) {{ $profil->ig }} @else Instansi @endif" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter" id="kontakkami">
                    <h4>Kontak Kami</h4>
                    <form action="{{ route('kontak') }}" method="post" id="kontakweb">
                        @csrf
                        <input type="text" class="form-control mb-1" name="nama" value="{{ old('nama') }}" placeholder="Nama Anda">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" class="form-control mb-1" name="wa" value="{{ old('wa') }}" placeholder="Nomor Telp/WA">
                        @error('wa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" class="form-control mb-1" name="email" value="{{ old('email') }}" placeholder="Email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <textarea name="pesan" class="form-control mb-1" rows="4" aria-label="Pesan">
                            {{ old('pesan') }}
                        </textarea>
                        @error('pesan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <button class="btn btn-md btn-light text-danger fw-bold">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            <a class="text-white" href="{{ route('login') }}">&copy;</a> Copyright <strong>Dinas Komunikasi Informatika & Statistik Kota Sungai Penuh</strong>. All Rights Reserved
        </div>
    <div class="credits">
        Developed by <a href="https://github.com/stenlyandika" target="_blank">Tenaga Ahli Programmer 2022-2023</a>
    </div>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>