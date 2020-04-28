<div class="container">
    <div class="cardcss" id="cardcss">
        <center>

            <h2>Profil murid</h2>
            <?= $this->session->flashdata('message'); ?>
            <hr>
            <img src="<?= base_url('assets/images/profil/') . $murid['foto']; ?>" class="foto-profil" alt="gambar" width="150" height="150">
            <hr>

            <font style="color: grey">
                <?= $murid['nama']; ?><br><br>
                <?= $murid['jenis_kelamin']; ?><br><br>
                Tanggal Lahir : <?= $murid['tanggal_lahir']; ?><br><br>
                <?php
                $alamat = explode('|', $murid['alamat']);
                echo $alamat[0] . ' ' . $alamat[1];
                ?>
                <br><br>
                <?= $murid['email']; ?><br><br>
                Nomor WhatsApp : <?= $murid['no_WA']; ?><br><br>
            </font>

            <hr>

            <a href="https://wa.me/<?= $murid['no_WA']; ?>"><button class="btn1" style="background-color: #25D366">Hubungi <i class="fa fa-whatsapp" style="font-size: 20px;"></i> </button></a>
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
                    <th>Guru</th>
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
                        $guru = $this->db->get_where('pengguna', ['email' => $b->guru])->result();

                        foreach ($guru as $m) {
                        ?>
                            <td><a href="<?= base_url() ?>admin/detail_guru_M?email_guru=<?= $m->email; ?>"><?= $m->nama; ?></a></td>
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