<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratmasuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('M_surat_masuk');
    }

    public function index()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->M_surat_masuk->tampil_data()->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratmasuk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $nomor_surat        = $this->input->post('nomor_surat');
        $perihal            = $this->input->post('perihal');
        $tgl_surat          = $this->input->post('tgl_surat');
        $tgl_terima         = $this->input->post('tgl_terima');

        if (!empty($_FILES['surat']['name'])) {
            $config['upload_path']          = './assets/img/suratmasuk';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = '10000';


            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('surat')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tambah Data Gagal!</div>');
                redirect('suratmasuk');
            } else {
                $surat = $this->upload->data('file_name');
            }
        }


        if (!empty($_FILES['lampiran']['name'])) {
            $config['upload_path']          = './assets/img/suratmasuk/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = '10000';


            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('lampiran')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tambah Data Gagal!</div>');
                redirect('suratmasuk/index');
            } else {
                $lampiran = $this->upload->data('file_name');
            }
        } else {
            $lampiran = '';
        }

        $data = array(
            'nomor_surat'        => $nomor_surat,
            'perihal'            => $perihal,
            'tgl_surat'          =>  date("Y-m-d", strtotime($tgl_surat)),
            'tgl_terima'         => date("Y-m-d", strtotime($tgl_terima)),
            'surat'              => $surat,
            'lampiran'           => $lampiran

        );

        $data['surat_masuk'] = $this->M_surat_masuk->input_data($data, 'surat_masuk');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success Added Your Data!</div>');
        redirect('suratmasuk/index');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Surat Masuk';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('M_surat_masuk');
        $detail = $this->M_surat_masuk->detail_data($id);
        $data['detail'] = $detail;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratmasuk/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $where = array('idsm' => $id);
        $this->M_surat_masuk->hapus_data($where, 'surat_masuk');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus!</div>');
        redirect('suratmasuk/index');
    }

    public function edit($id)
    {
        $data['title'] = 'Ubah Surat Masuk';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $where = array('idsm' => $id);
        $data['surat_masuk'] = $this->M_surat_masuk->edit_data($where, 'surat_masuk')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratmasuk/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $data['title'] = 'Ubah Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->db->get_where('surat_masuk')->row_array();

        $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');
        $this->form_validation->set_rules('tgl_surat', 'Tgl Surat', 'required');
        $this->form_validation->set_rules('tgl_terima', 'Tgl Terima', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratmasuk/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $idsm = $this->input->post('idsm');
            $suratMasuk = array(
                'nomor_surat' => $this->input->post('nomor_surat'),
                'perihal' => $this->input->post('perihal'),
                'tgl_surat' => $this->input->post('tgl_surat'),
                'tgl_terima' => $this->input->post('tgl_terima')
            );


            //cek jika ada file yang di upload
            $upload_image = $_FILES['surat']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/suratmasuk/';
                $config['allowed_types'] = 'pdf';
                $config['max_size']     = '3000';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('surat')) {
                    $old_image = $data['surat_masuk']['surat'];

                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/suratmasuk/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('surat', $new_image);
                    // $data['surat'] = $new_image;
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $upload_image = $_FILES['lampiran']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/suratmasuk/';
                $config['allowed_types'] = 'pdf';
                $config['max_size']     = '3000';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('lampiran')) {
                    $old_image = $data['surat_masuk']['lampiran'];

                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/suratmasuk/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('lampiran', $new_image);
                    // $data['surat'] = $new_image;
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('idsm', $idsm);
            $this->db->update('surat_masuk', $suratMasuk);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
            redirect('suratmasuk');
        }
    }
}
