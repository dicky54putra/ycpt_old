<div class="box">
    <div class="box-header">
        <div class="col-md-6" style="padding: 0;">
            <!-- <a href="<?php echo base_url(); ?>siswa/add"><button class="form-control btn btn-primary" data-toggle="modal" ><i class="glyphicon glyphicon-plus-sign"></i> New Create</button></a> -->
            <h3>Laporan Bulanan SPP</h3>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="overflow-x: auto;">
        <table class="table table-condensed" style="width: 100%;font-size: 11px;">
            <!-- <thead> -->
            <tr>
                <th style="width: 1%;">No</th>
                <th>NIS</th>
                <th style="width: 15%;">Nama</th>
                <?php
                if (!empty($bulan)) {
                    foreach ($bulan as $k) {
                ?>
                        <th><?php
                            echo substr($k->tipe_pembayaran, 10);
                            ?></th>
                <?php
                    }
                }
                ?>
                <th style="text-align: center;">Jumlah</th>
            </tr>
            <!-- </thead>
            <tbody> -->
            <?php
            $no = 1;
            foreach ($siswa as $k) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $k->nis; ?></td>
                    <td style="white-space: nowrap;"><?php echo $k->nama_siswa; ?></td>
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
                        <td style="text-align: right;">
                            <?php
                            if (!empty($data->nominal)) {
                                echo number_format($data->nominal, '0', ',', '.');
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
                        echo number_format($totalan_jumlah, '0', ',', '.');
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <!-- </tbody> -->
        </table>
    </div>
</div>
<script>
    window.print()
</script>