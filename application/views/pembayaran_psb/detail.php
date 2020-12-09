<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"></h3>
	</div>
	<div class="msg" style="display:none;">
		<?php echo @$this->session->flashdata('msg'); ?>
	</div>
	<?php foreach ($pembayaran_psb as $m) {
	} ?>
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<!-- <img class="img-rounded" src="<?php echo base_url(); ?>assets/img/<?php echo $m->foto; ?>" id="img" alt="maaf foto tidak ada" width=150 height=150> -->
					<b>Detail Data Pendaftaran :</b>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form role="form" action="#" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
								<div class="form-group">
									<table class="table table-striped table-bordered table-hover" style="width: 100%">
										</tr>
										<td>Nomor Pendaftaran</td>
										<td><?php echo $m->nomor_daftar; ?></td>
										</tr>
										<tr>
											<td>Tanggal Daftar</td>
											<td>
												<?php
												$data = $m->tanggal_daftar;
												$datanew = new DateTime($data);
												echo $datanew->format('d F Y');
												?>
											</td>
										</tr>
										</tr>
										<td>Nama Lengkap</td>
										<td><?php echo $m->nama_lengkap; ?></td>
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
										</tr>
										<td>Jenis Kelamin</td>
										<td><?php echo ($m->jenis_kelamin == 1) ? 'Laki-laki' : $retVal = ($m->jenis_kelamin == 2) ? 'Perempuan' : ''; ?></td>
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
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<b>Tambahkan Pembayaran :</b>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form role="form" action="<?php echo base_url(); ?>pembayaran_psb/save_dua" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
								<input type="hidden" class="form-control" value="<?php echo $m->id_pembayaran_psb; ?>" name="id_pembayaran_psb" placeholder="ID">
								<div class="form-group">
									<label for="exampleInputNama">Setting Pembayaran PPBD <b style="color: red;">*</b></label>
									<select class="form-control select2" name="id_setting_pembayaran_psb" id="id_setting_pembayaran_psb" data-placeholder="Select Please">
										<?php foreach ($setting_pembayaran_psb as $s) { ?>
											<option></option>
											<option value="<?php echo $s->id_setting_pembayaran_psb; ?>">Tahun Pelajaran : <?php echo $s->tahun_ajaran; ?> || Tipe Pembayaran : <?php echo $s->tipe_pembayaran; ?> || Nominal Yang Harus Dibayar : Rp. <?php echo number_format($s->nominal, '2', ',', '.'); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputNama">Nominal <b style="color: red;">*</b></label>
									<input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal">
									<input type="hidden" class="form-control" name="id_pendaftaran" id="id_pendaftaran" placeholder="id_pendaftaran" value="<?= $m->id_daftar ?>">
								</div>
								<div class="box-footer">
									<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<b>Detail Pembayaran : </b>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form role="form" action="#" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
								<div class="form-group">
									<table class="table table-striped table-bordered table-hover" style="width: 100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Tipe Pembayaran</th>
												<th>Nominal</th>
												<th style="text-align: center;">Aksi</th>
											</tr>
										</thead>
										<tbody id="data-driver">
											<?php
											$no = 1;
											foreach ($detail_pembayaran_psb as $k) {
											?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $k->tipe_pembayaran; ?></td>
													<td>Rp. <?php echo number_format($k->nominal, 2, ',', '.'); ?></td>
													<td class="text-center" style="min-width:230px;">
														<a class="btn btn-danger" href="<?php echo base_url(); ?>pembayaran_psb/delete/<?php echo $k->id_detail_pembayaran_psb; ?>/<?php echo $m->id_pembayaran_psb; ?>" onclick="return confirm('Anda yakin akan menghapus data ini...!')">
															<i class="glyphicon glyphicon-trash"></i> Delete
														</a>
													</td>
												</tr>
											<?php } ?>
											<?php foreach ($total_pembayaran as $k2) {
											} ?>
											<tr>
												<td colspan="2"><b>TOTAL HARGA</b></td>
												<td><b>Rp. <?php echo number_format($k2->total, 2, ',', '.'); ?></b></td>
												<td>
													<a class="btn btn-info" target="_blank" href="<?php echo base_url(); ?>pembayaran_psb/cetak/<?php echo $m->id_pembayaran_psb; ?>"><i class="glyphicon glyphicon-print"></i> Print</a>
													<a href="<?php echo base_url(); ?>pembayaran_psb" class="btn btn-primary"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="row">
	<div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>Riwayat Pembayaran : </b>
            </div>
            <div class="msg" style="display:none;">
		    	<?php echo @$this->session->flashdata('msg'); ?>
			</div>
			<div class="box-body">
		    <table id="list-data" class="table table-bordered table-striped">
		      <thead>
		        <tr>
		          <th>No</th>
		          <th>Tahun Ajaran</th>
		          <th>Tipe Pembayaran</th>
		          <th>Global Pembayaran</th>
		          <th>Pembayaran</th>
		          <th>Kekurangan</th>
		          <th>Status</th> -->
	<!-- <th style="text-align: center;">Aksi</th> -->
	<!-- </tr>
		      </thead>
		      <tbody> -->
	<!-- <?php
			$no = 1;
			foreach ($setting_pembayaran as $k) {
			?> -->
	<tr>
		<!-- <td><?php echo $no++; ?></td>
		          <td><?php echo $k->tahun_ajaran; ?></td>
		          <td><?php echo $k->tipe_pembayaran; ?></td>
		          <td>Rp.<?php echo number_format($k->nominal, 2, ',', '.'); ?></td>
		          <td> -->
		<?php
				// error_reporting(0);
				// $id_tipe_pembayaran = $k->id_tipe_pembayaran;
				// $nomor_daftar       = $this->uri->segment(3);

				// $query = $this->db->query("SELECT a.*, SUM(a.nominal) AS TOTAL from detail_pembayaran_psb a
				//                            LEFT JOIN pembayaran_psb b on b.id_pembayaran_psb = a.id_pembayaran_psb
				//                            LEFT JOIN pendaftaran c on c.id_daftar = b.id_daftar
				//                            LEFT JOIN setting_pembayaran_psb d on d.id_setting_pembayaran_psb = a.id_setting_pembayaran_psb
				//                            LEFT JOIN tipe_pembayaran e on e.id_tipe_pembayaran = d.id_tipe_pembayaran
				//                            WHERE c.nomor_daftar = '$nomor_daftar' and e.id_tipe_pembayaran = '$id_tipe_pembayaran'");

				// foreach ($query->result() as $row){ }
		?>
		<!-- Rp. <?php echo number_format($row->TOTAL, 2, ',', '.'); ?> -->
		<!-- </td>
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
					if ($hasil == 0) {
						echo 'LUNAS';
					} else {
						echo 'BELUM LUNAS';
					}
					?>
		          </td> -->
		<!-- <td class="text-center" style="min-width:230px;">
		            <a href="<?php echo base_url(); ?>riwayat_pembayaran/detail_dua/<?php echo $k->nis; ?>">
		              <button class="btn btn-info"><i class="glyphicon glyphicon-zoom-in"></i> Detail</button>
		            </a>
		          </td> -->
		<!-- </tr> -->
		<!-- <?php } ?> -->
		<!-- </tbody>
		    </table>
		  </div>
		</div>
	</div> -->
</div>
</div>