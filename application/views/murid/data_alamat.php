<?php
if (isset($_GET['kabupaten'])) {
    $kabupaten = $_GET["kabupaten"];

    $sql = "SELECT * FROM kecamatan WHERE parent_id = '$kabupaten' ";
    $baris = $this->db->query($sql)->result_array();
    foreach ($baris as $b) :

        $id = $b["id_kecamatan"];
        echo "<option value = '" . $id . "'>";
        echo $b["nama_kecamatan"];
        echo "</option>";

    endforeach;
}

if (isset($_GET['kecamatan'])) {
    $kecamatan = $_GET["kecamatan"];

    $sql = "SELECT * FROM desa WHERE parent_id = '$kecamatan' ";
    $baris = $this->db->query($sql)->result_array();
    foreach ($baris as $b) :

        $id = $b["id_desa"];
        echo "<option value = '" . $id . "'>";
        echo $b["nama_desa"];
        echo "</option>";

    endforeach;
} else {
    echo "<option>Pilih</option>";
}
