<div id="content-wrapper">

    <div class="container-fluid">

        <form action="#" method='post' id="form-laporan">
            <div class="card">
                <h5 class="card-header">FILTER DATA</h5>
                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-sm-3">
                            <div class="col">
                                <Select name="typelaporan" id="typelaporan" class="form-control">
                                    <option >Jenis Laporan</option>
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
                        <div class="form-group col-sm-2">
                            <div class="col">
                                <?php
                                $now = date('Y');
                                echo "<select name='tahun' class='form-control'>";
                                for ($a = 2019; $a <= $now; $a++) {
                                    echo "<option value='$a'>$a</option>";
                                }
                                echo "</select>";
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <div class="col">
                                <button type="button" id="btn-tampilkan" class="btn btn-primary col" onclick="tampilkan()">Tampilkan</button>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <div class="col">
                                <button type="button" id="btn-cetak" class="btn btn-danger col" onclick="cetak()">Cetak</button>
                            </div>
                        </div>
                    </div>
        </form>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-12">
                <h6 class="m-0 font-weight-bold text-primary"> Laporan  </h6>
            </div>
        </div>
    </div>
    
</div>

</div>
</div>
</div>
<script>
	function tampilkan() {
        var typelaporan = $('#typelaporan').val();
        if (typelaporan === '1') {
    		$('#form-laporan').attr('action', '<?= base_url('laporan/view_data'); ?>').submit();
        } else {
    		$('#form-laporan').attr('action', '<?= base_url('laporan/data_view_p'); ?>').submit();
        }
	}

	function cetak() {
          var typelaporan = $('#typelaporan').val();
        if (typelaporan === '1') { 
		$('#form-laporan').attr('action', '<?= base_url('Laporanpdf/'); ?>').submit();
        } else {
		$('#form-laporan').attr('action', '<?= base_url('Laporanpdf/report_pengeluaran'); ?>').submit();
        }
	}
</script>
