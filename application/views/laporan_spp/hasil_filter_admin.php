<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
      <?php foreach ($unit_pendidikan as $u) {
      } ?>
      <div class="row">
        <div class="col-lg-6">
          <form role="form" action="<?php echo base_url(); ?>Laporan_spp/filter1/<?php echo $u->id_unit_pendidikan; ?>" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
            <div class="form-group">
              <label for="exampleInputNama">Kelas</label>
              <select class="form-control select2" name="id_kelas_siswa" id="id_kelas_siswa" data-placeholder="Select Please">
                <?php foreach ($kelas_siswa as $s) { ?>
                  <option></option>
                  <option value="<?php echo $s->id_kelas_siswa; ?>"><?php echo $s->tahun_ajaran; ?> - <?php echo $s->nama_tipe_kelas . ' ' . $s->kelas; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputNama">Tipe Pembayaran</label>
              <select class="form-control select2" name="id_setting_pembayaran" id="id_setting_pembayaran" data-placeholder="Select Please">
                <?php foreach ($setting_pembayaran as $p) { ?>
                  <option></option>
                  <option value="<?php echo $p->id_setting_pembayaran; ?>"><?php echo $p->tahun_ajaran; ?> - <?php echo $p->tipe_pembayaran; ?></option>
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
  <!-- /.box-header -->

  <div class="box-body">
    <?php foreach ($kelas1 as $k3) {
    } ?>
    <?php foreach ($setting_pembayaran1 as $k1) {
    } ?>
    <div>
      <table class="table">
        <tr>
          <td width="10%"><b>Nama Kelas</b></td>
          <td width="2%"> : </td>
          <td><b><?php echo $k3->nama_tipe_kelas . ' ' . $k3->kelas; ?></b></td>
        </tr>
        <tr>
          <td width="10%"><b>Tipe Pembayaran</b></td>
          <td width="2%"> : </td>
          <td><b><?php echo $k1->tipe_pembayaran; ?></b></td>
        </tr>
        <tr>
          <td>
            <a href="<?php echo base_url(); ?>Laporan_spp/cetak1/<?php echo $u->id_unit_pendidikan; ?>/<?php echo $k3->id_kelas_siswa; ?>/<?php echo $k1->id_setting_pembayaran; ?>" target="_BLANK">
              <button type="submit" class="btn btn-basic"><i class="glyphicon glyphicon-print"></i> Cetak</button>
            </a>
          </td>
        </tr>
      </table><br>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <!-- <th>Tipe Pembayaran</th> -->
          <th>Nominal</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($kelas as $k) { ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $k->nis; ?></td>
            <td><?php echo $k->nama_siswa; ?></td>
            <!-- <td>
            <?php echo $k1->tipe_pembayaran; ?>
          </td> -->
            <td>
              Rp. <?php echo number_format($k1->nominal, 2, ',', '.'); ?>
            </td>
            <td>
              <?php
              // error_reporting(0);
              // $id_tahun_ajaran    = $this->uri->segment(4);
              $id_tipe_pembayaran = $k1->id_tipe_pembayaran;
              $nis                = $k->nis;

              $query = $this->db->query("SELECT a.*, SUM(a.nominal) AS TOTAL from detail_pembayaran a
                                         LEFT JOIN pembayaran b on b.id_pembayaran = a.id_pembayaran
                                         LEFT JOIN kelas_siswa_detail f on f.id_kelas_siswa_detail = b.id_kelas_siswa_detail
                                         LEFT JOIN siswa c on c.id_siswa = f.id_siswa
                                         LEFT JOIN setting_pembayaran d on d.id_setting_pembayaran = a.id_setting_pembayaran
                                         LEFT JOIN tipe_pembayaran e on e.id_tipe_pembayaran = d.id_tipe_pembayaran
                                         WHERE c.nis = '$nis' and e.id_tipe_pembayaran = '$id_tipe_pembayaran'");

              foreach ($query->result() as $row) {
              }
              ?>
              <?php
              $global_pembayaran  = $k1->nominal;
              $pembayaran         = $row->TOTAL;
              $hasil = $global_pembayaran - $pembayaran;
              if ($hasil == 0) {
                echo 'LUNAS';
              } else {
                echo 'BELUM LUNAS ';
              }
              ?>
            </td>
          </tr>
        <?php } ?>
        <!-- <tr>
        <td colspan="3"><b>JUMLAH NOMINAL STATUS LUNAS</b></td>
        <td colspan="2"><b>Rp. </b></td>
      </tr>
      <tr>
        <td colspan="3"><b>JUMLAH NOMINAL STATUS BELUM LUNAS</b></td>
        <td colspan="2"><b>Rp. </b></td>
      </tr> -->
      </tbody>
    </table>
  </div>
</div>