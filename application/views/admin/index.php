<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        <a href="<?php echo base_url(); ?>admin/add"><button class="form-control btn btn-primary" data-toggle="modal" ><i class="glyphicon glyphicon-plus-sign"></i> Create Admin</button></a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Username</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-admin">
      <?php
        $no = 1;
        foreach ($dataAdmin as $admin) {
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $admin->nama; ?></td>
          <td><?php echo $admin->username; ?></td>
          <td class="text-center" style="min-width:230px;">
            <a href="<?php echo base_url(); ?>admin/edit/<?php echo $admin->id; ?>">
              <button class="btn btn-warning update-dataAdmin"><i class="glyphicon glyphicon-edit"></i> Update</button>
            </a>
            <a href="<?php echo base_url(); ?>admin/delete/<?php echo $admin->id; ?>" onclick="return confirm('Anda yakin akan menghapus data ini...!')">
              <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
            </a>
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>