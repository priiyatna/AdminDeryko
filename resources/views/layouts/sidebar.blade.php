<ul class="navbar-nav bg-info sidebar sidebar-dark accordion mt-5" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">AdminDeryko</div>
    </a> -->

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Produk -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('produk') }}">
            <i class="fas fa-box"></i>
            <span>Produk</span>
        </a>
    </li>

    <!-- Nav Item - Transaksi -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('transaksi') }}">
            <i class="fas fa-dollar-sign"></i>
            <span>Transaksi</span>
        </a>
    </li>

    <!-- Nav Item - Admin -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-user-shield"></i>
            <span>Admin</span>
        </a>
    </li>

    <!-- Nav Item - Laporan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-file-alt"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('laporan_penjualan') }}">Laporan Penjualan</a>
                <a class="collapse-item" href="{{ route('laporan_stokbarang') }}">Laporan Stok Produk</a>
            </div>
        </div>
    </li>
</ul>
