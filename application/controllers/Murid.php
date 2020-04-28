<?php

class Murid extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        if ($this->session->userdata('email') == false or $this->session->userdata('role_id') != 3) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Login terlebih dahulu!</div>');
            redirect('auth');
        }
        $this->load->model('alamat');
        $this->load->model('guru');
        $this->load->model('jadwal');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get_where('menu_pengguna', ['role_id' => 3])->result();
        $this->load->view('templates/bar', $data);
        $this->load->view('menu/menu', $data);
        $this->load->view('templates/footer');
    }

    //Profil murid
    public function profil_murid()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/bar', $data);
        $this->load->view('profil/profil');
        $this->load->view('templates/footer');
    }
    //---------------------------------

    //edit profil
    public function edit_profil()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jk', 'required', [
            'required' => 'Pilih salah satu!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/bar', $data);
            $this->load->view('murid/edit_profil', $data);
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
            redirect('murid/profil_murid');
        }
    }
    //----------------------------------------------------------------------------------------------

    //cari guru
    public function cari_guru()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['kabupaten'] = $this->alamat->kabupaten();

        $this->load->view('templates/bar', $data);
        $this->load->view('murid/cari_guru', $data);
        $this->load->view('templates/footer');
    }

    public function kecamatan()
    {
        if ($_GET['kabupatenID']) {
            echo $this->alamat->kecamatan($_GET['kabupatenID']);
        }
    }

    public function desa()
    {
        if ($_GET['kecamatanID']) {
            echo $this->alamat->desa($_GET['kecamatanID']);
        }
    }
    //---------------------------------------------------------------------------------------------------------

    //hasil pencarian guru
    public function hasil_pencarian()
    {
        if ($desa =  $_GET['desa'] == true) {
            $kabupaten =  $_GET['kabupaten'];
            $kecamatan =  $_GET['kecamatan'];
            $desa =  $_GET['desa'];
            $hasil['guru'] = $this->guru->list_guru($kabupaten, $kecamatan, $desa);
            $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates/bar', $data);
            $this->load->view('murid/hasil_pencarian', $hasil);
            $this->load->view('templates/footer');
        } else {
            redirect('murid/cari_guru');
        }
    }
    //---------------------------------------------------------------------------------------------------------

    //detail guru
    public function detail_guru()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['guru'] = $this->db->get_where('pengguna', ['email' => $_GET['email_guru']])->row_array();
        $data['waktu_luang'] = $this->db->get_where('jadwal_luang', ['email' => $_GET['email_guru']])->result();
        $this->load->view('templates/bar', $data);
        $this->load->view('murid/detail_guru', $data);
        $this->load->view('templates/footer');
    }
    //--------------------------------------------------------------------------------------------------------

    //konfirmasi ngajar
    public function atur_konfirmasi()
    {
        $this->form_validation->set_rules('tempat', 'Tempat', 'required', [
            'required' => 'Pilih salah satu!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
            $data['guru'] = $this->db->get_where('pengguna', ['email' => $_GET['email_guru']])->row_array();
            $this->load->view('templates/bar', $data);
            $this->load->view('murid/atur_konfirmasi', $data);
            $this->load->view('templates/footer');
        } else {
            $hari = $this->input->post('hari');
            $jam = $this->input->post('jam1');
            $tempat = $this->input->post('tempat');
            $pertemuan = $this->input->post('pertemuan');
            $durasi = $this->input->post('durasi');
            $guru = $_GET['email_guru'];
            $murid = $this->session->userdata('email');
            $aktif = 0;
            $waktu_dibuat = time();

            $pembayaran = $durasi * 20000 * $pertemuan;

            $data = [
                "hari" => $hari,
                "jam" => $jam,
                "tempat" => $tempat,
                "guru" => $guru,
                "murid" => $murid,
                "pertemuan" => $pertemuan,
                "durasi" => $durasi,
                "pembayaran" => $pembayaran,
                "aktif" => $aktif,
                "waktu_dibuat" => $waktu_dibuat
            ];

            $query = $this->db->insert('jadwal', $data);

            if ($query) {
                redirect('murid/konfirmasi');
            }
        }
    }
    //--------------------------------------------------------------------------------------------------

    //jadwal
    public function jadwal()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['jadwal'] = $this->db->get_where('jadwal', ['murid' => $this->session->userdata('email'), 'aktif' => 1])->result();
        $this->load->view('templates/bar', $data);
        $this->load->view('murid/jadwal', $data);
        $this->load->view('templates/footer');
    }
    //------------------------------------------------------------------------------------------------

    //konfirmasi
    public function konfirmasi()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['ajar'] = $this->db->get_where('jadwal', ['murid' => $this->session->userdata('email'), 'aktif' => 0])->result();
        $data['henti'] = $this->db->get_where('jadwal', ['murid' => $this->session->userdata('email'), 'aktif' => 2])->result();
        $this->load->view('templates/bar', $data);
        $this->load->view('murid/konfirmasi', $data);
        $this->load->view('templates/footer');
    }

    //hapus konfirmasi
    public function hapus_konfirmasi()
    {
        $this->db->where('id', $_GET['id']);
        $hapus = $this->db->delete('jadwal');

        if ($hapus) {
            redirect('murid/jadwal');
        } else {
            echo "Gagal";
        }
    }
    //------------------------------------------------------------------------------------------------

    //Berhenti belajar
    public function berhenti_belajar()
    {

        // $id = $this->input->post('id');
        // $jumlah = count($id);

        // for ($i = 0; $i < $jumlah; $i++) {

        //     $this->db->set('aktif', 2);
        //     $this->db->where('id', $id[$i]);
        //     $this->db->update('jadwal');
        // }
        // redirect('murid/konfirmasi');

        $this->db->set('aktif', 2);
        $this->db->where('murid', $this->input->post('murid'));
        $this->db->where('aktif', 1);
        $this->db->update('jadwal');
        redirect('murid/konfirmasi');

    }
    //--------------------------------------------------------------------------------------------------

    //Batal berhenti belajar
    public function batal_berhenti()
    {

        $id = $_GET['id'];

        $this->db->set('aktif', 1);
        $this->db->where('id', $id);
        $this->db->update('jadwal');
        redirect('murid/konfirmasi');
    }
    //---------------------------------------------------------------------------------------------------

    //Upload bukti pembayaran
    public function upload()
    {
        // $data['jadwal'] = $this->db->get_where('jadwal', ['murid' => $this->session->userdata('email'), 'aktif' => 1])->result();

        $this->db->where('murid', $this->session->userdata('email'));
        $this->db->where('aktif', 1);
        $query = $this->db->get('jadwal');

        $upload_foto = $_FILES['foto']['name'];

            if ($upload_foto) {
                $config['upload_path'] = './assets/images/bukti_pembayaran';
                $config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    foreach( $query->result() as $j){
                        $foto_lama = $j->bukti_pembayaran;
                    }
                    if ($foto_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/bukti_pembayaran/' . $foto_lama);
                    }

                    $foto_baru = $this->upload->data('file_name');
                    $this->db->set('bukti_pembayaran', $foto_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->where('aktif', 1);
            $this->db->where('murid', $this->session->userdata('email'));
            $this->db->update('jadwal');

            redirect('murid/jadwal');
    }
    //---------------------------------------------------------------------------------------------------

}
