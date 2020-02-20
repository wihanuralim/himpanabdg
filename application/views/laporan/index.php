<div id="content-wrapper">

    <div class="container-fluid">

        <form action="<?php echo base_url('laporan/view_data'); ?>" method='post'>
            <div class="card">
                <h5 class="card-header">FILTER DATA</h5>
                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-sm-3">
                            <div class="col">
                                <Select name="typelaporan" class="form-control">
                                    <option value="1">Laporan Iuran</option>
                                    <option value="2">Laporan Pengeluaran</option>

                                </Select>
                            </div>

                        </div>
                        <div class="form-group col-sm-3">
                            <div class="col">
                                <select name="bln" class="form-control">
                                    <?php
                                    $bulan = array("Bulan", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "November", "Desember");
                                    $jlh_bln = count($bulan);
                                    for ($c = 0; $c < $jlh_bln; $c += 1) {
                                        echo "<option value='$c'> $bulan[$c] </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <div class="col">
                                <?php
                                $now = date('Y');
                                echo "<select name='tahun' class='form-control'>";
                                for ($a = 2016; $a <= $now; $a++) {
                                    echo "<option value='$a'>$a</option>";
                                }
                                echo "</select>";
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <div class="col">
                                <input class="btn btn-primary col" type="submit" name="btn" value="Tampilkan">
                            </div>
                        </div>
                    </div>
        </form>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-11">
                <h6 class="m-0 font-weight-bold text-primary"> Laporan Iuran Anggota </h6>
            </div>
            <div class="col-sm-1">
                <a class="btn btn-danger btn-sm" href="<?= base_url('laporanpdf') ?>">Print</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Nomor Pensiun </th>
                        <th>Nama</th>
                        <th>Jumlah Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($laporan as $l) : ?>
                        <tr>
                            <td align="center"><?= $no; ?></td>
                            <td><?php echo $l->nopen ?></td>
                            <td><?php echo $l->nama ?></td>
                            <td><?php echo $l->jmlh_bayar ?></td>

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
</div>