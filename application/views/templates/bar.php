<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bootstrap/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery.timeselector.css">
    <script href="<?= base_url('assets/'); ?>js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">

    <title>Document</title>
</head>

<body>
    <div id="lapisan2">

    </div>

    <!-- navbar -->
    <nav class="navbarcss">
        <span class="open-slidecss">
            <a href="#" onclick="openSlideMenu()">
                <svg width="30" height="30" >
                    <path d="M0,5 30,5" stroke="grey" stroke-width="5" />
                    <path d="M0,14 30,14" stroke="grey" stroke-width="5" />
                    <path d="M0,23 30,23" stroke="grey" stroke-width="5" />
                </svg>
            </a>
           <img style="margin-top: 10px" height="50" width="100" src="<?= base_url('assets/images/ngaji/Ngaji-id.png') ?>" alt="">
        </span>
        <ul class="navbar-navcss">
            <li><a href="<?= base_url(); echo ($pengguna['role_id'] == 2) ? 'guru' : 'murid' ?>"><img       height="40" width="100" src="<?= base_url('assets/images/ngaji/Ngaji.png') ?>" alt=""></a></li>
            <li><a style="color: grey" href="<?= base_url(); ?>auth/logout">Logout</a></li>
        </ul>
        
        
        <div class="kanan ">
            <div class="profilcard">
                <span>
                    <a href="<?= base_url() ?>profil" style="color: grey;"> <?= $pengguna['nama']; ?></a>
                </span>
                <img src="<?= base_url('assets/images/profil/') . $pengguna['foto']; ?>" alt="gambar" class="foto-profil" width="50" height="50">
            </div>

        </div>
    </nav>
    <!-- akhir navbar -->


    <!-- sidebar -->
    <div id="side-menucss" class="side-navcss">
        <div class="ikon-card" style="width: 100%">
            <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
            <img src="<?= base_url() ?>assets/images/profil/default.jpg" width="90" height="90" class="ikon" alt="">
        </div>
        <br>



        <li><a href="<?= base_url(); ?>auth/logout">Logout</a></li>
    </div>
    <!-- akhir sidebar -->

    <div id="maincss">