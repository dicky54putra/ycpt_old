<!-- /.row -->
<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        	<?php if ($this->session->userdata("level") == 0) { ?>
            Selamat Datang Administrator . . . .
            <div class="panel-body">
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <?php $query = $this->db->query("select * from admin") ?>
                      <h3><?php echo $query->num_rows() ?></h3>
                      <p>Jumlah Data Administrator</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-users"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>Admin" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <?php $query = $this->db->query("select * from user") ?>
                      <h3><?php echo $query->num_rows() ?></h3>
                      <p>Jumlah Data User</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-users"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>User" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <?php $query = $this->db->query("select * from unit_pendidikan") ?>
                      <h3><?php echo $query->num_rows() ?></h3>
                      <p>Jumlah Data Unit Pendidikan</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-building"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>Unit_pendidikan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <?php $query = $this->db->query("select * from tipe_pembayaran") ?>
                      <h3><?php echo $query->num_rows() ?></h3>
                      <p>Jumlah Data Tipe Pembayaran</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-dollar"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>Tipe_pembayaran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-black">
                    <div class="inner">
                      <?php $query = $this->db->query("select * from siswa where id_unit_pendidikan = 1") ?>
                      <h3><?php echo $query->num_rows() ?></h3>
                      <p>Jumlah Data Siswa SMP Mardisiswa 1</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-university"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>Siswa/siswa_detail/1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-orange">
                    <div class="inner">
                      <?php $query = $this->db->query("select * from siswa where id_unit_pendidikan = 2") ?>
                      <h3><?php echo $query->num_rows() ?></h3>
                      <p>Jumlah Data Siswa SMP Mardisiswa 2</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-university"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>Siswa/siswa_detail/2" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-purple">
                    <div class="inner">
                      <?php $query = $this->db->query("select * from siswa where id_unit_pendidikan = 3") ?>
                      <h3><?php echo $query->num_rows() ?></h3>
                      <p>Jumlah Data Siswa SMA Mardisiswa</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-university"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>Siswa/siswa_detail/3" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                    <div class="inner">
                      <?php $query = $this->db->query("select * from siswa where id_unit_pendidikan = 4") ?>
                      <h3><?php echo $query->num_rows() ?></h3>
                      <p>Jumlah Data Siswa SMK Jayawisata</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-university"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>Siswa/siswa_detail/4" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <?php $query = $this->db->query("select * from siswa where id_unit_pendidikan = 5") ?>
                      <h3><?php echo $query->num_rows() ?></h3>
                      <p>Jumlah Data Siswa SMK Tlogosari</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-university"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>Siswa/siswa_detail/5" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
            </div>
            
          	<?php } else { ?>
          	Selamat Datang User . . . .

            <div class="panel-body">
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <?php 
                        $id     = $this->userdata->id_user;
                        $query  = $this->db->query("SELECT * FROM siswa
                                                    LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = siswa.id_unit_pendidikan
                                                    LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
                                                    WHERE user.id_user = '$id'"); 
                      ?>
                      <h3><?php echo $query->num_rows() ?></h3>
                      <p>Data Siswa</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-users"></i>
                    </div>
                    <a href="<?php echo base_url()?>Siswa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <?php 
                        $id     = $this->userdata->id_user;
                        $query  = $this->db->query("SELECT * FROM kelas 
                                                    LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = kelas.id_unit_pendidikan
                                                    LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
                                                    WHERE user.id_user = '$id'"); 
                      ?>
                      <h3><?php echo $query->num_rows() ?></h3>
                      <p>Data Kelas</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-table"></i>
                    </div>
                    <a href="<?php echo base_url()?>Kelas" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <?php 
                        $id     = $this->userdata->id_user;
                        $query  = $this->db->query("SELECT * FROM kelas_siswa 
                                                    LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = kelas_siswa.id_tahun_ajaran
                                                    LEFT JOIN kelas ON kelas.id_kelas = kelas_siswa.id_kelas
                                                    LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = kelas_siswa.id_unit_pendidikan
                                                    LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
                                                    WHERE user.id_user = '$id'");
                      ?>
                      <h3><?php echo $query->num_rows() ?></h3>
                      <p>Data Kelas Siswa</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-table"></i>
                    </div>
                    <a href="<?php echo base_url()?>kelas_siswa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-lime">
                    <div class="inner">
                      <?php 
                        $id     = $this->userdata->id_user;
                        $query  = $this->db->query("SELECT * FROM pendaftaran 
                                                    LEFT JOIN unit_pendidikan ON unit_pendidikan.id_unit_pendidikan = pendaftaran.id_unit_pendidikan
                                                    LEFT JOIN user ON user.id_unit_pendidikan = unit_pendidikan.id_unit_pendidikan
                                                    WHERE user.id_user = '$id'");
                      ?>
                      <h3><?php echo $query->num_rows() ?></h3>
                      <p>Data Pendaftaran</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-users"></i>
                    </div>
                    <a href="<?php echo base_url()?>Pendaftaran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-gray">
                    <div class="inner">
                      <h3>&nbsp;</h3>
                      <p>Setting Pembayaran PPDB</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-cog"></i>
                    </div>
                    <a href="<?php echo base_url()?>Setting_pembayaran_psb" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                    <div class="inner">
                      <h3>&nbsp;</h3>
                      <p>Pembayaran PPDB</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-dollar"></i>
                    </div>
                    <a href="<?php echo base_url()?>Pembayaran_psb" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>&nbsp;</h3>
                      <p>Riwayat Pembayaran PPDB</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-list-alt"></i>
                    </div>
                    <a href="<?php echo base_url()?>Riwayat_pembayaran_psb" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-gray">
                    <div class="inner">
                      <h3>&nbsp;</h3>
                      <p>Setting Pembayaran Siswa</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-cog"></i>
                    </div>
                    <a href="<?php echo base_url()?>Setting_pembayaran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                    <div class="inner">
                      <h3>&nbsp;</h3>
                      <p>Pembayaran Siswa</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-dollar"></i>
                    </div>
                    <a href="<?php echo base_url()?>Pembayaran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>&nbsp;</h3>
                      <p>Riwayat Pembayaran Siswa</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-list-alt"></i>
                    </div>
                    <a href="<?php echo base_url()?>Riwayat_pembayaran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>&nbsp;</h3>
                      <p>Laporan Pembayaran Per Kelas</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-folder"></i>
                    </div>
                    <a href="<?php echo base_url()?>Laporan_spp" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>&nbsp;</h3>
                      <p>Laporan Pembayaran Per Hari</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-folder"></i>
                    </div>
                    <a href="<?php echo base_url()?>Laporan_pembayaran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>&nbsp;</h3>
                      <p>Laporan Penerimaan Uang SPP</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-folder"></i>
                    </div>
                    <a href="<?php echo base_url()?>Laporan_penerimaan_uang" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>&nbsp;</h3>
                      <p>Laporan Data PPDB</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-folder"></i>
                    </div>
                    <a href="<?php echo base_url()?>Laporan_ppdb" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>&nbsp;</h3>
                      <p>Laporan Data Kelas Siswa</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-folder"></i>
                    </div>
                    <a href="<?php echo base_url()?>laporan_kelas_siswa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

            </div>
          	
          	<?php } ?>
        </div>
    </div>
</div>