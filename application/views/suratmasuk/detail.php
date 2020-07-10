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
                    <td><?php echo date("d/m/Y", strtotime($detail->tgl_surat)); ?></td>
                </tr>

                <tr>
                    <th>Tanggal Terima</th>
                    <td><?php echo date("d/m/Y", strtotime($detail->tgl_terima)); ?></td>
                </tr>

                <tr>
                    <th>Surat</th>
                    <td>
                        <embed width="800" height="400" src="<?php echo base_url(); ?>assets/img/suratmasuk/<?php echo $detail->surat; ?>" type="application/pdf"></embed>
                    </td>
                </tr>
                <tr>
                    <th>Lampiran</th>
                    <td>
                        <?php if ($detail->lampiran != '') { ?>
                            <div>
                                <embed width="800" height="400" src="<?php echo base_url(); ?>assets/img/suratmasuk/<?php echo $detail->lampiran; ?>" type="application/pdf"></embed>
                            </div>
                        <?php } else { ?>
                            <div>
                                Tidak ada lampiran.
                            </div>
                        <?php } ?>
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