<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/bar', $data);
        $this->load->view('admin/menu');
        $this->load->view('templates/footer');
    }

    public function guru()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['guru'] = $this->db->get_where('pengguna', ['role_id' => 2])->result();
        $this->load->view('templates/bar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('templates/footer');
    }

    public function detail_guru()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['guru'] = $this->db->get_where('pengguna', ['id' => $_GET['id']])->row_array();
        $data['jadwal'] = $this->db->get_where('jadwal', ['guru' => $_GET['email']])->result();




        $this->load->view('templates/bar', $data);
        $this->load->view('admin/detail_guru', $data);
        $this->load->view('templates/footer');
    }

    public function detail_murid_G()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();









        $data['murid_detail'] = $this->db->get_where('pengguna', ['email' => $_GET['email_murid']])->row_array();
        $this->load->view('templates/bar', $data);
        $this->load->view('admin/detail_murid_G', $data);
        $this->load->view('templates/footer');
    }


    public function murid()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['murid'] = $this->db->get_where('pengguna', ['role_id' => 3])->result();
        $this->load->view('templates/bar', $data);
        $this->load->view('admin/murid', $data);
        $this->load->view('templates/footer');
    }

    public function detail_murid()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['murid'] = $this->db->get_where('pengguna', ['id' => $_GET['id']])->row_array();
        $data['jadwal'] = $this->db->get_where('jadwal', ['murid' => $_GET['email']])->result();









        $this->load->view('templates/bar', $data);
        $this->load->view('admin/detail_murid', $data);
        $this->load->view('templates/footer');
    }

    public function detail_guru_M()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();










        $data['guru_detail'] = $this->db->get_where('pengguna', ['email' => $_GET['email_guru']])->row_array();
        $this->load->view('templates/bar', $data);
        $this->load->view('admin/detail_guru_M', $data);
        $this->load->view('templates/footer');
    }
}
