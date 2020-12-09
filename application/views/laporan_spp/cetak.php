<!DOCTYPE html>
<html>

<head>
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
</head>

<body onLoad="window.print()">
  <div class="box">
    <div class="box-header">
      <div class="col-md-12" style="padding: 0;">
        <?php foreach ($kelas1 as $k3) {
        } ?>
        <?php foreach ($setting_pembayaran1 as $k1) {
        } ?>
        <?php foreach ($setting_pembayaran as $k2) {
        } ?>
        <h3 align="center">
          DATA SISWA LUNAS DAN BELUM LUNAS <?php echo $k1->tipe_pembayaran; ?><br>
          <?php echo $k2->unit_pendidikan; ?> TAHUN PELAJARAN <?php echo $k1->tahun_ajaran; ?>
        </h3>
      </div>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
      <table class="table">
        <tr>
          <td width="10%"><b>Kelas</b></td>
          <td width="2%"> : </td>
          <td><b><?php echo $k3->nama_tipe_kelas . ' ' . $k3->kelas; ?></b></td>
        </tr>
      </table>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <!-- <th>Tipe Pembayaran</th> -->
            <th>Nominal</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($kelas as $k) { ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $k->nis; ?></td>
              <td><?php echo $k->nama_siswa; ?></td>
              <!-- <td>
            <?php echo $k1->tipe_pembayaran; ?>
          </td> -->
              <td>
                Rp. <?php echo number_format($k1->nominal, 2, ',', '.'); ?>
              </td>
              <td>
                <?php
                // error_reporting(0);
                // $id_tahun_ajaran    = $this->uri->segment(4);
                $id_tipe_pembayaran = $k1->id_tipe_pembayaran;
                $nis                = $k->nis;

                $query = $this->db->query("SELECT a.*, SUM(a.nominal) AS TOTAL from detail_pembayaran a
                                         LEFT JOIN pembayaran b on b.id_pembayaran = a.id_pembayaran
                                         LEFT JOIN kelas_siswa_detail f on f.id_kelas_siswa_detail = b.id_kelas_siswa_detail
                                         LEFT JOIN siswa c on c.id_siswa = f.id_siswa
                                         LEFT JOIN setting_pembayaran d on d.id_setting_pembayaran = a.id_setting_pembayaran
                                         LEFT JOIN tipe_pembayaran e on e.id_tipe_pembayaran = d.id_tipe_pembayaran
                                         WHERE c.nis = '$nis' and e.id_tipe_pembayaran = '$id_tipe_pembayaran'");

                foreach ($query->result() as $row) {
                }
                ?>
                <?php
                $global_pembayaran  = $k1->nominal;
                $pembayaran         = $row->TOTAL;
                $hasil = $global_pembayaran - $pembayaran;
                if ($hasil == 0) {
                  echo 'LUNAS';
                } else {
                  echo 'BELUM LUNAS ';
                }
                ?>
              </td>
            </tr>
          <?php } ?>
          <!-- <tr>
        <td colspan="3"><b>JUMLAH NOMINAL STATUS LUNAS</b></td>
        <td colspan="2"><b>Rp. </b></td>
      </tr>
      <tr>
        <td colspan="3"><b>JUMLAH NOMINAL STATUS BELUM LUNAS</b></td>
        <td colspan="2"><b>Rp. </b></td>
      </tr> -->
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>