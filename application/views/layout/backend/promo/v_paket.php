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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Basic Initialisation</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Paket</li>
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
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="<?= base_url('paket/add') ?>" type="button" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah Paket</a>

                        <div class="table-responsive">
                            <?php
                            if ($this->session->flashdata('pesan')) {
                                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                                echo $this->session->flashdata('pesan');
                                echo '</h5></div>';
                            }
                            ?>
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Paket</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Diskon</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Setting</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($paket as $key => $value) { ?>

                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_paket ?></td>
                                            <td><?= $value->nama_kategori ?></td>
                                            <td><?= $value->harga ?></td>
                                            <td><?= $value->diskon ?></td>
                                            <td><?= $value->deskripsi ?></td>
                                            <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="100px"></td>
                                            <td>
                                                <a href="<?= base_url('paket/edit/' . $value->id_paket) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#danger-header-modal<?= $value->id_paket ?>"><i class="fa fa-trash"></i></button>
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
    </div>
</div>


<?php foreach ($paket as $key => $value) { ?>
    <!-- Danger Header Modal -->
    <div id="danger-header-modal<?= $value->id_paket ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger">
                    <h4 class="modal-title" id="danger-header-modalLabel">Delete <?= $value->nama_paket ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h5 class="mt-0">Apakah Anda Yakin Akan Hapus Data ini?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('paket/delete/' . $value->id_paket) ?> " class="btn btn-danger">Delete</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php } ?>