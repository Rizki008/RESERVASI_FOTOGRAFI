<!-- Breadcrumb Begin -->
<div class="breadcrumb-option spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="bo-links">
					<a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a>

					<span><?= $title ?></span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<!-- Portfolio Hero Section Begin -->
<section class="portfolio-hero-section set-bg" data-setbg="<?= base_url() ?>template1/img/portfolio/details/blog1.jpg">
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

				<?php
				if ($this->session->flashdata('pesan')) {
					echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i>';
					echo $this->session->flashdata('pesan');
					echo '</h5></div>';
				} ?>


				<div class="card card-primary card-outline card-tabs">
					<div class="card-header p-0 pt-1 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Pesanan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Diproses</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">FollowUp</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Selesai</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="custom-tabs-three-activity-tab" data-toggle="pill" href="#custom-tabs-three-activity" role="tab" aria-controls="custom-tabs-three-activity" aria-selected="false">Dibatalkan</a>
							</li>
						</ul>
					</div>

					<div class="card-body">
						<div class="tab-content" id="custom-tabs-three-tabContent">
							<div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
								<table class="table">
									<thead class="thead-primary">
										<tr>
											<th>No Pesan</th>
											<th>Tanggal Pesan</th>
											<th>Jadwal Pemotretan</th>
											<th>Pembayaran</th>
											<th>Jumlah Pembayaran</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $diskon = 0;
										foreach ($belum_bayar as $key => $value) {
											$diskon = 10 / 100 * $value->jumlah_bayar ?>
											<tr>
												<td><?= $value->no_pesan ?></td>
												<td><?= $value->tgl_order ?></td>
												<td><?= $value->tanggal_jadwal ?></td>
												<td><?= $value->pembayaran ?><br>
													<?php if ($value->pembayaran == 'cashback') { ?>
														<span class="badge badge-success">Diskon 10%</span><br>
														<span class="badge badge-success">Kini Menjadi Rp. <?= number_format($value->jumlah_bayar - $diskon, 0) ?></span>
													<?php } elseif ($value->pembayaran == 'DP') { ?>
														<span class="badge badge-warning">Pembayaran Rp. <?= number_format($value->bayar, 0) ?></span>
													<?php }
													?>
												</td>
												<td><b>Rp. <?= number_format($value->jumlah_bayar, 0) ?></b><br>
													<?php if ($value->status_bayar == 0) { ?>
														<span class="badge badge-warning">Belum bayar</span>
													<?php } else { ?>
														<span class="badge badge-success">Sudah bayar</span><br>
														<span class="badge badge-primary">Menunggu Verifikasi</span>
												<td>
													<button class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#update<?= $value->id_pemesanan ?>">Ganti Jadwal</button>
													<button class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#dibatalkan<?= $value->id_pemesanan ?>">Batalkan</button>
												</td>
											<?php } ?>
											</td>
											<td>
												<?php if ($value->status_bayar == 0) { ?>
													<a href="<?= base_url('pesanan_saya/bayar/' . $value->id_pemesanan) ?>" class="btn btn-sm btn-flat btn-primary">Bayar</a>
													<button class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#dibatalkan<?= $value->id_pemesanan ?>">Batalkan</button>
												<?php } ?>
											</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>

							<div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
								<table class="table">
									<thead class="thead-primary">
										<tr>
											<th>No Pesan</th>
											<th>Tanggal Pesan</th>
											<th>Jadwal Pemotretan</th>
											<th>Pembayaran</th>
											<th>Total Bayar</th>
										</tr>
									</thead>
									<tbody>
										<?php $diskon = 0;
										foreach ($diproses as $key => $value) {
											$diskon = 10 / 100 * $value->jumlah_bayar ?>
											<tr>
												<td><?= $value->no_pesan ?></td>
												<td><?= $value->tgl_order ?></td>
												<td><?= $value->tanggal_jadwal ?></td>
												<td><?= $value->pembayaran ?><br>
													<?php if ($value->pembayaran == 'cashback') { ?>
														<span class="badge badge-success">Diskon 10%</span><br>
														<span class="badge badge-success">Kini Menjadi Rp. <?= number_format($value->jumlah_bayar - $diskon, 0) ?></span>
													<?php } elseif ($value->pembayaran == 'DP') { ?>
														<span class="badge badge-warning">Sisa Pembayaran Rp. <?= number_format($value->jumlah_bayar - $value->bayar, 0) ?></span>
													<?php }
													?>
												</td>
												<td>
													<b>Rp. <?= number_format($value->bayar, 0) ?></b><br>
													<span class="badge badge-success">Diverifiksi</span><br>
													<span class="badge badge-primary">Dikemas</span>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>

							<div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
								<table class="table">
									<thead class="thead-primary">
										<tr>
											<th>No Pesan</th>
											<th>Tanggal Pesan</th>
											<th>Jadwal Pemotretan</th>
											<th>Pembayaran</th>
											<th>FllowUp</th>
											<th>Total Bayar</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($dikirim as $key => $value) { ?>
											<tr>
												<td><?= $value->no_pesan ?></td>
												<td><?= $value->tgl_order ?></td>
												<td><?= $value->tanggal_jadwal ?></td>
												<td><?= $value->pembayaran ?></td>
												<td><?= $value->followup ?><br>
													<span class="badge badge-warning"><?= $value->followup_bayar ?></span><br>
													<button class="btn btn-primary btn-xs btn-flat" data-toggle="modal" data-target="#diterima<?= $value->id_pemesanan ?>">Selesai Pemotretan</button>
												</td>
												<td>
													<b>Rp. <?= number_format($value->bayar, 0) ?></b><br>
													<span class="badge badge-success">Proses</span><br>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>

							<div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
								<table class="table">
									<thead class="thead-primary">
										<tr>
											<th>No Pesan</th>
											<th>Tanggal Pesan</th>
											<th>Jadwal Pemotretan</th>
											<th>Pembayaran</th>
											<th>Total Bayar</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($selesai as $key => $value) { ?>
											<tr>
												<td><a href="<?= base_url('pesanan_saya/detail_selesai/' . $value->no_pesan) ?>"><?= $value->no_pesan ?></td>
												<td><?= $value->tgl_order ?></td>
												<td><?= $value->tanggal_jadwal ?></td>
												<td><?= $value->pembayaran ?></td>
												<td>
													<b>Rp. <?= number_format($value->jumlah_bayar, 0) ?></b><br>
													<span class="badge badge-success">Selesai</span><br>
												</td>
												<td>
													<a href="<?= base_url('pesanan_saya/detail_selesai/' . $value->no_pesan) ?>" class="btn btn-primary">Riviews</a>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>

							<div class="tab-pane fade" id="custom-tabs-three-activity" role="tabpanel" aria-labelledby="custom-tabs-three-activity-tab">
								<table class="table">
									<thead class="thead-primary">
										<tr>
											<th>No Pesan</th>
											<th>Tanggal Pesan</th>
											<th>Jadwal Pemotretan</th>
											<th>Pembayaran</th>
											<th>Total Bayar</th>
											<th>Catatan</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($batalpesan as $key => $value) { ?>
											<tr>
												<td><?= $value->no_pesan ?></td>
												<td><?= $value->tgl_order ?></td>
												<td><?= $value->tanggal_jadwal ?></td>
												<td><?= $value->pembayaran ?></td>
												<td>
													<b>Rp. <?= number_format($value->jumlah_bayar, 0) ?></b><br>
													<span class="badge badge-danger">Pesanan Dibatalkan</span><br>
												</td>
												<td><?= $value->catatan ?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>

						</div>
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>

		<?php foreach ($dikirim as $key => $value) { ?>
			<div class="modal fade" id="diterima<?= $value->id_pemesanan ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Pemotretan Selesai</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							Apakah Anda Yakin Pemotretan Sudah Dilakukan?
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
							<a href="<?= base_url('pesanan_saya/diterima/' . $value->id_pemesanan) ?>" class="btn btn-primary">Ya</a>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
		<?php } ?>

		<?php foreach ($belum_bayar as $key => $value) { ?>
			<div class="modal fade" id="dibatalkan<?= $value->id_pemesanan ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Pemotretan Dibatlkan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php echo form_open('pesanan_saya/batal/' . $value->id_pemesanan) ?>
							Apakah Anda Yakin Pemotretan Akan Dibatalkan?<br>
							<div class="form-group">
								<label>Alasan Pembatalan</label>
								<input type="text" class="form-control" name="catatan_batal" placeholder="Alasan Pembatalan" required>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
							<button type="submit" class="btn btn-primary">Batalkan</button>
						</div>
						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php foreach ($belum_bayar as $key => $value) { ?>
			<div class="modal fade" id="update<?= $value->id_pemesanan ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Ganti Jadwal Pemotretan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php echo form_open('pesanan_saya/update_jadwal/' . $value->id_pemesanan) ?>
							<div class="form-group">
								<label>Jadwal Baru</label>
								<input type="date" class="form-control" name="tanggal_jadwal" value="<?= $value->tanggal_jadwal ?>" required>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</section>
