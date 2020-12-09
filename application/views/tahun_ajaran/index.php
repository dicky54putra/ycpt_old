<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
      <a href="<?php echo base_url(); ?>tahun_ajaran/add"><button class="form-control btn btn-primary" data-toggle="modal"><i class="glyphicon glyphicon-plus-sign"></i> New Create</button></a>
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
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($tahun_ajaran as $k) {
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $k->tahun_ajaran; ?></td>
            <td class="text-center" style="min-width:230px;">
              <!-- <a href="<?php echo base_url(); ?>tahun_ajaran/detail/<?php echo $k->id_tahun_ajaran; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-zoom-in"></i> Detail</button>
            </a> -->
              <a href="<?php echo base_url(); ?>tahun_ajaran/edit/<?php echo $k->id_tahun_ajaran; ?>">
                <button class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Update</button>
              </a>
              <a href="<?php echo base_url(); ?>tahun_ajaran/delete/<?php echo $k->id_tahun_ajaran; ?>" onclick="return confirm('Anda yakin akan menghapus data ini...!')">
                <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>