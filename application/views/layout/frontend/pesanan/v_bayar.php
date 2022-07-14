<!-- Breadcrumb Begin -->
<div class="breadcrumb-option spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bo-links">
                    <a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a>
                    <a class="breadcrumb-item text-muted active" aria-current="page">Konfirmasi Pembayaran</a>
                    <span><?= $title ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Portfolio Hero Section Begin -->
<section class="portfolio-hero-section set-bg" data-setbg="<?= base_url() ?>template1/img/portfolio/details/pre1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ph-text">
                    <h2><?= $title ?></h2>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Hero Section End -->


<!-- Portfolio Details Section Begin -->
<section class="portfolio-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5 ftco-animate">

                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">No Rekening Toko</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <p>Silahkan Trasnfer Ke No Rekening di Bawah Ini Sebesar :
                            <h1 class="text-primary">Rp. <?= number_format($pesanan->jumlah_bayar, 0) ?>.-</h1>
                            </p><br>
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr>
                                        <th>Bank</th>
                                        <th>No Rekening</th>
                                        <th>Atas Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rekening as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value->nama_bank ?></td>
                                            <td><?= $value->no_rek ?></td>
                                            <td><?= $value->atas_nama ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left column -->
            <div class="col-lg-6 mb-5 ftco-animate">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Konfirmasi Pembayaran</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <?php
                        //notifikasi form kosong
                        echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-exclamation-triangle"></i>', '</h5></div>');

                        //notifikasi gagal upload gambar
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
                        }
                       echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_pemesanan); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Atas Nama</label>
                            <input name="atas_nama" class="form-control" placeholder="Atas Nama" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Bank</label>
                            <input name="nama_bank" class="form-control" placeholder="Nama Bank" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Bayar</label>
                            <?php if ($pesanan->pembayaran == 'cashback') { ?>
                                <input name="bayar" class="form-control" placeholder="Jumlah Bayar" required>
                            <?php } elseif ($pesanan->pembayaran == 'DP') { ?>
                                <input class="form-control" placeholder="<?= number_format((50 / 100) * $pesanan->jumlah_bayar, 0) ?>" readonly>
                            <?php }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Bukti Bayar</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="bukti_bayar" class="custom-file-input" required>
                                    <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-primary" role="alert">
                            <strong>*Pemesanan </strong> Akan di proses setelah melakukan upload bukti bayar
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-success">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
