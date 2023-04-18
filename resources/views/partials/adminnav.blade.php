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
            <a href="/admin/pengumuman">
                <span class="icon"><i class="fa-solid fa-bullhorn"></i></span>
                <span class="title">Pengumuman</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin//anggaran*') ? 'active' : '' }}">
            <a href="/admin/anggaran">
                <span class="icon"><i class="fa-solid fa-folder-open"></i></span>
                <span class="title">Transparansi</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/dokumen*') ? 'active' : '' }}">
            <a href="/admin/dokumen">
                <span class="icon"><i class="fa-solid fa-folder-open"></i></span>
                <span class="title">Dokumen Publik</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/foto*') ? 'active' : '' }}">
            <a href="/admin/foto">
                <span class="icon"><i class="fa-solid fa-camera-retro"></i></span>
                <span class="title">Foto</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/penghargaan*') ? 'active' : '' }}">
            <a href="/admin/penghargaan">
                <span class="icon"><i class="fa-solid fa-thumbs-up"></i></span>
                <span class="title">Penghargaan</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/domain*') ? 'active' : '' }}">
            <a href="/admin/domain">
                <span class="icon"><i class="fa-solid fa-link"></i></span>
                <span class="title">Domain SKPD</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/webdesa*') ? 'active' : '' }}">
            <a href="/admin/webdesa">
                <span class="icon"><i class="fa-solid fa-home"></i></span>
                <span class="title">Domain Desa</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/agenda*') ? 'active' : '' }}">
            <a href="/admin/agenda">
                <span class="icon"><i class="fa-solid fa-calendar"></i></span>
                <span class="title">Agenda Kota</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/services*') ? 'active' : '' }}">
            <a href="/admin/services">
                <span class="icon"><i class="fa-solid fa-hands-asl-interpreting"></i></span>
                <span class="title">Smart Services</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/kepuasan*') ? 'active' : '' }}">
            <a href="/admin/kepuasan">
                <span class="icon"><i class="fa-solid fa-square-poll-vertical"></i></span>
                <span class="title">Index Kepuasan (IKM)</span>
            </a>
        </li>
        @can('root')
            <li class="list {{ Request::is('admin/user*') ? 'active' : '' }}">
                <a href="/admin/user">
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
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Welcome back, {{ auth()->user()->nama }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>