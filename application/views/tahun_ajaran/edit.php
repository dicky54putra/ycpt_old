<script type="text/javascript">
  function cekform() {
    if (!$("#tahun_ajaran").val()) {
      alert('Tahun Ajaran Tidak boleh kosong');
      $("#tahun_ajaran").focus()
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
  <?php foreach ($tahun_ajaran as $k) { ?>
    <form role="form" action="<?php echo base_url(); ?>tahun_ajaran/update" method="POST" onsubmit="return cekform();">
      <div class="box-body">
        <input type="hidden" class="form-control" name="id_tahun_ajaran" id="id_ktahun_ajaran" placeholder="Enter ID" value="<?php echo $k->id_tahun_ajaran; ?>">
        <div class="form-group">
          <label for="exampleInputNama">Tahun Pelajaran <b style="color: red;">*</b></label>
          <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" placeholder="Tahun Ajaran" value="<?php echo $k->tahun_ajaran; ?>">
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
        <a href="<?php echo base_url(); ?>tahun_ajaran" class="btn btn-primary"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</a>
      </div>
    </form>
  <?php } ?>
</div>
<!-- /.box -->