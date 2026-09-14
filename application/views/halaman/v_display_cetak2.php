
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="robots" content="index, follow" />
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <script src="<?php echo base_url(); ?>assets/webcam.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css?5322');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css?2194');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/animate.min.css?9653');?>">
    <script src='<?php echo base_url('assets/js/sweetalert2.min.js');?>'></script>
    <link rel="stylesheet" href='<?php echo base_url('assets/js/sweetalert2.min.css');?>'>

    <title>Antrian Sidang Terpadu <?php echo $satker; ?></title>



    <!-- Analytics -->

    <!-- Analytics END -->

</head>
<body>

<!-- Preloader -->
<div id="page-loading-blocs-notifaction" class="page-preloader"></div>
<!-- Preloader END -->


<!-- Main container -->
<div class="page-container">

    <!-- bloc-0 -->
    <div class="bloc bgc-shamrock-green d-bloc" id="bloc-0">
        <div class="container bloc-md">
            <div class="row">
                <div class="col-12">

                        <h1 class="mg-md h1-style glow-t" style="text-align: center">
                            ANTRIAN TERPADU <br><?php echo $satker; ?>
                        </h1>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                        <h1 class="mg-md h1-style glow-t" style="text-align: center">
                          <?php echo $tanggal; ?>
                        </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- bloc-0 END -->

    <!-- bloc-0 -->
    <div class="bloc bgc-shamrock-green-2 l-bloc" id="bloc-0">
        <div class="container bloc-lg b-divider">
            <div class="row">
                <div class="col-sm-4 col">
                    <img src="<?php echo base_url('assets/img/lazyload-ph.png');?>" data-src="<?php echo base_url('assets/logopa.png');?>" class="img-fluid rounded-circle mx-auto d-block lazyload w-75" alt="logopa" />
                </div>
                <div class="col-sm-8 col l-bloc">
                    <div class="form-group">
                        <?php if ($jenis_pengadilan==4) { ?>
                        <label>
                            <h5>Scan Barcode Antrian Sidang/PTSP</h5>
                        </label>
                        <input class="form-control animated rollIn" data-appear-anim-style="rollIn"  id="barcode" name="barcode" data-placement="right" data-toggle="tooltip" title="Scan Barcode" onchange="cetak(this.value)" autofocus/>
                        <div class="divider-h">
                            <span class="divider divider-half"></span>
                        </div>
                        <?php } ?>
                        <div class="text-center">
                            <a href="<?php echo base_url('display_cetak/v2'); ?>" class="btn btn-d btn-lg btn-style btn-glossy">ANTRIAN SIDANG</a>
                        </div>
                        <div class="text-center container-div-style">
                        </div>
                        <div class="text-center">
                            <a href="<?php echo $url_ptsp; ?>" class="btn btn-lg btn-style btn-topaz btn-glossy">ANTRIAN PTSP</a>
                        </div>
                        <div class="text-center container-div-bloc-0-style">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bloc-0 END -->

    <!-- ScrollToTop Button -->
    <a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32"><path class="scroll-to-top-btn-icon" d="M30,22.656l-14-13-14,13"/></svg></a>
    <!-- ScrollToTop Button END-->


    <!-- bloc-2 -->
    <div class="bloc bgc-shamrock-green" id="bloc-2">
        <div class="container bloc-lg">
            <div class="row">
                <div class="col-12 col-sm-4 ">
                </div>
                <div class="col-12 col-sm-4">
                </div>
                <div class="col-12 col-sm-4">
                </div>
            </div>
        </div>
    </div>
    <!-- bloc-2 END -->

</div>
<!-- Main container END -->
<div  class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="wedhus" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="#" id="form">
                    <input type="hidden" id="nomor_perkara" name="nomor_perkara" value="">
                    <input type="hidden" id="tgl_sidang" name="tgl_sidang" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="my_camera"></div>
                            <br/>
                            <!-- <input type=button value="Ambil Photo" onClick="take_snapshot()"> -->
                            <input type="hidden" name="image" class="image-tag">
                        </div>
                        <div class="col-md-6">
                            <div id="results"></div>
                            <span id="tgl_ambil" tgl=""></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- Additional JS -->
<script src="<?php echo base_url('assets/js/jquery-3.5.1.min.js?3338');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js?6428');?>"></script>
<script src="<?php echo base_url('assets/js/blocs.min.js?6466');?>"></script>
<script src="<?php echo base_url('assets/js/lazysizes.min.js');?>" defer></script><!-- Additional JS END -->
<script>
    var cek_https=<?php echo $https;?>;
    var photo=<?php echo $photo;?>;
    if (photo==1) {
        if (cek_https!=1) {
            Swal.fire({
                icon: 'Warning',
                html: 'Aplikasi antrian di set ambil photo aktif, harus menggunakan protocol HTTPS',
                showConfirmButton: true,
                timer: 10000
            })
        }
    }

    Webcam.set({
        width: 450,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    <?php if ($photo==1) {
        echo "Webcam.attach( '#my_camera' );";
    }
    ?>

    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }

    function cetak(a) {
        var barcodes=a;
        $.ajax({
            url: "<?php echo base_url('display_cetak/check_antrian'); ?>",
            type: "POST",
            dataType: "JSON",
            data: {barcode: barcodes},
            success: function (data) {
                if (data.hasil == 1) {
                    <?php if ($photo==1) {
                    echo "$('.modal').modal('show');";
                    echo
                    "setTimeout(function() {
                    take_snapshot();
                    simpan();
                    $('.modal').modal('hide');
                    }, 3000);";
                        }
                    ?>
                    window.open('<?php echo base_url(); ?>display_cetak/cetak_antrian_online/'+barcodes, '', 'width=300, height=300, menubar=no,location=no,scrollbars=yes, resizeable=no, status=no, copyhistory=no,toolbar=no');
                } else {
                    Swal.fire({
                        icon: 'warning',
                        html: data.pesan,
                        showConfirmButton: true,
                        timer: 10000
                    });
                    $('#barcode').val('');
                    $('#barcode').focus();
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'error',
                    text: errorThrown,
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });
                $('#barcode').val('');
                $('#barcode').focus();
            }
        });

    }

</script>
</body>
</html>
