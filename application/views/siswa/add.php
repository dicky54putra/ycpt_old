<script type="text/javascript">
  function cekform() {
    if (!$("#nis").val()) {
      alert('Nis / Nisn Tidak boleh kosong');
      $("#nis").focus()
      return false;
    }
    if (!$("#nama_siswa").val()) {
      alert('Nama Siswa Tidak boleh kosong');
      $("#nama_siswa").focus()
      return false;
    }
    if (!$("#tempat_lahir").val()) {
      alert('Tempat Lahir Tidak boleh kosong');
      $("#tempat_lahir").focus()
      return false;
    }
    if (!$("#nama_ortu").val()) {
      alert('Nama Ortu Tidak boleh kosong');
      $("#nama_ortu").focus()
      return false;
    }
    if (!$("#id_tahun_ajaran").val()) {
      alert('id_tahun_ajaran Tidak boleh kosong');
      $("#id_tahun_ajaran").focus()
      return false;
    }
    if (!$("#alamat").val()) {
      alert('alamat Tidak boleh kosong');
      $("#alamat").focus()
      return false;
    }
  }
</script>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Create Data</h3>
  </div>
  <form role="form" action="<?php echo base_url(); ?>siswa/save" method="POST" onsubmit="return cekform();">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputNama">NIS / NISN <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="nis" id="nis" placeholder="NIS / NISN">
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Nama Siswa <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Nama Siswa">
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
          <input type="text" name="tanggal_lahir" readonly class="form-control pull-right" id="datepicker">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Tahun Ajaran <b style="color: red;">*</b></label>
        <select class="form-control select2" name="id_tahun_ajaran" id="id_tahun_ajaran" data-placeholder="Select Please">
          <option>Pilih Tahun Ajaran</option>
          <?php
          foreach ($tahun_ajaran as $ta) { ?>
            <option value="<?= $ta->id_tahun_ajaran ?>"><?= $ta->tahun_ajaran ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Nama Orang Tua / Wali <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="nama_ortu" id="nama_ortu" placeholder="Nama Orang Tua / Wali">
      </div>
      <div class="form-group">
        <label>Alamat <b style="color: red;">*</b></label>
        <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Alamat ..."></textarea>
      </div>
      <?php foreach ($unit_pendidikan as $k) {
      } ?>
      <input type="hidden" class="form-control" name="id_unit_pendidikan" value="<?php echo $k->id_unit_pendidikan; ?>" id="id_unit_pendidikan" placeholder="Unit Pendidikan">
      <input type="hidden" class="form-control" name="status" value="Aktif" placeholder="Status">
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
    </div>
  </form>
</div>