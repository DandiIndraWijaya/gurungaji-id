<?php

class Jadwal extends CI_Model
{
    function tambah_waktu($hari, $jam)
    {
        $data = [
            'email' => $this->session->userdata('email'),
            'hari' => $hari,
            'jam' => $jam
        ];

        $this->db->insert('jadwal_luang', $data);
        redirect('guru/atur_waktu');
    }

    function hapus_waktu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jadwal_luang');

        redirect('guru/atur_waktu');
    }
}
