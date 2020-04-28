<div class="container">
    <div class="cardcss" id="cardcss">

        <center>
            <h2>Cari guru</h2>
        </center>

        <hr>
        <div class="input-fields">
                <font style="color: grey">Kategori :</font>
                <font style="color: grey; font-size: 12px;">
                    <input type="radio" name="tempat" id="tempat"> Semua
                    <input type="radio" name="tempat" id="tempat"> Mengaji
                    <input type="radio" name="tempat" id="tempat"> Bahasa Arab
                </font>
                <?= form_error('tempat', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
        <div class="input-fields">
            <form action="<?= base_url() ?>murid/hasil_pencarian" method="GET">
                <label for="kabupaten" class="label">Kabupaten</label>
                <select id="kabupaten" name="kabupaten" placeholder="Pilih Kabupaten" class="input">
                    <option>Pilih</option>
                    <?php

                    foreach ($kabupaten as $b) :
                    ?>
                        <option value="<?php echo $b->id_kabupaten; ?>"> <?php echo $b->nama_kabupaten; ?></option>

                    <?php
                    endforeach;

                    ?>
                </select>

                <br>

                <label for="kecamatan" class="label">Kecamatan</label>
                <select id="kecamatan" name="kecamatan" class="input">
                    <option>Pilih</option>
                </select>

                <br>

                <label for="desa" class="label">Dusun atau Desa</label>
                <select id="desa" name="desa" class="input">
                    <option>Pilih</option>
                </select>
                <br><br>
                <input type="submit" class="btn1" name="cari" value="Cari">
            </form>
        </div>

        <hr>


    </div>



    <script>
        $('document').ready(function() {
            $('#kabupaten').change(function() {

                var kabupatenId = $('#kabupaten').val();

                $.ajax({
                    method: 'GET',
                    url: '<?= base_url() ?>murid/kecamatan?kabupatenID=' + kabupatenId,
                    success: function(data) {
                        $('#kecamatan').html(data);
                    }
                })


            })

            $('#kecamatan').change(function() {

                var kecamatanId = $('#kecamatan').val();

                $.ajax({
                    method: 'GET',
                    url: '<?= base_url() ?>murid/desa?kecamatanID=' + kecamatanId,
                    success: function(data) {
                        $('#desa').html(data);
                    }
                })


            })
        })
    </script>