<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion no-print" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Library App</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Data Master
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('book') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Books</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('member') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Members</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('user') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Transactions
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('transaction') }}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Transactions</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    @can('admin')
    <div class="sidebar-heading">
        Reports
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('report') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Report Sales</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('user') }}">
            <i class="fas fa-users"></i>
            <span>Users</span>
        </a>
    </li>
    @endcan
    <li class="nav-item">
        <a class="nav-link" onclick="return confirm('Are you sure ?')" href="{{ url('logout') }}">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>