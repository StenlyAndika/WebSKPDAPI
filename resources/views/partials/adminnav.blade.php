<div class="nav-bar">
    <h1 class="">
        <a href="/"><img style=" width: 220px;" src="/img/logo.webp"></a>
    </h1>
    <ul class="nav">
        <li class="list {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <span class="icon"><i class="fa-solid fa-house"></i></span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/berita*') ? 'active' : '' }}">
            <a href="{{ route('admin.berita.index') }}">
                <span class="icon"><i class="fa-solid fa-newspaper"></i></span>
                <span class="title">Berita</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/pengumuman*') ? 'active' : '' }}">
            <a href="{{ route('admin.pengumuman.index') }}">
                <span class="icon"><i class="fa-solid fa-bullhorn"></i></span>
                <span class="title">Pengumuman</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/anggaran*') ? 'active' : '' }}">
            <a href="{{ route('admin.anggaran.index') }}">
                <span class="icon"><i class="fa-solid fa-folder-open"></i></span>
                <span class="title">Transparansi</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/dokumen*') ? 'active' : '' }}">
            <a href="{{ route('admin.dokumen.index') }}">
                <span class="icon"><i class="fa-solid fa-folder-open"></i></span>
                <span class="title">Dokumen Publik</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/foto*') ? 'active' : '' }}">
            <a href="{{ route('admin.foto.index') }}">
                <span class="icon"><i class="fa-solid fa-camera-retro"></i></span>
                <span class="title">Foto</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/penghargaan*') ? 'active' : '' }}">
            <a href="{{ route('admin.penghargaan.index') }}">
                <span class="icon"><i class="fa-solid fa-thumbs-up"></i></span>
                <span class="title">Penghargaan</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/domainskpd*') ? 'active' : '' }}">
            <a href="{{ route('admin.domainskpd.index') }}">
                <span class="icon"><i class="fa-solid fa-link"></i></span>
                <span class="title">Domain SKPD</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/domaindesa*') ? 'active' : '' }}">
            <a href="{{ route('admin.domaindesa.index') }}">
                <span class="icon"><i class="fa-solid fa-home"></i></span>
                <span class="title">Domain Desa</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/agenda*') ? 'active' : '' }}">
            <a href="{{ route('admin.agenda.index') }}">
                <span class="icon"><i class="fa-solid fa-calendar"></i></span>
                <span class="title">Agenda Kota</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/service*') ? 'active' : '' }}">
            <a href="{{ route('admin.service.index') }}">
                <span class="icon"><i class="fa-solid fa-hands-asl-interpreting"></i></span>
                <span class="title">Smart Services</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/kepuasan*') ? 'active' : '' }}">
            <a href="{{ route('admin.kepuasan.index') }}">
                <span class="icon"><i class="fa-solid fa-square-poll-vertical"></i></span>
                <span class="title">Index Kepuasan (IKM)</span>
            </a>
        </li>
        @can('root')
            <li class="list {{ Request::is('admin/user*') ? 'active' : '' }}">
                <a href="{{ route('admin.user.index') }}">
                    <span class="icon"><i class="fa-solid fa-user"></i></span>
                    <span class="title">Data User</span>
                </a>
            </li>
        @endcan
    </ul>
</div>

<nav class="menu-bar navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand toggle" href="#">
        <i class="fa-solid fa-bars"></i>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}" target="_blank">Preview Web</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome back, {{ auth()->user()->nama }}
                </a>
                <ul class="dropdown-menu">
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</nav>