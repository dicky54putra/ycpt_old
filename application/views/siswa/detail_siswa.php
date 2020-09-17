<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        <!-- <a href="<?php echo base_url(); ?>siswa/add"><button class="form-control btn btn-primary" data-toggle="modal" ><i class="glyphicon glyphicon-plus-sign"></i> New Create</button></a> -->
        <?php foreach ($unit_pendidikan_siswa as $k) { } ?>
        <h3>
          Data Siswa<br>
          Unit Pendidikan : <?php echo $k->unit_pendidikan; ?>
        </h3>
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
          <th>Tahun Masuk</th>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th>TTL</th>
          <th>Nama Ortu/Wali</th>
          <th>Alamat</th>
          <th>Status</th>
          <!-- <th style="text-align: center;">Aksi</th> -->
        </tr>
      </thead>
      <tbody>
      <?php
        $no = 1;
        foreach ($siswa as $k1) {
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $k1->tahun_ajaran; ?></td>
          <td><?php echo $k1->nis; ?></td>
          <td><?php echo $k1->nama_siswa; ?></td>
          <td>
            <?php echo $k1->tempat_lahir; ?>, 
            <?php
              $data     = $k1->tanggal_lahir;
              if ($data == '0000-00-00') {
                 echo '00-00-0000';
              } else {
                $datanew  = new DateTime($data); 
                echo $datanew->format('d F Y'); 
              } 
            ?>  
          </td>
          <td><?php echo $k1->nama_ortu; ?></td>
          <td><?php echo $k1->alamat; ?></td>
          <td><?php echo $k1->status; ?></td>
          <!-- <td class="text-center" style="min-width:230px;">
            <a href="<?php echo base_url(); ?>siswa/siswa_detail/<?php echo $k->id_unit_pendidikan; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-zoom-in"></i> Detail</button>
            </a>
            <a href="<?php echo base_url(); ?>siswa/edit/<?php echo $k->id_siswa; ?>">
              <button class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Update</button>
            </a>
            <a href="<?php echo base_url(); ?>siswa/delete/<?php echo $k->id_siswa; ?>" onclick="return confirm('Anda yakin akan menghapus data ini...!')">
              <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
            </a>
          </td> -->
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>