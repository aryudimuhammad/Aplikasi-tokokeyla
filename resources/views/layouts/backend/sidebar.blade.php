  <aside class="main-sidebar sidebar-dark-primary">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="{{route('produkindex')}}" class="nav-link">
            <!-- <i class="fa-sharp fa-solid fa-box-archive"></i> -->
              <p>Produk</p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="{{route('kategoriindex')}}" class="nav-link">
            <!-- <i class="fa-sharp fa-solid fa-box-archive"></i> -->
              <p>Kategori</p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="{{route('satuanindex')}}" class="nav-link">
            <!-- <i class="fa-sharp fa-solid fa-box-archive"></i> -->
              <p>Satuan</p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="{{route('supplierindex')}}" class="nav-link">
            <!-- <i class="fa-sharp fa-solid fa-box-archive"></i> -->
              <p>Supplier</p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="{{route('agenindex')}}" class="nav-link">
            <!-- <i class="fa-sharp fa-solid fa-box-archive"></i> -->
              <p>Agen</p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-white">
            Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}"
                                method="POST" class="d-none">
                                @csrf
            </form>
           </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
