<div class="cardcss" id="cardcss">
    <center>
        <h3>Jadwal anda</h3>
    </center>

    <div style="overflow-x: auto;">
        <table class="table huruf-tabel tabel1">
            <thead>
                <tr>
                    <th>Murid</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>durasi</th>
                    <th>Pertemuan</th>
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
                            <td><a href="<?= base_url() ?>murid/detail_guru?email_guru=<?= $m->email; ?>"><?= $m->nama; ?></a></td>
                        <?php
                        }
                        ?>
                        <td> <?= $b->hari; ?></td>
                        <td> <?= $b->jam; ?></td>
                        <td> <?= $b->durasi ?> jam</td>
                        <td> <?= $b->pertemuan;?> kali</td>
                        <td> <?= $b->tempat; ?></td>         
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="cardcss" id="cardcss">
    <center>
        <h3>Bukti Pembayaran</h3>

    <hr>
    <?php
            $pembayaran = 0;
             foreach ($jadwal as $b) {
            $pembayaran += $b->pembayaran;
            $bukti_pembayaran = $b->bukti_pembayaran;
        }
    ?>
        <h5 style="color: grey">Uang yang harus anda terima saat ini : <?= $pembayaran; ?></h5>
        <h2> <style></style></h2>
        <?php
            if(!empty($email_guru)){
        ?>
        <hr>
        
            <img class="bukti" style="height: 300px" src="<?php if(!empty($email_guru)) echo base_url('assets/images/bukti_pembayaran/') . $bukti_pembayaran;?>" alt="">
        <?php
            }
        ?>
    </center>
</div>