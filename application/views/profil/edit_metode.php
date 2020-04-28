<div class="container">
    <center>
        <h2>Metode Belajar</h2>
        <hr>
    </center>

    <form action="<?= base_url()?>profil/edit_metode" method="POST">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
            <br>
            <center>
            <div class="cardcss" style="width: 70%; margin: 0;">
                <div class="input-fields" style="margin-top: 10px">

                    <textarea id="metode" name="metode" class="form-control" rows="5" required></textarea>
                </div>
                <hr>
                <div class="input-fields">
                    <input type="submit" class="btn1" value="Ubah">
                </div>
            </div>
            </center>
        </div>
    </div>
    </form>
</div>