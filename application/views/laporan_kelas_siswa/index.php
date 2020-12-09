<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">

      <div class="row">
        <div class="col-lg-6">
          <form role="form" action="<?php echo base_url(); ?>Laporan_kelas_siswa/filter" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
            <div class="form-group">
              <label for="exampleInputNama">Tahun Pelajaran - Kelas</label>
              <select class="form-control select2" name="id_kelas_siswa" id="id_kelas_siswa" data-placeholder="Select Please">
                <?php foreach ($kelas_siswa as $s) { ?>
                  <option></option>
                  <option value="<?php echo $s->id_kelas_siswa; ?>"><?php echo $s->tahun_ajaran; ?> - <?php echo $s->nama_tipe_kelas . ' ' . $s->kelas; ?></option>
                <?php } ?>
              </select>
            </div>
            <!-- <div class="form-group">
            <label for="exampleInputNama">Status</label>
            <select class="form-control select2" name="status" id="status" data-placeholder="Select Please">
              <option></option>
              <option>Pending</option>
              <option>Approved</option>
              <option>Cancel</option>
            </select>
          </div> -->
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
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>