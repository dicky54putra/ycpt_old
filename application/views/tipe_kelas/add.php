<script type="text/javascript">
    function cekform() {
        if (!$("#tipe_kelas").val()) {
            alert('Tipe kelas Tidak boleh kosong');
            $("#tipe_kelas").focus()
            return false;
        }
    }
</script>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create Data</h3>
    </div>
    <form role="form" action="<?php echo base_url(); ?>tipe_kelas/save" method="POST" onsubmit="return cekform();">
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputNama">Tipe Kelas <b style="color: red;">*</b></label>
                <input type="text" class="form-control" name="tipe_kelas" id="tipe_kelas" placeholder="Tipe kelas">
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
        </div>
    </form>
</div>
<!-- /.box -->