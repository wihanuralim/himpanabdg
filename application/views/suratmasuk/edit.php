<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?php foreach ($surat_masuk as $sm) { ?>
                <?= form_open_multipart('suratmasuk/update'); ?>
                <input type="hidden" name="idsm" id="idsm" value="<?= $sm->idsm ?>">
                <div class="form-group row">
                    <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="<?= $sm->nomor_surat ?>" required>
                        <?= form_error('nomor_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="perihalt" name="perihal" value="<?= $sm->perihal ?>" required>
                        <?= form_error('perihal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_surat" class="col-sm-2 col-form-label">Tgl Surat</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tgl_surat" name="tgl_surat" value="<?= $sm->tgl_surat ?>" required>
                        <?= form_error('tgl_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_terima" class="col-sm-2 col-form-label">Tgl Terima</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tgl_terima" name="tgl_terima" value="<?= $sm->tgl_terima ?>" required>
                        <?= form_error('tgl_terima', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Surat</div>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="surat" name="surat">
                            <label class="custom-file-label" for="surat"><?= $sm->surat ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Lampiran</div>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="lampiran" name="lampiran">
                            <label class="custom-file-label" for="surat"><?= $sm->lampiran ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-grouf row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>


                </form>
            <?php } ?>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->