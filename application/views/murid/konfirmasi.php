<div class="cardcss" id="cardcss">
    <center>
        <h3>Menunggu konfirmasi mengajar</h3>
    </center>
    <div style="overflow-x: auto;">
    <?php
        if(!empty($ajar)){
    ?>
        <button onclick="goBack()" class="btn btn-primary">Tambah</button>
    <?php
        }
    ?>
        <table class="table huruf-tabel">
            <thead>
                <tr>
                    <th>Guru</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>durasi</th>
                    <th>Pertemuan</th>
                    <th>Pembayaran</th>
                    <th>Tempat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $pembayaran = 0;
                foreach ($ajar as $b) {
                ?>
                    <tr>
                        <?php
                        $guru = $this->db->get_where('pengguna', ['email' => $b->guru])->result();

                        foreach ($guru as $g) {
                        ?>
                            <td><a href="<?= base_url() ?>murid/detail_guru?email_guru=<?= $g->email; ?>"><?= $g->nama; ?></a></td>
                        <?php
                        }
                        ?>
                        <td> <?= $b->hari; ?></td>
                        <td> <?= $b->jam; ?></td>
                        <td> <?= $b->durasi; ?> jam</td>
                        <td> <?= $b->pertemuan; ?> kali</td>
                        <td> <?= $b->pembayaran; ?></td>
                        <td> <?= $b->tempat; ?></td>
                        <td><a href="<?= base_url() ?>murid/hapus_konfirmasi?id=<?= $b->id; ?>"><button class="btn2" style="background-color: red">Hapus</button></a></td>
                    </tr>                                
                <?php
                $pembayaran = $pembayaran + $b->pembayaran;
                }
                ?>
            </tbody>
        </table>
        <?= "Total Pembayaran : " . $pembayaran; ?>
    </div>
</div>
<br>

<div class="cardcss" id="cardcss">
    <center>
        <h3>Menunggu konfirmasi berhenti belajar</h3>
    </center>
    <div style="overflow-x: auto;">
        <table class="table huruf-tabel">
            <thead>
                <tr>
                    <th>Guru</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Tempat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($henti as $b) {
                ?>
                    <tr>
                        <?php
                        $guru = $this->db->get_where('pengguna', ['email' => $b->guru])->result();

                        foreach ($guru as $g) {
                        ?>
                            <td><a href="<?= base_url() ?>murid/detail_guru?email_guru=<?= $g->email; ?>"><?= $g->nama; ?></a></td>
                        <?php
                        }
                        ?>
                        <td> <?= $b->hari; ?></td>
                        <td> <?= $b->jam; ?></td>
                        <td> <?= $b->tempat; ?></td>
                        <td><a href="<?= base_url() ?>murid/batal_berhenti?id=<?= $b->id; ?>"><button class="btn2" style="background-color: red">Batal</button></a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<br>

<script>
    function goBack(){
        window.history.back();
    }
</script>