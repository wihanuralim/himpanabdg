<?php
class Laporanpdf extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }


    function index()
    {
        // ambil data dari cetak
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];

        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(180, 7, 'LAPORAN IURAN HIMPANA', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(180, 7, 'bulan ' . $bulan . ' tahun ' . $tahun . '', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Times', 'B', 10);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Nomor Pensiun', 1, 0, 'C');
        $pdf->Cell(60, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Jumlah Pembayaran', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Tanggal Bayar', 1, 1, 'C');


        $pdf->SetFont('Times', '', 10);
        $iuran = $this->db->query('
            SELECT nopen, nama, jmlh_bayar, tgl_pembayaran
            FROM iuran_anggota
            WHERE YEAR(tgl_pembayaran)="' . $tahun . '" AND MONTH(tgl_pembayaran)="' . $bulan . '"
            ');

             $i=1;
        foreach ($iuran->result() as $row) {

            $pdf->Cell(10, 6, $i, 1, 0, 'C');
            $pdf->Cell(35, 6, $row->nopen, 1, 0, 'C');
            $pdf->Cell(60, 6, $row->nama, 1, 0, 'L');
            $pdf->Cell(40, 6, $row->jmlh_bayar, 1, 0, 'C');
            $pdf->Cell(40, 6, $row->tgl_pembayaran, 1, 1, 'C');
            $i++;
        }
        $pdf->Output();
    }

    function report_pengeluaran()
    {
        // ambil data dari cetak
        $bulan = $_POST['bln'];
        $tahun = $_POST['tahun'];

        $pdf = new FPDF('l', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(250, 7, 'LAPORAN PENGELUARAN', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(250, 7, 'bulan ' . $bulan . ' tahun ' . $tahun . '', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Times', 'B', 10);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Metode Pembayaran', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Jumlah Bayar', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Tanggal Bayar', 1, 0, 'C');
        $pdf->Cell(120, 6, 'Detail Pembayaran', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Ket', 1, 1, 'C');


        $pdf->SetFont('Times', '', 10);
        $pengeluaran = $this->db->query('
            SELECT *
            FROM pengeluaran
            WHERE YEAR(tgl_bayar)="' . $tahun . '" AND MONTH(tgl_bayar)="' . $bulan . '"
            ');

             $i=1;
        foreach ($pengeluaran->result() as $row) {

            $pdf->Cell(10, 6, $i, 1, 0, 'C');
            $pdf->Cell(35, 6, $row->metode_pembayaran, 1, 0, 'C');
            $pdf->Cell(30, 6, $row->jumlah_bayar, 1, 0, 'R');
            $pdf->Cell(30, 6, $row->tgl_bayar, 1, 0, 'C');
            $pdf->Cell(120, 6, $row->detail, 1, 0, 'L');
            $pdf->Cell(40, 6, $row->ket, 1, 1, 'C');
            $i++;
        }
        $pdf->Output();
    }

        function kwitansi($id)
    {
        // ambil data dari cetak

        
        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(200, 7, 'HIMPANA', 0, 1, 'C');
        $pdf->Cell(200, 7, 'PERHIMPUNAN PENSIUNAN PERTAMINA', 0, 1, 'C');
        $pdf->Cell(200, 7, 'CABANG BANDUNG', 0, 1, 'C');
        $pdf->Image('assets/img/utl/logo-himpana.png',10,10,25);
        $pdf->Cell(180, 15, '----------------------------------------------------------------------------------------------------', 0, 1, 'C');
        $pdf->Cell(200, 7, 'KWITANSI PEMBAYARAN IURAN', 0, 1, 'C');


        $pdf->SetFont('Arial', 'B', 12);
        // $pdf->Cell(180, 7, 'bulan ' . $bulan . ' tahun ' . $tahun . '', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Times', 'B', 10);    
        



        $pdf->SetFont('Times', 'B', 12);
        $iuran = $this->db->query("
            SELECT *
            FROM iuran_anggota
            WHERE id = $id
            ");

        foreach ($iuran->result() as $row) {

            $pdf->Cell(60, 6, 'Telah terima dari Bpk/Ibu                        :                    ' .  $row->nama, 0, 1, 'L');
            $pdf->Cell(40, 6, 'Uang Sejumlah                                           :                    ' . $row->jmlh_bayar, 0, 1, 'L');
            $pdf->Cell(40, 6, 'Uang pembayaran iuran s/d                     :                    ' .$row->bln_lunas, 0, 1, 'L');
        }
        $pdf->Output();
    }
}
