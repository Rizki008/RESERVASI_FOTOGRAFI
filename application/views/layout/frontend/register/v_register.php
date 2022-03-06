<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>template/assets/images/favicon.png">
    <title>Register Pelanggan</title>
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>template/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background:url(<?= base_url() ?>template/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row text-center">

            </div>
            <div class="col-lg-5 col-md-7 bg-white">
                <div class="p-3 text-center">
                    <img src="<?= base_url() ?>template/assets/images/big/icon.png" alt="wrapkit">
                    <h2 class="mt-3 text-center">Register for Free</h2>
                    <?php
                    echo validation_errors('<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Coba Lagi</h5>', '</div>');

                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Sukses</h5>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }

                    echo form_open('pelanggan/register');
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" value="<?= set_value('name') ?>" placeholder="your name">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="no_tlpn" value="<?= set_value('no_tlpn') ?>" placeholder="your phone">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" value="<?= set_value('email') ?>" placeholder="email address">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" value="<?= set_value('password') ?>" placeholder="password">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input class="form-control" type="password" name="ulangi_password" value="<?= set_value('ulangi_password') ?>" placeholder="Retype password">
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-block btn-dark">Register</button>
                        </div>
                        <div class="col-lg-12 text-center mt-5">
                            Already have an account? <a href="<?= base_url('pelanggan/login') ?>" class="text-danger">Login</a>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?= base_url() ?>template/assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>template/assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="<?= base_url() ?>template/assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>