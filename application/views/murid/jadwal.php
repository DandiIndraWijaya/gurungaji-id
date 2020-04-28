<div class="cardcss" id="cardcss">
<center>
        <h3>Jadwal anda</h3>
</center>
</div>
<br>
<div class="cardcss" id="cardcss">
    <?php
        foreach($jadwal as $b){
            $guru = $this->db->get_where('pengguna', ['email' => $b->guru])->result();
            foreach($guru as $g){
                $email_guru = $g->email;
                $nama_guru = $g->nama;
            }
        }
    ?>
    <font style="color: grey">
    Guru    : <a href="<?= base_url() ?>murid/detail_guru?email_guru=<?php if(!empty($email_guru)) echo $email_guru; ?>"><?php if(!empty($nama_guru)) echo $nama_guru; ?></a>
    <br>
    Belajar : <a href="">Ngaji</a> 
    </font>
    <div style="overflow-x: auto;">
        <table class="table huruf-tabel">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>durasi</th>
                    <th>Pertemuan</th>
                    <th>Tempat</th>
                    <th class="th th1">Pilih</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($jadwal as $b) {

                ?>
                    <tr>
                        <td> <?= $b->hari; ?></td>
                        <td> <?= $b->jam; ?></td>
                        <td> <?= $b->durasi; ?> jam</td>
                        <td> <?= $b->pertemuan; ?> kali</td>
                        <td> <?= $b->tempat; ?></td>
                        
                        <!-- <form action="<?= base_url() ?>murid/berhenti_belajar" method="POST">
                            <td class="td td1"><input onclick="cek()" class="cek" type="checkbox" name="id[]" value="<?= $b->id; ?>"> </td> -->

                    </tr>
                <?php

                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- <input type="submit" class="btn2" style="display: none;" value="Konfirmasi" id="tombol">
    </form> -->
    <?php
        if(!empty($email_guru)){

    ?>
    <form action="<?= base_url() ?>murid/berhenti_belajar" method="POST">
        <input type="text" name="murid" value="<?= $this->session->userdata('email'); ?>" hidden>
        <input type="submit" class="btn1" name="henti" value="Ajukan pemberhentian belajar" >
    </form>
    <?php
        }
    ?>
    <!-- <button onclick="hapus();" class="btn1">Ajukan pemberhentian belajar</button> -->
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
        <h5 style="color: grey">Total yang harus dibayarkan : <?= $pembayaran; ?></h5>
        <?php
            if(!empty($email_guru)){

            
        ?>
        <h5 style="color: grey">Kirim ke rekening <strong>8985985802(Admin)</strong></h5>
        
        <hr>
        
            <img class="bukti" style="height: 300px" src="<?php if(!empty($email_guru)) echo base_url('assets/images/bukti_pembayaran/') . $bukti_pembayaran;?>" alt="">
        <hr>
        <h5 style="color: grey">Upload Bukti Pembayaran</h5>
        <?= form_open_multipart('murid/upload') ?>
        <div class="input-fields" style="margin-bottom: 0%">
                </div>
                <center>
                    <div style="width: 80%" class="custom-file">
                        <input type="file" class="custom-file-input" name="foto" id="customFile">
                        <label class="custom-file-label " for="customFile">Pilih foto</label>
                    </div>
                </center>
                <br>
                <div class="input-fields">
                    <input type="submit" class="btn1" value="Upload">
                </div>
                <hr>
        </form>
        <?php
            }
        ?>
    </center>
</div>
<br>

<!-- <script>
    function hapus() {
        document.querySelector('.th').classList.toggle('th1');
        const kolom = document.getElementsByClassName('td');

        for (i = 0; i < kolom.length; i++) {
            kolom[i].classList.toggle('td1');
        }

    }

    function cek() {
        const kolom = document.getElementsByClassName('td');
        const cek = document.getElementsByClassName('cek');
        for (i = 0; i < kolom.length; ++i) {
            if (cek[i].checked) {
                document.getElementById('tombol').style.display = "block";
                break;
            } else {
                document.getElementById('tombol').style.display = "none";
            }
        }
    }
</script> -->