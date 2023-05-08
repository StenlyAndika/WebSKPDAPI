<header id="header" class="fixed-top d-flex align-items-center menu-bar">
    <div class="container d-flex justify-content-between">
        <div class="toggle">
            <i class="bi bi-list"></i>
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}" target="_blank">Preview Website</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Selamat datang kembali, {{ auth()->user()->nama }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>

<div class="nav-bar">
    <ul class="nav">
        <li class="list {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <span class="icon"><i class="bi bi-house"></i></span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/berita*') ? 'active' : '' }}">
            <a href="{{ route('admin.berita.index') }}">
                <span class="icon"><i class="bi bi-newspaper"></i></span>
                <span class="title">Berita</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/pengumuman*') ? 'active' : '' }}">
            <a href="{{ route('admin.pengumuman.index') }}">
                <span class="icon"><i class="bi bi-megaphone"></i></span>
                <span class="title">Pengumuman</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/anggaran*') ? 'active' : '' }}">
            <a href="{{ route('admin.anggaran.index') }}">
                <span class="icon"><i class="bi bi-card-checklist"></i></span>
                <span class="title">Transparansi</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/dokumen*') ? 'active' : '' }}">
            <a href="{{ route('admin.dokumen.index') }}">
                <span class="icon"><i class="bi bi-card-checklist"></i></span>
                <span class="title">Dokumen Publik</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/foto*') ? 'active' : '' }}">
            <a href="{{ route('admin.foto.index') }}">
                <span class="icon"><i class="bi bi-camera"></i></span>
                <span class="title">Foto</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/penghargaan*') ? 'active' : '' }}">
            <a href="{{ route('admin.penghargaan.index') }}">
                <span class="icon"><i class="bi bi-hand-thumbs-up"></i></span>
                <span class="title">Penghargaan</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/domain-skpd*') ? 'active' : '' }}">
            <a href="{{ route('admin.domainskpd.index') }}">
                <span class="icon"><i class="bi bi-link"></i></span>
                <span class="title">Domain SKPD</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/domain-desa*') ? 'active' : '' }}">
            <a href="{{ route('admin.domaindesa.index') }}">
                <span class="icon"><i class="bi bi-link"></i></span>
                <span class="title">Domain Desa</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/agenda*') ? 'active' : '' }}">
            <a href="{{ route('admin.agenda.index') }}">
                <span class="icon"><i class="bi bi-calendar"></i></span>
                <span class="title">Agenda Kota</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/wisata*') ? 'active' : '' }}">
            <a href="{{ route('admin.wisata.index') }}">
                <span class="icon"><i class="bi bi-map"></i></span>
                <span class="title">Destinasi Wisata</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/kepuasan*') ? 'active' : '' }}">
            <a href="{{ route('admin.kepuasan.index') }}">
                <span class="icon"><i class="bi bi-clipboard-data"></i></span>
                <span class="title">Index Kepuasan (IKM)</span>
            </a>
        </li>
        @can('root')
            <li class="list {{ Request::is('admin/service*') ? 'active' : '' }}">
                <a href="{{ route('admin.service.index') }}">
                    <span class="icon"><i class="bi bi-building-gear"></i></span>
                    <span class="title">Smart Services</span>
                </a>
            </li>
            <li class="list {{ Request::is('admin/user*') ? 'active' : '' }}">
                <a href="{{ route('admin.user.index') }}">
                    <span class="icon"><i class="bi bi-person-circle"></i></span>
                    <span class="title">Data User</span>
                </a>
            </li>
        @endcan
    </ul>
</div>

