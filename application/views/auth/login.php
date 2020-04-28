<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bootstrap/bootstrap.css">
    <script href="<?= base_url('assets/'); ?>bootstrap/jquery.js"></script>
    <script href="<?= base_url('assets/'); ?>bootstrap/bootstrap.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <title>Document</title>
</head>

<body>
    <div id="maincss">

        <div class="container">
            <br><br>
            <div class="cardcss" id="cardcss">
                <center>
                    <div>
                        <h3 style="font-weight: lighter; color:grey">Masuk ke  <img style="margin-top: 10px" height="50" width="100" src="<?= base_url('assets/images/ngaji/Ngaji.png') ?>" alt=""></h3>
                    </div>
                </center>
                <hr>
                <?= $this->session->flashdata('message'); ?>
                <form action="" method="POST">
                    <div class="input-fields">
                        <label for="email" class="label">Tulis e-mail</label><br>
                        <input type="email" id="email" name="email" class="input" value="<?= set_value('email'); ?>" placeholder="Ketik alamat e-mail" required>

                    </div>

                    <div class="input-fields">
                        <label for="" class="label">Tulis password anda</label>
                        <input type="password" name="password" class="input" placeholder="Ketik password" required>
                    </div>

                    <center>
                        <div class="lupa">
                            <a href="#">Lupa Password?</a>
                        </div>
                    </center>

                    <div class="input-fields">
                        <input type="submit" class="btn1" value="Masuk">
                    </div>

                    <center>
                        <div class="akun">
                            Belum memiliki akun? <a href="<?= base_url() ?>auth/daftar"> Daftar sekarang</a>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </div>