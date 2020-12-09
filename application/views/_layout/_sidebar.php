<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">MENU UTAMA</li>
      <!-- Optionally, you can add icons to the links -->

      <li <?php if ($page == 'home') {
            echo 'class="active"';
          } ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>
      </li>

      <?php if ($this->session->userdata("level") == 0) { ?>

        <!--Menu Form-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($page == 'admin') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Admin'); ?>">
                <i class="fa fa-user-circle"></i>
                <span>Admin</span>
              </a>
            </li>
            <li <?php if ($page == 'user') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('User'); ?>">
                <i class="fa fa-users"></i>
                <span>User</span>
              </a>
            </li>
            <li <?php if ($page == 'unit_pendidikan') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Unit_pendidikan'); ?>">
                <i class="glyphicon glyphicon-education"></i>
                <span>Unit Pendidikan</span>
              </a>
            </li>
            <li <?php if ($page == 'tipe_kelas') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('tipe_kelas'); ?>">
                <i class="glyphicon glyphicon-education"></i>
                <span>Tipe Kelas</span>
              </a>
            </li>
            <li <?php if ($page == 'tahun_ajaran') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Tahun_ajaran'); ?>">
                <i class="glyphicon glyphicon-calendar"></i>
                <span>Tahun Pelajaran</span>
              </a>
            </li>
            <li <?php if ($page == 'tipe_pembayaran') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Tipe_pembayaran'); ?>">
                <i class="glyphicon glyphicon-usd"></i>
                <span>Tipe Pembayaran</span>
              </a>
            </li>
          </ul>
        </li>

        <li <?php if ($page == 'siswa') {
              echo 'class="active"';
            } ?>>
          <a href="<?php echo base_url('Siswa/index_siswa'); ?>">
            <i class="fa fa-users"></i>
            <span>Data Siswa</span>
          </a>
        </li>

        <li <?php if ($page == 'kelas_siswa') {
              echo 'class="active"';
            } ?>>
          <a href="<?php echo base_url('Kelas_siswa/index_kelas_siswa'); ?>">
            <i class="glyphicon glyphicon-th"></i>
            <span>Data Kelas Siswa</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Pembayaran Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li <?php if ($page == 'riwayat') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Riwayat_pembayaran/index_admin'); ?>">
                <i class="glyphicon glyphicon-list-alt"></i>
                <span>Riwayat Pembayaran Siswa</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($page == 'laporan_spp') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('laporan_spp/index_admin'); ?>">
                <i class="glyphicon glyphicon-list-alt"></i>
                <span>Pembayaran / Kelas</span>
              </a>
            </li>
            <li <?php if ($page == 'laporan_pembayaran') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('laporan_pembayaran/index_admin'); ?>">
                <i class="glyphicon glyphicon-list-alt"></i>
                <span>Pembayaran / Hari</span>
              </a>
            </li>
            <!-- <li <?php if ($page == 'lapora_penerimaan_uang') {
                        echo 'class="active"';
                      } ?>>
            <a href="<?php echo base_url('Laporan_penerimaan_uang/index_admin'); ?>">
              <i class="glyphicon glyphicon-list-alt"></i>
              <span>Penerimaan Uang SPP</span>
            </a>
          </li> -->
            <li <?php if ($page == 'laporan_bulanan_spp') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Laporan_bulanan_spp/index_admin'); ?>">
                <i class="glyphicon glyphicon-list-alt"></i>
                <span>Penerimaan Uang SPP</span>
              </a>
            </li>
            <!-- <li <?php if ($page == 'laporan_ppdb') {
                        echo 'class="active"';
                      } ?>>
            <a href="<?php echo base_url('#'); ?>">
              <i class="glyphicon glyphicon-list-alt"></i>
              <span>Laporan Data PPDB</span>
            </a>
          </li> -->
          </ul>
        </li>

        <li <?php if ($page == 'panduan_admin') {
              echo 'class="active"';
            } ?>>
          <a href="<?php echo base_url('Panduan'); ?>">
            <i class="glyphicon glyphicon-info-sign"></i>
            <span>Panduan</span>
          </a>
        </li>

      <?php } else { ?>

        <!--Menu Form-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($page == 'siswa') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Siswa'); ?>">
                <i class="fa fa-users"></i>
                <span>Siswa</span>
              </a>
            </li>
            <li <?php if ($page == 'kelas') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Kelas'); ?>">
                <i class="glyphicon glyphicon-th"></i>
                <span>Kelas</span>
              </a>
            </li>
            <!-- <li <?php if ($page == 'tahun_ajaran') {
                        echo 'class="active"';
                      } ?>>
            <a href="<?php echo base_url('Tahun_ajaran'); ?>">
              <i class="glyphicon glyphicon-calendar"></i>
              <span>Tahun Ajaran</span>
            </a>
          </li> -->
            <li <?php if ($page == 'kelas_siswa') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Kelas_siswa'); ?>">
                <i class="glyphicon glyphicon-th"></i>
                <span>Kelas Siswa</span>
              </a>
            </li>
            <!-- <li <?php if ($page == 'tipe_pembayaran') {
                        echo 'class="active"';
                      } ?>>
            <a href="<?php echo base_url('Tipe_pembayaran'); ?>">
              <i class="glyphicon glyphicon-usd"></i>
              <span>Tipe Pembayaran</span>
            </a>
          </li> -->
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>PPDB</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($page == 'pendaftaran') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Pendaftaran'); ?>">
                <i class="fa fa-users"></i>
                <span>Data Pendaftaran</span>
              </a>
            </li>
            <li <?php if ($page == 'setting_pembayaran') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Setting_pembayaran_psb'); ?>">
                <i class="glyphicon glyphicon-cog"></i>
                <span>Setting Pembayaran PPDB</span>
              </a>
            </li>
            <li <?php if ($page == 'pembayaran') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Pembayaran_psb'); ?>">
                <i class="glyphicon glyphicon-usd"></i>
                <span>Pembayaran PPDB</span>
              </a>
            </li>
            <li <?php if ($page == 'riwayat') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Riwayat_pembayaran_psb'); ?>">
                <i class="glyphicon glyphicon-list-alt"></i>
                <span>Riwayat Pembayaran PPDB</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Pembayaran Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($page == 'setting_pembayaran') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Setting_pembayaran'); ?>">
                <i class="glyphicon glyphicon-cog"></i>
                <span>Setting Pembayaran Siswa</span>
              </a>
            </li>
            <li <?php if ($page == 'pembayaran') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Pembayaran'); ?>">
                <i class="glyphicon glyphicon-usd"></i>
                <span>Pembayaran Siswa</span>
              </a>
            </li>

            <li <?php if ($page == 'riwayat') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Riwayat_pembayaran'); ?>">
                <i class="glyphicon glyphicon-list-alt"></i>
                <span>Riwayat Pembayaran Siswa</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($page == 'laporan_spp') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Laporan_spp'); ?>">
                <i class="glyphicon glyphicon-list-alt"></i>
                <span>Pembayaran / Kelas</span>
              </a>
            </li>
            <li <?php if ($page == 'laporan_pembayaran') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Laporan_pembayaran'); ?>">
                <i class="glyphicon glyphicon-list-alt"></i>
                <span>Pembayaran / Hari</span>
              </a>
            </li>
            <!-- <li <?php if ($page == 'lapora_penerimaan_uang') {
                        echo 'class="active"';
                      } ?>>
              <a href="<?php echo base_url('Laporan_penerimaan_uang'); ?>">
                <i class="glyphicon glyphicon-list-alt"></i>
                <span>Penerimaan Uang SPP</span>
              </a>
            </li> -->
            <li <?php if ($page == 'laporan_ppdb') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Laporan_ppdb'); ?>">
                <i class="glyphicon glyphicon-list-alt"></i>
                <span>Data PPDB</span>
              </a>
            </li>
            <li <?php if ($page == 'laporan_kelas_siswa') {
                  echo 'class="active"';
                } ?>>
              <a href="<?php echo base_url('Laporan_kelas_siswa'); ?>">
                <i class="glyphicon glyphicon-list-alt"></i>
                <span>Data Kelas Siswa</span>
              </a>
            </li>
          </ul>
        </li>

        <li <?php if ($page == 'panduan_user') {
              echo 'class="active"';
            } ?>>
          <a href="<?php echo base_url('Panduan'); ?>">
            <i class="glyphicon glyphicon-info-sign"></i>
            <span>Panduan</span>
          </a>
        </li>

      <?php } ?>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>