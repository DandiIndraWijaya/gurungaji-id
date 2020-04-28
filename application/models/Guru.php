<?php

class Guru extends CI_Model
{
    function list_guru($kabupaten, $kecamatan, $desa)
    {
        $alamat1 = $this->db->get_where('desa', ['id_desa' => $desa])->result();

        foreach ($alamat1 as $a) {
            $desa = $a->nama_desa;
        }

        $alamat2 = $this->db->get_where('kecamatan', ['id_kecamatan' => $kecamatan])->result();

        foreach ($alamat2 as $a) {
            $kecamatan = $a->nama_kecamatan;
        }



        $this->db->like('alamat', $desa);
        $this->db->like('alamat', $kecamatan);
        $this->db->where('role_id', 2);
        return $this->db->get('pengguna');
    }
}
