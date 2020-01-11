<?php

class Iuran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('M_iuran');
    }

    public function index()
    {
        $data['title'] = 'Iuran Anggota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['iuran'] = $this->M_iuran->tampil_data()->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('iuran/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi()
    {
        $nopen    = $this->input->post('nopen');
        $nama         = $this->input->post('nama');
        $tgl_pembayaran         = $this->input->post('tgl_pembayaran');
        $jmlh_bayar     = $this->input->post('jmlh_bayar');
        $bln_lunas     = $this->input->post('bln_lunas');

        $data = array(
            'nopen'        => $nopen,
            'nama'            => $nama,
            'tgl_pembayaran'            => $tgl_pembayaran,
            'jmlh_bayar'        => $jmlh_bayar,
            'bln_lunas'        => $bln_lunas,
        );

        $this->M_iuran->input_data($data, 'iuran');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success Added Your Data!</div>');

        redirect('iuran/index');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_iuran->hapus_data($where, 'iuran_anggota');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delleted Success!</div>');
        redirect('iuran/index');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Iuran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $data['iuran'] = $this->M_iuran->edit_data($where, 'iuran_anggota')->result();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('iuran/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {

        $id = $this->input->post('id');
        $nopen    = $this->input->post('nopen');
        $nama         = $this->input->post('nama');
        $tgl_pembayaran         = $this->input->post('tgl_pembayaran');
        $jmlh_bayar     = $this->input->post('jmlh_bayar');
        $bln_lunas     = $this->input->post('bln_lunas');


        $data = array(
            'nopen'        => $nopen,
            'nama'            => $nama,
            'tgl_pembayaran'            => $tgl_pembayaran,
            'jmlh_bayar'        => $jmlh_bayar,
            'bln_lunas'        => $bln_lunas,
        );



        $this->M_iuran->update_data($id, $data, 'iuran_anggota');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data has been updated!</div>');

        redirect('iuran/index');
    }
}
