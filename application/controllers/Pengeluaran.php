<?php

class Pengeluaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('M_pengeluaran');
    }

    public function index()
    {
        $data['title'] = 'Pengeluaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengeluaran'] = $this->M_pengeluaran->tampil_data()->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengeluaran/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi()
    {
        $metode_pembayaran      = $this->input->post('metode_pembayaran');
        $jumlah_bayar           = $this->input->post('jumlah_bayar');
        $tgl_bayar              = $this->input->post('tgl_bayar');
        $detail                 = $this->input->post('detail');
        $ket                    = $this->input->post('ket');

        $data = array(
            'metode_pembayaran'         => $metode_pembayaran,
            'jumlah_bayar'              => $jumlah_bayar,
            'tgl_bayar'                 => date("Y-m-d", strtotime($tgl_bayar)), 
            'detail'                    => $detail,
            'ket'                       => $ket,
        );

        $this->M_pengeluaran->input_data($data, 'pengeluaran');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');

        redirect('pengeluaran/index');
    }

    public function hapus($idp)
    {
        $where = array('idp' => $idp);
        $this->M_pengeluaran->hapus_data($where, 'pengeluaran');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus!</div>');
        redirect('pengeluaran/index');
    }

    public function edit($idp)
    {
        $data['title'] = 'Pengeluaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('idp' => $idp);
        $data['pengeluaran'] = $this->M_pengeluaran->edit_data($where, 'pengeluaran')->result();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengeluaran/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {

        $idp                    = $this->input->post('idp');
        $metode_pembayaran      = $this->input->post('metode_pembayaran');
        $jumlah_bayar           = $this->input->post('jumlah_bayar');
        $tgl_bayar              = $this->input->post('tgl_bayar');
        $detail                 = $this->input->post('detail');
        $ket                    = $this->input->post('ket');


        $data = array(
            'metode_pembayaran'         => $metode_pembayaran,
            'jumlah_bayar'              => $jumlah_bayar,
            'tgl_bayar'                 => date("Y-m-d", strtotime($tgl_bayar)), 
            'detail'                    => $detail,
            'ket'                       => $ket,
        );



        $this->M_pengeluaran->update_data($idp, $data, 'pengeluaran');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');

        redirect('pengeluaran/index');
    }
}
