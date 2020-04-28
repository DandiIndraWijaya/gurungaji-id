<?php

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/bar', $data);
        $this->load->view('profil/profil');
        $this->load->view('templates/footer');
    }

    public function edit_profil()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jk', 'required', [
            'required' => 'Pilih salah satu!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/bar', $data);
            $this->load->view('profil/edit_profil', $data);
            $this->load->view('templates/footer');
        } else {
            $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

            $upload_foto = $_FILES['foto']['name'];

            if ($upload_foto) {
                $config['upload_path'] = './assets/images/profil';
                $config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    $foto_lama = $data['pengguna']['foto'];
                    if ($foto_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/profil/' . $foto_lama);
                    }

                    $foto_baru = $this->upload->data('file_name');
                    $this->db->set('foto', $foto_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $nama = htmlspecialchars($this->input->post('nama', true));
            $email = htmlspecialchars($this->session->userdata('email', true));
            $dusun = htmlspecialchars($this->input->post('dusun', true));
            $rt = htmlspecialchars($this->input->post('rt', true));
            $rw = htmlspecialchars($this->input->post('rw', true));
            $kecamatan = htmlspecialchars($this->input->post('kecamatan', true));
            $kabupaten = htmlspecialchars($this->input->post('kabupaten', true));
            $jalan = htmlspecialchars($this->input->post('jalan', true));
            $jk = htmlspecialchars($this->input->post('jk', true));
            $tl = htmlspecialchars($this->input->post('tl', true));
            $WA = htmlspecialchars($this->input->post('wa', true));

            $alamat = $jalan . '|' . $dusun . ' RT ' . $rt . ' RW ' . $rw . ' ' . $kecamatan . ' ' . $kabupaten;


            $this->db->set('nama', $nama);
            $this->db->set('jenis_kelamin', $jk);
            $this->db->set('no_WA', $WA);
            $this->db->set('tanggal_lahir', $tl);
            $this->db->set('alamat', $alamat);
            $this->db->where('email', $email);
            $this->db->update('pengguna');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil berhasil diubah!</div>');
            redirect('profil');
        }
    }
    
    public function edit_metode(){
        $this->form_validation->set_rules('metode', 'Metode', 'required|trim');

        if($this->form_validation->run() == false){
            $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/bar', $data);
            $this->load->view('profil/edit_metode', $data);
            $this->load->view('templates/footer');
        }else{
            $metode = htmlspecialchars($this->input->post('metode', true));

            $this->db->set('metode', $metode);
            $this->db->update('metode_belajar');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Metode Belajar berhasil diubah!</div>');
            redirect('profil');
        }
    }
}
