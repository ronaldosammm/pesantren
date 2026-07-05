<header class="navbar">
    <div class="container nav-wrapper">
        <div class="logo">
            <strong>MA'HAD ASKAR KAUNY</strong><br>
            <span>Darussholah Tangerang</span>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                </li>
                <li>
                    <a href="/aboutUs" class="{{ request()->is('aboutUs') ? 'active' : '' }}">Tentang Kami</a>
                </li>
                <li>
                    <a href="/program" class="{{ request()->is('program') ? 'active' : '' }}">Program</a>
                </li>
                <li>
                    <a href="/contact" class="{{ request()->is('contact') ? 'active' : '' }}">Kontak</a>
                </li>
                <li>
                    <a href="/pendaftaran" class="nav-cta {{ request()->is('pendaftaran') ? 'active' : '' }}">Daftar Sekarang</a>
                </li>
                <li>
                    <a href="/login" class="{{ request()->is('login') ? 'active' : '' }}">
                        Login
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>