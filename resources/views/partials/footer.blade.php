<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-info">
                    <a aria-label="home" href="/"><img src="/img/tablogo.webp" alt="" class="img-fluid" width="150px"></a>
                    <p>
                        Website resmi pemerintah kota sungai penuh.<br>
                        Menyediakan seputar informasi dalam pemerintahan kota sungai penuh.
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Link Terkait</h4>
                    <ul>
                        <li><a href="http://lpse.sungaipenuhkota.go.id">LPSE Kota Sungai Penuh</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Tentang Kami</h4>
                    <p>
                        Jl. Gajah Mada No. 01<br>
                        Kota Sungai Penuh, Indonesia<br>
                        Telpon (0748) 323969<br>
                        Fax (0748) 324511<br>
                    </p>

                    <div class="social-links">
                        <a aria-label="mail" href="https://mail.google.com/mail/?view=cm&fs=1&to=diskominfo.sungaipenuhkota@gmail.com" target="_blank" class="email"><i class="bi bi-envelope-fill"></i></a>
                        <a aria-label="facebook" href="https://www.facebook.com/" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a aria-label="twitter" href="https://twitter.com/" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a aria-label="instagram" href="https://instagram.com/" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter" id="kontakkami">
                    <h4>Kontak Kami</h4>
                    <form action="{{ route('kontak') }}" method="post">
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
                        <button class="btn btn-md btn-light text-danger fw-bold" data-action='submit'>Kirim Pesan</button>
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