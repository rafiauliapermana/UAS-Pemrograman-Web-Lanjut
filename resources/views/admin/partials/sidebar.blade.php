<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Go-Emplyees
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('adminIndex') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Admin</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('instansiIndex') }}">
            <i class="fas fa-fw fa-landmark"></i>
            <span>Instansi</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('penerimaanIndex') }}">
            <i class="fas fa-fw fa-print"></i>
            <span>Penerimaan</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('berkasIndex') }}">
            <i class="fas fa-fw fa-file-pdf"></i>
            <span>Berkas</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>