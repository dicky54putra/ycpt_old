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
    <h3 class="box-title">Create Data</h3>
  </div>
  <form role="form" action="<?php echo base_url(); ?>tipe_pembayaran/save" method="POST" onsubmit="return cekform();">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputNama">Tipe Pembayaran <b style="color: red;">*</b></label>
        <input type="text" class="form-control" name="tipe_pembayaran" id="tipe_pembayaran" placeholder="Tipe Pembayaran">
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
    </div>
  </form>
</div>
<!-- /.box -->