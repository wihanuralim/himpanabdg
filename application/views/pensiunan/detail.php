<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="content-wrapper">
        <section class="content">
            <table class="table">
                <tr>
                    <th>Nomor Pensiun</th>
                    <td><?php echo $detail->nopen ?>
                    <td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><?php echo $detail->namapensiun ?></td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td><?php echo $detail->tempat_lahir ?></td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td><?php echo $detail->tgl_lahir ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?php echo $detail->alamat ?></td>
                </tr>
                <tr>
                    <th>Kota/Kab</th>
                    <td><?php echo $detail->kota_kab ?></td>
                </tr>
                <tr>
                    <th>Tanggal Pensiun</th>
                    <td><?php echo $detail->tgl_pensiun ?></td>
                </tr>
                <tr>
                    <th>No HP</th>
                    <td><?php echo $detail->nohp ?></td>
                </tr>
                <tr>
                    <th>No Telepon</th>
                    <td><?php echo $detail->notelp ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $detail->emailpen ?></td>
                </tr>
                <tr>
                    <th>
                    <td></td>
                    </th>
                </tr>

            </table>
            <a href="<?php echo base_url('pensiunan') ?>" class="btn btn-primary">Kembali</a>
        </section>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->