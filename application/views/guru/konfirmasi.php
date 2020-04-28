<div class="cardcss" id="cardcss">
    <center>
        <h3>Konfirmasi belajar</h3>
    </center>

    <div style="overflow-x: auto;">
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
                    foreach ($konfirmasi as $b) {
                ?>
                    <tr>
                        <?php
                            $murid = $this->db->get_where('pengguna', ['email' => $b->murid])->result();

                         foreach ($murid as $m) {
                         ?>
                            <td><a href="<?=base_url()?>murid/detail_guru?email_guru=<?=$m->email;?>"><?=$m->nama;?></a></td>
                            <?php
                        }
                        ?>
                        <td> <?=$b->hari;?></td>
                        <td> <?=$b->jam;?></td>
                        <td> <?=$b->durasi;?> jam</td>
                        <td> <?=$b->pertemuan;?> kali</td>
                        <td> <?=$b->pembayaran;?></td>
                        <td> <?=$b->tempat;?></td>
                        <td><a href="<?=base_url()?>guru/setuju_konfirmasi?id=<?=$b->id;?>"><button class="btn2" style="background-color: #ffcc00">Setujui</button></a></td>
                    </tr>
                <?php
                        $pembayaran = $pembayaran + $b->pembayaran;
                    }
                ?>
            </tbody>
        </table>
        <?php if($pembayaran != 0) echo "Total Pembayaran : " . $pembayaran;?>
    </div>
</div>
<br>
<div class="cardcss" id="cardcss">
    <center>
        <h3>Konfirmasi berhenti belajar</h3>
    </center>
    <div style="overflow-x: auto;">
        <table class="table huruf-tabel">
            <thead>
                <tr>
                    <th>Murid</th>
                    <th>Hari</th>
                    <th>Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
    foreach ($henti as $b) {
        $murid = $this->db->get_where('pengguna', ['email' => $b->murid])->result();
    foreach ($murid as $m) {
        $email_murid = $m->email;
        $nama_murid = $m->nama;
        }
    }
    ?>
        <tr>
            <td><a href="<?=base_url()?>murid/detail_guru?email_guru=<?php if(!empty($email_murid)) echo $email_murid; ?>"><?php if(!empty($email_murid)) echo $nama_murid; ?></a></td>
            <td>
                <?php
                    foreach($henti as $b){
                        echo $b->hari . " ";
                    }
                ?>
            </td>
            <?php
                $pembayaran = 0;
                foreach ($henti as $b) {
                    $pembayaran += $b->pembayaran;
                    $murid = $b->murid;
                }
            ?>
            <td><?php if(!empty($email_murid)) echo $pembayaran; ?></td>
            <?php if(!empty($email_murid)){

            ?>
            <td><a href="<?=base_url()?>guru/setuju_berhenti?murid=<?= $b->murid; ?>"><button class="btn2" style="background-color: #ffcc00">Setujui</button></a></td>
            <?php
            }
            ?>
        </tr>
            </tbody>
        </table>
    </div>
</div>
<br>