<div class="container">
    <div class="cardcss" style="width: 100%;">
        <center>
            <h3>Daftar murid</h3>
        </center>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($murid as $b) {
                ?>
                    <tr>
                        <td><?= $b->id; ?></td>
                        <td><?= $b->nama; ?></td>
                        <td><?php $alamat = explode('|', $b->alamat);
                            echo $alamat[0] . ' ' . $alamat[1];                            ?>
                        </td>
                        <td><a href="<?= base_url() ?>admin/detail_murid?id=<?= $b->id; ?>&email=<?= $b->email; ?>"><button class="btn1">Lihat</button></a></td>
                    </tr>
                    </a>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>