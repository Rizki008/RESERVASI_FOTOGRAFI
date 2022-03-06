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
                            <li class="breadcrumb-item text-muted active" aria-current="page">Proses Pemotretan</li>
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
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-warning text-white">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">No Pemesanan</th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Tanggal Order</th>
                                    <th scope="col">Tanggal Jadwal</th>
                                    <th scope="col">Total Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pesanan_dikirim as $key => $value) { ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><a href="<?= base_url('admin/detail/' . $value->no_pesan) ?>"><?= $value->no_pesan ?></a></td>
                                        <td><?= $value->nama_pelanggan ?></td>
                                        <td><?= $value->tgl_order ?></td>
                                        <td><?= $value->tanggal_jadwal ?></td>
                                        <td><b>Rp. <?= number_format($value->jumlah_bayar, 0)  ?></b><br>
                                            <span class="badge badge-warning">Proses Pemotretan</span>
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