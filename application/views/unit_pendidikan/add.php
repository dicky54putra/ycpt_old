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
    <h3 class="box-title">Create Data</h3>
  </div>
  <form role="form" action="<?php echo base_url(); ?>unit_pendidikan/save" method="POST" onsubmit="return cekform();">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputNama">Unit Pendidikan <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="unit_pendidikan" id="unit_pendidikan" placeholder="Unit Pendidikan">
      </div>
      <div class="form-group">
        <label>Alamat <b style="color: red;">*</b></label>
        <textarea class="form-control" name="alamat_sekolah" id="alamat_sekolah" rows="3" placeholder="Alamat ..."></textarea>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
    </div>
  </form>
</div>
<!-- /.box -->