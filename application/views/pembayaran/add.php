<script type="text/javascript">
  function cekform()
  {
    if (!$("#id_tahun_ajaran").val()) 
    {
      alert('Tahun Ajaran Tidak boleh kosong');
      $("#id_tahun_ajaran").focus()
      return false;
    }

    if (!$("#id_kelas_siswa_detail").val()) 
    {
      alert('Nis & Nama Siswa Tidak boleh kosong');
      $("#id_kelas_siswa_detail").focus()
      return false;
    }
  }
</script>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Create Data</h3>
  </div>
  <form role="form" action="<?php echo base_url(); ?>pembayaran/save_satu" method="POST" onsubmit="return cekform();">
    <div class="box-body">
      <?php foreach ($nomor as $n) { } ?>
      <?php  
        error_reporting(0);
        $no = $n->id_pembayaran;
        $hasil = $no+1;
        if ($n->id_pembayaran == "") { 
      ?>
      <input type="hidden" class="form-control" value="1" name="id_pembayaran" placeholder="ID">
      <?php } else { ?>
      <input type="hidden" class="form-control" value="<?php echo $hasil; ?>" name="id_pembayaran" placeholder="ID">
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
      <?php foreach ($siswa as $s) { } ?>
      <div class="form-group">
        <label for="Tahun Ajaran">Tahun Pelajaran<b style="color: red;">*</b></label>
        <input type="text" class="form-control" value="<?php echo $s->tahun_ajaran; ?>" placeholder="Tahun Pelajaran">
        <input type="hidden" class="form-control" value="<?php echo $s->id_tahun_ajaran; ?>" name="id_tahun_ajaran" id="id_tahun_ajaran" placeholder="Tahun Pelajaran">
      </div>
      <div class="form-group">
        <label for="Nama Siswa">NIS / Nama Siswa<b style="color: red;">*</b></label>
        <input type="text" class="form-control" value="<?php echo $s->nis; ?> - <?php echo $s->nama_siswa; ?>" placeholder="NIS & Nama Siswa">
        <input type="hidden" class="form-control" value="<?php echo $s->id_kelas_siswa_detail; ?>" name="id_kelas_siswa_detail" id="id_kelas_siswa_detail" placeholder="NIS & Nama Siswa">
      </div>
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Next</button>
    </div>
  </form>
</div>