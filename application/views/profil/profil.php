<div class="container">
    <div class="cardcss" id="cardcss">
        <center>

            <h2>Profil anda</h2>
            <?=$this->session->flashdata('message');?>
            <hr>
            <img src="<?=base_url('assets/images/profil/') . $pengguna['foto'];?>" class="foto-profil" alt="gambar" width="150" height="150">
            <hr>

            <font style="color: grey">
                <?=$pengguna['nama'];?><br>
                <?=$pengguna['jenis_kelamin'];?><br>
                Sedang menimba ilmu di Ponpes xxxxx
                <br>
                Tanggal Lahir : <?=$pengguna['tanggal_lahir'];?><br>
                <?php
                    $alamat = explode('|', $pengguna['alamat']);
                    echo $alamat[0] . ' ' . $alamat[1];
                    ?>
                <br>
                <?=$pengguna['email'];?><br>
                Nomor WhatsApp : <?=$pengguna['no_WA'];?><br>

            </font>

            <hr>
            <a href="<?=base_url()?>profil/edit_profil"><button class="btn1">Ubah</button></a>
        </center>
    </div>
<br>

<?php
if ($pengguna['role_id'] == 2) {
?>
<div class="cardcss" id="cardcss">
        <center>
        <font style="color: grey">
            <h2>Metode Belajar</h2>
        </center>   
    <?php
    $this->db->where('guru', $pengguna['email']);
    $query = $this->db->get('metode_belajar')->result();

    foreach ($query as $b) {
        echo $b->metode;
    }
    ?>
            </font>
            <hr>
            <a href="<?=base_url()?>profil/edit_metode"><button class="btn1">Ubah</button></a>

 </div>
<?php
}
?>
</div>