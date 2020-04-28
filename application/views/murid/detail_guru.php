<div class="container">
    <div class="cardcss" id="cardcss">
        <center>

            <h2>Profil guru</h2>
            <?= $this->session->flashdata('message'); ?>
            <hr>
            <img src="<?= base_url('assets/images/profil/') . $guru['foto']; ?>" class="foto-profil" alt="gambar" width="150" height="150">
            <hr>

            <font style="color: grey">
                <?= $guru['nama']; ?><br>
                <?= $guru['jenis_kelamin']; ?><br>
                Sedang menimba ilmu di Ponpes xxxxx
                <br>
                Tanggal Lahir : <?= $guru['tanggal_lahir']; ?><br>
                <?php
                $alamat = explode('|', $guru['alamat']);
                echo $alamat[0] . ' ' . $alamat[1];
                ?>
                <br>
                <?= $guru['email']; ?><br>
                Nomor WhatsApp : <?= $guru['no_WA']; ?><br>
            </font>

            <hr>

            <a href="https://wa.me/<?= $guru['no_WA']; ?>"><button class="btn1" style="background-color: #25D366">Hubungi <i class="fa fa-whatsapp" style="font-size: 20px;"></i> </button></a>
            <a href="<?= base_url() ?>murid/atur_konfirmasi?email_guru=<?= $guru['email']; ?>"><button class="btn1" style="background-color: #00ccff">Konfirmasi</button></a>
        </center>
    </div>
    <br>
    <div class="cardcss" id="cardcss">
        <center>
            <h2>Metode Belajar</h2>
        </center>
        <hr>
        <font style="color: grey">
        <?php
                $this->db->where('guru', $guru['email']);
                $query = $this->db->get('metode_belajar')->result();

                foreach( $query as $b){
                    echo $b->metode;
                 }
         ?>
        </font>
    </div>
    <br>
    <div class="cardcss" id="cardcss">
        <center>
            <h2>Waktu luang</h2>
        </center>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($waktu_luang as $b) {
                ?>
                    <tr>
                        <td> <?= $b->hari; ?></td>
                        <td> <?= $b->jam; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>