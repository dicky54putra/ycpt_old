<!-- /.row -->
<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
          <?php if ($this->session->userdata("level") == 0) { ?>
            <!-- <h3>Fungsi Panduan</h3> -->
            <table style="font-size: 16px">
              <tr>
                <td><b>A. </b></td>
                <td>
                  Menu Data siswa : administrator dapat memilih unit pendidikaan dan dapat melihat detail dari unit pendidikan tersebut yang berisikan info tentang murid yang ada di unit pendidikan tersebut.
                </td>
              </tr>
              <tr>
                <td><b>B. </b></td>
                <td>
                  Menu Data kelas siswa : administrator dapat memilih unit pendidikan dan dapat melihat detail dari unit pendidikan tersebut yang berisikan info tentang kelas dan jumlah siswa.
                </td>
              </tr>
              <tr>
                <td><b>C. </b></td>
                <td>
                  Laporan : digunakan oleh admin dan administrator untuk melihat pembayaran kelas , pembayaran hari , dan penerimaan uang SPP.
                </td>
              </tr>
            </table>
            <ul style="font-size: 16px">
              <li>
                Pembayaran/kelas : administrator dapat melihat detail untuk pembayaran/kelas dari masing-masing unit pendidikan.
              </li>
              <li>
                Pembayaran/hari : administrator dapat melihat detail untuk pembayaran/hari dari masing-masing unit berdasarkan tanggal yang ditentukan.
              </li>
              <li>
                Penerimaan uang Spp : administrator bisa melihat laporan dari penerimaan uang spp.
              </li>
            </ul>
            <?php } else { ?>
            <!-- <h3>Fungsi Panduan</h3> -->
            <table style="font-size: 16px">
              <tr>
                <td><b>A. </b></td>
                <td>
                  Master data : Digunakan oleh user untuk pengaturan siswa, kelas , dan kelas siswa.
                </td>
              </tr>
            </table>
            <ul style="font-size: 16px">
              <li>
                Menu siswa : user dapat menambahkan, mengupdate/memperbarui, dan menghapus data-data tentang siswa.
              </li>
              <li>
                Menu kelas : user dapat menambahkan, mengupdate/memperbarui, dan menghapus data tentang kelas.
              </li>
              <li>
                Menu kelas siswa : user dapat menambahkan, mengupdate/memperbarui, menghapus dan melihat detail mengenai kelas siswa.

              </li>
            </ul>
            <table style="font-size: 16px">
              <tr>
                <td><b>B. </b></td>
                <td>
                  PPDB : Digunakan oleh user untuk pengaturan Data pendaftaran, Setting pembayaran PPDB , Pembayaran PPDB , dan Riwayat Pembayaran PPDB.
                </td>
              </tr>
            </table>
            <ul style="font-size: 16px">
              <li>
                Menu daftar pendaftaran : user dapat menambahkan data siswa yang mendaftar berdasarkan informasi yang diberikan.
              </li>
              <li>
                Menu Setting pembayaran PPDB : user dapat menambahkan, mengupdate/memperbarui , dan menghapus setting pembayaran PPDB.
              </li>
              <li>
                Menu Pembayaran PPDB : user dapat menambahkan data siswa yang melakukan pembayaran PPDB.
              </li>
              <li>
                Menu Riwayat Pembayaran PPDB : user dapat melihat siswa yang sudah melakukan pembayaran PPDB dengan mencari nama siswa tersebut.
              </li>
            </ul>
            <table style="font-size: 16px">
              <tr>
                <td><b>C. </b></td>
                <td>
                  Pembayaran Siswa : Digunakan user untuk pengaturan Setting Pembayaran siswa, Pembayaran Siswa, Riwayat Pembayaran siswa.
                </td>
              </tr>
            </table>
            <ul style="font-size: 16px">
              <li>
                Setting Pembayaran Siswa : user dapat menambahkan , mengupdate/memperbarui , dan menghapus data siswa yag melakukan pembayaran.
              </li>
              <li>
                Pembayaran siswa : user dapat melihat data siswa yang sudah melakukan pembayaran dengan cara mencari kelas lalu memfilter/menampilkan.
              </li>
              <li>
                Menu Riwayat Pembayaran Siswa : user dapat melihat detail siswa yang sudah melunasi pembayaran atau belum.
              </li>
            </ul>
            <table style="font-size: 16px">
              <tr>
                <td><b>C. </b></td>
                <td>
                  Laporan : Digunakan user untuk pengaturan Pembayaran/kelas, Pemabayaran/hari, Penerimaan Uang SPP, Data PPDB, dan Data kelas siswa.
                </td>
              </tr>
            </table>
            <ul style="font-size: 16px">
              <li>
                Menu Pembayaran/kelas : user dapat menampilkan laporan pembayaran berdasarkan kelas yang dipilih dg memilih option Filter.
              </li>
              <li>
                Menu Pembayaran/hari : user dapat menampilkan laporan/hari dengan menentukan tanggal yang diinginkan lalu memilih option Filter.
              </li>
              <li>
                Menu Penerimaan Uang SPP : user dapat melihat tampilan laporan penerimaan uang SPP.
              </li>
              <li>
                Menu Data PPDB : user dapat menampilkann laporan hasil PPDB dg cara memilih option filter.
              </li>
              <li>
                Menu Data Kelas siswa : user dapat menampilkan laporan data kelas siswa dengan memilih option filter.
              </li>
            </ul>
            <?php } ?>
        </div>
    </div>
</div>