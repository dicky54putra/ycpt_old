<script type="text/javascript">
    function cekform() {
        if (!$("#tipe_kelas").val()) {
            alert('Tipe Kelas Tidak boleh kosong');
            $("#tipe_kelas").focus()
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
    <?php foreach ($tipe_kelas as $k) { ?>
        <form role="form" action="<?php echo base_url(); ?>tipe_kelas/update" method="POST" onsubmit="return cekform();">
            <div class="box-body">
                <input type="hidden" class="form-control" name="id_tipe_kelas" id="id_tipe_kelas" value="<?php echo $k->id_tipe_kelas; ?>">
                <div class="form-group">
                    <label for="exampleInputNama">Tipe Kelas <b style="color: red;">*</b></label>
                    <input type="text" class="form-control" name="tipe_kelas" id="tipe_kelas" placeholder="Tipe Kelas" value="<?php echo $k->nama_tipe_kelas; ?>">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
                <a href="<?php echo base_url(); ?>tipe_kelas" class="btn btn-primary"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</a>
            </div>
        </form>
    <?php } ?>
</div>
<!-- /.box -->