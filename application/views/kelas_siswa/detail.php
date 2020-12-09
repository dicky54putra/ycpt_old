<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"></h3>
	</div>
	<?php foreach ($kelas as $m) {
	} ?>
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<!-- <img class="img-rounded" src="<?php echo base_url(); ?>assets/img/<?php echo $m->foto; ?>" id="img" alt="maaf foto tidak ada" width=150 height=150> -->
					<b>Detail Data Kelas Siswa :</b>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form role="form" action="#" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
								<div class="form-group">
									<table class="table table-striped table-bordered table-hover" style="width: 100%">
										</tr>
										<td>Tahun Pelajaran</td>
										<td><?php echo $m->tahun_ajaran; ?></td>
										</tr>
										</tr>
										<td>Kelas</td>
										<td><?php echo $m->nama_tipe_kelas . ' ' . $m->kelas; ?></td>
										</tr>
										<tr>
											<td>Jumlah Siswa</td>
											<td>
												<?php
												// error_reporting(0);
												$id_kelas = $m->id_kelas_siswa;
												// $nis                = $this->uri->segment(3);

												$query = $this->db->query("SELECT COUNT(*) AS total_siswa FROM kelas_siswa_detail
								                                         WHERE id_kelas_siswa = '$id_kelas'");

												foreach ($query->result() as $row) {
												}
												?>
												<?php echo $row->total_siswa; ?>
											</td>
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
					<b>Tambahkan Siswa :</b>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form role="form" action="<?php echo base_url(); ?>kelas_siswa/save_siswa" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
								<input type="hidden" class="form-control" value="<?php echo $m->id_kelas_siswa; ?>" name="id_kelas_siswa" placeholder="ID">
								<div class="form-group">
									<label for="exampleInputNama">NIS / Siswa <b style="color: red;">*</b></label>
									<select class="form-control select2" name="id_siswa" id="id_siswa" data-placeholder="Select Please">
										<?php foreach ($siswa as $s) { ?>
											<option></option>
											<option value="<?php echo $s->id_siswa; ?>"><?php echo $s->nis; ?> - <?php echo $s->nama_siswa; ?></option>
										<?php } ?>
									</select>
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
					<b>Daftar Siswa : </b>
				</div>
				<div class="msg" style="display:none;">
					<?php echo @$this->session->flashdata('msg'); ?>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form role="form" action="#" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
								<div class="form-group">
									<table id="list-data" class="table table-bordered table-striped" style="width: 100%">
										<thead>
											<tr>
												<th>No</th>
												<th>NIS</th>
												<th>Nama Siswa</th>
												<th style="text-align: center;">Aksi</th>
											</tr>
										</thead>
										<tbody id="data-driver">
											<?php
											$no = 1;
											foreach ($kelas_siswa as $k) {
											?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $k->nis; ?></td>
													<td><?php echo $k->nama_siswa; ?></td>
													<td class="text-center" style="min-width:230px;">
														<a class="btn btn-danger" href="<?php echo base_url(); ?>kelas_siswa/delete_siswa/<?php echo $k->id_kelas_siswa_detail; ?>/<?php echo $m->id_kelas_siswa; ?>" onclick="return confirm('Anda yakin akan menghapus data ini...!')"><i class="glyphicon glyphicon-trash"></i> Delete
														</a>
													</td>
												</tr>
											<?php } ?>
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
</div>