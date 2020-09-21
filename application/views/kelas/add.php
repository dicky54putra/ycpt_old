<script type="text/javascript">
  function cekform() {
    if (!$("#kelas").val()) {
      alert('Kelas Tidak boleh kosong');
      $("#kelas").focus()
      return false;
    }
  }
</script>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Create Data</h3>
  </div>
  <form role="form" action="<?php echo base_url(); ?>kelas/save" method="POST" onsubmit="return cekform();">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputNama">Tiep Kelas <b style="color: red;">*</b></label>
        <select class="form-control select2" name="id_tipe_kelas" id="id_tipe_kelas" data-placeholder="Select Please">
          <?php foreach ($tipe_kelas as $s) { ?>
            <option></option>
            <option value="<?php echo $s->id_tipe_kelas; ?>"><?php echo $s->nama_tipe_kelas; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Kelas <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas">
      </div>
      <?php foreach ($unit_pendidikan as $k) {
      } ?>
      <input type="hidden" class="form-control" name="id_unit_pendidikan" value="<?php echo $k->id_unit_pendidikan; ?>" id="id_unit_pendidikan" placeholder="Unit Pendidikan">
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
    </div>
  </form>
</div>
<!-- /.box -->