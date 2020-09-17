<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        <!-- <a href="<?php echo base_url(); ?>kelas_siswa/add"><button class="form-control btn btn-primary" data-toggle="modal" ><i class="glyphicon glyphicon-plus-sign"></i> New Create</button></a> -->
        <?php foreach ($unit_pendidikan as $k1) { } ?>
        <h3>
          Data Kelas Siswa<br>
          Unit Pendidikan : <?php echo $k1->unit_pendidikan; ?>
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
          <th>Tahun Pelajaran</th>
          <th>Kelas</th>
          <th>Jumlah Siswa</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $no = 1;
        foreach ($kelas_siswa as $k) {
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $k->tahun_ajaran; ?></td>
          <td><?php echo $k->kelas; ?></td>
          <td>
            <?php
             // error_reporting(0);
              $id_kelas = $k->id_kelas_siswa;
              // $nis                = $this->uri->segment(3);

              $query = $this->db->query("SELECT COUNT(*) AS total_siswa FROM kelas_siswa_detail
                                         WHERE id_kelas_siswa = '$id_kelas'");

              foreach ($query->result() as $row){ }
            ?>
            <?php echo $row->total_siswa; ?>
          </td>
          <td class="text-center" style="min-width:230px;">
            <a href="<?php echo base_url(); ?>kelas_siswa/detail_siswa/<?php echo $k->id_kelas_siswa; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-zoom-in"></i> Detail</button>
            </a>
            <!-- <a href="<?php echo base_url(); ?>kelas_siswa/edit/<?php echo $k->id_kelas_siswa; ?>">
              <button class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Update</button>
            </a>
            <a href="<?php echo base_url(); ?>kelas_siswa/delete/<?php echo $k->id_kelas_siswa; ?>" onclick="return confirm('Anda yakin akan menghapus data ini...!')">
              <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
            </a> -->
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>