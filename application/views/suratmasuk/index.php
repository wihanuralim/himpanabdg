<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Input Surat Masuk</button>
    <div class="col-lg">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">SURAT MASUK</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>No Surat</th>
                            <th>Perihal </th>
                            <th>Tgl Surat</th>
                            <th>Tgl Terima</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($surat_masuk as $sm) : ?>
                            <tr>
                                <td align="center"><?= $i; ?></td>
                                <td><?php echo $sm->nomor_surat ?></td>
                                <td><?php echo $sm->perihal ?></td>
                                <td><?php echo $sm->tgl_surat ?></td>
                                <td><?php echo $sm->tgl_terima ?></td>
                                <td align="center">

                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item" href="<?= base_url('suratmasuk/detail/' . $sm->idsm); ?>">Detail</a>
                                            <a class="dropdown-item" href="<?= base_url('suratmasuk/edit/' . $sm->idsm); ?>">Edit</a>
                                            <a class="dropdown-item" href="<?= base_url('suratmasuk/hapus/' . $sm->idsm); ?>">Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

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

                <div class="form-group">
                    <label>Lampiran</label>
                    <input type="file" name="lampiran" class="form-control">
                </div>

                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>