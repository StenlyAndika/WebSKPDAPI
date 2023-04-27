<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">
        <div class="navbar-brand">
            <a aria-label="home" href="{{ route('home') }}"><img src="/img/logo.webp" alt="" class="img-fluid"></a>
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                @can('admin')
                    <li><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                @endcan
                <li><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                <li><a class="nav-link" href="{{ route('berita') }}">Berita</a></li>
                <li class="dropdown"><a href="#">Profil <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('sejarah') }}">Sejarah Kota Sungai Penuh</a></li>
                        <li><a href="{{ route('pendidikan') }}">Pusat Pendidikan</a></li>
                        <li><a href="{{ route('kesehatan') }}">Layanan Kesehatan</a></li>
                        <li><a href="{{ route('keuangan') }}">Perbankan dan Layanan Keuangan</a></li>
                        <li><a href="{{ route('perbelanjaan') }}">Pusat Perbelanjaan</a></li>
                        <li><a href="{{ route('hotel') }}">Hotel</a></li>
                        <li><a href="{{ route('wisata') }}">Tempat Wisata</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">Galeri <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('foto') }}">Foto</a></li>
                        <li><a href="{{ route('video') }}">Video</a></li>
                        <li><a href="{{ route('penghargaan') }}">Penghargaan</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">Publikasi <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('anggaran') }}">Transparansi Anggaran</a></li>
                        <li><a href="{{ route('dokumen') }}">Dokumen Publik</a></li>
                        <li><a href="http://jdih.sungaipenuhkota.go.id/" target="_blank">Peraturan</a></li>
                        <li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">Situs <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('skpd') }}">Web SKPD</a></li>
                        <li><a href="{{ route('desa') }}">Web Desa</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="#kontakkami">Kontak Kami</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <div class="wave" id="wave1" style="--i:1;"></div>
        <div class="wave" id="wave2" style="--i:2;"></div>
        <div class="wave" id="wave3" style="--i:3;"></div>
        <div class="wave" id="wave4" style="--i:4;"></div>
    </div>
</header>