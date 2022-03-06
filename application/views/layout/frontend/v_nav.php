<?php
$total_followup = $this->m_home->total_followup();
$total_pesan = $this->m_home->total_pesan();
?>
<!-- Header Section Begin -->
<header class="header-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo">
                    <a href="<?= base_url() ?>">
                        <img src="<?= base_url() ?>template1/img/selecta1.png" alt="">
                    </a>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <?php
                        $jml_keranjang = $this->m_transaksi->jml_keranjang();
                        ?>
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <?php $kategori = $this->m_home->kategori_paket(); ?>
                        <li><a href="#">Kategori</a>
                            <ul class="dropdown">
                                <?php foreach ($kategori as $key => $value) { ?>
                                    <li><a href="<?= base_url('/home/kategori/' . $value->id_kategori) ?>"><?= $value->nama_kategori ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li><a href="#">Akun</a>
                            <ul class="dropdown">
                                <?php if (
                                    $this->session->userdata('email') == ""
                                ) { ?>
                                    <li><a href="<?= base_url('pelanggan/login') ?>">Login/Register</a></li>
                                <?php } else { ?>
                                    <li><a href="#"><?= $this->session->userdata('nama_pelanggan'); ?></a></li>
                                    <li><a href="<?= base_url('pesanan_saya') ?>">Pesanan Saya [<?= $total_pesan ?>] | [<?= $total_followup ?>]</a></li>
                                    <li><a href="<?= base_url('pelanggan/logout') ?>">Log Out</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item cta cta-colored"><a href="<?= base_url('pesan') ?>" class="nav-link"><i class="fa fa-shopping-cart"></i>[<?= $jml_keranjang ?>]</a></li>
                    </ul>
                </nav><br>
                <div class="col-lg-10">
                    <form action="<?= base_url('pencarian') ?>" method="get">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" name="keyword" placeholder="Masukan Paket yang Anda Cari...">
                            <input type="submit" value="cari" class="submit px-3">
                        </div>
                    </form>
                </div>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->