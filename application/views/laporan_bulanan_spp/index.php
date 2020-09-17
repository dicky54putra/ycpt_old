<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        .upper {
            text-transform: uppercase;
        }

        .lower {
            text-transform: lowercase;
        }

        .cap {
            text-transform: capitalize;
        }

        .small {
            font-variant: small-caps;
        }
    </style>
</head>

<body>
    <?php foreach ($unit_pendidikan as $u) {
    } ?>
    <?php foreach ($tahun_ajaran as $t) {
    } ?>
    <?php
    date_default_timezone_get('Asia/Jakarta');
    $tanggal_now    = date('Y-m-d');
    $kurangi_bulan  = mktime(0, 0, 0, date('m') - 1, date('d') + 0, date('Y') + 0);
    $tambah_bulan   = mktime(0, 0, 0, date('m') + 1, date('d') + 0, date('Y') + 0);
    $bulan_sebelum  = date('F', $kurangi_bulan);
    $bulan_sesudah  = date('F', $tambah_bulan);
    // echo "Tanggal Sekarang : ".$tanggal_now."<br>";
    // echo "Sebelum : ".$bulan_sebelum."<br>";
    // echo "Sesudah : ".$bulan_sesudah;
    ?>
    <div class="box">
        <div class="box-header">
            <h4 align="center">
                <b>LAPORAN PENERIMAAN UANG SPP<br>
                    <p class="upper">BULAN <?php echo date("F Y"); ?><br>
                        <?php echo $u->unit_pendidikan; ?></p>
                </b>
            </h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table border="1" style="width: 100%">
                <tr align="center">
                    <td colspan="5"><b>SPP YANG HARUS MASUK (YHM)</b></td>
                    <td colspan="5"><b>SPP YANG SUDAH MASUK (YSM)</b></td>
                </tr>
                <tr align="center">
                    <td><b>Kelas</b></td>
                    <td><b>Jumlah Siswa</b></td>
                    <td><b>SPP</b></td>
                    <td><b>Jumlah</b></td>
                    <td><b>Total</b></td>
                    <td><b>Kelas</b></td>
                    <td><b>Jumlah Siswa</b></td>
                    <td><b>SPP</b></td>
                    <td><b>Jumlah</b></td>
                    <td><b>Total</b></td>
                </tr>
                <tr>
                    <td colspan="4"><b>Tunggakan SPP s.d Bulan <?php echo $bulan_sebelum; ?></b></td>
                    <td rowspan="4"></td>
                    <td colspan="4"><b>Tunggakan SPP s.d Bulan <?php echo $bulan_sebelum; ?></b></td>
                    <td rowspan="4"></td>
                </tr>
                <tr>
                    <td>~ Kelas I</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                    <td>~ Kelas I</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                </tr>
                <tr>
                    <td>~ Kelas II</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                    <td>~ Kelas II</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                </tr>
                <tr>
                    <td>~ Kelas III</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                    <td>~ Kelas III</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                </tr>
                <tr>
                    <td colspan="4"><b>Total Tunggakan Bulan <?php echo $bulan_sebelum; ?> YHM</b></td>
                    <td><b>Rp.</b></td>
                    <td colspan="4"><b>Total Tunggakan Bulan <?php echo $bulan_sebelum; ?> YSM</b></td>
                    <td><b>Rp.</b></td>
                </tr>
                <tr>
                    <td colspan="4" class="upper"><b>KHUSUS BULAN <?php echo date("F"); ?></b></td>
                    <td rowspan="4"></td>
                    <td colspan="4" class="upper"><b>KHUSUS BULAN <?php echo date("F"); ?></b></td>
                    <td rowspan="4"></td>
                </tr>
                <tr>
                    <td>~ Kelas I</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                    <td>~ Kelas I</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                </tr>
                <tr>
                    <td>~ Kelas II</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                    <td>~ Kelas II</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                </tr>
                <tr>
                    <td>~ Kelas III</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                    <td>~ Kelas III</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                </tr>
                <tr>
                    <td colspan="4"><b>Total Tunggakan Bulan <?php echo date("F"); ?> YHM</b></td>
                    <td><b>Rp.</b></td>
                    <td colspan="4"><b>Total Tunggakan Bulan <?php echo date("F"); ?> YSM</b></td>
                    <td><b>Rp.</b></td>
                </tr>
                <tr>
                    <td colspan="4"><b>Total Tunggakan dan SPP Bulan <?php echo date("F"); ?> YHM</b></td>
                    <td><b>Rp.</b></td>
                    <td colspan="4"><b>Total Tunggakan dan SPP Bulan <?php echo date("F"); ?> YSM</b></td>
                    <td><b>Rp.</b></td>
                </tr>
                <tr>
                    <td colspan="4" class="upper"><b>AWAL BULAN <?php echo $bulan_sesudah; ?><b></td>
                    <td rowspan="5"></td>
                    <td colspan="5" rowspan="12">
                        <p style="margin-top: 0px; margin-bottom: 200px;"><b>Catatan :</b></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4"><b>Tunggakan SPP s.d Bulan <?php echo date("F"); ?><b></td>
                </tr>
                <tr>
                    <td>~ Kelas I</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                </tr>
                <tr>
                    <td>~ Kelas II</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                </tr>
                <tr>
                    <td>~ Kelas III</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                </tr>
                <tr>
                    <td colspan="4"><b>Total Tunggakan Bulan <?php echo date("F"); ?> YHM</b></td>
                    <td><b>Rp.</b></td>
                </tr>
                <tr>
                    <td colspan="4" class="upper"><b>KHUSUS BULAN <?php echo $bulan_sesudah; ?></b></td>
                    <td rowspan="4"></td>
                </tr>
                <tr>
                    <td>~ Kelas I</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                </tr>
                <tr>
                    <td>~ Kelas II</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                </tr>
                <tr>
                    <td>~ Kelas III</td>
                    <td></td>
                    <td>Rp.</td>
                    <td>Rp.</td>
                    <!-- <td></td> -->
                </tr>
                <tr>
                    <td colspan="4"><b>Total Tunggakan Bulan <?php echo $bulan_sesudah; ?> YHM</b></td>
                    <td><b>Rp.</b></td>
                </tr>
                <tr>
                    <td colspan="4"><b>Total Tunggakan dan SPP Bulan <?php echo $bulan_sesudah; ?> YHM</b></td>
                    <td><b>Rp.</b></td>
                </tr>
            </table><br><br>
            <table style="width: 100%;">
                <tr align="center">
                    <td colspan="2"><b>YAYASAN CATUR PRAYA TUNGGAL</b></td>
                    <td><b>Semarang, <?php echo date("d F Y"); ?></b><br><br></td>
                </tr>
                <tr align="center">
                    <td><b>Ketua</b></td>
                    <td><b>Bendahara</b></td>
                    <td><b>Kepala Unit Pendidikan</b></td>
                </tr>
                <tr>
                    <td><br><br><br></td>
                    <td><br><br><br></td>
                    <td><br><br><br></td>
                </tr>
                <tr align="center">
                    <td>(...........................................................................)</td>
                    <td>(...........................................................................)</td>
                    <td>(...........................................................................)</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>