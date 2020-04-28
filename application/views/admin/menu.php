<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <a href="<?= base_url() ?>admin/guru">
                <div class="cardcss" style="width: 100%">
                    Guru
                    <hr>
                    <?php
                    $this->db->where('role_id', 2);
                    $this->db->from('pengguna');
                    ?>
                    Jumlah guru : <?= $this->db->count_all_results(); ?>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <a href="<?= base_url() ?>admin/murid">
                <div class="cardcss" style="width: 100%">
                    Murid
                    <hr>
                    <?php
                    $this->db->where('role_id', 3);
                    $this->db->from('pengguna');
                    ?>
                    Jumlah murid : <?= $this->db->count_all_results(); ?>
                </div>
            </a>
        </div>
    </div>
</div>