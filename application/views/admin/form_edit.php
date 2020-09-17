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
    // if (!$("#password").val()) 
    // {
    //   alert('Password Tidak boleh kosong');
    //   $("#password").focus()
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
  <?php foreach($admin as $a){ ?>
  <form role="form" action="<?php echo base_url(); ?>admin/update" method="POST" onsubmit="return cekform();">
    <div class="box-body">
      <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter ID" value="<?php echo $a->id; ?>">
      <div class="form-group">
        <label for="exampleInputNama">Nama Admin</label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Nama" value="<?php echo $a->nama; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputUsername">Username</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="username" value="<?php echo $a->username; ?>">
      </div>
      <!--
      <div class="form-group">
        <label for="exampleInputPassword">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" value="<?php echo $a->password; ?>">
      </div>
      -->
      <!-- <div class="form-group">
        <label for="exampleInputFile">Foto</label>
        <input type="file" id="exampleInputFile">
      </div> -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </form>
  <?php } ?>
</div>
<!-- /.box -->