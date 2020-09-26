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
        <?php
        // foreach ($pendaftaran1 as $k2) {
        // }
        ?>
        <h3 align="center">
          DATA PENDAFTARAN TAHUN PELAJARAN <?php echo $pendaftaran1->tahun_ajaran; ?><br>
          <?php //echo $k2->unit_pendidikan; 
          ?>
        </h3>
      </div>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Pendaftaran</th>
            <th>Nama Lengkap</th>
            <th>Tempat dan Tanggal Lahir</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($pendaftaran as $k) { ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $k->nomor_daftar; ?></td>
              <td><?php echo $k->nama_lengkap; ?></td>
              <td>
                <?php echo $k->tempat_lahir; ?>,
                <?php $data     = $k->tanggal_lahir;
                $datanew  = new DateTime($data);
                echo $datanew->format('d F Y');
                ?>
              </td>
              <td><?php echo $k->status; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>