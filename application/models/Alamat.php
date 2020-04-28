<?php

class Alamat extends CI_Model
{
    function kabupaten()
    {
        $this->db->order_by('id_kabupaten', 'ASC');
        $query = $this->db->get('kabupaten');
        return $query->result();
    }

    function kecamatan($kabupatenID)
    {
        $this->db->where('parent_id', $kabupatenID);
        $this->db->order_by('id_kecamatan', 'ASC');
        $query = $this->db->get('kecamatan');
        $output = '<option value="">Pilih</option>';

        foreach ($query->result() as $b) {
            $output .= '<option value="' . $b->id_kecamatan . '">' . $b->nama_kecamatan . '</option>';
        }
        return $output;
    }

    function desa($kecamatanID)
    {
        $this->db->where('parent_id', $kecamatanID);
        $this->db->order_by('id_desa', 'ASC');
        $query = $this->db->get('desa');
        $output = '<option value="">Pilih</option>';

        foreach ($query->result() as $b) {
            $output .= '<option value="' . $b->id_desa . '">' . $b->nama_desa . '</option>';
        }
        return $output;
    }
}
