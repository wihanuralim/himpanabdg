<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?php foreach ($iuran as $i) { ?>
                <?= form_open_multipart('iuran/update'); ?>
                <input type="hidden" name="id" id="id" value="<?= $i->id ?>">

                <div class="form-group row">
                    <label for="nopen" class="col-sm-3 col-form-label">Nomor Pensiun</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nopen" name="nopen" value="<?= $i->nopen; ?>" required>
                        <?= form_error('nopen', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $i->nama ?>" required>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_pembayaran" class="col-sm-3 col-form-label">Tgl Bayar</label>
                    <div class="col-sm-9">
                        <input data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="dd-mm-yyyy" name="tgl_pembayaran" id="tgl_pembayaran" value="<?=  date("d/m/Y", strtotime($i->tgl_pembayaran)); ?>" required>
                        <?= form_error('tgl_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jmlh_bayar" class="col-sm-3 col-form-label">Jumlah Bayar</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="jmlh_bayar" name="jmlh_bayar" value="<?= $i->jmlh_bayar ?>">
                        <?= form_error('jmlh_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bln_lunas" class="col-sm-3 col-form-label">Bulan Lunas</label>
                    <div class="col-sm-9">
                         <input data-provide="datepicker" placeholder="Bulan Lunas" data-date-autoclose="true" class="form-control" data-date-format="dd-mm-yyyy" name="bln_lunas" id="bln_lunas" value="<?= date("d/m/Y", strtotime($i->bln_lunas)); ?>" required>
                    </div>
                </div>
                <div class="form-grouf row justify-content-end">
                    <div class="col-sm-9">
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