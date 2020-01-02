<?php

class Pensiunan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('M_pensiunan');
    }

    public function index()
    {
        $data['title'] = 'Data Pensiunan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pensiunan'] = $this->M_pensiunan->tampil_data()->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pensiunan/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi()
    {
        $nopen    = $this->input->post('nopen');
        $namapensiun         = $this->input->post('namapensiun');
        $tempat_lahir         = $this->input->post('tempat_lahir');
        $tgl_lahir     = $this->input->post('tgl_lahir');
        $alamat     = $this->input->post('alamat');
        $kota_kab     = $this->input->post('kota_kab');
        $tgl_pensiun     = $this->input->post('tgl_pensiun');
        $nohp     = $this->input->post('nohp');
        $notelp     = $this->input->post('notelp');
        $emailpen     = $this->input->post('emailpen');



        $data = array(
            'nopen'        => $nopen,
            'namapensiun'            => $namapensiun,
            'tempat_lahir'            => $tempat_lahir,
            'tgl_lahir'        => $tgl_lahir,
            'alamat'        => $alamat,
            'kota_kab'        => $kota_kab,
            'tgl_pensiun'        => $tgl_pensiun,
            'nohp'        => $nohp,
            'notelp'        => $notelp,
            'emailpen'        => $emailpen,

        );

        $this->M_pensiunan->input_data($data, 'pensiunan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success Added Your Data!</div>');

        redirect('pensiunan/index');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_pensiunan->hapus_data($where, 'pensiunan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delleted Success!</div>');
        redirect('pensiunan/index');
    }

    public function edit($id)
    {
        $data['title'] = 'Data Pensiunan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $data['pensiunan'] = $this->M_pensiunan->edit_data($where, 'pensiunan')->result();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pensiunan/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {

        $id = $this->input->post('id');
        $nopen    = $this->input->post('nopen');
        $namapensiun         = $this->input->post('namapensiun');
        $tempat_lahir         = $this->input->post('tempat_lahir');
        $tgl_lahir     = $this->input->post('tgl_lahir');
        $alamat     = $this->input->post('alamat');
        $kota_kab     = $this->input->post('kota_kab');
        $tgl_pensiun     = $this->input->post('tgl_pensiun');
        $nohp     = $this->input->post('nohp');
        $notelp     = $this->input->post('notelp');
        $emailpen     = $this->input->post('emailpen');


        $data = array(
            'nopen'        => $nopen,
            'namapensiun'            => $namapensiun,
            'tempat_lahir'            => $tempat_lahir,
            'tgl_lahir'        => $tgl_lahir,
            'alamat'        => $alamat,
            'kota_kab'        => $kota_kab,
            'tgl_pensiun'        => $tgl_pensiun,
            'nohp'        => $nohp,
            'notelp'        => $notelp,
            'emailpen'        => $emailpen

        );



        $this->M_pensiunan->update_data($id, $data, 'pensiunan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data has been updated!</div>');

        redirect('pensiunan/index');
    }

    public function detail($id)
    {
        $data['title'] = 'Data Pensiunan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('M_pensiunan');
        $detail = $this->M_pensiunan->detail_data($id);
        $data['detail'] = $detail;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pensiunan/detail', $data);
        $this->load->view('templates/footer');
    }
}
