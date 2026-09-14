<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Aplikasi Jurnal dan Antrian Sidang</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
    <script src='<?php echo base_url('assets/js/sweetalert2.min.js');?>'></script>
    <link rel="stylesheet" href='<?php echo base_url('assets/js/sweetalert2.min.css');?>'>
</head>
<body class="form">
    
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Aplikasi <a href="index.html"><br><span class="brand-name">Jurnal dan Antrian Sidang</span></a></h1>
                        <?php if($this->session->flashdata('error_login')): ?>
							<div style="color: red; padding: 10px; margin-bottom: 10px; border: 1px solid red; background: #fee;">
								<?= $this->session->flashdata('error_login'); ?>
							</div>
						<?php endif; ?>
						<form action="<?php echo base_url('ngakses/validasiuser'); ?>" method="post" id="form_login">
                            <div class="form">

                                <div id="username" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="username" name="username" type="text" class="form-control" placeholder="Username SIPP" required>
                                </div>

                                <div id="password" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password SIPP" required>
                                </div>
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <select id="ruang" name="ruang" class="form-control mb-2 mr-sm-2" required>
                                        <option value="0|0" selected>-Ruang-</option>
                                        <?php foreach ($ruang->result() as $row) {
                                            echo "<option value='".$row->nama.'|'.$row->id."'>$row->nama</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                           <!-- <div class="d-sm-flex justify-content-between">
                           <div class="field-wrapper">
                                   <button  type="submit" class="btn btn-primary" value="" id="masukss">Log In</button>
                               </div>
                           </div>-->
                        </form>
                    <div class="d-sm-flex justify-content-between">
                            <div class="field-wrapper">
                                <button  class="btn btn-primary" value="" id="masuk">Log In</button>
                            </div>
                        </div>
                        <p class="terms-conditions"><?php echo $versi; ?><br>copyrigt© 2021 <?php echo ucwords(strtolower($satker)); ?><br></p>

                    </div>                    
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
            </div>
        </div>
    </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="assets/bootstrap/js/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $("#masuk").click(function() {
            $.ajax({
                url: '<?php echo base_url('ngakses/validasiuser'); ?>',
                type: 'post',
                data: $("#form_login").serialize(),
                dataType: 'JSON',
                success: function(dt){
                    if(dt.st=='0') {
                        Swal.fire({
                            icon: 'error',
                            html: dt.pesan,
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        });
                    } else if(dt.st=='1') {
                        window.location.replace("<?php echo base_url('utama');?>");
                    } else {
                       location.reload();
                    }

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    Swal.fire({
                        icon: 'error',
                        html: 'Ada error antrian <br>'+jqXHR+'<br> hubungi mashen',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    })
                }
            });
        });
    </script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-1.js"></script>
    <script>
        var loaderElement = document.querySelector('#load_screen');
        setTimeout( function() {
            loaderElement.style.display = "none";
        }, 3000);
    </script>
</body>
</html>