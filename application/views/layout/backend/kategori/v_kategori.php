<!-- Page wrapper  -->
<!-- ============================================================== -->
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
                            <li class="breadcrumb-item text-muted active" aria-current="page">Kategori</li>
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
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> </h4>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#success-header-modal">Tambah Kategori</button>
                    </div>

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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Setting</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kategori as $key => $value) { ?>
                                    <tr class="table-active">
                                        <td scope="row"><?= $no++ ?></td>
                                        <td><?= $value->nama_kategori ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#warning-header-modal<?= $value->id_kategori ?>">Edit Data</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#danger-header-modal<?= $value->id_kategori ?>">Delete Data</button>
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



    <!-- Success Header Modal -->
    <div id="success-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="success-header-modalLabel">Data Kategori
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('kategori/add');
                    ?>
                    <div class="form-group">
                        <label for="username">Nama Kategori</label>
                        <input class="form-control" type="text" name="nama_kategori" placeholder="Nama Kategori" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
                <?php echo form_close() ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <?php foreach ($kategori as $key => $value) { ?>
        <!-- Warning Header Modal -->
        <div id="warning-header-modal<?= $value->id_kategori ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="warning-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-warning">
                        <h4 class="modal-title" id="warning-header-modalLabel">Edit Data Kategori
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <?php
                        echo form_open('kategori/edit/' . $value->id_kategori);
                        ?>
                        <div class="form-group">
                            <label for="username">Nama Kategori</label>
                            <input class="form-control" type="text" name="nama_kategori" value="<?= $value->nama_kategori ?>" placeholder="Nama Kategori" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                    <?php echo form_close() ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <?php } ?>


    <?php foreach ($kategori as $key => $value) { ?>
        <!-- Danger Header Modal -->
        <div id="danger-header-modal<?= $value->id_kategori ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-danger">
                        <h4 class="modal-title" id="danger-header-modalLabel">Delete <?= $value->nama_kategori ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h5 class="mt-0">Apakah Anda Yakin Akan Hapus Data ini?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('kategori/delete/' . $value->id_kategori) ?> " class="btn btn-danger">Delete</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <?php } ?>