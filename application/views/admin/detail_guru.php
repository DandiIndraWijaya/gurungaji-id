<div class="container">
    <div class="cardcss" id="cardcss">
        <center>

            <h2>Profil guru</h2>
            <?= $this->session->flashdata('message'); ?>
            <hr>
            <img src="<?= base_url('assets/images/profil/') . $guru['foto']; ?>" class="foto-profil" alt="gambar" width="150" height="150">
            <hr>

            <font style="color: grey">
                <?= $guru['nama']; ?><br><br>
                <?= $guru['jenis_kelamin']; ?><br><br>
                Tanggal Lahir : <?= $guru['tanggal_lahir']; ?><br><br>
                <?php
                $alamat = explode('|', $guru['alamat']);
                echo $alamat[0] . ' ' . $alamat[1];
                ?>
                <br><br>
                <?= $guru['email']; ?><br><br>
                Nomor WhatsApp : <?= $guru['no_WA']; ?><br><br>
            </font>

            <hr>

            <a href="https://wa.me/<?= $guru['no_WA']; ?>"><button class="btn1" style="background-color: #25D366">Hubungi <i class="fa fa-whatsapp" style="font-size: 20px;"></i> </button></a>
        </center>
    </div>
    <br>
    <div class="cardcss" id="cardcss">
        <center>
            <h2>Jadwal</h2>
        </center>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Murid</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Tempat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($jadwal as $b) {
                ?>
                    <tr>
                        <?php
                        $murid = $this->db->get_where('pengguna', ['email' => $b->murid])->result();

                        foreach ($murid as $m) {
                        ?>
                            <td><a href="<?= base_url() ?>admin/detail_murid_G?email_murid=<?= $m->email; ?>"><?= $m->nama; ?></a></td>
                        <?php
                        }
                        ?>
                        <td> <?= $b->hari; ?></td>
                        <td> <?= $b->jam; ?></td>
                        <td> <?= $b->tempat; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>