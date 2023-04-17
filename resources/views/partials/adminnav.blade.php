<div class="nav-bar">
    <h1 class="">
        <a href="/"><img style=" width: 220px;" src="/img/logo.webp"></a>
    </h1>
    <ul class="nav">
        <li class="list {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard">
                <span class="icon"><i class="fa-solid fa-house"></i></span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li class="list {{ Request::is('/berita*') ? 'active' : '' }}">
            <a href="/berita">
                <span class="icon"><i class="fa-solid fa-newspaper"></i></span>
                <span class="title">Berita</span>
            </a>
        </li>
        <li class="list {{ Request::is('/pengumuman*') ? 'active' : '' }}">
            <a href="/pengumuman">
                <span class="icon"><i class="fa-solid fa-bullhorn"></i></span>
                <span class="title">Pengumuman</span>
            </a>
        </li>
        <li class="list {{ Request::is('/anggaran*') ? 'active' : '' }}">
            <a href="/anggaran">
                <span class="icon"><i class="fa-solid fa-folder-open"></i></span>
                <span class="title">Transparansi</span>
            </a>
        </li>
        <li class="list {{ Request::is('/dokumen*') ? 'active' : '' }}">
            <a href="/dokumen">
                <span class="icon"><i class="fa-solid fa-folder-open"></i></span>
                <span class="title">Dokumen Publik</span>
            </a>
        </li>
        <li class="list {{ Request::is('/foto*') ? 'active' : '' }}">
            <a href="/foto">
                <span class="icon"><i class="fa-solid fa-camera-retro"></i></span>
                <span class="title">Foto</span>
            </a>
        </li>
        <li class="list {{ Request::is('/penghargaan*') ? 'active' : '' }}">
            <a href="/penghargaan">
                <span class="icon"><i class="fa-solid fa-thumbs-up"></i></span>
                <span class="title">Penghargaan</span>
            </a>
        </li>
        <li class="list {{ Request::is('/domain*') ? 'active' : '' }}">
            <a href="/domain">
                <span class="icon"><i class="fa-solid fa-link"></i></span>
                <span class="title">Domain SKPD</span>
            </a>
        </li>
        <li class="list {{ Request::is('/webdesa*') ? 'active' : '' }}">
            <a href="/webdesa">
                <span class="icon"><i class="fa-solid fa-home"></i></span>
                <span class="title">Domain Desa</span>
            </a>
        </li>
        <li class="list {{ Request::is('/agenda*') ? 'active' : '' }}">
            <a href="/agenda">
                <span class="icon"><i class="fa-solid fa-calendar"></i></span>
                <span class="title">Agenda Kota</span>
            </a>
        </li>
        <li class="list {{ Request::is('/services*') ? 'active' : '' }}">
            <a href="/services">
                <span class="icon"><i class="fa-solid fa-hands-asl-interpreting"></i></span>
                <span class="title">Smart Services</span>
            </a>
        </li>
        <li class="list {{ Request::is('/kepuasan*') ? 'active' : '' }}">
            <a href="/kepuasan">
                <span class="icon"><i class="fa-solid fa-square-poll-vertical"></i></span>
                <span class="title">Index Kepuasan (IKM)</span>
            </a>
        </li>
        <li class="list {{ Request::is('/admin*') ? 'active' : '' }}">
            <a href="/admin">
                <span class="icon"><i class="fa-solid fa-user"></i></span>
                <span class="title">Data Admin</span>
            </a>
        </li>
    </ul>
</div>