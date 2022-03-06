<!-- Breadcrumb Begin -->
<div class="breadcrumb-option spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bo-links">
                    <a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a>
                    <span>Pricing</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Pricing Section Begin -->
<section class="pricing-section spad">
    <div class="container">
        <div class="row">

        </div>
        <?php echo form_open('pesan/update'); ?>
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Nama paket</th>
                                <th>Harga</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>

                            <?php
                            $total_belanja = 0;
                            foreach ($keranjang as $key => $value) {
                                $total_belanja = $total_belanja + $value->harga - $value->diskon;
                            ?>
                                <tr class="text-center">
                                    <td class="product-remove">
                                        <a href="<?= base_url('pesan/hapus/') . $value->id_keranjang ?>" class="remove-item btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>

                                    <td class="image-prod">
                                        <img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="300px" class="img-fluid" alt="Colorlib Template">
                                    </td>

                                    <td class="product-name">
                                        <h3><?php echo $value->nama_paket ?></h3>
                                        <p></p>
                                    </td>

                                    <td class="price">
                                        <h5>Rp. <?= number_format($value->harga - $value->diskon); ?></h5>
                                    </td>

                                    <td class="quantity">
                                        <div class="input-group mb-3" hidden>
                                            <?php echo form_input(
                                                array(
                                                    'name' => 'qty',
                                                    'value' => '<?= $value->qty?>',
                                                    'maxlength' => '3',
                                                    'min' => '0',
                                                    'max' => 'stock',
                                                    'size' => '5',
                                                    'type' => 'number',
                                                    'class' => 'form-control'
                                                )
                                            ); ?>
                                        </div>
                                    </td>

                                    <td>
                                        <input type="checkbox" name="nama_paket[]" checked="checked" value="<?php echo $value->id_paket; ?>" hidden />
                                    </td>
                                </tr><!-- END TR-->
                                <?php $i++; ?>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="pricing-item">
                    <div class="pi-title">
                        <h3>Rincian Belanja</h3>
                    </div>
                    <div class="pi-text">

                        <p>Total Belanja</p>
                        <h2>Rp. <?= number_format($total_belanja, 0) ?></h2>
                        <br>

                        <button type="submit" class="btn btn-primary py-3 px-4">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</section>
<!-- Pricing Section End -->