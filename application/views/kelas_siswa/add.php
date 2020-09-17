<script type="text/javascript">
  function cekform()
  {
    if (!$("#id_tahun_ajaran").val()) 
    {
      alert('Tahun Pelajaran Tidak boleh kosong');
      $("#id_tahun_ajaran").focus()
      return false;
    }
    if (!$("#id_kelas").val()) 
    {
      alert('Kelas Tidak boleh kosong');
      $("#id_kelas").focus()
      return false;
    }
  }
</script>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Create Data</h3>
  </div>
  <form role="form" action="<?php echo base_url(); ?>kelas_siswa/save" method="POST" onsubmit="return cekform();">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputNama">Tahun Pelajaran <b style="color: red;">*</b></label>
        <select class="form-control select2" name="id_tahun_ajaran" id="id_tahun_ajaran" data-placeholder="Select Please">
          <?php foreach ($tahun_ajaran as $t) { ?>
            <option value="<?php echo $t->id_tahun_ajaran; ?>" ><?php echo $t->tahun_ajaran; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Kelas <b style="color: red;">*</b></label>
        <select class="form-control select2" name="id_kelas" id="id_kelas" data-placeholder="Select Please">
          <?php foreach ($kelas as $s) { ?>
            <option></option>
            <option value="<?php echo $s->id_kelas; ?>" ><?php echo $s->kelas; ?></option>
          <?php } ?>
        </select>
      </div>
      <?php foreach ($unit_pendidikan as $k) { } ?>
      <input type="hidden" class="form-control" name="id_unit_pendidikan" value="<?php echo $k->id_unit_pendidikan; ?>" id="id_unit_pendidikan" placeholder="Unit Pendidikan">
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
    </div>
  </form>
</div>
<!-- /.box -->