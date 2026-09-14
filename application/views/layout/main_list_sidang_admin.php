<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Aplilkasi Jurnal dan Antrian Sidang</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/plugins.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/structure.css'); ?>" rel="stylesheet" type="text/css" class="structure" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <script src='<?php echo base_url('assets/js/sweetalert2.min.js');?>'></script>
    <link rel="stylesheet" href='<?php echo base_url('assets/js/sweetalert2.min.css');?>'>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/table/datatable/datatables.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/table/datatable/dt-global_style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/table/datatable/responsif/css/responsive.dataTables.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/elements/alert.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/forms/theme-checkbox-radio.css');?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/ckeditor/ckeditor.js'></script>

    <!-- END PAGE LEVEL STYLES -->

</head>
<body class="sidebar-noneoverflow">

<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>

        <ul class="navbar-item flex-row search-ul">
            <li class="nav-item align-self-center search-animated">
                <h5>APLIKASI JURNAL DAN ANTRIAN SIDANG <?php echo $satker; ?></h5>
            </li>
        </ul>
        <ul class="navbar-item flex-row navbar-dropdown">

            <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login sebagai <b><?php echo $this->session->userdata('nama');?> (<?php echo $this->session->userdata('jabatan');?> ) </b>
            </a>
            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">

                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b>::</b>
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
                    <div class="dropdown-item">
                        <a href="<?php echo base_url(); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Keluar</span>
                        </a>
                    </div>
                </div>
            </li>
        </ul>

    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

        <?php
        include "./assets/antrian/menu.php"
        ?>

    </div>
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <?php echo $hal; ?>
        </div>
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright©2021 <?php echo ucwords(strtolower($satker)); ?> All rights reserved.</p>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->



<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?php echo base_url('assets/js/libs/jquery-3.1.1.min.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="<?php echo base_url('assets/bootstrap/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url('assets/plugins/table/datatable/datatables.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/table/datatable/responsif/js/dataTables.responsive.js'); ?>"></script>
<script type="text/javascript">
    var status='';
    $(document).ready(function() {
        App.init();
        var tabel1=    $('#data-tabel').DataTable( {
            responsive: true,
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [25, 10, 20, 50],
            "pageLength": 15
        } );

        var tabel2 =     $('#tblperkara').DataTable( {
            responsive: true,
            "pageLength": 1,
            "ordering": false,
            sDom: 'lrtip'
        } );

    } );


    function simpan_jam()
    {

        $.ajax({
            url : "<?php echo base_url('konfig/isi_jam'); ?>",
            type: "POST",
            data: $('#form').serialize(),
            success: function(data)
            {
                alert('Berhasil Disimpan')
                location.reload();

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                Swal.fire({
                    icon: 'error',
                    text: 'Ada error simpan jam!',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                })
            }
        });


    }

    function cetak_antrian(a,z,j) {
        var waktu_sekarang='<?php echo date('d-m-Y'); ?>';
        var waktu_sekarang2='<?php echo date_format(date_create($this->session->userdata('tgl_sidang')),'d-m-Y'); ?>';
        if (waktu_sekarang!=waktu_sekarang2) {
            Swal.fire({
                icon: 'error',
                html: 'Tanggal sidang dipilih ('+waktu_sekarang2+') bukan tanggal hari ini ('+waktu_sekarang+'), silahkan pilih kembali di kalender sidang hari ini !!',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            })
        } else {
            window.open('<?php echo base_url(); ?>display_cetak/cetak_antrian/'+a+'/'+z+'/'+j, '', 'width=300, height=300, menubar=no,location=no,scrollbars=yes, resizeable=no, status=no, copyhistory=no,toolbar=no');
        }

    }

    $(".hadir").click(function() {
        var perkara_id=$(this).data("pkrid");
        var nomor_perkara = $(this).data("noperk");
        var noperk=$(this).data("noperks") ;
        var tgl_sidang = $(this).data("tgl_sidang");
        $.ajax({
            url: '<?php echo base_url('main/kehadiran_sidang_lists'); ?>',
            type: 'post',
            data: {perkara_id:perkara_id,nomor_perkara:nomor_perkara,tgl_sidang:tgl_sidang},
            success: function(response){
                $('#isi_gratifikasi').html(response);
                $('.modal-title').html('Kehadiran Pihak <br> '+noperk);
                $('#modalgratifikasi').modal('show');
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

    $(".set_ruang").click(function() {
        status='set_ruang';
        var pkrid = $(this).data('pkrid');
        var tgl_sidang = $(this).data('tgl_sidang');
        var perkara = $(this).data('noperk');
        var perkaras = $(this).data('noperks');

        $.ajax({
            url: '<?php echo base_url('utama/view_set_ruang'); ?>',
            type: 'post',
            data: {pkrid:pkrid,tgl_sidang:tgl_sidang},
            success: function(response){
                $('#modalkuisi').html(response);
                $('#modalku').modal('show');
                $('.modal-title').html("Isi/Rubah Ruang Sidang<br>"+perkaras+" <br> Hanya untuk antrian sidang (tidak merubah ruang sidang yg susah terisi di SIPP)");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Isi Durasi');
            }
        });
    });

    function simpan()
    {
        var url;
            if($('#ruang').val()=="0") {
                Swal.fire({
                    icon: 'error',
                    title: 'Perbaiki dulu !!',
                    text: 'Ruang Sidang belum dipilih!',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                })
                return;
            }
            $.ajax({
                url : "<?php echo base_url('konfig/set_ruang_isian'); ?>",
                type: "POST",
                data: $('#form').serialize(),
                success: function(data)
                {
                    $('#modalku').modal('hide');
                    location.reload();

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    console.log(errorThrown);
                }
            });

    }

</script>

<div id="modalgratifikasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kehadiran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="isi_gratifikasi"></div>
            </div>
        </div>
    </div>
</div>
<div id="modalku" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="modalkuisi"></div>
            </div>

            <div class="modal-footer">
                <button type="button" id='tutup' class="btn" data-dismiss="modal">Tutup</button>
                <button type="button" id='simpan' class="btn btn-primary" onclick="simpan()">Simpan</button>
            </div>
        </div>
        </div>
</body>
</html>