<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        
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
          <th>Nomor Pendaftaran</th>
          <th>Nama Lengkap</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $no = 1;
        foreach ($pendaftaran as $k) {
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $k->nomor_daftar; ?></td>
          <td><?php echo $k->nama_lengkap; ?></td>
          <td class="text-center" style="min-width:230px;">
            <a href="<?php echo base_url(); ?>riwayat_pembayaran_psb/detail/<?php echo $k->nomor_daftar; ?>/<?php echo $k->id_tahun_ajaran; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-zoom-in"></i> Detail</button>
            </a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>