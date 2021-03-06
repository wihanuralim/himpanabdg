<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratkeluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('M_surat_keluar');
    }

    public function index()
    {
        $data['title'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar'] = $this->M_surat_keluar->tampil_data()->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratkeluar/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $nomor_surat            = $this->input->post('nomor_surat');
        $perihal                = $this->input->post('perihal');
        $tgl_surat              = $this->input->post('tgl_surat');
        $tgl_kirim              = $this->input->post('tgl_kirim');
        $biaya_kirim            = $this->input->post('biaya_kirim');



        if (!empty($_FILES['surat']['name'])) {
            $config['upload_path']      = './assets/img/suratkeluar';
            $config['allowed_types']    = 'pdf';
            $config['max_size']         = '10000';


            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('surat')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tambah Data Gagal!</div>');
                redirect('suratkeluar/index');
            } else {
                $surat = $this->upload->data('file_name');
            }
        }

        if (!empty($_FILES['lampiran']['name'])) {
            $config['upload_path']          = './assets/img/suratkeluar/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = '10000';


            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('lampiran')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tambah Data Gagal!</div>');
                redirect('suratkeluar/index');
            } else {
                $lampiran = $this->upload->data('file_name');
            }
        }


        $data = array(
            'nomor_surat'        => $nomor_surat,
            'perihal'            => $perihal,
            'tgl_surat'          => date("Y-m-d", strtotime($tgl_surat)),
            'tgl_kirim'          => date("Y-m-d", strtotime($tgl_kirim)),
            'biaya_kirim'        => $biaya_kirim,
            'surat'              => $surat,
            'lampiran'           => $lampiran

        );

        $data['surat_keluar'] = $this->M_surat_keluar->input_data($data, 'surat_keluar');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');

        redirect('suratkeluar/index');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Surat Keluar';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('M_surat_keluar');
        $detail = $this->M_surat_keluar->detail_data($id);
        $data['detail'] = $detail;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratkeluar/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $where = array('idsk' => $id);
        $this->M_surat_keluar->hapus_data($where, 'surat_keluar');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus!</div>');
        redirect('suratkeluar');
    }

    public function edit($id)
    {
        $data['title'] = 'Ubah Surat Keluar';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $where = array('idsk' => $id);
        $data['surat_keluar'] = $this->M_surat_keluar->edit_data($where, 'surat_keluar')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratkeluar/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $data['title'] = 'Ubah Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar'] = $this->db->get_where('surat_keluar')->row_array();

        $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');
        $this->form_validation->set_rules('tgl_surat', 'Tgl Surat', 'required');
        $this->form_validation->set_rules('tgl_kirim', 'Tgl Kirim', 'required');
        $this->form_validation->set_rules('biaya_kirim', 'Biaya Kirim', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $idsk = $this->input->post('idsk');
            $suratKeluar = array(
                'nomor_surat'       => $this->input->post('nomor_surat'),
                'perihal'           => $this->input->post('perihal'),
                'tgl_surat'         => $this->input->post('tgl_surat'),
                'tgl_kirim'         => $this->input->post('tgl_kirim'),
                'biaya_kirim'       => $this->input->post('biaya_kirim')
            );


            //cek jika ada gambar yang di upload
            $upload_image = $_FILES['surat']['name'];

            if ($upload_image) {
                $config['upload_path']      = './assets/img/suratkeluar/';
                $config['allowed_types']    = 'pdf';
                $config['max_size']         = '10000';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('surat')) {
                    $old_image = $data['surat_keluar']['surat'];

                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/suratkeluar/' . $old_image);
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
                $config['upload_path']      = './assets/img/suratkeluar/';
                $config['allowed_types']    = 'pdf';
                $config['max_size']         = '10000';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('lampiran')) {
                    $old_image = $data['surat_keluar']['lampiran'];

                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/suratkeluar/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('lampiran', $new_image);
                    // $data['surat'] = $new_image;
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('idsk', $idsk);
            $this->db->update('surat_keluar', $suratKeluar);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
            redirect('suratkeluar');
        }
    }
}
