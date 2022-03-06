<!-- Breadcrumb Begin -->
<div class="breadcrumb-option spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bo-links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>Blog</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Blog Section Begin -->
<section class="blog-section spad">
    <div class="container">
        <?php foreach ($pesanan_detail as $key => $value) { ?>
            <div class="row">
                <div class="col-lg-9">
                    <div class="blog-item">
                        <div class="bi-pic">
                            <img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" alt="">
                        </div>
                        <div class="bi-text">
                            <div class="label"><?= $value->no_pesan ?></div>
                            <h5><?= $value->nama_paket ?></a>
                            </h5>
                            <p><?= $value->deskripsi ?> </p>
                            <ul>
                                <li><i class="icon fa fa-calendar-o"></i><?= $value->tanggal_jadwal ?></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="blog-sidebar">
                        <div class="bs-item s-mb">
                            <h5>Reviews</h5>
                            <p>Silahkan Isi Riviews Pada Paket Kami</p>
                            <div class="bi-subscribe">
                                <?php echo form_open_multipart('pesanan_saya/insert_riview') ?>
                                <input name="id_paket" class="form-control" cols="30" rows="10" placeholder="isi Produk" value="<?= $value->id_paket ?>" required hidden></input>
                                <input type="text" name="riview" placeholder="Riviews" required>
                                <button type="submit" class="site-btn">Riviews</button>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>