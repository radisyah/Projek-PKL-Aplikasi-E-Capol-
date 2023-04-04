  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">      
    <a href="<?= base_url('dashboard')?>" class="brand-link">
      <img
        src="<?= base_url() ?>/template/dist/img/AdminLTELogo copy.png"        
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: 0.9"
      />
      <span class="brand-text font-weight-light">E-CAPOL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- Sidebar user panel (optional) -->
      
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img
            src="<?= session()->get('level') == 2 ?  base_url('img/user.jpg') : base_url('img/admin.jpg') ?>"
            class="img-circle elevation-2"
            alt="User Image"
            style="opacity: 0.9"
          />
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= session()->get('username') ?> </a>
        </div>
          
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <?php if (session()->get('level')==1) { ?>
            <li class="nav-item">
              <a
                href="<?= base_url('dashboard') ?>"
                class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>"
              >
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item <?= $menu == 'master' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'master' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Master Data
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a
                    href="<?= base_url('barang') ?>"
                    class="nav-link <?= $sub_menu == 'barang' ? 'active' : '' ?>"
                  >
                    <i
                      class="<?= $sub_menu == 'barang' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                    ></i>
                    <p>Barang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="<?= base_url('kategori') ?>"
                    class="nav-link <?= $sub_menu == 'kategori' ? 'active' : '' ?>"
                  >
                    <i
                      class="<?= $sub_menu == 'kategori' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                    ></i>
                    <p>Kategori</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="<?= base_url('satuan') ?>"
                    class="nav-link <?= $sub_menu == 'satuan' ? 'active' : '' ?>"
                  >
                    <i
                      class="<?= $sub_menu == 'satuan' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                    ></i>
                    <p>Satuan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="<?= base_url('user') ?>"
                    class="nav-link <?= $sub_menu == 'user' ? 'active' : '' ?>"
                  >
                    <i
                      class="<?= $sub_menu == 'user' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                    ></i>
                    <p>User</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item <?= $menu == 'laporan' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $menu == 'laporan' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a
                  href="<?= base_url('laporan/LaporanHarian') ?>"
                  class="nav-link <?= $sub_menu == 'l_harian' ? 'active' : '' ?>"
                >
                  <i
                    class="<?= $sub_menu == 'l_harian' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                  ></i>
                  <p>Laporan Harian</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="<?= base_url('laporan/LaporanBulanan') ?>"
                  class="nav-link <?= $sub_menu == 'l_bulanan' ? 'active' : '' ?>"
                >
                  <i
                    class="<?= $sub_menu == 'l_bulanan' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                  ></i>
                  <p>Laporan Bulanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="<?= base_url('laporan/LaporanTahunan') ?>"
                  class="nav-link <?= $sub_menu == 'l_tahunan' ? 'active' : '' ?>"
                >
                  <i
                    class="<?= $sub_menu == 'l_tahunan' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                  ></i>
                  <p>Laporan Tahunan</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
              <a
                href="<?= base_url('DaftarTransaksi') ?>"
                class="nav-link <?= $menu == 'daftartransaksi' ? 'active' : '' ?>"
              >
                <i class="nav-icon fas fa-list"></i>
                <p>Daftar Transaksi</p>
              </a>
            </li>

          <?php } elseif (session()->get('level')==2) { ?>
            <li class="nav-item <?= $menu == 'transaksi' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'transaksi' ? 'active' : '' ?>">
                <i class="nav-icon fa fa-tasks"></i>
                <p>
                  Transaksi
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a
                    href="<?= base_url('peminjaman') ?>"
                    class="nav-link <?= $sub_menu == 'peminjaman' ? 'active' : '' ?>"
                  >
                    <i
                      class="<?= $sub_menu == 'peminjaman' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                    ></i>
                    <p>Peminjaman Barang</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a
                    href="<?= base_url('pengembalian') ?>"
                    class="nav-link <?= $sub_menu == 'pengembalian' ? 'active' : '' ?>"
                  >
                    <i
                      class="<?= $sub_menu == 'pengembalian' ? 'far fa-dot-circle nav-icon' : 'far fa-circle nav-icon' ?>"
                    ></i>
                    <p>Pengembalian Barang</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php } ?>
          

            
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
