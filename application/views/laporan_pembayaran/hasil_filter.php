<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">

      <div class="row">
        <div class="col-lg-6">
          <form role="form" action="<?php echo base_url(); ?>Laporan_pembayaran/filter" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
            <div class="form-group">
              <label for="exampleInputNama">Dari Tanggal</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="dari_tanggal" value="<?php echo date("Y-m-d"); ?>" readonly class="form-control pull-right" id="datepicker">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputNama">Sampai Tanggal</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="sampai_tanggal" value="<?php echo date("Y-m-d"); ?>" readonly class="form-control pull-right" id="datepicker1">
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Filter</button>
              <a href="<?php echo base_url(); ?>Laporan_pembayaran/cetak/<?= $_POST['dari_tanggal'] . '/' . $_POST['sampai_tanggal'] ?>" target="_BLANK">
                <button type="button" class="btn btn-basic"><i class="glyphicon glyphicon-print"></i> Cetak</button>
              </a>
              <!-- <a href="#" target="_BLANK">
              <button type="submit" class="btn btn-basic"><i class="glyphicon glyphicon-print"></i> Cetak</button>
            </a> -->
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="msg" style="display:none;">
    <?php echo @$this->session->flashdata('msg'); ?>
  </div>
  <!-- /.box-header -->
  <p>
    <!-- Dari Tanggal : <?php echo $dari_tanggal; ?> Sampai Tanggal : <?php echo $sampai_tanggal; ?> -->
  </p>
  <div class="box-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Kelas</th>
          <th>NIS & Nama Siswa</th>
          <th>Tipe Pembayaran</th>
          <th>Nominal</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        $total = 0;
        foreach ($pembayaran as $k) {
          $total += $k->nominal;
          if ($k->tipe_pembayaran != null) { ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td>
                <?php
                $data     = $k->tanggal;
                if ($data == '0000-00-00') {
                  echo '00-00-0000';
                } else {
                  $datanew  = new DateTime($data);
                  echo $datanew->format('d F Y');
                }
                ?>
              </td>
              <<<<<<< HEAD <td><?php echo $k->tahun_ajaran; ?> - <?php echo $k->kelas; ?></td>
                =======
                <td><?php echo $k->tahun_ajaran; ?> - <?php echo $k->nama_tipe_kelas . ' ' . $k->kelas; ?></td>
                >>>>>>> e7508161de0375d45ac98414bf6952c8165b7981
                <td><?php echo $k->nis; ?> - <?php echo $k->nama_siswa; ?></td>
                <td><?php echo $k->tipe_pembayaran; ?></td>
                <td>Rp. <?php echo number_format($k->nominal, '2', ',', '.'); ?></td>
            </tr>
        <?php }
        } ?>
        <tr>
          <td colspan="5"><b>JUMLAH</b></td>
          <td><b>Rp. <?php echo number_format($total, '2', ',', '.'); ?></b></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>