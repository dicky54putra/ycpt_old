<script type="text/javascript">
  function cekform()
  {
    if (!$("#unit_pendidikan").val()) 
    {
      alert('Unit Pendidikan Tidak boleh kosong');
      $("#unit_pendidikan").focus()
      return false;
    }
    if (!$("#alamat_sekolah").val()) 
    {
      alert('Alamat Sekolah Tidak boleh kosong');
      $("#alamat_sekolah").focus()
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
  <?php foreach($unit_pendidikan as $k){ ?>
  <form role="form" action="<?php echo base_url(); ?>unit_pendidikan/update" method="POST" onsubmit="return cekform();">
    <div class="box-body">
      <input type="hidden" class="form-control" name="id_unit_pendidikan" id="id_unit_pendidikan" placeholder="Enter ID" value="<?php echo $k->id_unit_pendidikan; ?>">
      <div class="form-group">
        <label for="exampleInputNama">Unit Pendidikan <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="unit_pendidikan" id="unit_pendidikan" placeholder="Unit Pendidikan" value="<?php echo $k->unit_pendidikan; ?>">
      </div>
      <div class="form-group">
        <label>Alamat <b style="color: red;">*</b></label>
        <textarea class="form-control" name="alamat_sekolah" id="alamat_sekolah" rows="3" placeholder="Alamat ..."><?php echo $k->alamat_sekolah; ?></textarea>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
      <a href="<?php echo base_url(); ?>unit_pendidikan" class="btn btn-primary"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</a>
    </div>
  </form>
  <?php } ?>
</div>
<!-- /.box -->