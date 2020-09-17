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
    if (!$("#status").val()) 
    {
      alert('Status Tidak boleh kosong');
      $("#status").focus()
      return false;
    }
  }
</script>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Create Data</h3>
  </div>
  <form role="form" action="<?php echo base_url(); ?>pendaftaran/save" method="POST" onsubmit="return cekform();">
    <div class="box-body">
      <?php foreach ($tahun_ajaran as $t) { } ?>
      <input type="hidden" class="form-control" name="id_tahun_ajaran" value="<?php echo $t->id_tahun_ajaran; ?>" placeholder="Tahun Pelajaran">
       <div class="form-group">
        <label for="exampleInputNama">Nomor Pendaftaran <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="nomor_daftar" id="nomor_daftar" placeholder="Nomor Pendaftaran"  value="<?php echo $kodeunik; ?>">
      </div>
      <div class="form-group">
        <label>Tanggal Daftar <b style="color: red;">*</b></label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" name="tanggal_daftar" readonly class="form-control pull-right" value="<?php echo date("Y-m-d"); ?>" id="datepicker">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Nama Lengkap <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap">
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Tempat Lahir <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir">
      </div>
      <div class="form-group">
        <label>Tanggal Lahir <b style="color: red;">*</b></label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" name="tanggal_lahir" readonly class="form-control pull-right" value="<?php echo date("Y-m-d"); ?>" id="datepicker1">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Nama Orang Tua / Wali <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="nama_ortu" id="nama_ortu" placeholder="Nama Orang Tua / Wali">
      </div>
      <div class="form-group">
        <label>Alamat <b style="color: red;">*</b></label>
        <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Alamat ..."></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Sekolah Asal <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="sekolah_asal" id="sekolah_asal" placeholder="Sekolah Asal">
      </div>
      <input type="hidden" class="form-control" name="status" value="Pending" id="status" placeholder="Status">
      <!-- <div class="form-group">
        <label>Status Pendaftaran <b style="color: red;">*</b></label><br>
        <select class="form-control select2" name="status" id="status" data-placeholder="Select a State">
          <option></option>
          <option>Pending</option>
          <option>Approved</option>
          <option>Cancel</option>
        </select>
      </div> -->
      <?php foreach ($unit_pendidikan as $k) { } ?>
      <input type="hidden" class="form-control" name="id_unit_pendidikan" value="<?php echo $k->id_unit_pendidikan; ?>" id="id_unit_pendidikan" placeholder="Unit Pendidikan">
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
    </div>
  </form>
</div>