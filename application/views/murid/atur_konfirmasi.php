<div class="cardcss" id="cardcss">
    <center>
        <h2>Konfirmasi</h2>
    </center>
    <hr>
    <center>
        <form action="<?= base_url() ?>murid/atur_konfirmasi?email_guru=<?= $guru['email']; ?>" method="POST">
            <font style="color: grey">Hari :</font>
            <select name="hari" id="hari" class="input hari">
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jum'at">Jum'at</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
            </select>
            <br>
            <div style="margin-top: 10px;">
                <font style="color: grey">Dimulai pukul :</font>
                <input type="text" id="timePicker" class="waktu" value="00:00" name="jam1" readonly>
            </div>
            <br>
            <div class="input-fields">
                <font style="color: grey">Durasi :</font>
                <input type="number" min="1" value="1" style="width: 10%; color: grey; padding-left: 8px" name="durasi">
                <font style="color: grey">Jam</font>
            </div>
            <div class="input-fields">
                <font style="color: grey">Jumlah pertemuan</font>
                <input type="number" min="1" value="1" style="width: 10%; color: grey; padding-left: 8px" name="pertemuan">
                <font style="color: grey">Kali</font>
            </div>
            <div class="input-fields">
                <font style="color: grey">Tempat :</font>
                <font style="color: grey; font-size: 12px;">
                    <input type="radio" name="tempat" id="tempat" value="
                    <?php $alamat = explode('|', $pengguna['alamat']);
                    echo $alamat[0] . ' ' . $alamat[1];
                    ?>
                    "> Saya

                    <input type="radio" name="tempat" id="tempat" value="
                    <?php $alamat = explode('|', $guru['alamat']);
                    echo $alamat[0] . ' ' . $alamat[1];
                    ?>"> Guru
                </font>
                <?= form_error('tempat', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
           
    </center>

    <div class="input-fields">
        <!-- <hr>
        <label for="tempat" class="label" style="font-size: 12px;">Isi kolom di bawah jika bukan kedua tempat di atas </label>
        <input type="text" name="tempat" id="tempat" class="input" placeholder="Ketik alamat tempat belajar"> -->
        <hr>
        <input type="submit" class="btn2" value="Konfirmasi">
    </div>
    </form>
</div>




<link rel="stylesheet" href="/path/to/jquery.timeselector.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous">
</script>
<script src="<?= base_url('assets/'); ?>js/jquery.timeselector.js"></script>
<script>
    $(function() {
        $('.waktu').timeselector({
            hours12: false
        });
    });
</script>