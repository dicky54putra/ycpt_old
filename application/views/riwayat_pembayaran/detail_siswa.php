<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        <h3>Pilih Nama Siswa :</h3>
    </div>
  </div>
  <div class="msg" style="display:none;">
    <?php echo @$this->session->flashdata('msg'); ?>
  </div>
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>NIS / NISN</th>
          <th>Nama Siswa</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $no = 1;
        $id_unit_pendidikan  = $this->uri->segment(3);
        foreach ($siswa as $k) {
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $k->nis; ?></td>
          <td><?php echo $k->nama_siswa; ?></td>
          <td class="text-center" style="min-width:230px;">
            <a href="<?php echo base_url(); ?>riwayat_pembayaran/detail_pembayaran_siswa/<?php echo $id_unit_pendidikan; ?>/<?php echo $k->nis; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-zoom-in"></i> Detail Pembayaran</button>
            </a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>