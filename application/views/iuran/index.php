<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Bayar Iuran</button>
    <div class="col-lg">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">IURAN ANGGOTA HIMPANA BANDUNG</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nomor Pensiun </th>
                            <th>Nama</th>
                            <th>Tgl Bayar</th>
                            <th>Jumlah Bayar</th>
                            <th>Bulan Lunas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($iuran as $i) : ?>
                            <tr>
                                <td align="center"><?= $no; ?></td>
                                <td><?php echo $i->nopen ?></td>
                                <td><?php echo $i->nama ?></td>
                                <td><?php echo  date("d/m/Y", strtotime($i->tgl_pembayaran)); ?></td>
                                <td align="center"><?php echo $i->jmlh_bayar ?></td>
                                <td><?php echo date("d/m/Y", strtotime($i->bln_lunas)); ?></td>
                                <td align="center">

                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item" href="<?= base_url('iuran/edit/' . $i->id); ?>">Ubah</a>
                                            <a onclick="deleteConfirm('<?= base_url('iuran/hapus/' . $i->id); ?>')" href="#" class="dropdown-item">Hapus</a>
                                            <a class="dropdown-item" href="<?= base_url('laporanpdf/kwitansi/' . $i->id); ?>">Kwitansi</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $no++; ?>
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
                <h4 class="modal-title" id="exampleModalLabel">Bayar Iuran Anggota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open_multipart('iuran/tambah_aksi') ?>

                <div class="form-group col-sm">


                    <div class="input-group form-group">
                        <select class="form-control" id="nopen" name="nopen" style="width: 100%">
                            <option value="0">Nomor Pensiun</option>
                        </select>
                    </div>
                    <!-- <input type="text" name="nopen" id="nopen" class="form-control" placeholder="Nomor Pegawai" required> -->
                </div>
                <div class="form-group col-sm">
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
                </div>
                <div class="form-group col-sm">
                    <input data-provide="datepicker" placeholder="Tanggal Bayar" data-date-autoclose="true" class="form-control" data-date-format="dd-mm-yyyy" name="tgl_pembayaran" id="tgl_pembayaran" required>
                </div>
                <div class="form-group col-sm">
                    <input type="number" name="jmlh_bayar" id="jmlh_bayar" class="form-control" placeholder="Jumlah Bayar" required>
                </div>
                <div class="form-group col-sm">
                    <input data-provide="datepicker" placeholder="Bulan Lunas" data-date-autoclose="true" class="form-control" data-date-format="dd-mm-yyyy" name="bln_lunas" id="bln_lunas" required>

                </div>

                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>


                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>