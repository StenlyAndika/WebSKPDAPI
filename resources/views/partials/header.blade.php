<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">
        <style>
            .stroke-single,
            .stroke-double {
                position: relative;
                background: transparent;
                z-index: 0;
                color: red;
                margin-left: 5px;
                font-family: "Mistral", sans-serif;
                font-weight: 500;
                color: #ff0000;
                font-size: 32px;
                position: relative;
                top: 8px;
            }
            /* add a single stroke */
            .stroke-single:before,
            .stroke-double:before {
                content: attr(title);
                position: absolute;
                -webkit-text-stroke: 0.11em #fff;
                left: 0;
                z-index: -1;
            }
            /* add a double stroke */
            .stroke-double:after {
                content: attr(title);
                position: absolute;
                -webkit-text-stroke: 0.25em #000;
                left: 0;
                z-index: -2;
            }
            .acidsb {
                font-family: "Arial Narrow", sans-serif;
                font-weight: bold;
                color: #00D4FF;
                font-size: 16px;
                font-style: italic;
                font-weight: bold;
                margin-left: 5px;
                position: relative;
                -webkit-text-stroke: 0.6px #080808 !important;
            }
        </style>
        <div class="navbar-brand">
            <table>
                <tr>
                    <td rowspan="2">
                        @if ($profil == null)
                            <a aria-label="home" href="{{ route('home') }}"><img src="/img/logo.webp" alt="" class="img-fluid"></a>
                        @else
                            <div style="width: 45px"><img src="/img/tablogo.webp" alt="logo" class="img-fluid"></div>
                        @endif
                    </td>
                    <td>
                        @if ($profil == null)
                            <h3 class="stroke-double" title="Instansi Pemerintah" style="text-align: left;">Instansi Pemerintah</h3>
                            <h5 class="acidsb" style="text-align: left;">Pemerintah Kota Sungai Penuh</h5>
                        @else
                            <h3 class="stroke-double" title="{{ $profil->nama }}" style="text-align: left;">{{ $profil->nama }}</h3>
                            <h5 class="acidsb" style="text-align: left;">Pemerintah Kota Sungai Penuh</h5>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                @can('admin')
                    <li><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                @endcan
                <li><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                <li class="dropdown"><a href="#">Profil <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('sejarah') }}">Sejarah</a></li>
                        <li><a href="{{ route('visimisi') }}">Visi & Misi</a></li>
                        <li><a href="{{ route('struktur') }}">Struktur Organisasi</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="{{ route('pelayanan') }}">Standar Pelayanan</a></li>
                <li class="dropdown"><a href="#">Galeri <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('foto') }}">Foto</a></li>
                        <li><a href="{{ route('penghargaan') }}">Penghargaan</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">Publikasi <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('anggaran') }}">Transparansi Anggaran</a></li>
                        <li><a href="{{ route('dokumen') }}">Dokumen Publik</a></li>
                        <li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="#kontakkami">Kontak Kami</a></li>
                @can('guest-only')
                    <li><a class="nav-link" href="{{ route('login') }}">Masuk</a></li>
                @endcan
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <div class="wave" id="wave1" style="--i:1;"></div>
        <div class="wave" id="wave2" style="--i:2;"></div>
        <div class="wave" id="wave3" style="--i:3;"></div>
        <div class="wave" id="wave4" style="--i:4;"></div>
    </div>
</header>