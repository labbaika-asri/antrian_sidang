<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>JURNAL SIDANG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico');?>">

    <!-- App css -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/app.min.css');?>" rel="stylesheet" type="text/css">

</head>

<body class="authentication-bg authentication-bg-pattern">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body p-4">

                        <h5 class="auth-title">ANTRIAN SIDANG</h5>

                        <form action="<?php echo base_url('ngakses/validasiotp'); ?>" method="post">

                            <div class="form-group mb-3">
                                <label for="emailaddress">Masukan kode pin 6 huruf yang disms ke nomor <?php echo $nohp; ?> dalam waktu 10 detik</label>
                                <input type="hidden" name="nohp" value="<?php echo $nohp; ?>">
                                <input class="form-control" type="text" id="pihp" name="pinhp"  placeholder="Masukan Nomer PIN" required> <?php echo $pesan; ?>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-danger btn-block" type="submit">verifikasi PIN</button>
                            </div>

                        </form>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->


<footer class="footer footer-alt">
    2019 &copy; Jurnal Sidang
</footer>

<!-- Vendor js -->
<script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- App js -->
<script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
</body>
</html>