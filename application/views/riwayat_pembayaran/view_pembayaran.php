<div class="box">
    <div class="box-header">
        <div class="row">
            <?php foreach ($siswa as $m) {
            } ?>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <!-- <img class="img-rounded" src="<?php echo base_url(); ?>assets/img/<?php echo $m->foto; ?>" id="img" alt="maaf foto tidak ada" width=150 height=150> -->
                        <b>Data Siswa :</b>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" action="#" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
                                    <div class="form-group">
                                        <table class="table table-striped table-bordered table-hover" style="width: 100%">
                                            </tr>
                                            <td>NIS / NISN</td>
                                            <td><?php echo $m->nis; ?></td>
                                            </tr>
                                            </tr>
                                            <td>Nama Siswa</td>
                                            <td><?php echo $m->nama_siswa; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Lahir</td>
                                                <td>
                                                    <?php
                                                    $data = $m->tanggal_lahir;
                                                    $datanew = new DateTime($data);
                                                    echo $datanew->format('d F Y');
                                                    ?>
                                                </td>
                                            </tr>
                                            <td>Tempat Lahir</td>
                                            <td><?php echo $m->tempat_lahir; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Orang Tua / Wali</td>
                                                <td><?php echo $m->nama_ortu; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td><?php echo $m->alamat; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach ($detail_pembayaran1 as $dp) {
            } ?>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <!-- <img class="img-rounded" src="<?php echo base_url(); ?>assets/img/<?php echo $m->foto; ?>" id="img" alt="maaf foto tidak ada" width=150 height=150> -->
                        <b>Data Pembayaran :</b>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" action="#" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
                                    <div class="form-group">
                                        <table class="table table-striped table-bordered table-hover" style="width: 100%">
                                            </tr>
                                            <td>Tahun Pelajaran</td>
                                            <td><?php echo $dp['tahun_ajaran']; ?></td>
                                            </tr>
                                            </tr>
                                            <td>Tipe Pembayaran</td>
                                            <td><?php echo $dp['tipe_pembayaran']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Global Pembayaran</td>
                                                <td>
                                                    <?php
                                                    echo number_format($dp['nominal'], 2, ',', '.');
                                                    ?>
                                                </td>
                                            </tr>
                                            <td>Pembayaran</td>
                                            <td>
                                                <?php
                                                // error_reporting(0);
                                                $id_tipe_pembayaran = $dp['id_tipe_pembayaran'];
                                                $nis                = $this->uri->segment(3);

                                                $query = $this->db->query("SELECT *, SUM(a.nominal) AS TOTAL from detail_pembayaran a
                                                LEFT JOIN pembayaran b on b.id_pembayaran = a.id_pembayaran
                                                LEFT JOIN kelas_siswa_detail f ON f.id_kelas_siswa_detail = b.id_kelas_siswa_detail
                                                LEFT JOIN siswa c ON c.id_siswa = f.id_siswa
                                                LEFT JOIN setting_pembayaran d on d.id_setting_pembayaran = a.id_setting_pembayaran
                                                LEFT JOIN tipe_pembayaran e on e.id_tipe_pembayaran = d.id_tipe_pembayaran
                                                WHERE c.nis = '$nis' and e.id_tipe_pembayaran = '$id_tipe_pembayaran'and d.id_tahun_ajaran = '" . $dp['id_tahun_ajaran'] . "'");

                                                foreach ($query->result() as $row) {
                                                }
                                                ?>
                                                Rp. <?php echo number_format($row->TOTAL, 2, ',', '.'); ?>
                                            </td>
                                            </tr>
                                            <tr>
                                                <td>Kekurangan</td>
                                                <td>
                                                    <?php
                                                    $global_pembayaran  = $dp['nominal'];
                                                    $pembayaran         = $row->TOTAL;
                                                    $hasil = $global_pembayaran - $pembayaran;
                                                    echo number_format($hasil, 2, ',', '.'); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>
                                                    <?php
                                                    if ($hasil == 0) {
                                                        echo 'LUNAS';
                                                    } else if ($hasil < 0) {
                                                        echo 'MELEBIHI LUNAS';
                                                    } else {
                                                        echo 'BELUM LUNAS';
                                                    }
                                                    ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box">
    <div class="box-header">
        <div class="row">
            <div class="col-lg-12">
                <table id="list-data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Pelajaran</th>
                            <th>Tipe Pembayaran</th>
                            <th>Pembayaran</th>
                            <th>Status</th>
                            <!-- <th style="text-align: center;">Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($detail_pembayaran as $dp) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?php echo $dp['tahun_ajaran']; ?></td>
                                <td><?php echo $dp['tipe_pembayaran']; ?></td>
                                <td><?php echo number_format($dp['nominal'], 2, ',', '.'); ?></td>
                                <td>
                                    <?php
                                    $nis = $this->uri->segment(3);
                                    $setting_pembayaran = $this->uri->segment(4);
                                    $unit_pendidikan = $this->uri->segment(6);
                                    $id_tipe_pembayaran = $this->uri->segment(7);
                                    ?>
                                    <a onclick="return reset(<?= $dp['id_detail_pembayaran'] ?>)" id="<?= $dp['id_detail_pembayaran'] ?>" href="<?= base_url() . 'riwayat_pembayaran/hapus_detail_pembayaran/' . $dp['id_detail_pembayaran'] . '/' . $nis . '/' . $setting_pembayaran . '/' . $dp['id_tahun_ajaran'] . '/' . $unit_pendidikan . '/' . $id_tipe_pembayaran; ?>">
                                        <button class="btn btn-basic">Reset </button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function reset(id) {
        var i = document.getElementById(id);
        var check = confirm("Apakah anda Yakin?");
        if (check == true) {
            console.log('ok');
            i.setAttribute("hidden", "");
            return true;
        } else {
            console.log('not');
            return false;
        }
        // return confirm('Apakah anda Yakin');
    }
</script>