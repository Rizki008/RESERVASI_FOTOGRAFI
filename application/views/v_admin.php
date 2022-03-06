<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1"></h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            </li>
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
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <div class="card-group">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium"><?= $total_pelanggan ?></h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Pelanggan</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup class="set-doller"></sup><?= $total_pembayaran ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Bayar
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium"><?= $total_selesai ?></h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pesanan Selesai</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium"><?= $total_paket ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Paket</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End First Cards -->
        <!-- *************************************************************** -->
        <!-- *************************************************************** -->
        <!-- Start Top Leader Table -->
        <!-- *************************************************************** -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data FllowUp</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-primary text-white">
                                    <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-muted">No
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted px-2">No Pesanan
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Nama paket</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            Nama Pelanggan
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            Tanggal Order
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">Jadwal Pemotretan</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted ">Total bayar</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Acction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pesanan_diproses as $key => $value) { ?>
                                        <tr>
                                            <td class="border-top-0 px-2 py-4"><?= $no++ ?></td>
                                            <td class="border-top-0 text-muted px-2 py-4 font-14"><?= $value->no_pesan ?></td>
                                            <td class="border-top-0 px-2 py-4"><?= $value->nama_paket ?></td>
                                            <td class="border-top-0 text-center px-2 py-4"><?= $value->nama_pelanggan ?></td>
                                            <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4"><?= $value->tgl_order ?></td>
                                            <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4"><?= $value->tanggal_jadwal ?></td>
                                            <td class="font-weight-medium text-dark border-top-0 px-2 py-4">Rp. <?= number_format($value->jumlah_bayar) ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/followup') ?>" class="btn btn-sm btn-primary"><i class=" fa fa-paper-plane">FollowUp</i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
        <!-- *************************************************************** -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->