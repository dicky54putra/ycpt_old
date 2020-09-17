<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
       
	   <div class="row">
        <div class="col-lg-6">
          <form role="form" action="<?php echo base_url(); ?>Laporan_pembayaran/filter1" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
          <?php foreach ($unit_pendidikan as $k) { } ?>
          <input type="hidden" name="id_unit_pendidikan" value="<?php echo $k->id_unit_pendidikan ?>">
          <div class="form-group">
					  <label for="exampleInputNama">Dari Tanggal</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="dari_tanggal" value="<?php echo date("Y-m-d"); ?>" readonly class="form-control pull-right" id="datepicker">
            </div>
					</div>
          <div class="form-group">
            <label for="exampleInputNama">Sampai Tanggal</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="sampai_tanggal" value="<?php echo date("Y-m-d"); ?>" readonly class="form-control pull-right" id="datepicker1">
            </div>
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
          <th>Tanggal</th>
          <th>Kelas</th>
          <th>NIS & Nama Siswa</th>
          <th>Tipe Pembayaran</th>
          <th>Nominal</th>
        </tr>
      </thead>
      <tbody>
       
      </tbody>
    </table>
  </div>
</div>