<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
     <?php foreach ($unit_pendidikan as $u) { } ?>
	   <div class="row">
        <div class="col-lg-6">
          <form role="form" action="<?php echo base_url(); ?>Laporan_spp/filter1/<?php echo $u->id_unit_pendidikan; ?>" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
          <div class="form-group">
					  <label for="exampleInputNama">Kelas</label>
						<select class="form-control select2" name="id_kelas_siswa" id="id_kelas_siswa" data-placeholder="Select Please">
						  <?php foreach ($kelas_siswa as $s) { ?>
						  <option></option>
						  <option value="<?php echo $s->id_kelas_siswa; ?>" ><?php echo $s->tahun_ajaran; ?> - <?php echo $s->kelas; ?></option>
						  <?php } ?>
						</select>
					</div>
          <div class="form-group">
            <label for="exampleInputNama">Tipe Pembayaran</label>
            <select class="form-control select2" name="id_setting_pembayaran" id="id_setting_pembayaran" data-placeholder="Select Please">
              <?php foreach ($setting_pembayaran as $p) { ?>
              <option></option>
              <option value="<?php echo $p->id_setting_pembayaran; ?>" ><?php echo $p->tahun_ajaran; ?> - <?php echo $p->tipe_pembayaran; ?></option>
              <?php } ?>
            </select>
          </div>
				  <div class="box-footer">
					  <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Filter</button>
				  </div>
          </form>
        </div>
      </div>
	  </div>
  </div>
  <div class="msg" style="display:none;">
    <?php echo @$this->session->flashdata('msg'); ?>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th>Jumlah SPP</th>
        </tr>
      </thead>
      <tbody>
       
      </tbody>
    </table>
  </div>
</div>