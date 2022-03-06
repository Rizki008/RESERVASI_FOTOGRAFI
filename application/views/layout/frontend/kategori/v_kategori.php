<!-- Breadcrumb Begin -->
<div class="breadcrumb-option spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bo-links">
                    <a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a>
                    <span>Gallery</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Gallery Section Begin -->
<div class="gallery-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="filter-controls">
                    <ul>
                        <li class="active" data-filter="*">Kategori Produk <?= $title ?></li>
                    </ul>
                </div>
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
    <br>
<!-- Gallery Section End -->
<!-- Breadcrumb End -->
        </div>      
                </div>
            </div>