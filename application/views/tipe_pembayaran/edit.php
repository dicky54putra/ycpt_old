<script type="text/javascript">
  function cekform()
  {
    if (!$("#tipe_pembayaran").val()) 
    {
      alert('Tipe Pembayaran Tidak boleh kosong');
      $("#tipe_pembayaran").focus()
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
  <?php foreach($tipe_pembayaran as $k){ ?>
  <form role="form" action="<?php echo base_url(); ?>tipe_pembayaran/update" method="POST" onsubmit="return cekform();">
    <div class="box-body">
      <input type="hidden" class="form-control" name="id_tipe_pembayaran" id="id_tipe_pembayaran" placeholder="Enter ID" value="<?php echo $k->id_tipe_pembayaran; ?>">
      <div class="form-group">
        <label for="exampleInputNama">Tipe Pembayaran <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="tipe_pembayaran" id="tipe_pembayaran" placeholder="Tipe Pembayaran" value="<?php echo $k->tipe_pembayaran; ?>">
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
      <a href="<?php echo base_url(); ?>tipe_pembayaran" class="btn btn-primary"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</a>
    </div>
  </form>
  <?php } ?>
</div>
<!-- /.box -->