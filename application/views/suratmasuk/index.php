<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <section class="content">
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Input Surat Masuk</button>
        <div class="col-lg">
            <?= $this->session->flashdata('message'); ?>
        </div>
        <table class="table">
            <tr>
                <th>Nomor Surat</th>
                <th>Perihal</th>
                <th>Tgl Surat</th>
                <th>Tgl Terima</th>
                <th colspan="5">Aksi</th>
            </tr>


            <?php
            foreach ($surat_masuk as $sm) : ?>
                <tr>

                    <td><?php echo $sm->nomor_surat ?></td>
                    <td><?php echo $sm->perihal ?></td>
                    <td><?php echo $sm->tgl_surat ?></td>
                    <td><?php echo $sm->tgl_terima ?></td>
                    <td><?php echo anchor('suratmasuk/detail/' . $sm->idsm, '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>') ?></td>
                    <td onclick="javascript : return confirm('Yakin ingin anda hapus?')"><?php echo anchor('suratmasuk/hapus/' . $sm->idsm, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                    <td><?php echo anchor('suratmasuk/edit/' . $sm->idsm, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>


                <?php endforeach; ?>
        </table>
    </section>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">FORM INPUT SURAT MASUK</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open_multipart('suratmasuk/tambah_aksi') ?>

                <div class="form-group">
                    <label>Nomor Surat</label>
                    <input type="text" name="nomor_surat" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Perihal</label>
                    <input type="text" name="perihal" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tgl Surat</label>
                    <input type="date" name="tgl_surat" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tgl Terima</label>
                    <input type="date" name="tgl_terima" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Surat</label>
                    <input type="file" name="surat" class="form-control">
                </div>

                <!-- <div class="form-group">
                    <label>Lampiran</label>
                    <input type="file" name="lampiran[]" class="form-control" multiple>
                </div> -->

                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>