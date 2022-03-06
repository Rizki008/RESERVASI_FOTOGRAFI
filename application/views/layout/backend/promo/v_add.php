<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Form Inputs</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Paket</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                        //notifikasi form kosong
                        echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i>', '</h5></div>');

                        //notifikasi gagal upload gambar
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
                        }
                        echo form_open_multipart('paket/add') ?>
                        <h4 class="card-title">Input Data Paket</h4>
                        <div class="form-group">
                            <label>Nama Paket</label>
                            <input type="text" class="form-control" name="nama_paket" value="<?= set_value('nama_paket') ?>" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Kategori Paket</label>
                            <select name="id_kategori" class="form-control">
                                <option value="">---Pilih Kategori Paket---</option>
                                <?php foreach ($kategori as $key => $value) { ?>
                                    <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Harga Paket</label>
                            <input type="text" class="form-control" name="harga" aria-describedby="name" value="<?= set_value('harga') ?>" placeholder="Harga">
                        </div>
                        <div class="form-group">
                            <label>Diskon</label>
                            <input type="text" class="form-control" name="diskon" value="<?= set_value('diskon') ?>" placeholder="Diskon">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" value="<?= set_value('deskripsi') ?>" rows="4"></textarea>
                        </div>
                        <div class="input-group">
                            <label>Gambar</label>
                            <div class="custom-file">
                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                <input type="file" name="gambar" class="custom-file-input" id="preview_gambar" required>

                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <img src="<?= base_url('assets/gambar/nopoto.jpg') ?>" id="gambar_load" width="400px">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="<?= base_url('paket') ?>" class="btn btn-warning btn-sm">Kembali</a>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>