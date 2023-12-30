<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="<?= site_url('admin') ?>" class="text-nowrap logo-img">
            <img src="<?= base_url('asset/'); ?>Frame.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Admin E-Voting</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= site_url('admin') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= site_url('admin/Kandidat') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-user-square-rounded"></i>
                </span>
                <span class="hide-menu">Kandidat</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= site_url('admin/Kelas') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-school"></i>
                </span>
                <span class="hide-menu">Kelas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= site_url('admin/Siswa') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Siswa</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= site_url('admin/Status') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-discount-check"></i>
                </span> 
                <span class="hide-menu">Status</span>
              </a>
            </li>
            <!-- <li class="sidebar-item">
              <a class="sidebar-link" href="<?= site_url('admin/Pilihan') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Hasil</span>
              </a>
            </li> -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= site_url('admin/Sekolah');?>" aria-expanded="false">
                <span>
                <i class="ti ti-apps"></i>
                </span>
                <span class="hide-menu">E-Voting</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= site_url('admin/setting');?>" aria-expanded="false">
                <span>
                <i class="ti ti-settings"></i>
                </span>
                <span class="hide-menu">Setting</span>
              </a>
            </li>  
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                    $avatar = $current_user->avatar?
                      base_url('upload/avatar/' . $current_user->avatar)
                      : get_gravatar($current_user->email)
                  ?>
                  <img src="<?= $avatar ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                  <div class="container-fluid mb-3">
                    <img src="<?= $avatar = $current_user->avatar ? base_url('upload/avatar/' . $current_user->avatar) : get_gravatar($current_user->email); ?>" alt="avatar" width="65" height="65" class="rounded-circle">
                    <br>
                    <h6 class="tx-semibold mg-b-5"><?= htmlentities($current_user->name) ?></h6>
                    <p class="mg-b-25 tx-12 tx-color-03"><?= htmlentities($current_user->email) ?></p>
                  </div>
                    <a href="<?= site_url('auth/logout_admin'); ?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->