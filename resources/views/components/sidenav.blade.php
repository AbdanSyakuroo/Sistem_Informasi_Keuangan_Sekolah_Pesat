<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant & Professional Sidebar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    /* CSS Variables for a more refined color palette */
    :root {
        --sidebar-bg: #FFFFFF;
        --sidebar-text-color: #6B7280;
        --sidebar-text-active: #1F2937;
        --accent-color: #4A90E2; /* A slightly softer blue */
        --divider-color: #E5E7EB;
        --hover-bg: #F9FAFB;
        --active-bg: #EAF5FF; /* A subtle, light blue */
        --danger-color: #E24A4A; /* A refined red */
        --danger-hover-bg: #FFF5F5;
        --sidebar-width: 270px;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: #F4F6F8; /* A very light gray background */
        margin: 0;
    }

    /* Sidebar Wrapper */
    .sidebar-nav-wrapper {
        width: var(--sidebar-width);
        height: 100vh;
        background-color: var(--sidebar-bg);
        padding: 2rem 1.5rem;
        border-right: 1px solid var(--divider-color);
        display: flex;
        flex-direction: column;
        position: fixed;
        top: 0;
        left: 0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05),
                    0 1px 3px rgba(0, 0, 0, 0.025);
    }

    /* Logo Section */
    .navbar-logo {
        padding: 0 0.5rem;
        margin-bottom: 2.5rem;
        opacity: 0;
        animation: fadeInUp 0.5s 0.1s ease forwards;
    }
    
    /* Navigation Lists */
    .sidebar-nav ul {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }

    .sidebar-nav .main-nav {
        flex-grow: 1;
    }

    /* Navigation Links */
    .sidebar-nav .nav-item {
        margin-bottom: 0.5rem;
        opacity: 0;
        animation: fadeInUp 0.5s ease forwards;
    }

    .sidebar-nav .nav-item > a {
        display: flex;
        align-items: center;
        padding: 0.8rem 1rem;
        color: var(--sidebar-text-color);
        text-decoration: none;
        border-radius: 8px;
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.25s ease;
    }

    .sidebar-nav .icon {
        margin-right: 1rem;
        display: inline-flex;
        font-size: 1.25rem;
        color: var(--sidebar-text-color); /* ← default abu-abu */
        transition: color 0.25s ease-in-out;
        width: 24px;
        height: 24px;
    }
    
    .sidebar-nav .text {
        white-space: nowrap;
    }
    
    /* Hover State */
    .sidebar-nav .nav-item:not(.active) > a:hover {
        background-color: var(--hover-bg);
        color: var(--sidebar-text-active);
        transform: translateX(3px);
    }
    
    .sidebar-nav .nav-item:not(.active) > a:hover .icon {
        color: var(--sidebar-text-active);
    }

    /* Active State */
    .sidebar-nav .nav-item.active > a {
        background-color: var(--active-bg);
        color: var(--accent-color);
        font-weight: 600;
        border-left: 4px solid var(--accent-color);
        padding-left: calc(1rem - 4px);
    }
    
    .sidebar-nav .nav-item.active > a .icon {
        color: var(--accent-color);
    }

    /* Dropdown Arrow */
    .nav-item-has-children > a::after {
        content: '\203A'; 
        font-size: 1.2rem;
        line-height: 1;
        margin-left: auto;
        transition: transform 0.3s ease;
        transform: rotate(0deg);
        color: var(--sidebar-text-color);
    }

    .nav-item-has-children > a[aria-expanded="true"]::after {
        transform: rotate(90deg);
        color: var(--accent-color);
    }

    /* Dropdown Menu */
    .dropdown-nav {
        padding-left: 2.2rem;
        margin-top: 0.4rem;
        margin-left: 0.5rem;
        opacity: 0;
        max-height: 0;
        overflow: hidden;
        transition: all 0.3s ease-out;
        border-left: 1px solid var(--divider-color);
    }

    .dropdown-nav.show {
        opacity: 1;
        max-height: 500px;
    }

    .dropdown-nav li {
        margin-bottom: 0.25rem;
    }

    .dropdown-nav li a {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        color: var(--sidebar-text-color);
        text-decoration: none;
        border-radius: 6px;
        transition: color 0.2s ease;
    }

    .dropdown-nav li a .icon {
        margin-right: 0.75rem;
        font-size: 1.1rem;
        color: var(--sidebar-text-color);
        transition: color 0.25s ease-in-out;
    }

    .dropdown-nav a:hover {
        color: var(--sidebar-text-active);
    }

    .dropdown-nav a:hover .icon {
        color: var(--sidebar-text-active);
    }

    .dropdown-nav a.active {
        color: var(--accent-color);
        font-weight: 600;
    }

    .dropdown-nav a.active .icon {
        color: var(--accent-color);
    }

    /* Logout Section */
    .logout-nav {
        border-top: 1px solid var(--divider-color);
        padding-top: 1.5rem;
        margin-top: auto;
        animation-delay: 1s !important;
    }

    .nav-item-logout a:hover {
        background-color: var(--danger-hover-bg);
        color: var(--danger-color);
        transform: translateX(3px);
    }

    .nav-item-logout a:hover .icon {
        color: var(--danger-color);
    }
    
    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .sidebar-nav .main-nav > .nav-item {
        animation-delay: calc(var(--item-index) * 0.1s + 0.2s);
    }

    .sidebar-nav .main-nav .nav-item:nth-child(1) { --item-index: 1; }
    .sidebar-nav .main-nav .nav-item:nth-child(2) { --item-index: 2; }
    .sidebar-nav .main-nav .nav-item:nth-child(3) { --item-index: 3; }
    .sidebar-nav .main-nav .nav-item:nth-child(4) { --item-index: 4; }
    .sidebar-nav .main-nav .nav-item:nth-child(5) { --item-index: 5; }
    .sidebar-nav .main-nav .nav-item:nth-child(6) { --item-index: 6; }
