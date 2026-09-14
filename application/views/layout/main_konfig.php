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
<body class="sidebar-noneoverflow">

<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>

        <ul class="navbar-item flex-row search-ul">
            <li class="nav-item align-self-center search-animated">
                <h5>APLIKASI JURNAL DAN ANTRIAN SIDANG  <?php echo $satker; ?> </h5>
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

<div id="modalku" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" id='tutup' class="btn" data-dismiss="modal">Tutup</button>
                <button type="button" id='simpan' class="btn btn-primary" onclick="simpan()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div id="modalpkr" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-bodypkr">
                <h5 id="hakim"></h5>
                <h5 id="hari"></h5>
                <table  class="table table-striped">
                    <thead>
                    <th>No</th>
                        <th>Nomor Perkara</th>
                        <th>Tanggal</th>
                        <th>Ruang Sidang</th>
                        <th>Agenda Sidang</th>
                        <th>Keterangan</th>
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
            <div class="modal-footer">
                <button type="button" id='tutup' class="btn" onclick="simpan()">simpan</button>
            </div>
        </div>
    </div>
</div>
</div>

    <div id="modalupdate" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="display: none; ">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Tunggu sebentar... sedang update aplikasi<br>Jangan ditutup/close!! tunggu sampai selesai</h4>
                </div>
            </div>
        </div>
    </div>
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?php echo base_url('assets/js/libs/jquery-3.1.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app.js'); ?>"></script>

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url('assets/plugins/table/datatable/datatables.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/table/datatable/responsif/js/dataTables.responsive.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {

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

    function formatDate(date) {
        var year = date.getFullYear().toString();
        var month = (date.getMonth() + 101).toString().substring(1);
        var day = (date.getDate() + 100).toString().substring(1);
        return year + "-" + month + "-" + day;
    }


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
                $('.modal-body').html(response);
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
        var hakim_id = $(this).data("hakim_id");
        var hakim_nama = $(this).data("hakim_nama");
        var hari_id= $(this).data("hari_id");
        var hari = $(this).data("hari");
        var hari2 = $(this).data("hari2");
        var ruang = $(this).data("ruang");
        // alert('tglsidang '+tglsidang);

        $.ajax({
            url: '<?php echo base_url('utama/view_list_pkr'); ?>',
            type: 'post',
            data: {hakim_id:hakim_id,hakim_nama:hakim_nama,hari_id:hari_id,hari:hari,ruang:ruang},
            success: function(response){
                $('.isi').html(response);
                $('#modalpkr').modal('show');
                $('.modal-title').html('Daftar Perkara ' +hakim_nama+'<br> yang sidang pada hari <b>'+hari2+'</b>');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Isi Ruang Sidang');
            }
        });
    });


    $(".list_pkr_pp").click(function() {
        status='ruang_tambah';
        var hakim_id = $(this).data("hakim_id");
        var hakim_nama = $(this).data("hakim_nama");
        var hari_id= $(this).data("hari_id");
        var hari = $(this).data("hari");
        var hari2 = $(this).data("hari2");
        var ruang = $(this).data("ruang");
        // alert('tglsidang '+tglsidang);

        $.ajax({
            url: '<?php echo base_url('utama/view_list_pkr_pp'); ?>',
            type: 'post',
            data: {hakim_id:hakim_id,hakim_nama:hakim_nama,hari_id:hari_id,hari:hari,ruang:ruang},
            success: function(response){
                $('.isi').html(response);
                $('#modalpkr').modal('show');
                $('.modal-title').html('Daftar Perkara ' +hakim_nama+'<br> yang sidang pada hari <b>'+hari2+'</b>');
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
        // alert('tglsidang '+tglsidang);

        $.ajax({
            url: '<?php echo base_url('utama/view_edit_ruang'); ?>',
            type: 'post',
            data: {hakim_id:hakim_id,hakim_nama:hakim_nama,hari_id:hari_id,hari:hari,ruang:ruang},
            success: function(response){
                $('.modal-body').html(response);
                $('#modalku').modal('show');
                $('.modal-title').text('Isi Ruang Sidang');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Isi Ruang Sidang');
            }
        });
    });


    $(".edit_ruang_pp").click(function() {
        status='ruang_tambah_pp';
        var idds ='#'+$(this).attr('id');
        var hakim_id = $(idds).attr("hakim_id");
        var hakim_nama = $(idds).attr("hakim_nama");
        var hari_id= $(idds).attr("hari_id");
        var hari = $(idds).attr("hari");
        var ruang = $(idds).attr("ruang");
        // alert('tglsidang '+tglsidang);

        $.ajax({
            url: '<?php echo base_url('utama/view_edit_ruang_pp'); ?>',
            type: 'post',
            data: {hakim_id:hakim_id,hakim_nama:hakim_nama,hari_id:hari_id,hari:hari,ruang:ruang},
            success: function(response){
                $('.modal-body').html(response);
                $('#modalku').modal('show');
                $('.modal-title').text('Isi Ruang Sidang');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Isi Ruang Sidang');
            }
        });
    });


    function simpan()
    {
        $('#modalku').modal('hide');
        var url;
        if(status == 'durasi_tambah')
        {
            url = "<?php echo base_url('utama/isi_durasi'); ?>";
        }

        if (status == 'ruang_tambah')
        {
            url = "<?php echo base_url('konfig/isi_ruang'); ?>";
        }

        if (status == 'ruang_tambah_pp')
        {
        
            url = "<?php echo base_url('konfig/isi_ruang_pp'); ?>";
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
                    
                    Swal.fire({
                            icon: 'success',
                            title: 'Berhasil disimpan/diedit',
                            showConfirmButton: false,
                            timer: 5000
                            })
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
                alert('durasi harus diisi');
            }
            if(status == 'ruang_tambah') {
                alert('ruang harus diisi');
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
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil disimpan',
                    showConfirmButton: false,
                    timer: 2000
                })
                sleep(2);
                location.reload();

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                Swal.fire({
                    icon: 'error',
                    text: 'Ada error simpan jam',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                })
            }
        });
    }

    function simpan_durasi()
    {
        $.ajax({
            url : "<?php echo base_url('konfig/set_durasi'); ?>",
            type: "POST",
            data: $('#formdurasi').serialize(),
            success: function(data)
            {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil disimpan',
                    showConfirmButton: false,
                    timer: 1500
                })
                location.reload();

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                Swal.fire({
                    icon: 'error',
                    text: 'Ada error simpan setting  durasi',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                })
            }
        });
    }

    function simpan_antrian()
    {
        $.ajax({
            url : "<?php echo base_url('konfig/setantrian'); ?>",
            type: "POST",
            data: $('#formdurasi').serialize(),
            success: function(data)
            {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil disimpan',
                    showConfirmButton: false,
                    timer: 1500
                })
                location.reload();

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                Swal.fire({
                    icon: 'error',
                    text: 'Ada error simpan setting  antrian',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                })
            }
        });
    }


    $(".reset_suara").click(function() {
       
        Swal.fire({
            text: "Apakah akan mereset antrian suara sidang?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK, Reset'
        }).then((result) => {
            if (result.value) {
                //postinng lewati
                $.ajax({
                    url: '<?php echo base_url('konfig/reset_suara_sidang'); ?>',
                    type: 'post',
                    success: function(response){
                        Swal.fire({
                            icon: 'success',
                            title: 'Atria suara berhasil direset',
                            showConfirmButton: false,
                            timer: 1500
                            })
                       location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        Swal.fire({
                            icon: 'error',
                            text: 'Ada error simpan reset suara',
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

    $(".simpan_suara").click(function() {
         var tipe = $(this).data("tipe");
         var form;
         if(tipe==1) {
             form='#form1';
         } else if (tipe==2) {
            form='#form2';
         } else if (tipe==3) {
            form='#form3';
         } else if (tipe==4) {
             form='#form4';
         } else if (tipe==5) {
             form='#form5';
         }  else if (tipe==6) {
             form='#form6';
         } else if (tipe==7) {
            form='#form7';
         } else if (tipe==8) {
            form='#form8';
         } else if (tipe==9) {
             form='#form9';
         } else if (tipe==10) {
             form='#form10';
         } else if (tipe==11) {
             form='#form11';
         }   else if (tipe==12){
             form='#form12';
         } else if (tipe==13) {
            form='#form13';
        } else {
             form='#form14';
         }
        $.ajax({
            url: '<?php echo base_url('konfig/simpan_audio'); ?>',
            type: 'post',
            data: $(form).serialize(),
            success: function(response){
                Swal.fire({
                            icon: 'Info',
                            title: 'Berhasil!!',
                            text: 'Disimpan!',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        })
                        location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                Swal.fire({
                            icon: 'error',
                            text: 'Ada error simpan',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        })
            }
        });
    });

    $(".simpan_set_antrian").click(function() {
        var tipe = $(this).data("tipe");
        var jumlah_ruang =<?php echo $this->session->userdata('jumlah_ruang');?>;
        var urutan= $('#urut_antrian').val();
        var form;
        if(tipe==1) {
            if (urutan.replace(/\,/g,'').length < jumlah_ruang) {
                Swal.fire({
                    icon: 'error',
                    html: 'Jumlah ruang sidang yang  aktif '+jumlah_ruang+'<br> Yang di set  urutan hanya sejumlah '+urutan.replace(/\,/g,'').length,
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });
                return;
            }
            form='#form1';
        } else if (tipe==2) {
            form = '#form2';
         } else if (tipe==3) {
            form = '#form3';
        }  else if (tipe==4) {
            form = '#form4';
        }  else if (tipe==5) {
        form = '#form5';
        }

        $.ajax({
            url: '<?php echo base_url('konfig/simpan_set_antrian'); ?>',
            type: 'post',
            data: $(form).serialize(),
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!!',
                    text: 'Disimpan!',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                Swal.fire({
                    icon: 'error',
                    text: 'Ada error simpan',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
    });



    $(function()
    {
      $('[name="aktif"]').change(function()
      {
        if ($(this).is(':checked')) {
            $('#graf').text('Suara aktif');
        } else {
            $('#graf').text('Suara tidak aktif');
        }
      });
        $('[name="status"]').change(function()
        {
            if ($(this).is(':checked')) {
                $('#grafs').text('Setting durasi aktif');
            } else {
                $('#grafs').text('Setting Durasi tidak aktif');
            }
        });
        $('[name="status_antrian"]').change(function()
        {
            if ($(this).is(':checked')) {
                $('#grafs').html('<h6>Antrian online aktif</h6>');
            } else {
                $('#grafs').html('<h6>Antrian online tidak aktif</h6>');
            }
        });

        $('[name="status_kehadiran"]').change(function()
        {
            if ($(this).is(':checked')) {
                $('#hadir').html('<h6>Kehadiran aktif</h6>');
            } else {
                $('#hadir').html('<h6>Kehadiran tidak aktif</h6>');
            }
        });

        $('[name="status_photo"]').change(function()
        {
            if ($(this).is(':checked')) {
                $('#photo').html('<h6>Photo aktif (pastikan memakai protocol <b>https</b> membuka web antrianya misalya https://ipcentos/atrian_sidang/display_cetak )</h6>');
            } else {
                $('#photo').html('<h6>Photo tidak aktif</h6>');
            }
        });

    });

    $("#ambil_ruang").click(function() {

        Swal.fire({
            title: 'Perhatian?',
            text: "Silahkan set ulang ruang sidang yg dipakai antrian setelah ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'proses!'
        }).then((result) => {

            $.ajax({
                url: '<?php echo base_url('konfig/ambil_ruang'); ?>',
                type: 'post',
                success: function(response){
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!!',
                        text: 'Disimpan!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    Swal.fire({
                        icon: 'error',
                        text: 'Ada error ambil ruang sidang sipp',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });


        })

    });

    $("#simpan_ruang").click(function() {


            $.ajax({
                url: '<?php echo base_url('konfig/simpan_ruang'); ?>',
                type: 'post',
                data: $('#formruang').serialize(),
                success: function(response){
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!!',
                        text: 'Disimpan!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    Swal.fire({
                        icon: 'error',
                        text: 'Ada error simpan ruang sidang',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });


    });

    function update_app()
    {
        $('#modalupdate').modal('show');
        //$('#modalku').modal('show');
        $.ajax({
            url : "<?php echo base_url('update/ngupdate'); ?>",
            type: "POST",
            dataType:  "JSON",
            success: function(data)
            {
                $('#modalupdate').modal('hide');
                if(data.st==1) {
                    Swal.fire({
                        icon: 'success',
                        title: data.pesan,
                        confirmButtonText: 'Ok',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })

               } else {
                    Swal.fire({
                        icon: 'error',
                        text:data.pesan,
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    })
               }


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                $('#modalupdate').modal('hide');
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


</script>
</body>
</html>