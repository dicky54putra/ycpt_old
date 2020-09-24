<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
      <a href="<?php echo base_url(); ?>siswa/add"><button class="form-control btn btn-primary" data-toggle="modal"><i class="glyphicon glyphicon-plus-sign"></i> New Create</button></a>
    </div>
  </div>
  <div class="msg" style="display:none;">
    <?php echo @$this->session->flashdata('msg'); ?>
  </div>
  <!-- /.box-header -->
  <div class="box-body" style="overflow: auto;">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>NIS/NISN</th>
          <th>Nama Siswa</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Nama Orang Tua/Wali</th>
          <th>Alamat</th>
          <th>Kelas</th>
          <th>Tahun Masuk</th>
          <th>Status</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($siswa as $k) {
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $k->nis; ?></td>
            <td><?php echo $k->nama_siswa; ?></td>
            <td><?php echo $k->tempat_lahir; ?></td>
            <td>
              <?php
              $data     = $k->tanggal_lahir;
              if ($data == '0000-00-00') {
                echo '00-00-0000';
              } else {
                $datanew  = new DateTime($data);
                echo $datanew->format('d F Y');
              }
              ?>
            </td>
            <td><?php echo ($k->jenis_kelamin == 1) ? 'Laki-laki' : $retVal = ($k->jenis_kelamin == 2) ? 'Perempuan' : ''; ?></td>
            <td><?php echo $k->nama_ortu; ?></td>
            <td><?php echo $k->alamat; ?></td>
            <td><?php if (!empty($k->kelas)) {
                  echo $k->nama_tipe_kelas . ' ' . $k->kelas;
                } else {
                  echo 'Belum ada kelas';
                }
                ?>
            <td><?php echo $k->tahun_ajaran; ?></td>
            </td>
            <td><?php echo $k->status; ?></td>
            <td class="text-center" style="min-width:230px;">
              <!-- <a href="<?php echo base_url(); ?>siswa/detail/<?php echo $k->id_siswa; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-zoom-in"></i> Detail</button>
            </a> -->
              <a href="<?php echo base_url(); ?>siswa/edit/<?php echo $k->id_siswa; ?>">
                <button class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Update</button>
              </a>
              <a href="<?php echo base_url(); ?>siswa/delete/<?php echo $k->id_siswa; ?>" onclick="return confirm('Anda yakin akan menghapus data ini...!')">
                <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>