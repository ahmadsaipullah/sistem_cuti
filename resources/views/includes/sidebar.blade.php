  <!-- Main Sidebar Container -->
  <style>
    .sidebar-red {
    background-color: #fa8900; /* Warna merah */
}

.sidebar-red .nav-link {
    color: #ffffff; /* Warna teks putih */
}

.sidebar-red .nav-link:hover {
    background-color: #fa8900; /* Warna merah tua saat hover */
}

.sidebar-red .brand-link {
    border-bottom: 1px solid #fa8900; /* Garis bawah merah tua */
}
  </style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-red elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/img/logoft.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8; border: 2px solid white;">
        <span class="brand-text font-weight-light text-white">PT UNION FOODS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth()->user()->image)
                    <img src="{{Storage::url(Auth()->user()->image) }}" alt="gambar"
                        width="120px" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                @else
                    <img src="{{ asset('assets/img/user_default.png') }}" class="img-circle elevation-2"
                        alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="{{ route('profile.index', encrypt(auth()->user()->id)) }}"
                    class="d-block text-white">{{ Auth()->user()->nama }}</a>
                <span class="text-white text-xs"><i class="fa fa-circle text-success"></i> Online</span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard</p>
                    </a>
                </li>
                @if (auth()->user()->level_id == 3)
                    <li class="nav-header">Menu</li>

                    <li class="nav-item">
                        <a href="{{ route('pengajuancuti.create') }}" class="nav-link @yield('pengajuancuti')">
                            <i class="nav-icon ion ion-email"></i>
                            <p>Pengajuan Cuti</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('pengajuancutith.create') }}" class="nav-link @yield('pengajuancutith')">
                            <i class="nav-icon ion ion-email-unread"></i>
                            <p>Pengajuan Cuti Tahunan</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('status.cuti') }}" class="nav-link @yield('status')">
                            <i class="nav-icon ion ion-clipboard"></i>
                            <p>Status Cuti</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('status.cutith') }}" class="nav-link @yield('statuscutith')">
                            <i class="nav-icon ion ion-clipboard"></i>
                            <p>Status Cuti Tahunan</p>
                        </a>
                    </li>

                @endif
                @if (auth()->user()->level_id == 2)
                    <li class="nav-header">Menu</li>

                    <li class="nav-item">
                        <a href="{{ route('pengajuancuti.index') }}" class="nav-link @yield('pengajuancuti')">
                            <i class="nav-icon ion ion-email"></i>
                            <p>Pengajuan Cuti</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pengajuancutith.index') }}" class="nav-link @yield('pengajuancutith')">
                            <i class="nav-icon ion ion-email-unread"></i>
                            <p>Pengajuan Cuti Tahunan</p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->level_id == 1)
                    <li class="nav-header">Admin Super</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link @yield('admin')">
                            <i class="nav-icon ion ion-person-add"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('jeniscuti.index') }}" class="nav-link @yield('jeniscuti')">
                            <i class="nav-icon ion ion-clipboard"></i>
                            <p>Jenis Cuti</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('pengajuancuti.index') }}" class="nav-link @yield('pengajuancuti')">
                            <i class="nav-icon ion ion-email"></i>
                            <p>Pengajuan Cuti</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pengajuancutith.index') }}" class="nav-link @yield('pengajuancutith')">
                            <i class="nav-icon ion ion-email-unread"></i>
                            <p>Pengajuan Cuti Tahunan</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
