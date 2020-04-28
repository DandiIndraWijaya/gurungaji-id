<div class="container">
    <center>
        <h2>Edit profil</h2>
        <hr>
    </center>

    <?= form_open_multipart('profil/edit_profil') ?>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
            <br>
            <div class="cardcss" style="width: 100%; margin: 0;">
                <div class="input-fields" style="margin-bottom: 0%">
                    <label for="customFile " class="label">Foto profil</label><br>
                </div>
                <center>
                    <div style="width: 80%" class="custom-file">
                        <input type="file" class="custom-file-input" name="foto" id="customFile">
                        <label class="custom-file-label " for="customFile">Pilih foto</label>
                    </div>
                </center>
                <div class="input-fields" style="margin-top: 10px">
                    <label for="nama" class="label">Tulis nama</label><br>
                    <input type="text" id="nama" name="nama" class="input" placeholder="Ketik nama anda" value="<?= $pengguna['nama']; ?>" required>
                </div>
                <div class="input-fields">
                    <label for="jk" class="label">Jenis kelamin</label><br>
                    <input type="radio" id="jk" name="jk" <?= $pengguna['jenis_kelamin'] == "Laki-laki" ? "checked" : "" ?> value="Laki-laki">
                    <font style="color: grey;">Laki-laki</font>
                    <input type="radio" id="jk" name="jk" <?= $pengguna['jenis_kelamin'] == "Perempuan" ? "checked" : "" ?> value="Perempuan" style="margin-left: 20px;">
                    <font style="color: grey;">Perempuan</font><br>
                    <?= form_error('jk', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="input-fields">
                    <label for="tl" class="label">Tanggal lahir</label><br>
                    <input type="date" id="tl" name="tl" class="input" style="width: 55%" value="<?= $pengguna['tanggal_lahir']; ?>" required>
                </div>
                <div class="input-fields">
                    <label for="email" class="label">Tulis e-mail</label><br>
                    <input type="email" id="email" name="email" class="input" placeholder="Ketik alamat e-mail" value="<?= $pengguna['email']; ?>" style="background-color: whitesmoke" readonly required>
                </div>
                <div class="input-fields">
                    <label for="wa" class="label">Tulis nomor whatsapp</label><br>
                    <input type="text" id="wa" name="wa" class="input" placeholder="Ketik nomor whatsapp" value="<?= $pengguna['no_WA']; ?>" required>
                </div>
            </div>

        </div>


        <?php

        $Alamat = explode('|', $pengguna['alamat']);
        $jalan = $Alamat[0];

        $lain =  $Alamat[1];

        $alamat = explode(' ', $lain);

        $dusun = $alamat[0];
        $rt = $alamat[2];
        $rw = $alamat[4];
        $kecamatan = $alamat[5];
        $kabupaten = $alamat[6];

        ?>


        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <br>
            <div class="cardcss" style="width: 100%; margin: 0;">
                <div class="input-fields">
                    <label for="email" class="label">Tulis dusun atau desa</label><br>
                    <input type="text" id="dusun" name="dusun" class="input" placeholder="Ketik dusun atau desa anda tinggal" value="<?= $dusun ?>" required>
                </div>
                <div class="input-fields">
                    <label for="rt" class="label">Tulis RT</label><br>
                    <input type="text" id="rt" name="rt" class="input" placeholder="Ketik RT dan RW anda tinggal" value="<?= $rt ?>" style="width: 25%" required>
                </div>
                <div class="input-fields">
                    <label for="rw" class="label">Tulis RW</label><br>
                    <input type="text" id="rw" name="rw" class="input" placeholder="Ketik RT dan RW anda tinggal" value="<?= $rw ?>" style="width: 25%" required>
                </div>
                <div class="input-fields">
                    <label for="kecamatan" class="label">Tulis kecamatan</label><br>
                    <input type="text" id="kecamatan" name="kecamatan" class="input" placeholder="Ketik kecamatan anda tinggal" value="<?= $kecamatan ?>" required>
                </div>
                <div class="input-fields">
                    <label for="kabupaten" class="label">Tulis kabupaten</label><br>
                    <input type="text" id="kabupaten" name="kabupaten" class="input" placeholder="Ketik kabupaten anda tinggal" value="<?= $kabupaten ?>" required>
                </div>
                <div class="input-fields">
                    <label for="jalan" class="label">Tulis jalan, gang dan nomor
                        <font style="color: red; "><i> (*Boleh tidak diisi)<i></font>
                    </label>

                    <input type="text" id="jalan" name="jalan" class="input" value="<?= $jalan; ?>" placeholder="Ketik jalan, gang dan nomor rumah anda">
                    <br><br>
                </div>
                <hr>
                <div class="input-fields">
                    <input type="submit" class="btn1" value="Ubah">
                </div>
                <hr>
            </div>

        </div>
    </div>
    </form>
</div>