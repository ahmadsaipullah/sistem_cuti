  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand sidebar-red fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Akun Profile</span>
          <div class="dropdown-divider">
          </div>

          <a href="{{route('profile.index', encrypt(auth()->user()->id))}}" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
          </a>

          <div class="dropdown-divider"></div>
             <div class="d-flex  justify-content-end">
                @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger m-1" type="submit">Logout <i
                        class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i></button>
                </form>
                @endauth
                </div>
        </div>
      </li>


    </ul>
  </nav>
  <!-- /.navbar -->
