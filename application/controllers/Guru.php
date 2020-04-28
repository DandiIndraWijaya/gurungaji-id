<?php

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jadwal');
        if ($this->session->userdata('email') == false and $this->session->userdata('role_id') != 2) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Login terlebih dahulu!</div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get_where('menu_pengguna', ['role_id' => 2])->result();
        $this->load->view('templates/bar', $data);
        $this->load->view('menu/menu', $data);
        $this->load->view('templates/footer');
    }

    public function jadwal()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['jadwal'] = $this->db->get_where('jadwal', ['guru' => $this->session->userdata('email'), 'aktif' => 1])->result();
        $this->load->view('templates/bar', $data);
        $this->load->view('guru/jadwal', $data);
        $this->load->view('templates/footer');
    }

    public function atur_waktu()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['jadwal'] = $this->db->get('jadwal_luang')->result();
        $this->load->view('templates/bar', $data);
        $this->load->view('guru/atur_waktu', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_waktu()
    {
        $hari = $this->input->post('hari');
        $jam = $this->input->post('jam1') . ' - ' . $this->input->post('jam2');

        $this->jadwal->tambah_waktu($hari, $jam);
    }

    public function hapus_waktu()
    {
        $id = $_GET['id'];
        $this->jadwal->hapus_waktu($id);
    }

    public function konfirmasi()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['konfirmasi'] = $this->db->get_where('jadwal', ['guru' => $this->session->userdata('email'), 'aktif' => 0])->result();
        $data['henti'] = $this->db->get_where('jadwal', ['guru' => $this->session->userdata('email'), 'aktif' => 2])->result();
        $this->load->view('templates/bar', $data);
        $this->load->view('guru/konfirmasi', $data);
        $this->load->view('templates/footer');
    }

    public function setuju_konfirmasi()
    {
        $this->db->set('aktif', 1);
        $this->db->where('id', $_GET['id']);
        $update = $this->db->update('jadwal');

        if ($update) {
            redirect('guru/konfirmasi');
        }
    }

    public function setuju_berhenti()
    {
        $this->db->set('aktif', 3);
        $this->db->where('murid', $_GET['murid']);
        $this->db->where('guru', $this->session->userdata('email'));
        $this->db->where('aktif', 2);
        $this->db->update('jadwal');
        redirect('guru/konfirmasi');
    }
}
