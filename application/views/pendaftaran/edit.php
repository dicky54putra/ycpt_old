<script type="text/javascript">
  function cekform()
  {
    if (!$("#nomor_daftar").val()) 
    {
      alert('Nomor Pendaftaran Tidak boleh kosong');
      $("#nomor_daftar").focus()
      return false;
    }
    if (!$("#nama_lengkap").val()) 
    {
      alert('Nama Lengkap Tidak boleh kosong');
      $("#nama_lengkap").focus()
      return false;
    }
    if (!$("#tempat_lahir").val()) 
    {
      alert('Tempat Lahir Tidak boleh kosong');
      $("#tempat_lahir").focus()
      return false;
    }
    if (!$("#nama_ortu").val()) 
    {
      alert('Nama Ortu Tidak boleh kosong');
      $("#nama_ortu").focus()
      return false;
    }
    if (!$("#alamat").val()) 
    {
      alert('alamat Tidak boleh kosong');
      $("#alamat").focus()
      return false;
    }
    if (!$("#sekolah_asal").val()) 
    {
      alert('Sekolah Asal Tidak boleh kosong');
      $("#sekolah_asal").focus()
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
  <?php foreach($pendaftaran as $k){ ?>
  <form role="form" action="<?php echo base_url(); ?>pendaftaran/update" method="POST" onsubmit="return cekform();">
    <div class="box-body">
      <input type="hidden" class="form-control" name="id_daftar" id="id_daftar" placeholder="Enter ID" value="<?php echo $k->id_daftar; ?>">
      <div class="form-group">
        <label for="exampleInputNama">Nomor Pendaftaran <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="nomor_daftar" id="nomor_daftar" placeholder="Nomor Pendaftaran" value="<?php echo $k->nomor_daftar; ?>">
      </div>
      <div class="form-group">
        <label>Tanggal Daftar</label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" name="tanggal_daftar" value="<?php echo $k->tanggal_daftar; ?>" class="form-control pull-right" id="datepicker">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Nama Lengkap <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $k->nama_lengkap; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Tempat Lahir <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $k->tempat_lahir; ?>">
      </div>
      <div class="form-group">
        <label>Tanggal Lahir</label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" name="tanggal_lahir" value="<?php echo $k->tanggal_lahir; ?>" class="form-control pull-right" id="datepicker">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Nama Orang Tua / Wali <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="nama_ortu" id="nama_ortu" placeholder="Nama Orang Tua / Wali" value="<?php echo $k->nama_ortu; ?>">
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Alamat ..."><?php echo $k->alamat; ?></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Sekolah Asal <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="sekolah_asal" id="sekolah_asal" placeholder="Sekolah Asal" value="<?php echo $k->sekolah_asal; ?>">
      </div>
      <input type="hidden" class="form-control" name="status" placeholder="Status" value="<?php echo $k->status; ?>">
      <input type="hidden" class="form-control" name="id_unit_pendidikan" placeholder="Unit Pendidikan" value="<?php echo $k->id_unit_pendidikan; ?>">
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
      <a href="<?php echo base_url(); ?>pendaftaran" class="btn btn-primary"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</a>
    </div>
  </form>
  <?php } ?>
</div>
<!-- /.box -->