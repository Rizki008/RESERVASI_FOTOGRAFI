<!-- Breadcrumb Begin -->
<div class="breadcrumb-option spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bo-links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
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
                        <li class="active" data-filter="*">Hasil Pencarian</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="portfolio-filter">
                    <?php foreach ($pencarian as $key => $value) { ?>
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
</div>
<!-- Gallery Section End -->