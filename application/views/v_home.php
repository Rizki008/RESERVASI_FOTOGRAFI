<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hs-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="<?= base_url() ?>template1/img/home1.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hs-text">
                            <h2>Abadikan setiap momen <br />berharga bersama kami</h2>
                            <p>Start booking your photo shoot now!<br /></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</section>
<!-- Hero Section End -->
<!-- Services Section Begin -->

<!-- Services Section End -->

<!-- Categories Section Begin -->
<br>
<section class="categories-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="section-title">
                    <h2>Galeri Foto</h2>
                    <p>Dapatkan inspirasi untuk membuat momen Anda menjadi indah!<br /> </p>
                </div>
            </div>

        </div>
        <div class="categories-slider owl-carousel">
            <?php foreach ($paket as $key => $value) { ?>
                <div class="cs-item">
                    <a href="<?= base_url('home/detail_paket/' . $value->id_paket) ?>">
                        <div class="cs-pic set-bg" data-setbg="<?= base_url('assets/gambar/' . $value->gambar) ?>"></div>
                    </a>
                    <div class="cs-text">
                        <h4><?= $value->nama_paket ?></h4>
                        <span>Diskon Sebesar Rp. <?= number_format($value->diskon, 0) ?></span>
                        <h5><span class="mr-2 price-dc"><strike><small>Rp <?= number_format($value->harga, 0); ?></small></strike></span></h5>
                        <h4><span class="price-sale text-success">Rp <?= number_format($value->harga - $value->diskon); ?></span></h4>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Portfolio Section Begin -->
<section class="portfolio-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>#most.popular</h2>
                </div>
                <div class="filter-controls">
                    <ul>
                        <li class="active" data-filter="*">All Package</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="portfolio-filter">
                    <?php foreach ($paket as $key => $value) { ?>
                        <div class="pf-item set-bg fashion" data-setbg="<?= base_url('assets/gambar/' . $value->gambar) ?>">
                            <a href="<?= base_url('assets/gambar/' . $value->gambar) ?>" class="pf-icon image-popup"><span class="icon_plus"></span></a>
                            <div class="pf-text">
                                <h4><?= $value->nama_paket ?></h4>
                                <span><?= $value->nama_kategori ?></span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Section End -->
<!-- Testimoial Section Begin -->
<section class="testimonial-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>What Client Say?</h2>
                    <p>Riviews</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($reviews as $key => $value) { ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="testimonial-item">
                        <div class="ti-author">
                            <div class="ta-pic">
                                <img src="<?= base_url() ?>template1/img/testimonial/ta-3.jpg" alt="">
                            </div>
                            <div class="ta-text">
                                <h5><?= $value->name ?></h5>
                                <span><?= $value->tanggal ?></span>
                            </div>
                        </div>
                        <p><?= $value->riview ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->