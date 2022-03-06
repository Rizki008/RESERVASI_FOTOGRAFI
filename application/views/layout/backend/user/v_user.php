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
                            <li class="breadcrumb-item"><a href="<?=base_url('admin')?>" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">User</li>
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
                        <div class="card-tools">
                            <button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
                                Add</button>
                        </div>
                        <h4 class="card-title"></h4>
                    </div>
                    <table class="table table-dark mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($user as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value->name ?></td>
                                    <td><?= $value->email ?></td>
                                    <td><?= $value->password ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_admin ?>"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_admin ?>"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <!-- /.modal Add -->
        <div class="modal fade" id="add">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add user</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        echo form_open('user/add');
                        ?>

                        <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama User" required>
                        </div>

                        <div class="form-group">
                            <label>email</label>
                            <input type="email" name="email" class="form-control" placeholder="email" required>
                        </div>

                        <div class="form-group">
                            <label>Passowrd</label>
                            <input type="text" name="password" class="form-control" placeholder="Passowrd" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <!-- /.modal Edit -->
        <?php foreach ($user as $key => $value) { ?>
            <div class="modal fade" id="edit<?= $value->id_admin ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit user</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                            echo form_open('user/edit/' . $value->id_admin);
                            ?>

                            <div class="form-group">
                                <label>Nama User</label>
                                <input type="text" name="name" value="<?= $value->name ?>" class="form-control" placeholder="Nama User" required>
                            </div>

                            <div class="form-group">
                                <label>email</label>
                                <input type="email" name="email" value="<?= $value->email ?>" class="form-control" placeholder="email" required>
                            </div>

                            <div class="form-group">
                                <label>Passowrd</label>
                                <input type="text" name="password" value="<?= $value->password ?>" class="form-control" placeholder="Passowrd" required>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        <?php } ?>


        <!-- /.modal Delete -->
        <?php foreach ($user as $key => $value) { ?>
            <div class="modal fade" id="delete<?= $value->id_admin ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Delete <?= $value->name ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>Apakah Anda Yakin Akan Hapus Data ini?</h5>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="<?= base_url('user/delete/' . $value->id_admin) ?> " class="btn btn-primary">Delete</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        <?php } ?>