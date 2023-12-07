<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PT SKI</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ strstr(Route::current()->getName(), 'dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item {{ strstr(Route::current()->getName(), 'barang') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('barang.index') }}">
            <i class="fas fa-fw fa-box"></i>
            <span>Daftar Barang</span>
        </a>
    </li>
    <li class="nav-item {{ strstr(Route::current()->getName(), 'suplier') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('suplier.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Daftar Suplier</span>
        </a>
    </li>
    <li class="nav-item {{ strstr(Route::current()->getName(), 'pembelian') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pembelian.index') }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Daftar Pembelian</span>
        </a>
    </li>
    <li class="nav-item {{ strstr(Route::current()->getName(), 'stock') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('stock') }}">
            <i class="fas fa-fw fa-layer-group"></i>
            <span>Daftar Stock</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>