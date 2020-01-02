<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Input Anggota Baru</button>
    <div class="col-lg">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA PENSIUNAN</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nomor Pensiun </th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pensiunan as $p) : ?>
                            <tr>
                                <td align="center"><?= $i; ?></td>
                                <td><?php echo $p->nopen ?></td>
                                <td><?php echo $p->namapensiun ?></td>
                                <td><?php echo $p->alamat ?></td>
                                <td><?php echo $p->nohp ?></td>
                                <td align="center">

                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item" href="<?= base_url('pensiunan/detail/' . $p->id); ?>">Detail</a>
                                            <a class="dropdown-item" href="<?= base_url('pensiunan/edit/' . $p->id); ?>">Edit</a>
                                            <a class="dropdown-item" href="<?= base_url('pensiunan/hapus/' . $p->id); ?>">Hapus</a>
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

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">FORM DATA PENSIUNAN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open_multipart('pensiunan/tambah_aksi') ?>

                <div class="form-group col-sm">
                    <input type="text" name="nopen" id="nopen" class="form-control" placeholder="Nomor Pegawai" required>
                </div>
                <div class="form-group col-sm">
                    <input type="text" name="namapensiun" id="namapensiun" class="form-control" placeholder="Nama" required>
                </div>
                <div class="form-group col-sm">
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
                </div>
                <div class="form-group col-sm">
                    <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" onfocus="(this.type='date')" required >
                </div>
                <div class="form-group col-sm">
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat lengkap" required ></textarea>
                </div>
                <div class="form-group col-sm">
                    <select name="kota_kab" id="kota_kab" class="form-control" placeholder="Kota/Kab" required >
                        <option value="">Pilih Kota/Kab</option>
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
                </div>
                <div class="form-group col-sm">
                    <input type="text" name="tgl_pensiun" id="tgl_pensiun" class="form-control" placeholder="Tanggal Pensiun" onfocus="(this.type='date')">
                </div>
                <div class="form-group col-sm">
                    <input type="text" name="nohp" id="nohp" class="form-control" placeholder="Nomor Handphone">
                </div>
                <div class="form-group col-sm">
                    <input type="text" name="notelp" id="notelp" class="form-control" placeholder="Nomor Telepon">
                </div>
                <div class="form-group col-sm">
                    <input type="text" name="emailpen" id="emailpen" class="form-control" placeholder="Email">
                </div>

                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>