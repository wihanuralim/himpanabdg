<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?php foreach ($surat_keluar as $sk) { ?>
                <?= form_open_multipart('suratkeluar/update'); ?>
                <input type="hidden" name="idsk" id="idsk" value="<?= $sk->idsk ?>">
                <div class="form-group row">
                    <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="<?= $sk->nomor_surat ?>" required>
                        <?= form_error('nomor_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $sk->perihal ?>" required>
                        <?= form_error('perihal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_surat" class="col-sm-2 col-form-label">Tgl Surat</label>
                    <div class="col-sm-10">
                        <input data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="yyyy-mm-dd" name="tgl_surat" id="tgl_surat" value="<?=  date("Y/m/d", strtotime($sk->tgl_surat)); ?>" required>
                        <?= form_error('tgl_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_kirim" class="col-sm-2 col-form-label">Tgl Kirim</label>
                    <div class="col-sm-10">
                       <input data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="yyyy-mm-dd" name="tgl_kirim" id="tgl_kirim" value="<?=  date("Y/m/d", strtotime($sk->tgl_kirim)); ?>" required>
                        <?= form_error('tgl_kirim', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="biaya_kirim" class="col-sm-2 col-form-label">Biaya Kirim</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="biaya_kirim" name="biaya_kirim" value="<?= $sk->biaya_kirim ?>">
                        <?= form_error('biaya_kirim', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Surat</div>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="surat" name="surat">
                            <label class="custom-file-label" for="surat"><?= $sk->surat ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Lampiran</div>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="lampiran" name="lampiran">
                            <label class="custom-file-label" for="surat"><?= $sk->lampiran ?></label>
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