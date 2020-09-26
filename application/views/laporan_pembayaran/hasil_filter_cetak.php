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
                <h3 align="center">
                    DATA LAPORAN PEMBAYARAN DARI TANGGAL : <?= $this->uri->segment(3) ?> SAMPAI TANGGAL: <?= $this->uri->segment(4) ?>
                </h3>
            </div>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kelas</th>
                        <th>NIS & Nama Siswa</th>
                        <th>Tipe Pembayaran</th>
                        <th>Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $total = 0;
                    foreach ($pembayaran as $k) {
                        $total += $k->nominal;
                        if ($k->tipe_pembayaran != null) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>
                                    <?php
                                    $data     = $k->tanggal;
                                    if ($data == '0000-00-00') {
                                        echo '00-00-0000';
                                    } else {
                                        $datanew  = new DateTime($data);
                                        echo $datanew->format('d F Y');
                                    }
                                    ?>
                                </td>
                                <td><?php echo $k->tahun_ajaran; ?> - <?php echo $k->nama_tipe_kelas . ' ' . $k->kelas; ?></td>
                                <td><?php echo $k->nis; ?> - <?php echo $k->nama_siswa; ?></td>
                                <td><?php echo $k->tipe_pembayaran; ?></td>
                                <td>Rp. <?php echo number_format($k->nominal, '2', ',', '.'); ?></td>
                            </tr>
                    <?php }
                    } ?>
                    <tr>
                        <td colspan="5"><b>JUMLAH</b></td>
                        <td><b>Rp. <?php echo number_format($total, '2', ',', '.'); ?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>