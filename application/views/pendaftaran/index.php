<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        <a href="<?php echo base_url(); ?>pendaftaran/add"><button class="form-control btn btn-primary" data-toggle="modal" ><i class="glyphicon glyphicon-plus-sign"></i> New Create</button></a>
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
          <th>Nomor Pendaftaran</th>
          <th>Tanggal Daftar</th>
          <th>Nama Lengkap</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Nama Orang Tua/Wali</th>
          <th>Alamat</th>
          <th>Sekolah Asal</th>
          <th>Status</th>
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
          <td>
            <?php 
              $data     = $k->tanggal_daftar;
              $datanew  = new DateTime($data); 
              echo $datanew->format('d F Y'); 
            ?>
          </td>
          <td><?php echo $k->nama_lengkap; ?></td>
          <td><?php echo $k->tempat_lahir; ?></td>
          <td>
            <?php 
              $data     = $k->tanggal_lahir;
              $datanew  = new DateTime($data); 
              echo $datanew->format('d F Y'); 
            ?>
          </td>
          <td><?php echo $k->nama_ortu; ?></td>
          <td><?php echo $k->alamat; ?></td>
          <td><?php echo $k->sekolah_asal; ?></td>
          <td><?php echo $k->status; ?></td>
          <td class="text-center" style="min-width:230px;">
            <?php if ($k->status == 'Pending') { ?>
            <a href="#">
              <button class="btn btn-basic"><i class="glyphicon glyphicon-refresh"></i> Pending</button>
            </a>
            <a href="<?php echo base_url(); ?>pendaftaran/status_approved/<?php echo $k->id_daftar; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i> Approved</button>
            </a>
            <a href="<?php echo base_url(); ?>pendaftaran/status_cancel/<?php echo $k->id_daftar; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i> Cancel</button>
            </a>
            <a href="<?php echo base_url(); ?>pendaftaran/edit/<?php echo $k->id_daftar; ?>">
              <button class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Update</button>
            </a>
            <a href="<?php echo base_url(); ?>pendaftaran/delete/<?php echo $k->id_daftar; ?>" onclick="return confirm('Anda yakin akan menghapus data ini...!')">
              <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
            </a>
            <?php } elseif ($k->status == 'Approved') { ?>
            <a href="<?php echo base_url(); ?>pendaftaran/status_pendding/<?php echo $k->id_daftar; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i> Pending</button>
            </a>
            <a href="#">
              <button class="btn btn-basic"><i class="glyphicon glyphicon-refresh"></i> Approved</button>
            </a>
            <a href="<?php echo base_url(); ?>pendaftaran/status_cancel/<?php echo $k->id_daftar; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i> Cancel</button>
            </a>
            <a href="<?php echo base_url(); ?>pendaftaran/edit/<?php echo $k->id_daftar; ?>">
              <button class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Update</button>
            </a>
            <a href="#">
              <button class="btn btn-basic"><i class="glyphicon glyphicon-trash"></i> Delete</button>
            </a>
            <?php } else { ?>
            <a href="<?php echo base_url(); ?>pendaftaran/status_pendding/<?php echo $k->id_daftar; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i> Pending</button>
            </a>
            <a href="<?php echo base_url(); ?>pendaftaran/status_approved/<?php echo $k->id_daftar; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i> Approved</button>
            </a>
            <a href="#">
              <button class="btn btn-basic"><i class="glyphicon glyphicon-refresh"></i> Cancel</button>
            </a>
            <a href="<?php echo base_url(); ?>pendaftaran/edit/<?php echo $k->id_daftar; ?>">
              <button class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Update</button>
            </a>
            <a href="<?php echo base_url(); ?>pendaftaran/delete/<?php echo $k->id_daftar; ?>" onclick="return confirm('Anda yakin akan menghapus data ini...!')">
              <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
            </a>
            <?php } ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>