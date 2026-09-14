<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Aplikasi Jurnal dan Antrian Sidang</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/plugins.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/structure.css'); ?>" rel="stylesheet" type="text/css" class="structure" />
    <script src="<?php echo base_url(); ?>assets/webcam.min.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->
    <script src='<?php echo base_url('assets/js/sweetalert2.min.js');?>'></script>
    <link rel="stylesheet" href='<?php echo base_url('assets/js/sweetalert2.min.css');?>'>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo base_url() ?>assets/css/components/tabs-accordian/custom-accordions.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/table/datatable/datatables.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/table/datatable/dt-global_style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/table/datatable/responsif/css/responsive.dataTables.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/forms/switches.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/forms/theme-checkbox-radio.css")?>">
    <!-- END PAGE LEVEL STYLES -->

</head>

<body>
<div class="wrapper">
    <div class="container-fluid">
        <?php echo $hal; ?>
    </div>
</div>
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <p class="">Copyright©2021 <?php echo ucwords(strtolower($satker)); ?> All rights reserved.</p>
        </div>
    </div>
</footer>


<script src="<?php echo base_url('assets/js/libs/jquery-3.1.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app.js'); ?>"></script>

<script>
    $(document).ready(function() {
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

        $('#data-sidang').DataTable( {
            "pageLength":25,
            "pagingType":"simple_numbers",
            "order": [],
            "columnDefs": [ {
                "targets"  : 'no-sort',
                "orderable": false,
            }],
            "language": {
                "sSearch": "Cari Nomor Perkara/Pihak/Kuasa"
            }
        } );
        App.init();
    });
    Webcam.set({
        width: 450,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    <?php
      if ($photo==1) {
          echo " Webcam.attach('#my_camera');";
      }
    ?>

    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
    //baru
    $(".cetak_antrian").click(function() {
        var perkara_id = $(this).data("pkrid");
        var nomor_perkara = $(this).data("nomor_perkara");
        var nomor_perkaras = $(this).data("nomor_perkaras");
        var ruang = $(this).data("ruang");
        var tgl_sidang = $(this).data("tgl_sidang");
        var jenis_antrian = '<?php echo $jenis_antrian; ?>';
        $.ajax({
            url: '<?php echo base_url('main/kehadiran_sidang'); ?>',
            type: 'post',
            data: {perkara_id:perkara_id,nomor_perkara:nomor_perkara,ruang:ruang,tgl_sidang:tgl_sidang},
            success: function(response){
                $('#isi').html(response);
                if (jenis_antrian==0) {
                    $('.modal-title').html('Cetak Antrian Sidang dan Kehadiran Pihak <br> '+'Nomor Perkara '+nomor_perkaras)
                } else {
                    $('.modal-title').html('Check in Kehadiran Pihak <br> '+'Nomor Perkara '+nomor_perkaras)
                }

                $('#modal_cetak_antrian').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                Swal.fire({
                    icon: 'error',
                    title: errorThrown,
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        });
    });

    function simpan_antrian()
    {

        if ($('[name="ruang"]').val()=='') {
            Swal.fire({
                icon: 'warning',
                html: 'Ruang sidang kosong, silahkan isi terlebih dahulu',
                showConfirmButton: true,
                timer: 10000
            })
            return;
        }

        $.ajax({
            url : "<?php echo base_url('main/isi_kehadiran'); ?>",
            type: "POST",
            dataType:"JSON",
            data: $('#form_cetak').serialize(),
            success: function(data)
            {
                // alert(data.nomor_perkara); cetak antrian
                location.reload();

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                Swal.fire({
                    icon: 'error',
                    text: 'Ada error simpan jam! '+errorThrown,
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                })
            }
        });


    }

    function simpan()
    {
        $.ajax({
            url: '<?php echo base_url('display_cetak/simpan_poto'); ?>',
            type: 'post',
            data: $('#form').serialize(),
            success: function(data)
            {
                $('#modal_poto').modal('hide');
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert(xhr.status);
            }
        });
    }


    function cetak_antrian() {
        $.ajax({
            url: "<?php echo base_url('display_cetak/ambil_antrian'); ?>",
            type: "POST",
            dataType: "JSON",
            data: $('#form_cetak').serialize(),
            success: function (data) {
                var pkrid = data.perkara_id;
                var noperk = data.nomor_perkara;
                var tgl = data.tanggal;
                var ruang = data.ruang;
                if (data.status == 1) {
                    //alert(pkrid+'-'+noperk+'-'+tgl+'-'+ruang);
                    $('[name="nomor_perkara"]').val(noperk)
                    $('[name="tgl_sidang"]').val(tgl)
                    $('#modal_cetak_antrian').modal('hide');
                     <?php if ($photo==1) {
                        echo "$('#modal_poto').modal('show');";
                        echo
                        "setTimeout(function() {
                        take_snapshot();
                        simpan();
                        $('#modal_poto').modal('hide');
                        }, 2000);";
                    }
                    ?>
                    window.open('<?php echo base_url(); ?>display_cetak/cetak_antrian/'+pkrid+'/'+tgl+'/'+decodeURI(ruang), '', 'width=300, height=300, menubar=no,location=no,scrollbars=yes, resizeable=no, status=no, copyhistory=no,toolbar=no');
                } else {
                    Swal.fire({
                        icon: 'warning',
                        html: data.pesan,
                        showConfirmButton: true,
                        timer: 10000
                    })
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'error',
                    text: textStatus,
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

    function cetak_antrians(p,a,z,j) {
        $('[name="nomor_perkara"]').val(p)
        $('[name="tgl_sidang"]').val(z)
        <?php if ($photo==1) {
        echo "$('#modal_poto').modal('show');";
        echo
        "setTimeout(function() {
            take_snapshot();
            simpan();
            $('#modal_poto').modal('hide');
            }, 2000);";
             }
        ?>

        window.open('<?php echo base_url(); ?>display_cetak/cetak_antrian/'+a+'/'+z+'/'+decodeURI(j), '', 'width=300, height=300, menubar=no,location=no,scrollbars=yes, resizeable=no, status=no, copyhistory=no,toolbar=no');
    }


</script>
<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/table/datatable/datatables.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/table/datatable/responsif/js/dataTables.responsive.js'); ?>"></script>
<div class="modal fade" id="modal_cetak_antrian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Antrian dan Kehadiran Pihak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="isi"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>