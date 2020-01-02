<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="content-wrapper">
        <section class="content">
            <table class="table">
                <tr>
                    <th>Nomor Surat</th>
                    <td><?php echo $detail->nomor_surat ?>
                    <td>
                </tr>

                <tr>
                    <th>Perihal</th>
                    <td><?php echo $detail->perihal ?></td>
                </tr>

                <tr>
                    <th>Tanggal Surat</th>
                    <td><?php echo $detail->tgl_surat ?></td>
                </tr>

                <tr>
                    <th>Tanggal Terima</th>
                    <td><?php echo $detail->tgl_terima ?></td>
                </tr>

                <tr>
                    <td>
                        <img src="<?php echo base_url(); ?>assets/img/suratmasuk/<?php echo $detail->surat; ?>" width"180" height="220">
                    </td>
                    <td></td>
                </tr>

            </table>
            <a href="<?php echo base_url('suratmasuk/index') ?>" class="btn btn-primary">Kembali</a>
        </section>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->