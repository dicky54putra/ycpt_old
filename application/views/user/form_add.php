<script type="text/javascript">
  function cekform()
  {
    if (!$("#nama").val()) 
    {
      alert('Nama Tidak boleh kosong');
      $("#nama").focus()
      return false;
    }
    if (!$("#username").val()) 
    {
      alert('Username Tidak boleh kosong');
      $("#username").focus()
      return false;
    }
    if (!$("#password").val()) 
    {
      alert('Password Tidak boleh kosong');
      $("#password").focus()
      return false;
    }
  }
</script>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Create Data</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" action="<?php echo base_url(); ?>user/save" method="POST" onsubmit="return cekform();">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputNama">Nama Admin</label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Nama">
      </div>
      <div class="form-group">
        <label for="exampleInputUsername">Username</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Unit Pendidikan<b style="color: red;">*</b></label>
        <select class="form-control select2" name="id_unit_pendidikan" id="id_unit_pendidikan" data-placeholder="Select Unit Pendidikan">
          <?php foreach ($unit_pendidikan as $k) { ?>
            <option></option>
            <option value="<?php echo $k->id_unit_pendidikan; ?>" ><?php echo $k->unit_pendidikan; ?></option>
          <?php } ?>
        </select>
      </div>
      <!-- 
      <div class="form-group">
        <label for="exampleInputFile">Foto</label>
        <input type="file" name="foto" id="exampleInputFile">
      </div> -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </form>
</div>
<!-- /.box -->