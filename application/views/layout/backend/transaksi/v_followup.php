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
                            <li class="breadcrumb-item text-muted active" aria-current="page">Konfirmasi Jadwal</li>
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
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">No Pemesanan</th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Tanggal Order</th>
                                    <th scope="col">Pembayaran</th>
                                    <th scope="col">Tanggal Jadwal</th>
                                    <th scope="col">Total Bayar</th>
                                    <th scope="col">Setting</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $diskon = 0;
                                foreach ($pesanan_diproses as $key => $value) {
                                    $diskon = 10 / 100 * $value->jumlah_bayar ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><a href="<?= base_url('admin/detail/' . $value->no_pesan) ?>"><?= $value->no_pesan ?></a></td>
                                        <td><?= $value->nama_pelanggan ?></td>
                                        <td><?= $value->tgl_order ?></td>
                                        <td><?= $value->pembayaran ?><br>
                                            <?php if ($value->pembayaran == 'cashback') { ?>
                                                <span class="badge badge-success">Diskon 10%</span><br>
                                                <span class="badge badge-success">Kini Menjadi Rp. <?= number_format($value->jumlah_bayar - $diskon, 0) ?></span>
                                            <?php } elseif ($value->pembayaran == 'DP') { ?>
                                                <span class="badge badge-warning">Pembayaran Rp. <?= number_format($value->bayar, 0) ?></span>
                                            <?php }
                                            ?>
                                        </td>
                                        <td><?= $value->tanggal_jadwal ?></td>
                                        <td>Rp. <?= number_format($value->bayar) ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#followup<?= $value->id_pemesanan ?>"><i class=" fa fa-paper-plane">FollowUp</i> </button>
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

    <!-- /.modal kirim -->
    <?php foreach ($proses_kirim as $key => $value) { ?>
        <div class="modal fade" id="followup<?= $value->id_pemesanan ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?= $value->no_pesan ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('admin/kirim/' . $value->id_pemesanan) ?>
                        <table class="table">
                            <tr>
                                <th>Nama Pelanggan</th>
                                <th>:</th>
                                <td><?= $value->nama_pelanggan ?></td>
                            </tr>
                            <tr>
                                <th>FollowUp</th>
                                <th>:</th>
                                <td><input name="followup" class="form-control" placeholder="Isi FollowUp" required></td>
                            </tr>
                            <tr>
                                <th>FollowUp Pembayaran</th>
                                <th>:</th>
                                <td><input name="followup_bayar" class="form-control" placeholder="Isi Bayar"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">FollowUp</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php } ?>
    <!-- /.modal -->