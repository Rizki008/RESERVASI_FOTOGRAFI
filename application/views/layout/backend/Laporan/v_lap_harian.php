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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Notification</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Library</li>
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
            <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-book"></i> <?= $title ?>
                                <small class="float-right">Tanggal: <?= $tanggal ?>/<?= $bulan ?>/<?= $tahun ?></small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Produk</th>
                                        <th>No Transaksi</th>
                                        <th>Harga</th>
                                        <th>Diskon</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $jumlah_bayar = 0;
                                    $total_harga = 0;
                                    foreach ($laporan as $key => $value) {
                                        // $tot_harga = $value->qty * $value->harga;
                                        $jumlah_bayar = $jumlah_bayar + $value->harga;
                                        $total_harga = $total_harga + $value->jumlah_bayar
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_paket ?></td>
                                            <td><?= $value->no_pesan ?></td>
                                            <td>Rp.<?= number_format($value->harga, 0) ?></td>
                                            <td>Rp.<?= number_format($value->diskon, 0) ?></td>
                                            <td>Rp.<?= number_format($value->jumlah_bayar, 0) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <h3>Grand Total : Rp. <?= number_format($total_harga, 0) ?></h3>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div>