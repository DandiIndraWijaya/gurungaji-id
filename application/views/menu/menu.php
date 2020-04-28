<div class="container">
    <div class="row">
        <?php

        foreach ($menu as $b) {
        ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <a href="<?= base_url() . $b->link; ?>" style="text-decoration-line: none">
                    <div class="cardcss" style="width: 100%">
                        <?php
                            if($b->menu == "Profil") {
                        ?>
                            <div class="row">
                                <div class="col-3">
                                <img height="100" src="<?= base_url('assets/images/ngaji/profile.png') ?>" alt="">
                                </div>
                                <div class="col-9">
                                    <p style="float: left; ">
                                       <h5 style="color: grey;">Profil</h5>
                                       <hr>
                                       <h6 style="color: grey;">Melihat atau mengubah profil anda</h6>
                                    </p>
                                </div>
                            </div>
                        <?php
                            }elseif($b->menu == "Cari Guru"){
                        ?>
                            <div class="row">
                                <div class="col-3">
                                <img height="100" src="<?= base_url('assets/images/ngaji/Search_Guru.png') ?>" alt="">
                                </div>
                                <div class="col-9">
                                    <p style="float: left; ">
                                       <h5 style="color: grey;">Cari Guru</h5>
                                       <hr>
                                       <h6 style="color: grey;">Mencari guru ngaji di sekatar anda</h6>
                                    </p>
                                </div>
                            </div>
                        <?php
                            }elseif($b->menu == "Jadwal"){
                                ?>
                                <div class="row">
                                    <div class="col-3">
                                    <img height="100" src="<?= base_url('assets/images/ngaji/Schedule.png') ?>" alt="">
                                     </div>
                                    <div class="col-9">
                                        <p style="float: left; ">
                                            <h5 style="color: grey;">Jadwal</h5>
                                            <hr>
                                            <h6 style="color: grey;">Melihat jadwal dan informasi pembayaran </h6>
                                        </p>
                                     </div>
                                </div>
                        <?php
                            }elseif($b->menu == "Konfirmasi"){
                                ?>
                                <div class="row">
                                    <div class="col-3">
                                    <img height="100" src="<?= base_url('assets/images/ngaji/Confirm.png') ?>" alt="">
                                    </div>
                                    <div class="col-9">
                                        <p style="float: left; ">
                                            <h5 style="color: grey;">Konfirmasi</h5>
                                            <hr>
                                            <h6 style="color: grey;">Menampilkan daftar konfirmasi anda</h6>
                                        </p>
                                        </div>
                                    </div>
                        <?php
                            }elseif($b->menu == "Belajar Lewat Quiz"){
                                ?>
                                <div class="row">
                                    <div class="col-3">
                                    <img height="100" src="<?= base_url('assets/images/ngaji/Quiz.png') ?>" alt="">
                                    </div>
                                    <div class="col-9">
                                        <p style="float: left; ">
                                            <h5 style="color: grey;">Belajar Lewat Quiz</h5>
                                            <hr>
                                            <h6 style="color: grey;">Menguji Pengetahuan anda mengenai baca tulis Al-Quran</h6>
                                        </p>
                                        </div>
                                    </div>
                            <?php
                                }elseif($b->menu == "Atur Waktu"){
                                    ?>
                                    <div class="row">
                                        <div class="col-3">
                                        <img height="100" src="<?= base_url('assets/images/ngaji/Set_Time.png') ?>" alt="">
                                        </div>
                                        <div class="col-9">
                                            <p style="float: left; ">
                                                <h5 style="color: grey;">Atur Waktu</h5>
                                                <hr>
                                                <h6 style="color: grey;">Mengatur waktu luang anda untuk mengajar</h6>
                                            </p>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    ?>                                       
                    </div>
                </a>
                <br>
            </div>

        <?php
        }
        ?>
    </div>
</div>