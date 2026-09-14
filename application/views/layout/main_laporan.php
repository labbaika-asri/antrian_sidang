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
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/flatpickr/flatpickr.css'); ?>">
    
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

<div id="modalpanggil" class="modal fade  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="display: none; ">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-body">
            <div id="modal_isi"></div>
        </div>
    </div>
</div>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?php echo base_url('assets/js/libs/jquery-3.1.1.min.js'); ?>"></script>
 <script src="<?php echo base_url('assets/plugins/flatpickr/flatpickr.js'); ?>"></script>
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
<script src="<?php echo base_url('assets/plugins/table/datatable/button-ext/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/table/datatable/button-ext/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/table/datatable/button-ext/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/table/datatable/button-ext/buttons.print.min.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {

        var tabel1=    $('#data-tabel').DataTable( {
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn' },
                    { extend: 'csv', className: 'btn' },
                    { extend: 'excel', className: 'btn' },
                    { extend: 'print', className: 'btn' }
                ]
            },
            responsive: true,
            "pageLength": 25
        } );


           var tabel2 =     $('#tblperkara').DataTable( {
            responsive: true,
            "pageLength": 1,
            "ordering": false,
            sDom: 'lrtip'
        } );
        $( '.tgl' ).flatpickr({
            dateFormat: "d-m-Y",
        });

        $("form").submit(function(e){
            var tglawal=$('#tgl_awal').val();
            var tglakhir=$('#tgl_akhir').val();
            if ((tglawal=='') || (tglakhir==''))  {
                Swal.fire({
                                icon: 'error',
                                text: 'Tanggal tidak boleh kosong',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            });
                            e.preventDefault(e);
            }
               
            });

    } );

    function formatDate(date) {
        var year = date.getFullYear().toString();
        var month = (date.getMonth() + 101).toString().substring(1);
        var day = (date.getDate() + 100).toString().substring(1);
        return year + "-" + month + "-" + day;
    }


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


    $(".cetak_lap_antrian").click(function() {
        var ver_php="<?php echo $this->session->userdata('ver_php'); ?>";
        var php_ver="<?php echo $this->session->userdata('php_ver'); ?>";
        if (ver_php==0) {
            Swal.fire({
                icon: 'warning',
                html: 'Mohon maaf versi php server ini <b>'+php_ver+'</b><br> Untuk mencetak template Jurnal dibutuhkan versi PHP minimal <b>5.6.0</b> <br><b>Silahkan hubungi admin IT</b> <br> silahkan cetak nya pakai fasilitas tombol print atau tombol excel',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            });
            return;
        } else {
            var tglawal = $('#tgl_awal').val();
            var tglakhir = $('#tgl_akhir').val();
            var ruang = $('#ruang').val();
            $.ajax({
                url: '<?php echo base_url('laporan/bikin_laporan'); ?>',
                type: 'post',
                dataType: 'JSON',
                data: {tgl_awal: tglawal, tgl_akhir: tglakhir, ruang_sidang: ruang},
                success: function (data) {
                    if (data.nama_file != 0) {
                        window.location = "<?php echo base_url(); ?>" + "/" + data.nama_file;
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil dibuat/download laporan antrian',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Tidak ada data antrian tanggal dipilih',
                            showConfirmButton: false,
                            timer: 3000
                        })

                    }

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        html: 'Ada error cetak laporan antrian <br>' + errorThrown + '<br> Jika versi PHP nya belum 5.6 cetak nya pakai tombol print atau tombol excel',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    })
                }
            });
        }
   });


    $(".cetak_jurnal_sidang").click(function() {

        var ver_php="<?php echo $this->session->userdata('ver_php'); ?>";
        var php_ver="<?php echo $this->session->userdata('php_ver'); ?>";
        if (ver_php==0) {
            Swal.fire({
                icon: 'warning',
                html: 'Mohon maaf versi php server ini <b>'+php_ver+'</b><br> Untuk mencetak template Jurnal dibutuhkan versi PHP minimal <b>5.6.0</b> <br><b>Silahkan hubungi admin IT</b> <br> silahkan cetak nya pakai fasilitas tombol print atau tombol excel',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            });
            return;
        } else {
            var tglawal=$('#tgl_awal').val();
            var mjl=$('#majelis').val();
            $.ajax({
                url: '<?php echo base_url('laporan/cetak_jurnal'); ?>',
                type: 'post',
                dataType: 'JSON',
                data: {tgl_awal:tglawal,majelis:mjl},
                success: function(data){
                    if(data.nama_file!=0) {
                        window.location="<?php echo base_url(); ?>"+"/"+data.nama_file;
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil dibuat/download Jurnal Sidang',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Tidak ada data jurnal dengan tanggal dan majelis dipilih',
                            showConfirmButton: false,
                            timer: 3000
                        })

                    }

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    Swal.fire({
                        icon: 'error',
                        html: 'Ada error cetak laporan antrian <br>'+errorThrown+'<br> Jika versi PHP nya belum 5.6 cetak nya pakai tombol print atau tombol excel',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    })
                }
            });
        }


    });


   $(".proses_lap_antrian").click(function() {

        var tglawal=$('#tgl_awal').val();
        var tglakhir=$('#tgl_akhir').val();
        if ((tglawal=='') || (tglakhir==''))  {
            Swal.fire({
                            icon: 'error',
                            text: 'Tanggal tidak boleh kosong',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        });
                        exit;

        }
         
});


    $(".lihat_poto").click(function() {
        var noperkara = $(this).data("nomor_perkara");
        var tglsidang = $(this).data("tgl_sidang");
        $.ajax({
            url: '<?php echo base_url('main/lihat_photo'); ?>',
            type: 'post',
            data: {tgl_sidang:tglsidang,nomor_perkara:noperkara},
            success: function(response){
                $('#isi').html(response);
                $('#modal_poto').modal('show');
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
         } else {
             form='#form10';
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
    });

    function tambah_prioritas()
    {
        $.ajax({
            url: '<?php echo base_url('laporan/view_tambah_prioritas'); ?>',
            type: 'post',
            success: function(response){
                $('#isi_prioritas').html(response);
                $('#modalprioritas').modal('show');
                $('.modal-title').text('Tambah Prioritas');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error tambah / update data '+errorThrown);
            }
        });
    }


    function simpan_prioritas()
                {
                    if($("#antrian_prioritas").val()=="0"){
                        Swal.fire({
                            icon: "error",
                            text: "Antrian belum dipilih",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "OK"
                        })
                        return;
                    }
                    var ket=$("#ket").val();
                    if(ket.replace(/\s+/g, "")==""){
                        Swal.fire({
                            icon: "error",
                            text: "Keterangan prioritas belum diisi",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "OK"
                        })
                        return;
                    }

                    $.ajax({
                        url: "<?php echo base_url("laporan/simpan_prioritas");?>",
                        type: "POST",
                        data: $("#form_prioritas").serialize(),
                        success: function(data)
                        {
                            $("#modalprioritas").modal("hide");
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Data telah tersimpan",
                                showConfirmButton: false,
                                timer: 1500
                            })
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert("error: " + textStatus); alert("Error: " + errorThrown);
                        }
                    });
                    
                }

                $(".hapus_prioritas").click(function() {
                    var tgl = $(this).data('tgl');
                    var antrian= $(this).data('antrian');
                    swal.fire({
                        title: 'Konfirmasi',
                        text: 'Yakin akan menghapus prioritas atrian '+antrian,
                        type: 'warning',
                        buttons: true,
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ya, Hapus!",
                        closeOnConfirm: false
                    }).then(function(yes) {
                        if (yes) {
                            $.ajax({
                                url: '<?php echo base_url('laporan/hapus_prioritas'); ?>',
                                type: 'POST',
                                data: {'tgl':tgl,'antrian':antrian},
                                success: function (data) {
                                    location.reload();
                                }
                            });
                        }
                        else {
                            return false;
                        }
        });
    });
             
                  
</script>
</body>
</html>