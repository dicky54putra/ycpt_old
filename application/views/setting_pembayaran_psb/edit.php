<script type="text/javascript">
  function cekform() {
    if (!$("#id_tahun_ajaran").val()) {
      alert('Tahun Ajaran Tidak boleh kosong');
      $("#id_tahun_ajaran").focus()
      return false;
    }
    if (!$("#id_tipe_pembayaran").val()) {
      alert('Tipe Pembayaran Tidak boleh kosong');
      $("#id_tipe_pembayaran").focus()
      return false;
    }
    // if (!$("#nominal").val()) 
    // {
    //   alert('Nominal Tidak boleh kosong');
    //   $("#nominal").focus()
    //   return false;
    // }
    if (!$("#id_unit_pendidikan").val()) {
      alert('Unit Pendidikan Tidak boleh kosong');
      $("#id_unit_pendidikan").focus()
      return false;
    }
    if (!$("#jenis_kelamin").val()) {
      alert('Jenis Kelamin Tidak boleh kosong');
      $("#jenis_kelamin").focus()
      return false;
    }
  }
</script>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Data</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <?php foreach ($setting_pembayaran as $k) { ?>
    <form role="form" action="<?php echo base_url(); ?>setting_pembayaran_psb/update" method="POST" onsubmit="return cekform();">
      <div class="box-body">
        <input type="hidden" class="form-control" name="id_setting_pembayaran_psb" id="id_setting_pembayaran_psb" placeholder="Enter ID" value="<?php echo $k->id_setting_pembayaran_psb; ?>">
        <div class="form-group">
          <label for="exampleInputNama">Tahun Pelajaran<b style="color: red;">*</b></label>
          <select class="form-control select2" name="id_tahun_ajaran" id="id_tahun_ajaran" data-placeholder="Select Tahun Ajaran">
            <option></option>
            <?php foreach ($tahun_ajaran as $j) { ?>
              <option value="<?php echo $j->id_tahun_ajaran; ?>" <?php if ($j->id_tahun_ajaran == $k->id_tahun_ajaran) {
                                                                    echo "selected='selected'";
                                                                  } ?>><?php echo $j->tahun_ajaran; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputNama">Tipe Pembayaran<b style="color: red;">*</b></label>
          <select class="form-control select2" name="id_tipe_pembayaran" id="id_tipe_pembayaran" data-placeholder="Select Tipe Pembayaran">
            <option></option>
            <?php foreach ($tipe_pembayaran as $j) { ?>
              <option value="<?php echo $j->id_tipe_pembayaran; ?>" <?php echo ($j->id_tipe_pembayaran == $k->id_tipe_pembayaran) ? 'selected' : ''; ?>><?php echo $j->tipe_pembayaran; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="jenis_kelamin">Jenis Kelamin<b style="color: red;">*</b></label>
          <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" data-placeholder="Select Jenis Kelamin">
            <option>Select Jenis Kelamin</option>
            <option value="0" <?php echo ($k->jenis_kelamin == 0) ? 'selected' : ''; ?>>All</option>
            <option value="1" <?php echo ($k->jenis_kelamin == 1) ? 'selected' : ''; ?>>Laki-Laki</option>
            <option value="2" <?php echo ($k->jenis_kelamin == 2) ? 'selected' : ''; ?>>Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputNama">Nominal <b style="color: red;">* Nominal tidak perlu di input jika tipe pembayaran nya tidak memiliki nominal</b></label>
          <input type="text" class="form-control" name="nominal" placeholder="Nominal" value="<?php echo $k->nominal; ?>">
        </div>
        <input type="hidden" class="form-control" name="id_unit_pendidikan" id="id_unit_pendidikan" placeholder="Unit Pendidikan" value="<?php echo $k->id_unit_pendidikan; ?>">
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
        <a href="<?php echo base_url(); ?>setting_pembayaran" class="btn btn-primary"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</a>
      </div>
    </form>
  <?php } ?>
</div>
<!-- /.box -->