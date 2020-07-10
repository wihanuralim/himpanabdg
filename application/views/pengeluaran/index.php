<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Pengeluaran</button>
    <div class="col-lg">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">TABEL PENGELUARAN</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Metode Pembayaran</th>
                            <th>Jumlah Bayar</th>
                            <th>Tangal Bayar</th>
                            <th>Detail</th>
                            <th>Ket</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pengeluaran as $p) : ?>
                            <tr>
                                <td align="center"><?= $i; ?></td>
                                <td><?php echo $p->metode_pembayaran ?></td>
                                <td><?php echo $p->jumlah_bayar ?></td>
                                <td><?php echo date("d/m/Y", strtotime($p->tgl_bayar)); ?></td>
                                <td><?php echo $p->detail ?></td>
                                <td><?php echo $p->ket ?></td>
                                <td align="center">

                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item" href="<?= base_url('pengeluaran/edit/' . $p->idp); ?>">Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('pengeluaran/hapus/' . $p->idp); ?>">Hapus</a>
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
                <h4 class="modal-title" id="exampleModalLabel">TAMBAH DATA PENGELUARAN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open_multipart('pengeluaran/tambah_aksi') ?>

                 <div class="form-group col-sm">
                    <select name="metode_pembayaran" id="metode_pembayaran" class="form-control" placeholder="Kota/Kab" required >
                        <option value="">Metode Pembayaran</option>
                        <option value="Tunai">Tunai</option>
                        <option value="Transfer">Transfer</option>
                    </select>
                </div>
                <div class="form-group col-sm">
                    <input type="nomor" name="jumlah_bayar" id="jumlah_bayar" class="form-control" placeholder="Jumlah Bayar" required>
                </div>
                <div class="form-group col-sm">
                    <input data-provide="datepicker" placeholder="Tanggal Bayar" data-date-autoclose="true" class="form-control" data-date-format="dd-mm-yyyy" name="tgl_bayar" id="tgl_bayar" required>
                </div>
                <div class="form-group col-sm">
                    <textarea name="detail" id="detail" class="form-control" placeholder="Untuk Pembayaran..." required ></textarea>
                </div>
                <div class="form-group col-sm">
                    <input type="text" name="ket" id="ket" class="form-control" placeholder="Keterangan">
                </div>

                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>