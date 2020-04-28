<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery.timeselector.css">
<div class="container cardcss" style="width: 100%;">

    <center>
        <h2>Atur waktu luang</h2>
        <hr class="garis">
    </center>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12  col-lg-4">
            <br>
            <center>
                <form action="<?= base_url() ?>guru/tambah_waktu" method="POST">
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
                        <font style="color: grey">Pukul :</font>
                        <input type="text" id="timePicker" class="waktu" value="00:00" name="jam1" readonly>
                        <font style="color: grey">sampai </font>
                        <input type="text" id="timePicker" class="waktu" value="00:00" name="jam2" readonly>
                    </div>
                    <input type="submit" class="btn1 tmbl-atur" value="Atur">
                </form>
            </center>

        </div>
        <div class="col-12 col-md-12 col-sm-12 col-lg-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($jadwal as $b) {
                    ?>
                        <tr>
                            <td> <?= $b->hari; ?></td>
                            <td> <?= $b->jam; ?></td>
                            <td> <a href="<?= base_url() ?>guru/hapus_waktu?id=<?= $b->id; ?>"><button class="btn1" style="width: 80px; background-color: red;">Hapus</button></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
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