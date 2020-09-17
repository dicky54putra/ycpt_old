<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        <h3>Pilih Unit Pendidikan :</h3>
    </div>
  </div>
  <div class="msg" style="display:none;">
    <?php echo @$this->session->flashdata('msg'); ?>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Unit Pendidikan</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $no = 1;
        foreach ($unit_pendidikan as $k) {
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $k->unit_pendidikan; ?></td>
          <td class="text-center" style="min-width:230px;">
            <a href="<?php echo base_url(); ?>riwayat_pembayaran/detail_siswa/<?php echo $k->id_unit_pendidikan; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-zoom-in"></i> Open</button>
            </a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>