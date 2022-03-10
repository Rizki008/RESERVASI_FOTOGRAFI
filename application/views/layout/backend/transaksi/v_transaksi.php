<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h4 class="page-title text-truncate text-dark font-weight-medium mb-1"></h4>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>" class="text-muted">Home</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page">Pesanan Masuk</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->
		<div class="row">
			<?php
			if ($this->session->flashdata('pesan')) {
				echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
				echo $this->session->flashdata('pesan');
				echo '</h5></div>';
			} ?>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Pesanan Masuk</h4>
					</div>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">No Pemesanan</th>
									<th scope="col">Nama Pelanggan</th>
									<th scope="col">Tanggal Order</th>
									<th scope="col">Tanggal Jadwal</th>
									<th scope="col">Pembayaran</th>
									<th scope="col">Total Bayar</th>
									<th scope="col">Setting</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								$diskon = 0;
								foreach ($pesanan as $key => $value) {
									$diskon = 10 / 100 * $value->jumlah_bayar ?>
									<tr>
										<th scope="row"><?= $no++ ?></th>
										<td><a href="<?= base_url('admin/detail/' . $value->no_pesan) ?>"><?= $value->no_pesan ?></a></td>
										<td><?= $value->name ?></td>
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
										<!-- <td>Rp. <?= number_format($value->jumlah_bayar, 0) ?></td> -->
										<td>Rp. <?= number_format($value->jumlah_bayar, 0) ?></td>
										<td>
											<?php if ($value->status_bayar == 1) { ?>
												<button class="btn btn-sm btn-success btn-flat" data-toggle="modal" data-target="#success-header-modal<?= $value->id_pemesanan ?>">Bukti Bayar</button>
												<a href=" <?= base_url('admin/proses/' . $value->id_pemesanan) ?>" class="btn btn-sm btn-flat btn-primary">Konfirmasi</a>
											<?php } ?>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End PAge Content -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Right sidebar -->
		<!-- ============================================================== -->
		<!-- .right-sidebar -->
		<!-- ============================================================== -->
		<!-- End Right sidebar -->
		<!-- ============================================================== -->
	</div>

	<?php foreach ($pesanan as $key => $value) { ?>

		<!-- Success Header Modal -->
		<div id="success-header-modal<?= $value->id_pemesanan ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-colored-header bg-success">
						<h4 class="modal-title" id="success-header-modalLabel">Pembayaran
						</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<?php
						echo form_open('admin/batal/' . $value->id_pemesanan);
						?>
						<table class="table">
							<tr>
								<th>Atas Nama</th>
								<th>:</th>
								<td><?= $value->nama_pelanggan ?></td>
							</tr>
							<tr>
								<th>Nama Bank</th>
								<th>:</th>
								<td><?= $value->nama_bank ?></td>
							</tr>
							<tr>
								<th>Total Bayar</th>
								<th>:</th>
								<td><?= number_format($value->bayar, 0) ?></td>
							</tr>
							<tr>
								<th>Catatan</th>
								<th>:</th>
								<td><input name="catatan" class="form-control" placeholder="Catatan" required></td>
							</tr>
						</table>
						<img class="img-fluid pad" src="<?= base_url('assets/bukti_bayar/' . $value->bukti_bayar) ?>" alt="">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Batalkan</button>
					</div>
					<?php echo form_close() ?>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<?php } ?>
