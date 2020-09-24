<script type="text/javascript">
  function cekform() {
    // if (!$("#id").val()) 
    // {
    //   alert('Kelas Tidak boleh kosong');
    //   $("#id").focus()
    //   return false;
    // }
  }
</script>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Data</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <?php foreach ($kelas_siswa as $k) { ?>
    <form role="form" action="<?php echo base_url(); ?>kelas_siswa/update" method="POST" onsubmit="return cekform();">
      <div class="box-body">
        <input type="hidden" class="form-control" name="id_kelas_siswa" id="id_kelas_siswa" placeholder="Enter ID" value="<?php echo $k->id_kelas_siswa; ?>">
        <div class="form-group">
          <label for="exampleInputNama">Tahun Ajaran<b style="color: red;">*</b></label>
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
          <label for="exampleInputNama">Kelas<b style="color: red;">*</b></label>
          <select class="form-control select2" name="id_kelas" id="id_kelas" data-placeholder="Select Kelas">
            <option></option>
            <?php foreach ($kelas as $j) { ?>
              <option value="<?php echo $j->id_kelas; ?>" <?php if ($j->id_kelas == $k->id_kelas) {
                                                            echo "selected='selected'";
                                                          } ?>><?php echo $j->nama_tipe_kelas . ' ' . $j->kelas; ?></option>
            <?php } ?>
          </select>
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