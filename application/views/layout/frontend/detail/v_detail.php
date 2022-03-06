<!-- Breadcrumb Begin -->
<div class="breadcrumb-option spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bo-links">
                    <a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a>
                    <span>About</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- About Section Begin -->
<section class="about-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="about-pic set-bg" data-setbg="<?= base_url('assets/gambar/' . $paket->gambar) ?>">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="about-text">
                    <div class="section-title">
                        <h2><?= $paket->nama_paket ?></h2>
                        <h5><?php if ($paket->diskon > 0) : ?>
                                <span class="mr-2 price-dc"><strike><small>Rp <?= number_format($paket->harga, 0); ?></small></strike></span>
                                <span class="price-sale text-success">Rp <?= number_format($paket->harga - $paket->diskon); ?></span>
                            <?php else : ?>
                                <span>Rp. <?= number_format($paket->harga) ?></span>
                            <?php endif; ?>
                        </h5><br>
                        <p><?= $paket->deskripsi ?></p>
                        <hr>
                        <?php
                        echo form_open('pesan/keranjang/' . $paket->id_paket);
                        echo form_hidden('id', $paket->id_paket);
                        echo form_hidden('price', $paket->harga - $paket->diskon);
                        echo form_hidden('name', $paket->nama_paket);
                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                        ?>
                        <div class="input-group col-md-6 d-flex mb-3">
                            <input type="number" id="quantity" name="qty" class="form-control" value="1" min="1" max="<?= $paket->stock ?>" hidden>
                        </div>
                    </div>
                    <div class="at-list">
                        <button type="submit" class="btn btn-success mx-30" data-name="<?= $paket->nama_paket; ?>" data-price="<?= ($paket->diskon > 0) ? ($paket->harga - $paket->diskon) : $paket->harga ?>" data-id="<?= $paket->id_paket; ?>">
                            <span><i class="icon-cart">Add To Cart</i></span>
                        </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Team Section Begin -->
<section class="team-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="section-title">
                    <h2>Syarat Dan Ketentuan</h2>
                    <p><?= $paket->ketentuan ?></p>
                        <hr>
                </div> 
                <div class="section-title">
                    <h2>Pilihan Lainnya</h2>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($related_paket as $key => $value) { ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-item">
                        <a href="<?= base_url('home/detail_paket/' . $value->id_paket) ?>"><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="500px" alt=""></a>
                        <div class="ti-text">
                            <h5><?= $value->nama_paket ?></h5>
                            <span>Rp. <?= number_format($value->harga, 0) ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>
<!-- Team Section End -->

<!-- Cta Section Begin -->

<!-- Cta Section End -->

<!-- Testimoial Section Begin -->

<!-- Testimonial Section End -->