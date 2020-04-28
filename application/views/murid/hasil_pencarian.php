<div class="container">
    <div>
        <div class="cardcss" style="width: 90%">
            <center>
                <h3>Hasil pencarian</h3>
            </center>
        </div>
        <br>
        <?php
        if ($guru->num_rows() > 0) {
            foreach ($guru->result() as $b) {
        ?>
                <a href="<?= base_url() ?>murid/detail_guru?email_guru=<?= $b->email; ?>">
                    <div class="row cardcss" style="width: 90%">
                        <div class="col-4 col-sm-4 col-md-2 col-xm-2">
                            <img src="<?= base_url() ?>assets/images/profil/<?= $b->foto; ?>" class="foto-profil hasil" width="100%" id="hasil" alt="">
                        </div>
                        <div class="hasil-cari col-8 col-sm-8 col-md-10 col-xm-10">
                            <span style="color: grey; float: left">
                                <font style="color: #00ccff"><?= $b->nama; ?></font>
                                <hr style="padding: 0px; margin: 2px;">
                                <?php
                                $alamat = explode('|', $b->alamat);
                                echo $alamat[0] . ' ' . $alamat[1];
                                if($b->nama == "Zakaria"){
                                    echo "<br>Guru ngaji";
                                }else{
                                    echo "<br>Guru ngaji dan Bahasa Arab";
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </a>
                <br>
        <?php
            }
        }
        ?>
    </div>
</div>