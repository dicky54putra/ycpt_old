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
    <h3 class="box-title">Edit Data</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <?php foreach ($kelas as $k) { ?>
    <form role="form" action="<?php echo base_url(); ?>kelas/update" method="POST" onsubmit="return cekform();">
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputNama">Tiep Kelas <b style="color: red;">*</b></label>
          <select class="form-control select2" name="id_tipe_kelas" id="id_tipe_kelas" data-placeholder="Select Please">
            <?php foreach ($tipe_kelas as $s) {
              if ($s->id_tipe_kelas == $k->id_tipe_kelas) {
                $selected = 'selected';
              } else {
                $selected = '';
              }
            ?>
              <option></option>
              <option value="<?php echo $s->id_tipe_kelas; ?>" <?= $selected ?>><?php echo $s->nama_tipe_kelas; ?></option>
            <?php } ?>
          </select>
        </div>
        <input type="hidden" class="form-control" name="id_kelas" id="id_kelas" placeholder="Enter ID" value="<?php echo $k->id_kelas; ?>">
        <div class="form-group">
          <label for="exampleInputNama">Kelas <b style="color: red;">*</b></label>
          <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $k->kelas; ?>">
        </div>
        <input type="hidden" class="form-control" name="id_unit_pendidikan" placeholder="Unit Pendidikan" value="<?php echo $k->id_unit_pendidikan; ?>">
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
        <a href="<?php echo base_url(); ?>kelas" class="btn btn-primary"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</a>
      </div>
    </form>
  <?php } ?>
</div>
<!-- /.box -->