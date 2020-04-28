<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $pengguna = $this->db->get_where('pengguna', ['email' => $email])->row_array();

        if ($pengguna) {
            if ($pengguna['aktif'] == 1) {
                if (password_verify($password, $pengguna['password'])) {
                    $data = [
                        'email' => $email,
                        'role_id' => $pengguna['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($pengguna['role_id'] == 1) {
                        redirect('admin');
                    } else if ($pengguna['role_id'] == 2) {
                        redirect('guru');
                    } else {
                        redirect('murid');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Akun ini belum diaktifkan!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar!</div>');
            redirect('auth');
        }
    }

    public function daftar()
    {
        $this->load->view('templates/bar_auth');
        $this->load->view('auth/daftar');
        $this->load->view('templates/footer');
    }

    public function daftar_murid()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email]', [
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'Password terlalu pendek minimal 6 karakter!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'matches' => 'Password tidak sesuai!'
        ]);
        $this->form_validation->set_rules('jk', 'Jk', 'required', [
            'required' => 'Pilih salah satu!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/bar_auth');
            $this->load->view('auth/daftar_murid');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email', true);
            $dusun = $this->input->post('dusun', true);
            $rt = $this->input->post('rt', true);
            $rw = $this->input->post('rw', true);
            $kecamatan = $this->input->post('kecamatan', true);
            $kabupaten = $this->input->post('kabupaten', true);
            $jalan = $this->input->post('jalan', true);

            $alamat = $jalan . '|' . $dusun . ' RT ' . $rt . ' RW ' . $rw . ' ' . $kecamatan . ' ' . $kabupaten;


            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'foto' => 'default.jpg',
                'jenis_kelamin' => htmlspecialchars($this->input->post('jk', true)),
                'alamat' => $alamat,
                'tanggal_lahir' =>  htmlspecialchars($this->input->post('tl', true)),
                'no_WA' => htmlspecialchars($this->input->post('wa', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'aktif' => 0,
                'waktu_dibuat' => time()
            ];

            $role_id = 3;

            $token = base64_encode(random_bytes(32));
            $token_pengguna = [
                'email' => $email,
                'token' => $token
            ];

            $this->db->insert('pengguna', $data);
            $this->db->insert('token_pengguna', $token_pengguna);

            $this->_sendEmail($token, $email, $role_id, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! akun anda berhasil dibuat. Silahkan aktivasi akun anda melalui email yang kami kirim (cek inbox atau spam)</div>');
            redirect('auth');
        }
    }

    public function daftar_guru()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email]', [
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'Password terlalu pendek minimal 6 karakter!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'matches' => 'Password tidak sesuai!'
        ]);
        $this->form_validation->set_rules('jk', 'Jk', 'required', [
            'required' => 'Pilih salah satu!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/bar_auth');
            $this->load->view('auth/daftar_guru');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email', true);
            $dusun = $this->input->post('dusun', true);
            $rt = $this->input->post('rt', true);
            $rw = $this->input->post('rw', true);
            $kecamatan = $this->input->post('kecamatan', true);
            $kabupaten = $this->input->post('kabupaten', true);
            $jalan = $this->input->post('jalan', true);

            $alamat = $jalan . '|' . $dusun . ' RT ' . $rt . ' RW ' . $rw . ' ' . $kecamatan . ' ' . $kabupaten;


            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'foto' => 'default.jpg',
                'jenis_kelamin' => htmlspecialchars($this->input->post('jk', true)),
                'alamat' => $alamat,
                'tanggal_lahir' =>  htmlspecialchars($this->input->post('tl', true)),
                'no_WA' => htmlspecialchars($this->input->post('wa', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'aktif' => 0,
                'waktu_dibuat' => time()
            ];

            $role_id = 2;

            $token = base64_encode(random_bytes(32));
            $token_pengguna = [
                'email' => $email,
                'token' => $token
            ];

            $this->db->insert('pengguna', $data);
            $this->db->insert('token_pengguna', $token_pengguna);

            $this->_sendEmail($token, $email, $role_id, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! akun anda berhasil dibuat. Silahkan cek inbox atau spam di email anda untuk langkah selanjutnya</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $email, $role_id, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'dandiindra29@gmail.com',
            'smtp_pass' => '123jadidandi',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        if ($type == 'verify' and $role_id == 3) {
            $this->email->from('dandiindra29@gmail.com', 'Gurungaji.id');
            $this->email->to($email);
            $this->email->subject('Verifikasi akun murid');
            $this->email->message('Klik link ini untuk memverifikasi akun anda di Ngaji.id : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Aktifkan </a>');

            if ($this->email->send()) {
                return true;
            } else {
                echo $this->email->print_debugger();
                die;
            }
        } else {
            $this->email->from('dandiindra29@gmail.com', 'Gurungaji.id');
            $this->email->to($email);
            $this->email->subject('Verifikasi akun guru');
            $this->email->message('Sebelum anda menjadi guru di Ngaji.id, anda harus melakukan interview terlebih dahulu untuk uji kelayakan menjadi guru ngaji. Hubungi nomor 08xxxxxxxxxx untuk mendapatkan info selanjutnya');

            if ($this->email->send()) {
                return true;
            } else {
                echo $this->email->print_debugger();
                die;
            }
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $pengguna = $this->db->get_where('pengguna', ['email' => $email])->row_array();

        if ($pengguna) {
            $token_pengguna = $this->db->get_where('token_pengguna', ['token' => $token])->row_array();

            if ($token_pengguna) {

                $token_pengguna = $this->db->get_where('token_pengguna', ['token' => $token])->row_array();
                if ($token_pengguna) {
                    $this->db->set('aktif', 1);
                    $this->db->where('email', $email);
                    $this->db->update('pengguna');

                    $this->db->delete('token_pengguna', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' telah diaktifkan! Silahkan login</div>');
                    redirect('auth');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi gagal! token salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi gagal! token salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi gagal! email salah!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Logout berhasil!</div>');
        redirect('auth');
    }
}
