<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"></h3>
	</div>
	<div class="msg" style="display:none;">
		<?php echo @$this->session->flashdata('msg'); ?>
	</div>
	<?php foreach ($pembayaran as $m) {
	} ?>
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<!-- <img class="img-rounded" src="<?php echo base_url(); ?>assets/img/<?php echo $m->foto; ?>" id="img" alt="maaf foto tidak ada" width=150 height=150> -->
					<b>Detail Data Siswa :</b>
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
										</tr>
										<td>Kelas</td>
										<td><?php echo $m->nama_tipe_kelas . ' ' . $m->kelas; ?></td>
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
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<b>Tambahkan Pembayaran :</b>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form role="form" action="<?php echo base_url(); ?>pembayaran/save_dua" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
								<input type="hidden" class="form-control" value="<?php echo $m->id_pembayaran; ?>" name="id_pembayaran" placeholder="ID">
								<div class="form-group">
									<label for="exampleInputNama">Setting Pembayaran <b style="color: red;">*</b></label>
									<select class="form-control select2" name="id_setting_pembayaran" id="id_setting_pembayaran" data-placeholder="Select Please" onclick="function tipe()">
										<?php foreach ($setting_pembayaran as $s) { ?>
											<option></option>
											<option value="<?php echo $s->id_setting_pembayaran; ?>">Tahun Ajaran : <?php echo $s->tahun_ajaran; ?> || Tipe Pembayaran : <?php echo $s->tipe_pembayaran; ?> || Nominal Yang Harus Dibayar : Rp. <?php echo number_format($s->nominal, '2', ',', '.'); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputNama">Nominal <b style="color: red;">*</b></label>
									<input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal">
									<input type="hidden" class="form-control" name="nis" id="nis" placeholder="nis" value="<?= $m->nis ?>">
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
											foreach ($detail_pembayaran as $k) {
											?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $k->tipe_pembayaran; ?></td>
													<td>Rp. <?php echo number_format($k->nominal, 2, ',', '.'); ?></td>
													<td class="text-center" style="min-width:230px;">
														<a class="btn btn-danger" href="<?php echo base_url(); ?>pembayaran/delete/<?php echo $k->id_detail_pembayaran; ?>/<?php echo $m->id_pembayaran; ?>" onclick="return confirm('Anda yakin akan menghapus data ini...!')">
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
													<a class="btn btn-info" target="_blank" href="<?php echo base_url(); ?>pembayaran/cetak/<?php echo $m->id_pembayaran; ?>"><i class="glyphicon glyphicon-print"></i> Print</a>
													<a href="<?php echo base_url(); ?>pembayaran" class="btn btn-primary"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</a>
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
</div>

<script>
	function tipe() {
		// var id_tipe = document.querySelector("#id_tipe_pembayaran");
		console.log('id_tipe');
	}
</script>