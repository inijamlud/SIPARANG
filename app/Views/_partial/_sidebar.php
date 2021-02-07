  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand">
          <!-- <img src="assets/img/brand/blue.png" class="navbar-brand-img" alt="..."> -->
          <h1>Welcome!</h1>
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?= (current_url() == base_url('/')) ? 'active' : '' ?>" href="/">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
          </ul>

          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <!-- Master Data -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link <?= (current_url() == base_url('barang/')) ? 'active' : '' ?>" href="/barang">
                <i class="ni ni-app text-orange"></i>
                <span class="nav-link-text">Data Barang</span>
              </a>
            </li>
            <?php if (in_groups('superadmin')) : ?>
              <li class="nav-item">
                <a class="nav-link <?= (current_url() == base_url('peminjam/')) ? 'active' : '' ?>" href="/peminjam">
                  <i class=" ni ni-badge text-orange"></i>
                  <span class="nav-link-text">Data Peminjam</span>
                </a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link <?= (current_url() == base_url('pinjam/')) ? 'active' : '' ?>" href="/pinjam">
                <i class=" ni ni-ruler-pencil text-orange"></i>
                <span class="nav-link-text">Transaksi Peminjaman</span>
              </a>
            </li>
          </ul>

          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Laporan</span>
          </h6>
          <!-- Laporan -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link <?= (current_url() == base_url('/pinjam/lappmj/')) ? 'active' : '' ?>" href="/pinjam/lappmj">
                <i class=" ni ni-basket text-primary"></i>
                <span class="nav-link-text">Laporan Peminjaman</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (current_url() == base_url('/pinjam/lappmb/')) ? 'active' : '' ?>" href="/pinjam/lappmb">
                <i class=" ni ni-curved-next text-primary"></i>
                <span class="nav-link-text">Laporan Pengembalian</span>
              </a>
            </li>
          </ul>

        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <?php if (current_url() != base_url().'/') { ?>
            <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" action="" method="post">
              <div class="form-group mb-0">
                <div class="input-group input-group-alternative input-group-merge">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                  </div>
                  <input class="form-control" placeholder="Search" name="cari" type="text">
                </div>
              </div>
              <button type="button" class="close btn-green" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </form>
          <?php } ?>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="/assets/img/theme/team-1.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?= user()->username; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="/logout" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>