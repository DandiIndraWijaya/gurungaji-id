<div class="container">
    <div class="cardcss" id="cardcss">
        <center>

            <h2>Profil guru</h2>
            <?= $this->session->flashdata('message'); ?>
            <hr>
            <img src="<?= base_url('assets/images/profil/') . $guru_detail['foto']; ?>" class="foto-profil" alt="gambar" width="150" height="150">
            <hr>

            <font style="color: grey">
                <?= $guru_detail['nama']; ?><br><br>
                <?= $guru_detail['jenis_kelamin']; ?><br><br>
                Tanggal Lahir : <?= $guru_detail['tanggal_lahir']; ?><br><br>
                <?php
                $alamat = explode('|', $guru_detail['alamat']);
                echo $alamat[0] . ' ' . $alamat[1];
                ?>
                <br><br>
                <?= $guru_detail['email']; ?><br><br>
                Nomor WhatsApp : <?= $guru_detail['no_WA']; ?><br><br>
            </font>

            <hr>

            <a href="https://wa.me/<?= $guru_detail['no_WA']; ?>"><button class="btn1" style="background-color: #25D366">Hubungi <i class="fa fa-whatsapp" style="font-size: 20px;"></i> </button></a>
        </center>
    </div>
    <br>
</div>