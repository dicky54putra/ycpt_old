<div class="box">
    <div class="box-header">
        <div class="col-md-6" style="padding: 0;">
            <!-- <a href="<?php echo base_url(); ?>kelas_siswa/add"><button class="form-control btn btn-primary" data-toggle="modal" ><i class="glyphicon glyphicon-plus-sign"></i> New Create</button></a> -->
            <?php foreach ($unit_pendidikan as $k1) {
            } ?>
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
    <div class="box-body" style="overflow-x: auto;">
        <table id="list-data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <!-- <th>Kelas</th> -->
                    <?php foreach ($bulan as $k) { ?>
                        <th><?= $k->tipe_pembayaran ?></th>
                    <?php } ?>
                    <th style="text-align: center;">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($siswa as $k) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $k->nis ?></td>
                        <td><?= $k->nama_siswa ?></td>
                        <?php
                        $totalan_jumlah = 0;
                        foreach ($bulan as $b) {
                            $sql = "SELECT * FROM siswa
                                LEFT JOIN kelas_siswa_detail ON kelas_siswa_detail.id_siswa = siswa.id_siswa
                                LEFT JOIN pembayaran ON pembayaran.id_kelas_siswa_detail = kelas_siswa_detail.id_kelas_siswa_detail
                                LEFT JOIN detail_pembayaran ON detail_pembayaran.id_pembayaran = pembayaran.id_pembayaran
                                WHERE siswa.id_siswa = '$k->id_siswa';
                                -- AND detail_pembayaran.id_setting_pembayaran = $b->id_setting_pembayaran";
                            $data = $this->db->query($sql)->row();
                            // var_dump($data);
                            $nominal = (!empty($data->nominal)) ? $data->nominal : 0;
                            $totalan_jumlah += $nominal;
                            // $totalan_jumlah += $k->id_siswa;
                        ?>
                            <td>
                                <?php
                                if (!empty($data->nominal)) {
                                    echo 'Rp.' . $data->nominal;
                                } else {
                                    echo NULL;
                                }
                                ?>
                                <?= $k->id_siswa ?>
                            </td>
                        <?php
                        }
                        ?>
                        <td class="text-center">
                            <?= 'Rp.' . $totalan_jumlah;
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>