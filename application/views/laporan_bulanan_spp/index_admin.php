<div class="box">
    <div class="box-header">
        <div class="col-md-6" style="padding: 0;">
            <!-- <a href="<?php echo base_url(); ?>siswa/add"><button class="form-control btn btn-primary" data-toggle="modal" ><i class="glyphicon glyphicon-plus-sign"></i> New Create</button></a> -->
            <h3>Pilih Unit Pendidikan</h3>
        </div>
    </div>
    <div class="msg" style="display:none;">
        <?php echo @$this->session->flashdata('msg'); ?>
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="overflow-x: auto;">
        <div class="row">
            <div class="col-md-4">
                <form action="" method="get">
                    <select name="unit_pendidikan" id="unit_pendidikan" class="form-control">
                        <?php
                        foreach ($unit_pendidikan as $unit) {
                        ?>
                            <option value="<?= $unit->id_unit_pendidikan ?>"><?= $unit->unit_pendidikan ?></option>
                        <?php
                        } ?>
                    </select>
                    <br>
                    <select name="tahun_ajaran" id="tahun_ajaran" class="form-control">
                        <?php
                        foreach ($tahun_ajaran as $tahun) {
                        ?>
                            <option value="<?= $tahun->id_tahun_ajaran ?>"><?= $tahun->tahun_ajaran ?></option>
                        <?php
                        } ?>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary btn-flat">Search</button>
                </form>
            </div>
        </div>
        <br>
        <?php
        if (!empty($bulan)) {
        ?>
            <a href="<?= base_url() ?>laporan_bulanan_spp/cetak?unit_pendidikan=<?= $this->input->get('unit_pendidikan') ?>&tahun_ajaran=<?= $this->input->get('tahun_ajaran') ?>" class="btn btn-success btn-flat" target="blank">Cetak</a>
        <?php
        }
        ?>
        <br>
        <br>
        <table id="list-data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <?php
                    if (!empty($bulan)) {
                        foreach ($bulan as $k) {
                    ?>
                            <th><?php
                                // echo $k->tipe_pembayaran
                                echo substr($k->tipe_pembayaran, 10);
                                ?></th>
                    <?php
                        }
                    }
                    ?>
                    <th style="text-align: center;">Jumlah</th>
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
                        <?php
                        $totalan_jumlah = 0;
                        foreach ($bulan as $b) {
                            $sql = "SELECT * FROM siswa
                            LEFT JOIN kelas_siswa_detail ON kelas_siswa_detail.id_siswa = siswa.id_siswa
                            LEFT JOIN pembayaran ON pembayaran.id_kelas_siswa_detail = kelas_siswa_detail.id_kelas_siswa_detail
                            LEFT JOIN detail_pembayaran ON detail_pembayaran.id_pembayaran = pembayaran.id_pembayaran
                            WHERE siswa.id_siswa = '$k->id_siswa'
                            AND detail_pembayaran.id_setting_pembayaran = $b->id_setting_pembayaran";
                            $data = $this->db->query($sql)->row();
                            // var_dump($data);
                            $nominal = (!empty($data->nominal)) ? $data->nominal : 0;
                            $totalan_jumlah += $nominal;
                        ?>
                            <td>
                                <?php
                                if (!empty($data->nominal)) {
                                    echo 'Rp.' . number_format($data->nominal, '2', ',', '.');
                                } else {
                                    echo NULL;
                                }
                                ?>
                            </td>
                        <?php
                        }
                        ?>
                        <td class="text-center">
                            <?php
                            echo 'Rp.' . number_format($totalan_jumlah, '2', ',', '.');
                            ?>
                        </td>
                    </tr>
                <?php } ?>
        </table>
    </div>
</div>