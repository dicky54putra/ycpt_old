<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        <h3>Filter Kelas & NIS / Nama Siswa</h3>
        <!-- <a href="<?php echo base_url(); ?>pembayaran/add"><button class="form-control btn btn-primary" data-toggle="modal" ><i class="glyphicon glyphicon-plus-sign"></i> New Create</button></a> -->
        <div class="row">
        <div class="col-lg-6">
          <form role="form" action="<?php echo base_url(); ?>pembayaran/filter" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
          <div class="form-group">
            <label for="exampleInputNama">Kelas Siswa</label>
            <select class="form-control select2" name="id_kelas_siswa" id="id_kelas_siswa" data-placeholder="Select Please">
              <?php foreach ($kelas as $s) { ?>
              <option></option>
              <option value="<?php echo $s->id_kelas_siswa; ?>" ><?php echo $s->tahun_ajaran; ?> - <?php echo $s->kelas; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Filter</button>
          </div>
          </form>
        </div>
      </div>
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
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <!-- <?php
        $no = 1;
        foreach ($siswa as $k) {
        ?> -->
        <tr>
          <!-- <td><?php echo $no++; ?></td>
          <td><?php echo $k->nis; ?></td>
          <td><?php echo $k->nama_siswa; ?></td>
          <td class="text-center" style="min-width:230px;"> -->
            <!-- <a href="<?php echo base_url(); ?>pembayaran/detail/<?php echo $k->id_pembayaran; ?>">
              <button class="btn btn-info"><i class="glyphicon glyphicon-zoom-in"></i> Detail</button>
            </a>
            <a href="<?php echo base_url(); ?>pembayaran/delete_pembayaran/<?php echo $k->id_pembayaran; ?>" onclick="return confirm('Anda yakin akan menghapus data ini...!')">
              <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
            </a> -->
          </td>
        </tr>
        <!-- <?php } ?> -->
      </tbody>
    </table>
  </div>
</div>