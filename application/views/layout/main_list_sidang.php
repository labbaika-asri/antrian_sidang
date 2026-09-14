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
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/flatpickr/flatpickr.css'); ?>">
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
    <script src="<?php echo base_url('assets/plugins/flatpickr/flatpickr.js'); ?>"></script>
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

        $( '.tgl_tunda' ).flatpickr({
            'static': true,
            dateFormat: "d-m-Y",
        });

        $("#status_putusan").change(function(){
            if($('#status_putusan').val()==62) {
                if (($("#set_putus").attr("data-jenisperk")==346) || ($("#set_putus").attr("data-jenisperk")==347))
                {
                    $('#faktor_penyebab').show();
                    $('#keadaan_istri').show();
                }
            } else {
                $('#faktor_penyebab').hide();
                $('#keadaan_istri').show();
            }
        });

        $("#jenis_amar").change(function(){
            var jenis_amar=$('#jenis_amar').val();
            var perkara_id=$("#set_putus").attr("data-pkrid");
            $.ajax({
                url: '<?php echo base_url('main/get_amar'); ?>',
                type: 'post',
                data: {perkara_id:perkara_id,jenis_amar:jenis_amar},
                success: function(response){
                    CKEDITOR.instances['isi_amar'].setData(response);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('error isi amar');
                }
            });
        });
        var ckeditor = CKEDITOR.replace('isi_amar',{
            height:'400px'
        });
    } );


    var status='';
    function formatDate(date) {
    var year = date.getFullYear().toString();
    var month = (date.getMonth() + 101).toString().substring(1);
    var day = (date.getDate() + 100).toString().substring(1);
    return year + "-" + month + "-" + day;
    }




    $(".panggil_sidang").click(function() {
        var no_antrian = $(this).data("no_antrian");
        var no_antrian_cetak = $(this).data("no_antrian_cetak");
        var prioritas = $(this).data("prioritas");
        var tglsidang = $(this).data("tglsidang");
        var ruang = $(this).data("ruang");
        var ruangan_id = $(this).data("ruangan_id");
        var noperk = $(this).data("noperk");
        var noperks = $(this).data("noperks");
        var dilewat = $(this).data("dilewat");
        var prio =''
        $('#status_antrian').html('<b>DIPANGGIL</b>');
        $.ajax({
            url: '<?php echo base_url('utama/panggil_sidang'); ?>',
            type: 'post',
            data: {tglsidang:tglsidang,ruang:ruang,ruangan_id:ruangan_id,no:no_antrian},
            success: function(response){
                if(dilewat==1) {
                                            $("#status2-"+ruang).text("**DIPANGGIL**");
                                        } else {
                                            $("#status-"+ruang).text("**DIPANGGIL**");
                                        }
                if(prioritas==1) {
                    prio='Prioritas';
                }                    
                $('#modal_isi').html("<h2>Sedang memanggil<br>"+prio+" Antrian <b>"+no_antrian_cetak+"</b> nomor perkara <b>"+noperks+"</b></h2>");
                $('#modalpanggil').modal('show');
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

    $(".panggil_sidang_asing").click(function() {
        status="asing";
        var no_antrian = $(this).data("no_antrian");
        var no_antrian_cetak = $(this).data("no_antrian_cetak");
        var tglsidang = $(this).data("tglsidang");
        var ruang = $(this).data("ruang");
        var ruangan_id = $(this).data("ruangan_id");
        var noperk = $(this).data("noperk");
        $('#status_antrian').html('<b>DIPANGGIL</b>');
        $.ajax({
            url: '<?php echo base_url('utama/view_bahasa_asing'); ?>',
            type: 'post',
            success: function(response){
                $('#modalkuisi').html(response);
                $('[name="nomor_perkara"]').val(noperk);
                $('[name="no_antrian_cetak"]').val(no_antrian_cetak);
                $('[name="ruang"]').val(ruang);
                $('[name="ruangan_id"]').val(ruangan_id);
                $('[name="tglsidang"]').val(tglsidang);
                $('[name="no"]').val(no_antrian);
                $('#tutup').hide();
                $('#simpan').text('Panggil');
                $('.modal-title').text('Pilih Bahasa Asing');
                $('#modalku').modal('show');

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



    $(".lewati_sidang").click(function() {
        var no_antrian = $(this).data("no_antrian");
        var no_antrian_cetak = $(this).data("no_antrian_cetak");
        var tglsidang = $(this).data("tglsidang");
        var ruangan_id = $(this).data("ruangan_id");
        var noperk = $(this).data("noperk");
        var dilewat = $(this).data("dilewat");

        Swal.fire({
            text: "Apakah nomor  antrian "+no_antrian_cetak+ " akan dilewati untuk dipanggil lagi nanti?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK, Lewati'
        }).then((result) => {
            if (result.value) {
                //postinng lewati
                $.ajax({
                    url: '<?php echo base_url('utama/lewati_sidang'); ?>',
                    type: 'post',
                    data: {tglsidang:tglsidang,ruangan_id:ruangan_id,no:no_antrian},
                    success: function(response){
                        location.reload();
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
            }
        })
    });

    $(".mulai_sidang").click(function() {
        var no_antrian = $(this).data("no_antrian");
        var tglsidang = $(this).data("tglsidang");
        var ruang = $(this).data("ruang");
        var ruangan_id = $(this).data("ruangan_id");
        var noperk = $(this).data("noperk");
        var noperks = $(this).data("noperks");
        var dilewat = $(this).data("dilewat");
        Swal.fire({
            text: "Apakah sidang nomor perkara "+noperks+" akan dimulai ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK, Mulai'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?php echo base_url('utama/mulai_sidang'); ?>',
                    type: 'post',
                    data: {tglsidang:tglsidang,ruang:ruang,ruangan_id:ruangan_id,no:no_antrian},
                    success: function(response){
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        Swal.fire({
                            text: "ERROR MULAI SIDANG !!",
                            icon: 'Error',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        })
                    }
                });
            }
        })
    });

    $(".selesai_sidang").click(function() {
        var no_antrian = $(this).data("no_antrian");
        var tglsidang = $(this).data("tglsidang");
        var ruangan_id = $(this).data("ruangan_id");
        var noperk = $(this).data("noperk");
        var noperks = $(this).data("noperks");
        var dilewat = $(this).data("dilewat");
        Swal.fire({
            text: "Apakah sidang nomor perkara "+noperks+" sudah selesai ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK, Selesai'
        }).then((result) => {
            if (result.value) {
                //postinng lewati
                $.ajax({
                    url: '<?php echo base_url('utama/selesai_sidang'); ?>',
                    type: 'post',
                    data: {tglsidang:tglsidang,ruangan_id:ruangan_id,no:no_antrian},
                    success: function(response){
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('error lewati antrian sidang');
                    }
                });
            }
        })
    });


    $("#refresh_sidang").click(function() {
                location.reload();
    });


    $(".durasi").click(function() {
        status='durasi_tambah';
        var idds ='#'+$(this).attr('id');
        var pkrid = $(idds).attr("pkrid");
        var tglsidang = $(idds).attr("tglsidang");
        var ruang = $(idds).attr("ruang");
       // alert('tglsidang '+tglsidang);

        $.ajax({
            url: '<?php echo base_url('utama/view_isi_durasi'); ?>',
            type: 'post',
            data: {pkrid:pkrid,tglsidang:tglsidang,ruang:ruang},
            success: function(response){
                $('#modalkuisi').html(response);
                $('#modalku').modal('show');
                $('.modal-title').text('Isi Durasi Sidang (menit)');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Isi Durasi');
            }
        });
    });

    $(".edit_durasi").click(function() {
        status='durasi_tambah';
        var idds ='#'+$(this).attr('id');
        var pkrid = $(idds).attr("pkrid");
        var tglsidang = $(idds).attr("tglsidang");
        var ruang = $(idds).attr("ruang");
        var durasi= $(idds).attr("durasi");
       // alert('tglsidang '+tglsidang);

        $.ajax({
            url: '<?php echo base_url('utama/view_isi_durasi'); ?>',
            type: 'post',
            data: {pkrid:pkrid,tglsidang:tglsidang,ruang:ruang,durasi:durasi},
            success: function(response){
                $('#modalkuisi').html(response);
                $('#tutup').show();
                $('#simpan').text('Simpan');
                $('#modalku').modal('show');
                $('.modal-title').text('Edit Durasi Sidang (menit)');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Isi Durasi');
            }
        });
    });

    $(".isi_ruang").click(function() {
        status='ruang_tambah';
        var idds ='#'+$(this).attr('id');
        var hakim_id = $(idds).attr("hakim_id");
        var hakim_nama = $(idds).attr("hakim_nama");
        var hari_id= $(idds).attr("hari_id");
        var hari = $(idds).attr("hari");
        // alert('tglsidang '+tglsidang);

        $.ajax({
            url: '<?php echo base_url('utama/view_isi_ruang'); ?>',
            type: 'post',
            data: {hakim_id:hakim_id,hakim_nama:hakim_nama,hari_id:hari_id,hari:hari},
            success: function(response){
                $('#modalkuisi').html(response);
                $('#modalku').modal('show');
                $('.modal-title').text('Isi Ruang Sidang');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Isi Ruang Sidang');
            }
        });
    });

    $(".list_pkr").click(function() {
        status='ruang_tambah';
        var idds ='#'+$(this).attr('id');
        var hakim_id = $(idds).attr("hakim_id");
        var hakim_nama = $(idds).attr("hakim_nama");
        var hari_id= $(idds).attr("hari_id");
        var hari = $(idds).attr("hari");
        // alert('tglsidang '+tglsidang);

        $.ajax({
            url: '<?php echo base_url('utama/view_list_pkr'); ?>',
            type: 'post',
            data: {hakim_id:hakim_id,hakim_nama:hakim_nama,hari_id:hari_id,hari:hari},
            success: function(response){
                $('.isi').html(response);
                $('#modalpkr').modal('show');
                $('.modal-title').text('Daftar Perkara ' +hakim_nama);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Isi Ruang Sidang');
            }
        });
    });

    $(".cetak_jurnal").click(function() {
        status='ruang_tambah';
        var no_antrian = $(this).data("no_antrian");
        var tglsidang = $(this).data("tglsidang");
        var ruang = $(this).data("ruang");
        var noperk = $(this).data("noperk");
        var dilewat = $(this).data("dilewat");
        $.ajax({
            url: '<?php echo base_url('utama/cetak_jurnal'); ?>',
            type: 'post',
            data: {hakim_id:hakim_id,hakim_nama:hakim_nama,hari_id:hari_id,hari:hari},
            success: function(response){
                $('.isi').html(response);
                $('.modal-title').text('Daftar Perkara ' +hakim_nama);
                $('#modalpkr').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Isi Ruang Sidang');
            }
        });
    });



    $(".edit_ruang").click(function() {
        status='ruang_tambah';
        var idds ='#'+$(this).attr('id');
        var hakim_id = $(idds).attr("hakim_id");
        var hakim_nama = $(idds).attr("hakim_nama");
        var hari_id= $(idds).attr("hari_id");
        var hari = $(idds).attr("hari");
        var ruang = $(idds).attr("ruang");
        $.ajax({
            url: '<?php echo base_url('utama/view_edit_ruang'); ?>',
            type: 'post',
            data: {hakim_id:hakim_id,hakim_nama:hakim_nama,hari_id:hari_id,hari:hari,ruang:ruang},
            success: function(response){
                $('#modalkuisi').html(response);
                $('#modalku').modal('show');
                $('.modal-title').text();
                $('.modal-title').text('Isi Ruang Sidang');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Isi Ruang Sidang');
            }
        });
    });

    $(".isi_tundaan").click(function() {
        status='tundaan';
        var noperk =$(this).data('noperk');
        var pkrid =$(this).data('pkrid');
        var tgl_sidang = $(this).data('tgl_sidang');
        var agenda = $(this).data('agenda');
        var ruang = $(this).data('ruang');
        var ruang_id = $(this).data('ruang_id');
        Swal.fire({
            html: "Apakah Perkara ini akan <b>Ditunda</b>?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK, Ditunda'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?php echo base_url('main/check_tundaan'); ?>',
                    type: 'post',
                    dataType: 'JSON',
                    data: {perkara_id:pkrid,noperk:noperk},
                    success: function(data){
                       if(data.hasil==1) {
                           $('[name="tanggal_sidang"]').val("<?php echo date_format(date_create($this->session->userdata('tgl_sidang')),'d-m-Y'); ?>");
                           $('[name="noperk"]').val(noperk);
                           $('[name="perkara_id"]').val(pkrid);
                           $('[name="jam_sidang1"]').val(data.jam_mulai);
                           $('[name="jam_sidang2"]').val(data.jam_selesai);
                           $('[name="ruang_sidang_sebelum"]').val(ruang);
                           $('[name="agenda_sebelum"]').val(agenda);
                           $('#judul_tundaan').text('Isi Tundaan Nomor Perkara '+data.noperk);
                           $('#modaltunda').modal('show');
                       } else {
                           Swal.fire({
                               icon: 'info',
                               html: data.pesan,
                               showConfirmButton: false,
                               timer: 3000
                           })
                       }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        Swal.fire({
                            icon: 'error',
                            html: errorThrown,
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }
                });


            }
        })

    });

    $(".isi_putusan").click(function() {
        status='putusan';
        Swal.fire({
            html: "Apakah Perkara ini akans <b>Diputus</b>?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK, Diputus'
        }).then((result) => {
            if (result.value) {
                //jika syarat putusan terpenuhi
                var noperk =$(this).data('noperk');
                var perkara_id =$(this).data('pkrid');
                var tgl_sidang = $(this).data('tgl_sidang');
                var agenda = $(this).data('agenda');
                var ruang = $(this).data('ruang');
                var ruang_id = $(this).data('ruang_id');
                var jenisperk=$(this).data('jenisperk');
                var alur=$(this).data('alur');
                $.ajax({
                    url: '<?php echo base_url('main/check_syarat_putus'); ?>',
                    type: 'post',
                    dataType: 'JSON',
                    data: {perkara_id:perkara_id,jenisperk:jenisperk,noperk:noperk},
                    success: function(data) {
                        if (data.hasil == 1) {
                                    $('#judul_putusan').text('Input Putusan Akhir Nomor Perkara ' + data.noperk);
                                    $('#tgl_putusan').val("<?php echo date('d-m-Y');?>");
                                    $('#kehadiran_edit').focus();
                                    $('#jenis_amar').html(data.jenis_amar);
                                    $('[name="noperk"]').val(noperk);
                                    $('[name="perkara_id"]').val(perkara_id);
                                    $('[name="alur_perkara_id"]').val(alur);
                                    $('[name="jenis_perkara_id"]').val(jenisperk);
                                    $('#modalputus').modal('show');
                        } else if(data.hasil == 2) {
                            $('#judul_hasil_sidang').text('Isi hasil sidang Nomor Perkara '+data.noperk+' terlebih dahulu');
                            $('#tgl_edit_sidang').val("<?php echo date('d-m-Y');?>");
                            $('[name="jam_edit_sidang1"]').val("<?php echo $this->session->userdata('jam_mulai'); ?>");
                            $('[name="jam_edit_sidang2"]').val("<?php echo date('H:i:s'); ?>");
                            $('[name="agenda_edit"]').val(agenda);
                            $('[name="noperk"]').val(noperk);
                            $('[name="perkara_id"]').val(perkara_id);
                            $('[name="jenis_perkara_id"]').val(jenisperk);
                            $('[name="alur_perkara_id"]').val(alur);
                            $('#modaleditsidang').modal('show');
                          } else {
                            Swal.fire({
                                icon: 'info',
                                html: data.pesan,
                                showConfirmButton: false,
                                timer: 4000
                            })
                        }

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        Swal.fire({
                            icon: 'error',
                            html: errorThrown,
                            showConfirmButton: false,
                            timer: 4000
                        })
                    }
                });

            }
        })



    });




    $(".anti_gratifikasi").click(function() {

        $.ajax({
            url: '<?php echo base_url('konfig/ambil_teks_gratifikasi'); ?>',
            type: 'post',
            success: function(response){
                $('#isi_gratifikasi').html(response);
                $('.modal-title').text('Dibaca oleh Mejelis/Hakim pada saat sidang akan dimulai');
                $('#modalgratifikasi').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                Swal.fire({
                    icon: 'error',
                    text: 'Ada error ambil data teks gratifikasi',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                })
            }
        });
    });

    $(".jurnal_keu").click(function() {
        var pkrid =$(this).data('perkara_id');
        var noperk =$(this).data('nomor_perkara');
        var noperks =$(this).data('nomor_perkaras');
        $.ajax({
            url: '<?php echo base_url('main/jurnal_keu'); ?>',
            type: 'post',
            data: {perkara_id:pkrid},
            success: function(response){
                $('#isi_gratifikasi').html(response);
                $('.modal-title').text('Jurnal Keuangan '+noperks);
                $('#modalgratifikasi').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                Swal.fire({
                    icon: 'error',
                    text: 'Ada menampilkan jurnal keuangan',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                })
            }
        });
    });

    $(".relaas").click(function() {
        var perkara_id =$(this).data('perkara_id');
        var tgl_sidang =$(this).data('tgl_sidang');
        var noperk =$(this).data('noperk')
        $.ajax({
            url: '<?php echo base_url('main/relaas'); ?>',
            type: 'post',
            data: {perkara_id:perkara_id,tgl_sidang:tgl_sidang},
            success: function(response){
                $('#isi_gratifikasi').html(response);
                $('.modal-title').text('Daftar Relaas '+noperk+' tanggal sidang '+tgl_sidang);
                $('#modalgratifikasi').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                Swal.fire({
                    icon: 'error',
                    text: 'Ada error menampilkan data relaas',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                })
            }
        });
    });

    $(".jurnal_sidang").click(function() {
        window.location.href="<?php echo base_url('main/jurnal_sidang'); ?>";
    });


   function simpan_tundaan() {

       $.ajax({
           url : "<?php echo base_url('main/simpan_tundaan'); ?>",
           type: "POST",
           dataType:"JSON",
           data: $('#formtunda').serialize(),
           success: function(data)
           {
               if(data.st==0) {
                   Swal.fire({
                       icon: 'error',
                       html: data.msg,
                       showCancelButton: false,
                       confirmButtonColor: '#3085d6',
                       cancelButtonColor: '#d33',
                       confirmButtonText: 'OK'
                   });
                   return;
               }
                   if(data.st==1) {
                       Swal.fire({
                           icon: 'info',
                           html: data.msg,
                           showCancelButton: false,
                           confirmButtonColor: '#3085d6',
                           cancelButtonColor: '#d33',
                           confirmButtonText: 'OK'
                       });
                       $('#modaltunda').modal('hide');
                       location.reload();
                   }

           },
           error: function (jqXHR, textStatus, errorThrown)
           {
               Swal.fire({
                   icon: 'error',
                   text: errorThrown,
                   showCancelButton: false,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'OK'
               })
           }
       });

   }

    function simpan_hasil_sidang() {
           $.ajax({
               url : "<?php echo base_url('main/simpan_hasil_sidang'); ?>",
               type: "POST",
               dataType:"JSON",
               data: $('#formhasil_sidang').serialize(),
               success: function(data)
               {
                   if(data.hasil==0) {
                       Swal.fire({
                           icon: 'error',
                           html: data.pesan,
                           showCancelButton: false,
                           confirmButtonColor: '#3085d6',
                           cancelButtonColor: '#d33',
                           confirmButtonText: 'OK'
                       });
                       return;
                   }
                   if(data.hasil==1) {
                       $('#modaleditsidang').modal('hide');
                       $('#judul_putusan').text('Input Putusan Akhir Nomor Perkara ' + data.noperk);
                       $('#tgl_putusan').val("<?php echo date('d-m-Y');?>");
                       $('#kehadiran_edit').focus();
                       $('#jenis_amar').html(data.jenis_amar);
                       $('[name="noperk"]').val(data.noperk);
                       $('[name="perkara_id"]').val(data.pkrid);
                       $('[name="alur_perkara_id"]').val(data.alur);
                       $('[name="jenis_perkara_id"]').val(data.jenisperk);
                       $('#modalputus').modal('show');
               }

               },
               error: function (jqXHR, textStatus, errorThrown)
               {
                   Swal.fire({
                       icon: 'error',
                       text: errorThrown,
                       showCancelButton: false,
                       confirmButtonColor: '#3085d6',
                       cancelButtonColor: '#d33',
                       confirmButtonText: 'OK'
                   })
               }
           });
    }


    function simpan_putusan() {
        var data_amar = CKEDITOR.instances.isi_amar.getData();
        var data = $("#form_putusan").serializeArray();
        data.push({name: 'isi_amar', value: data_amar});
        //alert(jQuery.param(data));
        $.ajax({
            url : "<?php echo base_url('main/simpan_putusan'); ?>",
            type: "POST",
            dataType:"JSON",
            data: data,
            success: function(respon)
            {
                if(respon.hasil==0) {
                    Swal.fire({
                        icon: 'error',
                        html: respon.pesan,
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });
                    return;
                }
                if(respon.hasil==1) {
                    Swal.fire({
                        icon: 'info',
                        html: respon.pesan,
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });
                    $('#modalputus').modal('hide');
                    location.reload();
                }

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                Swal.fire({
                    icon: 'error',
                    text: errorThrown,
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
        var url;
        if(status == 'durasi_tambah')
        {
           // alert('durasi');
            url = "<?php echo base_url('utama/isi_durasi'); ?>";
        }

        if(status=='asing')
        {
            var dilewat = $(this).data("dilewat");
            $('#status_antrian').html('<b>DIPANGGIL BHS ASING</b>');
            $.ajax({
                url: '<?php echo base_url('utama/panggil_sidang'); ?>',
                type: 'post',
                data: $('#form_asing').serialize(),
                dataType: 'JSON',
                success: function(data){
                    $('#modalku').modal('hide');
                    $('#modal_isi').html("<h2>Sedang memanggil antrian "+$('.panggil_sidang_asing').attr('data-no_antrian_cetak') +" dengan "+data.bahasa+"</h2>");
                    $('#modalpanggil').modal('show');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('error panggil sidang '+errorThrown);
                }
            });

        }

        if(status == 'set_ruang')
        {
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
            url = "<?php echo base_url('konfig/set_ruang_isian'); ?>";
        }

        if (status == 'ruang_tambah')
        {
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
            }

            url = "<?php echo base_url('konfig/isi_ruang'); ?>";
        }

        var isi = $("#isi").val();
        if(jQuery.trim(isi).length > 0)
        {
            $.ajax({
                url : url,
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
        } else {
            if(status == 'durasi_tambah') {
                 
                        Swal.fire({
                                        icon: 'error',
                                        title: 'Perbaiki dulu !!',
                                        text: 'Durasi harus diisi!',
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'OK'
                                    })
                         
            }
            if(status == 'ruang_tambah') {
                Swal.fire({
                                        icon: 'error',
                                        title: 'Perbaiki dulu !!',
                                        text: 'Ruang harus diisi !!',
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'OK'
                                    })
            }

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
                exit;
            }


        }

    }

    
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



    $(".panggil_saksi").click(function() {
        var ruang = "<?php echo $this->session->userdata('ruang_sidang'); ?>";
        var noperk = $(this).data("noperk");
        var pihak = $(this).data("pihak");
        if(noperk=="-") {
            Swal.fire({
                icon: 'error',
                text: 'Belum ada antrian perkara yang akan dipanggil',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            });
            exit;
        }
        $.ajax({
            url: '<?php echo base_url('main/panggil_saksi'); ?>',
            type: 'post',
            data: {noperk:noperk,ruang:ruang,pihak:pihak},
            success: function(response){
           
                $('#modal_isinon').html("<h2>Sedang memanggil para saksi dari pihak "+pihak+"E </h2>");
                $('#modalpanggilnon').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown)
                    { Swal.fire({
                        icon: 'error',
                        text: 'Ada error pannggil saksi!',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    })
            }
        });
    })


    $(".panggil_non_sidang").click(function() {
        var ruang ="<?php echo $this->session->userdata('ruang_sidang'); ?>";
        var jenis = $(this).data('jenis');
        $.ajax({
            url: '<?php echo base_url('main/panggil_non_sidang'); ?>',
            type: 'post',
            data: {ruang:ruang,jenis:jenis},
            success: function(response){
                if (jenis==1) {
                    var teks="<h2>Suara Pengumuman mulai persidangan di ruang "+ruang+" </h2>";
                } else if (jenis==2) {
                    var teks="<h2>Suara Pengumuman skors sidang untuk isoma di ruang "+ruang+" </h2>";
                } else if (jenis==3) {
                    var teks="<h2>Suara Pengumuman mulai persidangan setelah isoma di ruang "+ruang+" </h2>";
                } else if (jenis==4) {
                    var teks="<h2>Suara Persidangan telah selesai di ruang "+ruang+" </h2>";
                } else {
                    var teks="<h2>Suara Panggil petugas masuk ke ruang "+ruang+" </h2>";
                 }
                $('#modal_isinon').html(teks);
                $('#modalpanggilnon').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                Swal.fire({
                    icon: 'error',
                    text: 'Ada error panggil non sidang!',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                })
            }
        });
    })

    $(".hadir").click(function() {
        var perkara_id=$(this).data("pkrid");
        var nomor_perkara = $(this).data("noperk");
        var nomor_perkaras = $(this).data("noperks");
        var tgl_sidang = $(this).data("tgl_sidang");
        $.ajax({
            url: '<?php echo base_url('main/kehadiran_sidang_lists'); ?>',
            type: 'post',
            data: {perkara_id:perkara_id,nomor_perkara:nomor_perkara,tgl_sidang:tgl_sidang},
            success: function(response){
                $('#isi_hadir').html(response);
                $('.modal-title').html('Kehadiran Pihak <br> '+nomor_perkaras)
                $('#modalhadir').modal('show');
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
                $('.modal-title').html("Isi Ruang Sidang<br>"+perkaras+" <br> Hanya untuk yang tidak bisa diisi lewat SIPP");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Isi Durasi');
            }
        });
    });


    function startWorker() {
        if(typeof(Worker) !== "undefined") {
           if(typeof(w) == "undefined") {
                w = new Worker("<?= base_url() ?>assets/js/__status.js");

            }
            w.postMessage({'link': '<?= base_url() ?>check_antrian/status'});
            w.onmessage = function(event) {
                var status=event.data;
                if(status.status_panggil==1) {
                    $('#modalpanggil').modal('hide');
                }
            };

           if(typeof(j) == "undefined") {
                j = new Worker("<?= base_url() ?>assets/js/__statusnon.js");

            }
            j.postMessage({'link': '<?= base_url() ?>ambil_suara/status'});
            j.onmessage = function(event) {
                var status_non=event.data;
                if(status_non.status_panggil_non==1) {
                    $('#modalpanggilnon').modal('hide');
                }
            };
        } else {
            alert("Sorry, your browser does not support Web Workers");
        }
    }

    startWorker();


</script>
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
</div>


    <div id="modaltunda" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"  id="judul_tundaan">Input Tundaan Sidang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form id="formtunda">
                        <input type="hidden" name="ruang_sidang_sebelum">
                        <input type="hidden" name="perkara_id">
                        <input type="hidden" name="noperk">
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group row mb-4">
                                    <label  class="col-xl-12 col-sm-3 col-sm-2 col-form-label"><h5>Sidang Hari Ini :</h5></label>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Tgl Sidang</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <input class="form-control form-control-sm" id="tanggal_sidang" name="tanggal_sidang" type="text"  readonly required>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label  class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Jam Sidang</label>
                                    <div class="col-xl-4 col-lg-9 col-sm-10">
                                        <input type="time" class="form-control form-control-sm" name="jam_sidang1" id="jam_awal" placeholder="format 24:00" value="">
                                    </div>
                                    <label  class="col-xl-1 col-form-label">s/d</label>
                                    <div class="col-xl-4 col-lg-9 col-sm-10">
                                        <input type="time" class="form-control form-control-sm" name="jam_sidang2" id="jam_akhir" placeholder="format 24:00" value="">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Agenda</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <textarea type="text" class="form-control form-control-sm"  name="agenda_sebelum" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">dihadiri</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <select class="form-control form-control-sm" id="kehadiran" name="kehadiran">';
                                            <option value=1>Semua Pihak</option>;
                                            <option value=2>PE Saja</option>;
                                            <option value=3>TE Saja</option>;
                                            <option value=10>Sebagaian PE</option>;
                                            <option value=10>Sebagian TE</option>;
                                            <option value=4>Para Pihak tidak hadir</option>;
                                        </select>
                                    </div>
                                </div>
                                <fieldset class="form-group mb-4">
                                    <div class="row">
                                        <label class="col-form-label col-xl-3 col-sm-3 col-sm-2 pt-0">Sifat Sidang</label>
                                        <div class="col-xl-9 col-lg-9 col-sm-10">
                                            <div class="n-chk">
                                                <label class="new-control new-radio radio-primary">
                                                    <input type="radio" class="new-control-input" name="sifat_sidang" value="Y" >
                                                    <span class="new-control-indicator"></span>Terbuka
                                                </label>
                                            </div>
                                            <div class="n-chk">
                                                <label class="new-control new-radio radio-primary">
                                                    <input type="radio" class="new-control-input" name="sifat_sidang" value="T" checked >
                                                    <span class="new-control-indicator"></span>Tertutup
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">sidkel</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <select class="form-control" id="sidkel1" name="sidkel1">';
                                            <option value="T">Tidak</option>;
                                            <option value="Y">YA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Alasan Tunda</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <textarea type="text" class="form-control form-control-sm" name="alasan_tunda" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <textarea type="text" class="form-control form-control-sm" name="keterangan"  rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group row mb-4">
                                    <label  class="col-xl-12 col-sm-3 col-sm-2 col-form-label"><h5>Tundaan Sidang Berikutnya :</h5></label>
                                </div>
                                <div class="form-group row mb-4">
                                    <label  class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Ditunda Tgl</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <input class="form-control form-control-sm tgl_tunda" id="tgl_tunda" name="tgl_tunda" type="text" value="" placeholder="Isi tanggal tunda" readonly="readonly" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label  class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Jam Sidang</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <input type="time" class="form-control form-control-sm" name="jam_sidang_tunda" id="jam_awal" placeholder="format 24:00" value="">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Agenda</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <textarea type="text" class="form-control form-control-sm"  name="agenda_tunda" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Sidkel</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <select class="form-control form-control-sm" id="sidkel2" name="sidkel2">';
                                            <option value="T">Tidak</option>;
                                            <option value="Y">YA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label  class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Ruang</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <select class="form-control form-control-sm" id="ruang_sidang" name="ruang_sidang">
                                            <option value=0>Pilih ruang sidang</option>
                                            <?php
                                            foreach ($masterruang->result() as $rows) {
                                                if ($rows->nama==$ruangsidang) {
                                                    $selects="selected";
                                                } else {
                                                    $selects="";
                                                }

                                            echo"<option value='".$rows->nama."' $selects>$rows->nama</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <textarea type="text" class="form-control form-control-sm" name="keterangan"  rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" id='tutup' class="btn" data-dismiss="modal">Tutup</button>
                    <button type="button" id='simpan' class="btn btn-primary" onclick="simpan_tundaan()">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <div id="modaleditsidang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"  id="judul_hasil_sidang">Hasil Sidang hari ini</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form id="formhasil_sidang">
                        <input type="hidden" name="alur_perkara_id">
                        <input type="hidden" name="jenis_perkara_id">
                        <input type="hidden" name="perkara_id">
                        <input type="hidden" name="noperk">
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group row mb-4">
                                    <label  class="col-xl-12 col-sm-3 col-sm-2 col-form-label"><h5>Sidang Hari Ini :</h5></label>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Tgl Sidang</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <input class="form-control form-control-sm" id="tgl_edit_sidang" name="tanggal_sidang" type="text"  readonly required>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label  class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Jam Sidang</label>
                                    <div class="col-xl-3 col-lg-9 col-sm-10">
                                        <input type="time" class="form-control form-control-sm" name="jam_edit_sidang1" id="jam_awal" placeholder="format 24:00" value="" required>

                                    </div>
                                    <label  class="col-xl-1 col-form-label"><center>s/d</center></label>
                                    <div class="col-xl-3 col-lg-9 col-sm-10">
                                        <input type="time" class="form-control form-control-sm" name="jam_edit_sidang2" id="jam_akhir" placeholder="format 24:00" value="" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Agenda</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <textarea type="text" class="form-control form-control-sm"  name="agenda_edit" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">dihadiri</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <select class="form-control form-control-sm" id="kehadiran_edit" name="kehadiran_edit">';
                                            <option value=0>-Pilih kehadira pihak-</option>
                                            <option value=1>Semua Pihak</option>
                                            <option value=2>PE Saja</option>
                                            <option value=3>TE Saja</option>
                                            <option value=10>Sebagaian PE</option>
                                            <option value=10>Sebagian TE</option>
                                            <option value=4>Para Pihak tidak hadir</option>
                                        </select>
                                    </div>
                                </div>
                                <fieldset class="form-group mb-4">
                                    <div class="row">
                                        <label class="col-form-label col-xl-3 col-sm-3 col-sm-2 pt-0">Sifat Sidang</label>
                                        <div class="col-xl-9 col-lg-9 col-sm-10">
                                            <div class="n-chk">
                                                <label class="new-control new-radio radio-primary">
                                                    <input type="radio" class="new-control-input" name="sifat_sidang_edit" value="Y" >
                                                    <span class="new-control-indicator"></span>Terbuka
                                                </label>
                                            </div>
                                            <div class="n-chk">
                                                <label class="new-control new-radio radio-primary">
                                                    <input type="radio" class="new-control-input" name="sifat_sidang_edit" value="T" checked >
                                                    <span class="new-control-indicator"></span>Tertutup
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">sidkel</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <select class="form-control" id="sidkel1" name="sidkel_edit">
                                            <option value="T" checked>Tidak</option>
                                            <option value="Y">YA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label  class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Ruang</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <select class="form-control form-control-sm" id="ruang_sidang" name="ruang_sidang_edit">
                                            <option value=0>Pilih ruang sidang</option>
                                            <?php
                                            foreach ($masterruang->result() as $rows) {
                                                if ($rows->nama==$ruangsidang) {
                                                    $selects="selected";
                                                } else {
                                                    $selects="";
                                                }

                                                echo"<option value='".$rows->id."|".$rows->nama."' $selects>$rows->nama</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <textarea type="text" class="form-control form-control-sm" name="keterangan_edit"  rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" id='tutup' class="btn" data-dismiss="modal">Tutup</button>
                    <button type="button" id='simpan' class="btn btn-primary" onclick="simpan_hasil_sidang()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modalputus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="judul_putusan">Input Putusan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form id="form_putusan">
                        <input type="hidden" name="alur_perkara_id">
                        <input type="hidden" name="jenis_perkara_id">
                        <input type="hidden" name="perkara_id">
                        <input type="hidden" name="noperk">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group row mb-4">
                                    <label for="tglputus" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Tgl Putusan</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <input type="text" class="form-control" id="tgl_putusan"  name="tgl_putusan" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Status Putusan</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <select class="form-control" id="status_putusan" name="status_putusan">
                                            <option value="0">-Pilih-</option>
                                            <?php
                                                if($status_putusan->num_rows()>0) {
                                                    foreach ($status_putusan->result() as $row) {
                                                        echo '<option value="'.$row->id.'">'.$row->nama.'</option>';
                                                    }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Putusan Verstek</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <select class="form-control" id="verstek" name="verstek">'
                                            <option value="0">-Pilih-</option>;
                                            <option value="T">Tidak</option>
                                            <option value="Y">Ya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-form-label col-xl-3 col-sm-3 col-sm-2 pt-0">Sumber Hukum</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-outline-default">
                                            <input type="checkbox" class="new-control-input" name="sumber[]" value="10">
                                            <span class="new-control-indicator"></span>Fiqh Islam
                                        </label>
                                    </div>

                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                            <input type="checkbox" class="new-control-input" name="sumber[]" value="9">
                                            <span class="new-control-indicator"></span>Kompilasi Hukum Ekonomi Syariah
                                        </label>
                                    </div>

                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-outline-success">
                                            <input type="checkbox" class="new-control-input" name="sumber[]" value="8">
                                            <span class="new-control-indicator"></span>Kompilasi Hukum Islam
                                        </label>
                                    </div>

                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-outline-info">
                                            <input type="checkbox" class="new-control-input" name="sumber[]" value="13">
                                            <span class="new-control-indicator"></span>Qanun Aceh
                                        </label>
                                    </div>

                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-outline-warning">
                                            <input type="checkbox" class="new-control-input" name="sumber[]" value="11">
                                            <span class="new-control-indicator"></span>UU/PP
                                        </label>
                                    </div>

                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-outline-danger">
                                            <input type="checkbox" class="new-control-input" name="sumber[]" value="16">
                                            <span class="new-control-indicator"></span>Yurisprudensi
                                        </label>
                                    </div>

                                   </div>
                                    </div>
                                <div class="form-group row mb-4" id="faktor_penyebab" style="display: none;">
                                    <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Faktor Penyebab</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <select class="form-control" id="faktor_cerai" name="faktor_cerai">';
                                            <option value="0">Pilih Faktor</option>
                                            <?php
                                                if($faktor_percerian->num_rows()>0){
                                                    foreach ($faktor_percerian->result() as $row) {
                                                        echo "<option value=$row->id >$row->nama</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4" id="keadaan_istri" style="display: none;">
                                    <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Keadaan Istri</label>
                                    <div class="col-xl-9 col-lg-9 col-sm-10">
                                        <select class="form-control" id="istri" name="istri">';
                                            <option value=0>-Pilih-</option>;
                                            <option value="1">Suci</option>
                                            <option value="2">Haid</option>
                                            <option value="3">Hamil</option>
                                            <option value="4">Tidak diketahui</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8">

                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Amar Putusan</label>
                                    <div class="col-xl-10 col-lg-9 col-sm-10">
                                        <select class="form-control" id="jenis_amar" name="jenis_amar">
                                            <div id="amar_isi"></div>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label"></label>
                                    <div class="col-xl-10 col-lg-9 col-sm-10">
                                        <textarea  class="form-control" id="isi_amar" name="isi_amar" rows="15"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-xl-10 col-lg-9 col-sm-10">
                                        <textarea  class="form-control" id="keterangan" name="keterangan" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>

                <div class="modal-footer">
                    <button type="button" id='tutup' class="btn" data-dismiss="modal">Tutup</button>
                    <button type="button" id='simpan' class="btn btn-primary" onclick="simpan_putusan()">Simpan</button>
                </div>
            </div>
        </div>
    </div>



<div id="modalpkr" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
            <h5 id="hakim"></h5>   
            <h5 id="hari"></h5>   
           <table id="tblperkara" class="table table-striped">
           <thead>
           <tr>
       <th>Nomor Perkara</th>
        <th>Tanggal</th>
           </tr>
        <thead>
        </thead>
         <tbody class="isi"> 
         </tbody>
         </table>
            </div>
            <div class="modal-footer">
                <button type="button" id='tutup' class="btn" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div id="modalpanggil" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="display: none; ">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div id="modal_isi"></div>
            </div>
        </div>
    </div>
</div>

    <div id="modalpanggilnon" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="display: none; ">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="modal_isinon"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="modalhadir" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kehadiran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div id="isi_hadir"></div>
                </div>
            </div>
        </div>
    </div>


    <div id="modalgratifikasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Dibaca oleh Mejelis/Hakim pada saat sidang akan dimulai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <div id="isi_gratifikasi"></div>
            </div>
            <div class="modal-footer">
                <button type="button" id='tutup' class="btn" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
 </div>
</body>
</html>