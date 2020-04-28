<div class="container">
    <br>
    <div class="cardcss" style="width: 50%">
        <center>
            <h3 style="color: grey">Daftar menjadi guru di  <img height="40" width="100" src="<?= base_url('assets/images/ngaji/Ngaji.png') ?>" alt=""></h3>
        </center>
    </div>

    <form action="<?= base_url() ?>auth/daftar_guru" method="POST">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                <br>

                <div class="cardcss" style="width: 100%; margin: 0;">
                    <div class="input-fields">
                        <label for="nama" class="label">Tulis nama</label><br>
                        <input type="text" id="nama" name="nama" class="input" placeholder="Ketik nama anda" value="<?= set_value('nama'); ?>" required>
                    </div>
                    <div class="input-fields">
                        <label for="jk" class="label">Jenis kelamin</label><br>
                        <input type="radio" id="jk" name="jk" value="Laki-laki">
                        <font style="color: grey;">Laki-laki</font>
                        <input type="radio" id="jk" name="jk" value="Perempuan" style="margin-left: 20px;">
                        <font style="color: grey;">Perempuan</font>
                        <br>
                        <?= form_error('jk', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="input-fields">
                        <label for="tl" class="label">Tanggal lahir</label><br>
                        <input type="date" id="tl" name="tl" class="input" style="width: 55%" value="<?= set_value('tl'); ?>" required>
                    </div>
                    <div class="input-fields">
                        <label for="email" class="label">Tulis e-mail</label><br>
                        <input type="email" id="email" name="email" class="input" placeholder="Ketik alamat e-mail" value="<?= set_value('email'); ?>" required>
                    </div>
                    <div class="input-fields">
                        <label for="wa" class="label">Tulis nomor whatsapp</label><br>
                        <input type="text" id="wa" name="wa" class="input" placeholder="Ketik nomor whatsapp" value="<?= set_value('wa'); ?>" required>
                    </div>
                    <div class="input-fields">
                        <label for="" class="label">Tulis password anda</label>
                        <input type="password" name="password1" class="input" placeholder="Ketik password minimal 6 karakter" value="<?= set_value('password1'); ?>" required>
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="input-fields">
                        <label for="" class="label">Ulangi password diatas</label>
                        <input type="password" name="password2" class="input" placeholder="Ketik password" required>
                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <br>

                <div class="cardcss" style="width: 100%; margin: 0;">
                    <div class="input-fields">
                        <label for="email" class="label">Tulis dusun atau desa</label><br>
                        <input type="text" id="dusun" name="dusun" class="input" placeholder="Ketik dusun atau desa anda tinggal" value="<?= set_value('dusun'); ?>" required>
                    </div>
                    <div class="input-fields">
                        <label for="rt" class="label">Tulis RT</label><br>
                        <input type="text" id="rt" name="rt" class="input" placeholder="Ketik RW anda tinggal" value="<?= set_value('rt') ?>" style="width: 25%" required>
                    </div>
                    <div class="input-fields">
                        <label for="rw" class="label">Tulis RW</label><br>
                        <input type="text" id="rw" name="rw" class="input" placeholder="Ketik RT anda tinggal" value="<?= set_value('rw') ?>" style="width: 25%" required>
                    </div>
                    <div class="input-fields">
                        <label for="kecamatan" class="label">Tulis kecamatan</label><br>
                        <input type="text" id="kecamatan" name="kecamatan" class="input" placeholder="Ketik kecamatan anda tinggal" value="<?= set_value('kecamatan'); ?>" required>
                    </div>
                    <div class="input-fields">
                        <label for="kabupaten" class="label">Tulis kabupaten</label><br>
                        <input type="text" id="kabupaten" name="kabupaten" class="input" placeholder="Ketik kabupaten anda tinggal" value="<?= set_value('kabupaten'); ?>" required>
                    </div>
                    <div class="input-fields">
                        <label for="jalan" class="label">Tulis jalan, gang dan nomor
                            <font style="color: red; "><i> (*Boleh tidak diisi)<i></font>
                        </label>
                        <br>
                        <input type="text" id="jalan" name="jalan" class="input" placeholder="Ketik jalan, gang dan nomor rumah anda" value="<?= set_value('jalan'); ?>">
                        <br><br>
                    </div>
                    <hr>
                    <div class="input-fields">
                        <input type="submit" class="btn1" value="Daftar">
                    </div>
                    <hr>
                </div>

            </div>
        </div>
    </form>
</div>