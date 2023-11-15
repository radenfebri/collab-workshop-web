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
                @else
                    <li class="nav-item {{ request()->is('user') ? 'active' : ''}}">
                        <a href="{{ route('user') }}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                @endif


            </ul>
        </div>
    </div>
</div>