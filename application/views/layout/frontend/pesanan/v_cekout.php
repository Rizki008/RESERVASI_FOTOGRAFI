<!-- Blog Details Section Begin -->
<div class="blog-hero set-bg" data-setbg="<?= base_url() ?>template1/img/blog/details/blog2.jpg"></div>
<section class="blog-details-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="blog-details-text">
					<div class="bd-title">
						<div class="bt-bread">
							<a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a>
							<a href="<?= base_url() ?>">Checkout</a>
						</div>
						<h2>Pesan Paket Pemotretan anda</h2>
					</div>
					<?php
					if ($this->session->flashdata('pesan')) {
						echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="fa fa-check text-success"></i>';
						echo $this->session->flashdata('pesan');
						echo '</h5></div>';
					}
					?>
					<?php
					echo validation_errors('<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
					?>
					<div class="bd-comment-form">
						<div class="row">
							<div class="col-lg-6">
								<div class="leave-form">
									<center>
										<h4>Form Pemesanan</h4>
									</center>
									<center>
										<p>Untuk Kategori Wedding, Pre-wedding dan Engagement</p>
									</center>
									<?php echo form_open('pesan/cekout');
									$no_pesan = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
									<!-- <input name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" required> -->
									<input name="id_pelanggan" class="form-control" value="<?= $this->session->userdata('name'); ?>" disabled>
									<input name="tanggal_jadwal" type="date" id="date_picker" class="form-control " placeholder="tanggal Pemotretan" required>
									<select name="pembayaran" class="form-control" id="" required>
										<option value="">---Pilih Pembayaran---</option>
										<option value="cashback">Full Payment (dapatkan cashback 10%)</option>
										<option value="DP">DP</option>
									</select>
								</div>
								<div class="alert alert-primary" role="alert">
									<center><strong>*Pilih Jadwal Minimal H-5</strong></center>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="leave-form">
									<h4>Total Pesanan</h4>
									<?php $i = 1; ?>

									<?php
									$total_belanja = 0;
									foreach ($keranjang as $key => $value) {
										$total_belanja = $total_belanja + $value->harga - $value->diskon;
									?>
									<?php } ?>
									<!-- <p class="d-flex">
                                        <span>Subtotal</span>
                                        <span>Rp. <?= number_format($total_belanja, 0) ?></span>
                                    </p> -->
									<hr>
									<p class="d-flex total-price">
										<span>Total Bayar</span>
									<h5>Rp. <?= number_format($total_belanja, 0) ?></h5>

									</p>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="leave-form">
									<!--simpan transaksi-->
									<input name="no_pesan" value="<?= $no_pesan ?>" hidden>
									<input name="jumlah_bayar" value="<?= $total_belanja ?>" hidden>

									<!--simpan Rinci transaksi-->
									<?php
									$i = 1;
									foreach ($keranjang as $items) {
										echo form_hidden('qty' . $i++);
									}
									?>
									<p>
										<button type="submit" class="btn btn-primary py-3 px-4">Checkout</button>
									</p>
								</div>
							</div>
							<div class="col-lg-6">
								<h4>Jadwal Yang Telah Diboking</h4>
								<?php foreach ($boking as $key => $value) { ?>
									<div class="comment-item">
										<div class="ci-pic">
											<img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" alt="">
										</div>
										<div class="ci-text">
											<h5><?= $value->nama_paket ?></h5>
											<p><i class="fa fa-clock-o"></i> <?= $value->tanggal_jadwal ?></p>
										</div>
									</div>
								<?php } ?>

							</div>
						</div>
						<?php echo form_close() ?>

						<div class="row">
							<div class="col-lg-6">
								<div class="leave-form">
									<center>
										<h4>Form Pemesanan</h4>
									</center>
									<center>
										<p>Untuk Kategori Foto Couple, Group, Class Photo</p>
									</center>
									<?php echo form_open('pesan/cekout_foto');
									$no_pesan = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
									<!-- <input name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" required> -->
									<input name="id_pelanggan" class="form-control" value="<?= $this->session->userdata('name'); ?>" disabled>
									<input name="tanggal_jadwal" type="date" id="date" class="form-control " placeholder="tanggal Pemotretan" required>
									<select name="pembayaran" class="form-control" id="" required>
										<option value="">---Pilih Pembayaran---</option>
										<option value="cashback">Full Payment (dapatkan cashback 10%)</option>
										<option value="DP">DP</option>
									</select>
								</div>
								<div class="alert alert-primary" role="alert">
									<center><strong>*Pilih Jadwal Untuk Sekarang atau Besok</strong></center>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="leave-form">
									<?php $i = 1; ?>

									<?php
									$total_belanja = 0;
									foreach ($keranjang as $key => $value) {
										$total_belanja = $total_belanja + $value->harga - $value->diskon;
									?>
									<?php } ?>
									<hr>
									<p class="d-flex total-price">
									<h5 hidden>Rp. <?= number_format($total_belanja, 0) ?></h5>
									</p>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="leave-form">
									<input name="no_pesan" value="<?= $no_pesan ?>" hidden>
									<input name="jumlah_bayar" value="<?= $total_belanja ?>" hidden>
									<?php
									$i = 1;
									foreach ($keranjang as $items) {
										echo form_hidden('qty' . $i++);
									}
									?>
									<p>
										<button type="submit" class="btn btn-primary py-3 px-4">Checkout</button>
									</p>
								</div>
							</div>
						</div>
						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