</style>


</head>

<body>
    <aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
            <a href="{{ url('dashboard') }}">
                <img src="{{ asset('img/pesat.png') }}" alt="Logo" style="height: 50px; width: auto;">
            </a>
        </div>

        <nav class="sidebar-nav">
            <ul class="main-nav">
                {{-- Dashboard --}}
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ url('dashboard') }}">
                        <span class="icon"><i data-lucide="layout-grid"></i></span>
                        <span class="text">Dashboard</span>
                    </a>
                </li>

                {{-- Sumber Dana --}}
                @php
                $sumberdana_active = Request::is('sumber_dana*') || Request::is('penerimaan-sumber-dana');
                @endphp
                <li class="nav-item nav-item-has-children {{ $sumberdana_active ? 'active' : '' }}">
                    <a href="#ddmenu_sumberdana" data-bs-toggle="collapse"
                        aria-expanded="{{ $sumberdana_active ? 'true' : 'false' }}">
                        <span class="icon"><i data-lucide="piggy-bank"></i></span>
                        <span class="text">Sumber Dana</span>
                    </a>
                    <ul id="ddmenu_sumberdana" class="collapse dropdown-nav {{ $sumberdana_active ? 'show' : '' }}">
                        <li><a href="{{ url('sumber_dana') }}" class="{{ Request::is('sumber_dana') ? 'active' : '' }}">Jenis</a></li>
                        <li><a href="{{ url('penerimaan-sumber-dana') }}"
                                class="{{ Request::is('penerimaan-sumber-dana') ? 'active' : '' }}">Data Penerimaan</a></li>
                    </ul>
                </li>

                {{-- Penerimaan --}}
                <li class="nav-item {{ Request::is('penerimaans') ? 'active' : '' }}">
                    <a href="{{ url('penerimaans') }}">
                        <span class="icon"><i data-lucide="arrow-right-to-line"></i></span>
                        <span class="text">Penerimaan</span>
                    </a>
                </li>

                {{-- Kegiatan --}}
                <li class="nav-item {{ Request::is('kegiatans') ? 'active' : '' }}">
                    <a href="{{ url('kegiatans') }}">
                        <span class="icon"><i data-lucide="calendar-check"></i></span>
                        <span class="text">Kegiatan</span>
                    </a>
                </li>

                {{-- Pengeluaran --}}
                <li class="nav-item {{ Request::is('pengeluarans') ? 'active' : '' }}">
                    <a href="{{ url('pengeluarans') }}">
                        <span class="icon"><i data-lucide="arrow-left-from-line"></i></span>
                        <span class="text">Pengeluaran</span>
                    </a>
                </li>

                {{-- Laporan --}}
                @php
                $laporan_active = Request::is('laporan*') || Request::is('pengeluarans/filter');
                @endphp
                <li class="nav-item nav-item-has-children {{ $laporan_active ? 'active' : '' }}">
                    <a href="#ddmenu_laporan" data-bs-toggle="collapse"
                        aria-expanded="{{ $laporan_active ? 'true' : 'false' }}">
                        <span class="icon"><i data-lucide="scroll-text"></i></span>
                        <span class="text">Laporan</span>
                    </a>
                    <ul id="ddmenu_laporan" class="collapse dropdown-nav {{ $laporan_active ? 'show' : '' }}">
                        <li><a href="{{ url('laporan_realisasi') }}"
                                class="{{ Request::is('laporan_realisasi') ? 'active' : '' }}">Realisasi</a></li>
                        <li><a href="{{ url('laporan') }}" class="{{ Request::is('laporan') ? 'active' : '' }}">Keseluruhan</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="logout-nav">
                <li class="nav-item nav-item-logout">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="icon"><i data-lucide="log-out"></i></span>
                        <span class="text">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </aside>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>