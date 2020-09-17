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
  <form role="form" action="<?php echo base_url(); ?>admin/save" method="POST" onsubmit="return cekform();">
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
      </div><!-- 
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