<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">
                </h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page"></li>
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
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Produk Dalam Pesanan</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table align-items-center table-flush">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th></th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Diskon</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($pesanan_detail as $key => $value) { ?>
                                    <tr>
                                        <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
                                        <td><?= $value->nama_paket ?></td>
                                        <td><?= $value->qty ?></td>
                                        <td>Rp. <?= number_format($value->harga, 0) ?></td>
                                        <td><?= $value->diskon ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-md-4">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Data Penerima</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table">
                            <tbody>

                                <tr>
                                    <td>No Order</td>
                                    <td><?= $value->no_pesan ?></td>
                                </tr>

                                <tr>
                                    <td>Nama Penerima</td>
                                    <td><?= $value->nama_pelanggan ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Proses Kirim</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Total Bayar</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= number_format($value->jumlah_bayar, 0) ?></td>
                                    <td><span class="badge badge-primary">Prosess</span></td>
                                    <td class="form-group">
                                        <a href="<?= base_url('admin/pesanan_masuk') ?>" class="btn btn-warning btn-sm">Kembali</a>
                                        <a href="<?= base_url('admin/followup') ?>" class="btn btn-sm btn-primary"><i class=" fa fa-paper-plane">FollowUp</i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>