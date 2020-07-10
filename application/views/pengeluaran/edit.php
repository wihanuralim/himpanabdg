<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?php foreach ($pengeluaran as $p) { ?>
                <?= form_open_multipart('pengeluaran/update'); ?>
                <input type="hidden" name="idp" id="idp" value="<?= $p->idp ?>">

								 <div class="form-group row">
                    <label for="metode_pembayaran" class="col-sm-3 col-form-label">Metode Pembayaran</label>
                    <div class="col-sm-9">
                        <select name="metode_pembayaran" id="metode_pembayaran" class="form-control" value="<?= $p->metode_pembayaran ?>" required>
                        <option value="Tunai">Tunai</option>
                        <option value="Transfer">Transfer</option>
                        </select>
                        <?= form_error('metode_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlah_bayar" class="col-sm-3 col-form-label">Jumlah Bayar</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="jumlah_bayar" name="jumlah_bayar" value="<?= $p->jumlah_bayar; ?>" required>
                        <?= form_error('jumlah_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_bayar" class="col-sm-3 col-form-label">Tanggal Bayar</label>
                    <div class="col-sm-9">
                     <input data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="dd-mm-yyyy" name="tgl_bayar" id="tgl_bayar" value="<?=  date("d/m/Y", strtotime($p->tgl_bayar)); ?>" required>
                        <?= form_error('tgl_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="detail" class="col-sm-3 col-form-label">untuk pembayaran...</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="detail" name="detail" value="<?= $p->detail ?>" required>
                        <?= form_error('detail', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ket" class="col-sm-3 col-form-label">No Handphone</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="ket" name="ket" value="<?= $p->ket ?>">
                        <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
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