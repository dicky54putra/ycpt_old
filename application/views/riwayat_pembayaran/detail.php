<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">

    </div>
    <?php foreach ($siswa as $m) {
    } ?>
    <?php foreach ($nomor as $n) {
    } ?>
    <?php
    error_reporting(0);
    $no = $n->id_pembayaran;
    $hasil2 = $no + 1;
    ?>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <!-- <img class="img-rounded" src="<?php echo base_url(); ?>assets/img/<?php echo $m->foto; ?>" id="img" alt="maaf foto tidak ada" width=150 height=150> -->
            <b>Data Siswa :</b>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form role="form" action="#" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
                  <div class="form-group">
                    <table class="table table-striped table-bordered table-hover" style="width: 100%">
                      </tr>
                      <td>NIS / NISN</td>
                      <td><?php echo $m->nis; ?></td>
                      </tr>
                      </tr>
                      <td>Nama Siswa</td>
                      <td><?php echo $m->nama_siswa; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir</td>
                        <td>
                          <?php
                          $data = $m->tanggal_lahir;
                          $datanew = new DateTime($data);
                          echo $datanew->format('d F Y');
                          ?>
                        </td>
                      </tr>
                      <td>Tempat Lahir</td>
                      <td><?php echo $m->tempat_lahir; ?></td>
                      </tr>
                      <tr>
                        <td>Nama Orang Tua / Wali</td>
                        <td><?php echo $m->nama_ortu; ?></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td><?php echo $m->alamat; ?></td>
                      </tr>
                    </table>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="msg" style="display:none;">
      <?php echo @$this->session->flashdata('msg'); ?>
    </div>
    <div class="box-body">
      <table id="list-data" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Tahun Pelajaran</th>
            <th>Tipe Pembayaran</th>
            <th>Global Pembayaran</th>
            <th>Pembayaran</th>
            <th>Kekurangan</th>
            <th>Status</th>
            <!-- <th style="text-align: center;">Aksi</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($setting_pembayaran as $k) {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $k->tahun_ajaran; ?></td>
              <td><?php echo $k->tipe_pembayaran; ?></td>
              <td>Rp.<?php echo number_format($k->nominal, 2, ',', '.'); ?></td>
              <td>
                <?php
                // error_reporting(0);
                $id_tahun_ajaran    = $this->uri->segment(4);
                $id_tipe_pembayaran = $k->id_tipe_pembayaran;
                $nis                = $this->uri->segment(3);

                $query = $this->db->query("SELECT a.*, SUM(a.nominal) AS TOTAL from detail_pembayaran a
                                         LEFT JOIN pembayaran b on b.id_pembayaran = a.id_pembayaran
                                         LEFT JOIN kelas_siswa_detail f on f.id_kelas_siswa_detail = b.id_kelas_siswa_detail
                                         LEFT JOIN siswa c on c.id_siswa = f.id_siswa
                                         LEFT JOIN setting_pembayaran d on d.id_setting_pembayaran = a.id_setting_pembayaran
                                         LEFT JOIN tipe_pembayaran e on e.id_tipe_pembayaran = d.id_tipe_pembayaran
                                         WHERE c.nis = '$nis' and e.id_tipe_pembayaran = '$id_tipe_pembayaran' and d.id_tahun_ajaran = $k->id_tahun_ajaran");

                foreach ($query->result() as $row) {
                }
                ?>
                Rp. <?php echo number_format($row->TOTAL, 2, ',', '.'); ?>
              </td>
              <td>Rp.
                <?php
                $global_pembayaran  = $k->nominal;
                $pembayaran         = $row->TOTAL;
                $hasil = $global_pembayaran - $pembayaran;
                echo number_format($hasil, 2, ',', '.');
                ?>
              </td>
              <td>
                <?php
                $a = base_url();
                $b = 'riwayat_pembayaran';
                if ($hasil == 0) {
                  echo 'LUNAS';
                  echo '<a target="_BLANK" href="' . base_url() . 'riwayat_pembayaran/cetak/' . $m->id_siswa . '/' . $k->id_setting_pembayaran . '">
                      <button class="btn btn-basic">
                      <i class="glyphicon glyphicon-print"></i> CETAK
                      </button>';
                } else {
                  echo 'BELUM LUNAS ';
                  echo '<a onclick="return bayar(' . $k->id_setting_pembayaran . ')" id="' . $k->id_setting_pembayaran . '" href="' . base_url() . 'riwayat_pembayaran/bayar/' . $m->nis . '/' . $m->id_tahun_ajaran . '/' . $k->id_tahun_ajaran . '/' . $k->id_setting_pembayaran . '/' . $hasil2 . '/' . $hasil . '/' . $m->id_siswa . '"">
                      <button class="btn btn-basic">
                      <i class="glyphicon glyphicon-usd"></i> BAYAR
                      </button>';
                }
                ?>
              </td>
              <!-- <td class="text-center" style="min-width:230px;">
            <a href="<?php echo base_url(); ?>riwayat_pembayaran/detail_dua/<?php echo $k->nis; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-zoom-in"></i> Detail</button>
            </a>
          </td> -->
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  function bayar(id) {
    var i = document.getElementById(id);
    var check = confirm("Apakah anda Yakin?");
    if (check == true) {
      console.log('ok');
      i.setAttribute("hidden", "");
      return true;
    } else {
      console.log('not');
      return false;
    }
    // return confirm('Apakah anda Yakin');
  }
</script>
<!-- href="' . base_url() . 'riwayat_pembayaran/bayar/' . $m->nis . '/' . $m->id_tahun_ajaran . '/' . $k->id_tahun_ajaran . '/' . $k->id_setting_pembayaran . '/' . $hasil2 . '/' . $k->nominal . '/' . $m->id_siswa . '"  -->