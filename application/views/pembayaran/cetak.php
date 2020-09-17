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
	<div class="modal-dialog">
  	<div class="box-header with-border">
    	<h3 class="box-title"></h3>
  	</div>
  	<?php foreach($user_unit_pendidikan as $u){ }?>
    <div class="row">
  	<div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
              <table width="100%">
                <tr>
                 <td align="center">
                    <p style="margin: 0px;">
                      <b style="font-size: 18px;">YAYASAN CATUR PRAYA TUNGGAL</b><br>
                      <b style="color: blue; font-size: 18px;"><?php echo $u->unit_pendidikan; ?></b><br>
                      <b style="color: black; font-size: 12px;"><?php echo $u->alamat_sekolah; ?><br></b>
                    </p>
                  </td>
                </tr>
              </table>
            </div>
            <div class="panel-body">
                <div class="row">
            	    <div class="col-lg-12">
            	    <h4 align="center">
                    <b style="font-size: 16px;">
                      TANDA BUKTI TERIMA SISWA<br>
                      TAHUN PELAJARAN <?php echo $u->tahun_ajaran; ?>
                    </b>
                  </h4>
                    <form role="form" action="#" onsubmit="return cekform();" id="frm1" name="frm1">
                    <div class="box-body">
                        <div class="form-group">
                        <?php foreach ($pembayaran as $m) { }?>
                       	<table class="table table-striped table-bordered table-hover" style="width: 100%">
  	                        <tr>
  	                        	<td>Telah diterima dari</td>
  	                        	<td>:</td>
  	                         	<td colspan="2"><?php echo $m->nama_siswa; ?></td>
  	                        </tr>
  	                        <tr>
  	                        	<td>NIS / NISN</td>
  	                        	<td>:</td>
  	                         	<td colspan="2"><?php echo $m->nis; ?></td>
  	                        </tr>  
  	                        <tr>
  	                        	<td>Kelas</td>
  	                        	<td>:</td>
  	                         	<td colspan="2"><?php echo $m->kelas; ?></td>
  	                        </tr>
  	                        <tr>
  	                        	<td>Guna Membayar</td>
  	                        	<td>:</td>
  	                         	<td colspan="2"></td>
  	                        </tr>
  	                        <?php 
	                            $i=0; $total=0;
	                            foreach ($detail_pembayaran as $k) { 
	                            $i++;
                          	?>    
                          	<tr>
	                          	<td></td>
	                            <td align="center"><?php echo $i; ?>.</td>
	                            <td align="left"><?php echo $k->tipe_pembayaran; ?></td>
	                            <td align="left">Rp. <?php echo number_format($k->nominal,2,',','.'); ?></td>
                          	</tr>
  	                        <?php 
  	                        	$total += $k->nominal;
  	                        } ?>
                          	<tr>
	                            <th colspan="3"></th>
	                            <th>Rp. <?php echo number_format($total,2,',','.'); ?></th>
                          	</tr>      
  	                    </table><br>
  	                    <table border="1">
  	                    	<tr>
  	                    		<td colspan="4">
  	                    			<b>
  	                    				<i>
  	                    					Terbilang :
  	                    					<?php
  	                    						function penyebut($nilai) {
													$nilai = abs($nilai);
													$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
													$temp = "";
													if ($nilai < 12) {
														$temp = " ". $huruf[$nilai];
													} else if ($nilai <20) {
														$temp = penyebut($nilai - 10). " belas";
													} else if ($nilai < 100) {
														$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
													} else if ($nilai < 200) {
														$temp = " seratus" . penyebut($nilai - 100);
													} else if ($nilai < 1000) {
														$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
													} else if ($nilai < 2000) {
														$temp = " seribu" . penyebut($nilai - 1000);
													} else if ($nilai < 1000000) {
														$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
													} else if ($nilai < 1000000000) {
														$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
													} else if ($nilai < 1000000000000) {
														$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
													} else if ($nilai < 1000000000000000) {
														$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
													}     
													return $temp;
												}

												function terbilang($nilai) {
													if ($nilai < 0) {
														$hasil = "minus ". trim(penyebut($nilai));
													} else if ($nilai > 0) {
														$hasil = trim(penyebut($nilai));
													} else {
														$hasil = "Kosong";
													}
													return $hasil;
												}

												echo terbilang($total);
  	                    					?> rupiah
  	                    				</i>
  	                    			</b>
  	                    		</td>
  	                    	</tr>
  	                    </table><br>
  	                    <table border="0" width="100%">
  	                    	<tr>
  	                    		<td width="60%" colspan="3"></td>
  	                    		<td align="center">Semarang, <?php echo date("d F Y"); ?></td>
  	                    	</tr>
  	                    	<tr>
  	                    		<td width="60%" colspan="3"></td>
  	                    		<td align="center">Penerima<br><br><br><br></td>
  	                    	</tr>
  	                    	<tr>
  	                    		<td width="60%" colspan="3"></td>
  	                    		<td align="center">(.................................................)<br><br></td>
  	                    	</tr>
                          <tr>
                            <td colspan="4">
                              <i><b>Catatan : uang yang sudah dibayarkan tidak bisa diminta kembali *).</b></i>
                            </td>
                          </tr>
  	                    </table>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>