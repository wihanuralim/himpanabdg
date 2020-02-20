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

        $pdf = new FPDF('l', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(250, 7, 'ANGKA RUJUKAN RUMAH SAKIT', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(250, 7, 'bulan ' . $bulan . ' tahun ' . $tahun . '', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Times', 'B', 10);
        $pdf->Cell(20, 6, 'No', 1, 0, 'C');
        $pdf->Cell(23, 6, 'Nomor Pensiun', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Jumlah Pembayaran', 1, 1, 'C');


        $pdf->SetFont('Times', '', 10);
        $data_iuran = $this->db->query('
            SELECT nopen, nama, jmlh_bayar
            FROM iuran anggota
            WHERE YEAR(tgl_pembayaran)="' . $tahun . '" AND MONTH(tgl_pembayaran)="' . $bulan . '"
            ');

        foreach ($data_iuran->result() as $row) {
            $pdf->Cell(20, 6, $row->nopen, 1, 0, 'C');
            $pdf->Cell(20, 6, $row->nama, 1, 0, 'C');
            $pdf->Cell(23, 6, $row->jmlh_bayar, 1, 1, 'C');
        }
        $pdf->Output();
    }
}
