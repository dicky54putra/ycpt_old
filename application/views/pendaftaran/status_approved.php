<script type="text/javascript">
  function cekform()
  {
    if (!$("#nis").val()) 
    {
      alert('NIS / NISN Tidak boleh kosong');
      $("#nis").focus()
      return false;
    }
  }
</script>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">New Create Data Siswa</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <?php foreach($pendaftaran as $k){ ?>
  <form role="form" action="<?php echo base_url(); ?>pendaftaran/save_status_approved" method="POST" onsubmit="return cekform();">
    <div class="box-body">
      <input type="hidden" class="form-control" name="id_daftar" placeholder="Enter ID" value="<?php echo $k->id_daftar; ?>">
      <input type="hidden" class="form-control" name="id_tahun_ajaran" placeholder="Tahun Ajaran" value="<?php echo $k->id_tahun_ajaran; ?>">
      <div class="form-group">
        <label for="exampleInputNama">Buat NIS / NISN Siswa <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="nis" id="nis" placeholder="NIS / NISN">
      </div>
      <input type="hidden" class="form-control" name="nama_siswa" placeholder="Nama Siswa" value="<?php echo $k->nama_lengkap; ?>">
      <input type="hidden" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $k->tempat_lahir; ?>">
      <input type="hidden" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $k->tanggal_lahir; ?>">
      <input type="hidden" class="form-control" name="nama_ortu" placeholder="Nama Orang tua / wali" value="<?php echo $k->nama_ortu; ?>">
      <input type="hidden" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $k->alamat; ?>">
      <input type="hidden" class="form-control" name="id_unit_pendidikan" placeholder="Unit Pendidikan" value="<?php echo $k->id_unit_pendidikan; ?>">
      <input type="hidden" class="form-control" name="status" placeholder="Status" value="Aktif">
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
      <a href="<?php echo base_url(); ?>pendaftaran" class="btn btn-primary"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</a>
    </div>
  </form>
  <?php } ?>
</div>
<!-- /.box -->