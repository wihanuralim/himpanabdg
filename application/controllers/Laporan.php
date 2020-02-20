<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('M_laporan');
    }
    public function index()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->M_laporan->tampil_data()->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function view_data()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->M_laporan->tampil_data()->result();

        if ($_POST) {
            $bulan = $this->input->post('bln');
            $tahun = $this->input->post('tahun');
            $typelaporan = $this->input->post('typelaporan');

            if ($typelaporan == '1') {
                $data['laporan'] = $this->db->query('
                        SELECT nopen, nama, jmlh_bayar
                        FROM iuran_anggota
                        WHERE YEAR(tgl_pembayaran)="' . $tahun . '" AND MONTH(tgl_pembayaran)="' . $bulan . '"
                    ')->result();
            } else {
                show_error('Tidak ada data!');
            }
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }
}
