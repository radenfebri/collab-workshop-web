<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">

                @if (Auth::user()->role == 'Admin')
                    <li class="nav-item {{ request()->is('dashboard') ? 'active' : ''}}">
                        <a href="{{ route('dashboard') }}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    
                    <li class="nav-item {{ request()->is('kategori-buku','kategori-buku/*', 'buku','buku/*') ? 'active' : ''}}">
                        <a data-toggle="collapse" href="#base1">
                            <i class="fas fa-book"></i>
                            <p>Buku</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base1">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('kategori-buku.index') }}">
                                        <span class="sub-item">Kategori Buku</span>
                                    </a>
                                    <a href="{{ route('buku.index') }}">
                                        <span class="sub-item">Buku</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item {{ request()->is('pesanan', 'pesanan/*') ? 'active' : ''}}">
                        <a href="{{ route('pesanan.index') }}">
                            <i class="fa fa-cart-plus"></i>
                            <p>Pesanan Masuk</p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('metode-bayar', 'metode-bayar/*') ? 'active' : ''}}">
                        <a href="{{ route('metode-bayar.index') }}">
                            <i class="fa fa-money-bill"></i>
                            <p>Metode Bayar</p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('manajemen-user', 'manajemen-user/*') ? 'active' : ''}}">
                        <a href="{{ route('manajemen-user.index') }}">
                            <i class="fa fa-user"></i>
                            <p>Manajemen User</p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('manajemen-faq', 'manajemen-faq/*') ? 'active' : ''}}">
                        <a href="{{ route('manajemen-faq.index') }}">
                            <i class="fa fa-question-circle"></i>
                            <p>FAQ</p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('manajemen-about', 'manajemen-about/*') ? 'active' : ''}}">
                        <a href="{{ route('manajemen-about.index') }}">
                            <i class="fa fa-info-circle"></i>
                            <p>About</p>
                        </a>
                    </li>

                @else

                    <li class="nav-item {{ request()->is('user') ? 'active' : ''}}">
                        <a href="{{ route('user') }}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('histori-pesanan', 'histori-pesanan/*') ? 'active' : ''}}">
                        <a href="{{ route('histori-pesanan') }}">
                            <i class="fa fa-cart-plus"></i>
                            <p>Pesanan Saya</p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('faq', 'faq/*') ? 'active' : ''}}">
                        <a href="{{ route('faq') }}">
                            <i class="fa fa-question-circle"></i>
                            <p>FAQ</p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('about', 'about/*') ? 'active' : ''}}">
                        <a href="{{ route('about') }}">
                            <i class="fa fa-info-circle"></i>
                            <p>About</p>
                        </a>
                    </li>
                @endif


            </ul>
        </div>
    </div>
</div>