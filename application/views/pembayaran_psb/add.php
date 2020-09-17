<script type="text/javascript">
  function cekform()
  {
    if (!$("#id_tahun_ajaran").val()) 
    {
      alert('Tahun Ajaran Tidak boleh kosong');
      $("#id_tahun_ajaran").focus()
      return false;
    }
  }
</script>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Create Data</h3>
  </div>
  <form role="form" action="<?php echo base_url(); ?>pembayaran_psb/save_satu" method="POST" onsubmit="return cekform();">
    <div class="box-body">
      <?php foreach ($nomor as $n) { } ?>
      <?php  
        error_reporting(0);
        $no = $n->id_pembayaran_psb;
        $hasil = $no+1;
        if ($n->id_pembayaran_psb == "") { 
      ?>
      <input type="hidden" class="form-control" value="1" name="id_pembayaran_psb" placeholder="ID">
      <?php } else { ?>
      <input type="hidden" class="form-control" value="<?php echo $hasil; ?>" name="id_pembayaran_psb" placeholder="ID">
      <?php } ?>
      <div class="form-group">
        <label>Tanggal <b style="color: red;">*</b></label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" name="tanggal" readonly class="form-control pull-right" value="<?php echo date("Y-m-d"); ?>" id="datepicker">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Tahun Pelajaran<b style="color: red;">*</b></label>
        <select class="form-control select2" name="id_tahun_ajaran" id="id_tahun_ajaran" data-placeholder="Select Tahun Ajaran">
          <?php foreach ($tahun_ajaran as $s) { ?>
            <!-- <option></option> -->
            <option value="<?php echo $s->id_tahun_ajaran; ?>" ><?php echo $s->tahun_ajaran; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Nomor Pendaftaran & Nama Lengkap<b style="color: red;">*</b></label>
        <select class="form-control select2" name="id_daftar" id="id_daftar" data-placeholder="Select Nomor Pendaftaran / Nama Lengkap">
          <?php foreach ($pendaftaran as $s) { ?>
            <option></option>
            <option value="<?php echo $s->id_daftar; ?>" ><?php echo $s->nomor_daftar; ?> - <?php echo $s->nama_lengkap; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Next</button>
    </div>
  </form>
</div>