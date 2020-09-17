<script type="text/javascript">
  function cekform()
  {
    if (!$("#nis").val()) 
    {
      alert('Nis / Nisn Tidak boleh kosong');
      $("#nis").focus()
      return false;
    }
    if (!$("#nama_siswa").val()) 
    {
      alert('Nama Siswa Tidak boleh kosong');
      $("#nama_siswa").focus()
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
    if (!$("#status").val()) 
    {
      alert('status Tidak boleh kosong');
      $("#status").focus()
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
  <?php foreach($siswa as $k){ ?>
  <form role="form" action="<?php echo base_url(); ?>siswa/update" method="POST" onsubmit="return cekform();">
    <div class="box-body">
      <input type="hidden" class="form-control" name="id_siswa" id="id_siswa" placeholder="Enter ID" value="<?php echo $k->id_siswa; ?>">
      <div class="form-group">
        <label for="exampleInputNama">NIS / NISN <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="nis" id="nis" placeholder="NIS / NISN" value="<?php echo $k->nis; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Nama Siswa <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Nama Siswa" value="<?php echo $k->nama_siswa; ?>">
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
      <input type="hidden" class="form-control" name="id_unit_pendidikan" placeholder="Unit Pendidikan" value="<?php echo $k->id_unit_pendidikan; ?>">
      <div class="form-group">
        <label for="exampleInputNama">Status <b style="color: red;">*</b></label>
        <select class="form-control select2" name="status" id="status" data-placeholder="Select Please">
            <option><?php echo $k->status; ?></option>
            <option>Aktif</option>
            <option>Tidak Aktif</option>
        </select>
      </div>
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
      <a href="<?php echo base_url(); ?>siswa" class="btn btn-primary"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</a>
    </div>
  </form>
  <?php } ?>
</div>
<!-- /.box -->