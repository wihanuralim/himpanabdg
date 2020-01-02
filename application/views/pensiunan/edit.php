<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?php foreach ($pensiunan as $p) { ?>
                <?= form_open_multipart('pensiunan/update'); ?>
                <input type="hidden" name="id" id="id" value="<?= $p->id ?>">

                <div class="form-group row">
                    <label for="nopen" class="col-sm-3 col-form-label">Nomor Pensiun</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nopen" name="nopen" value="<?= $p->nopen; ?>" required>
                        <?= form_error('nopen', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namapensiun" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="namapensiun" name="namapensiun" value="<?= $p->namapensiun ?>" required>
                        <?= form_error('namapensiun', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $p->tempat_lahir ?>" required>
                        <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $p->tgl_lahir ?>" required>
                        <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                    <div class="col-sm-9">
                        <textarea name="alamat" id="alamat" class="form-control" required><?= $p->alamat ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kota_kab" class="col-sm-3 col-form-label">Kota/Kab</label>
                    <div class="col-sm-9">
                        <select name="kota_kab" id="kota_kab" class="form-control" value="<?= $p->kota_kab ?>" required>
                        <option value="Bandung">Bandung</option>
                        <option value="Ciamis">Ciamis</option>
                        <option value="Cianjur">Cianjur</option>
                        <option value="Cikampek">Cikampek</option>
                        <option value="Cimahi">Cimahi</option>
                        <option value="Indramayu">Indramayu</option>
                        <option value="Karawang">Karawang</option>
                        <option value="Kuningan">Kuningan</option>
                        <option value="Majalengka">Majalengka</option>
                        <option value="Purwakarta">Purwakarta</option>
                        <option value="Subang">Subang</option>
                        <option value="Sumedang">Sumedang</option>
                        <option value="Sukabumi">Sukabumi</option>
                        </select>
                        <?= form_error('kota_kab', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_pensiun" class="col-sm-3 col-form-label">Tanggal Pensiun</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="tgl_pensiun" name="tgl_pensiun" value="<?= $p->tgl_pensiun ?>">
                        <?= form_error('tgl_pensiun', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nohp" class="col-sm-3 col-form-label">No Handphone</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $p->nohp ?>">
                        <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="notelp" class="col-sm-3 col-form-label">No Telepon</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $p->notelp ?>">
                        <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="emailpen" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="emailpen" name="emailpen" value="<?= $p->emailpen ?>">
                        <?= form_error('emailpen', '<small class="text-danger pl-3">', '</small>'); ?>
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