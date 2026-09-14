<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Display Antrian PTSP</title>
    <link href="<?php echo base_url('assets/jm/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url('assets/jm/css/mdb.min.css'); ?>" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?php echo base_url('assets/jm/css/style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/antrian/css/jumbotron-narrow-monitoring.css"'); ?>" rel="stylesheet">
</head>
<style>
    body{
        font-family: 'Ubuntu', sans-serif !important;
        width: 100%;
        overflow: hidden;
        /*background-image: url("<?php echo base_url('assets/gedung.jpg');?>");
      background-size: 100%;*/

    }
    .modal-header-danger {
        color:#fff;
        padding:9px 15px;
        border-bottom:1px solid #eee;
        background-color: #d9534f;
        -webkit-border-top-left-radius: 5px;
        -webkit-border-top-right-radius: 5px;
        -moz-border-radius-topleft: 5px;
        -moz-border-radius-topright: 5px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    h1,h2,p,a{
        /*font-family: sans-serif;*/
        font-weight: normal;
    }

    h4{
        font-weight: bold;
    }

    .jam-digital-malasngoding {
        overflow: hidden;
        width: 330px;
        margin: 20px auto;
        border: 5px solid #efefef;
    }
    .kotak{
        float: left;
        width: 110px;
        height: 100px;
        background-color: #189fff;
    }
    .jam-digital-malasngoding p {
        color: #fff;
        font-size: 36px;
        text-align: center;
        margin-top: 30px;
    }
    #table_scroll,#table_scroll_pid {
        width: 100%;
        margin-top: 10px;
        margin-bottom: 10px;
        border-collapse: collapse;
    }

    .th {
        font-family: 'Open Sans', sans-serif; font-size: 18px; color: black; font-weight: bold; color: #EEEEEE; border-right: 1px solid #C1DAD7; border-bottom: 1px solid #C1DAD7; border-top: 1px solid #C1DAD7; letter-spacing: 2px; text-transform: uppercase; text-align: center; padding: 5px 5px 5px 5px; background: green;
    }
    .td {
        font-family: 'Open Sans', sans-serif; font-size: 18px; color: black; border-right: none; border-bottom: 1px solid #C1DAD7; border-left: none; border-top: none; padding: 6px 6px 6px 6px;
    }
    .content {
        width:100%;
        height: 100%;
        padding-top:10px;
        padding-right:10px;
        padding-bottom:10px;
    }
    .atas {
        background-color:#057050;
        color:#FFFFFF;
        width:100%;
        height: 125px;
        padding-top:10px;
        /*padding-left:25px;
        padding-right:25px;*/
        padding-bottom:10px;
        margin-bottom: 10px;
    }
    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 40px;
        padding: 0px;
        background-color: #057050;
        color:#fff;
    }
    .tengah {
        position: fixed;
        top: 50%;
        left: 50%;
        margin-top: -230px;
        margin-left: -50px;
    }
</style>
<body>

<!-- MULAI -->
<!--header -->
<section class="atas">
    <div class="row">
        <div class="col-lg-1 text-center">
            <div style="height: 105px; text-align: center;">
                <img style="max-width: 100%; max-height: 100%; margin-left: 20px;" src="<?php echo base_url('assets/logopn.png');?>">
            </div>
        </div>
        <div class="col-lg-11">
            <div>
                <span style="font-size:50px;font-weight: bold">PENGADILAN AGAMA SOREANG</span>
                <div style="margin-top: -15px; font-size: 24px;"><strong>Antrian SIDANG <?php echo ($tanggal) ?></strong></div>
            </div>
        </div>
    </div>
    <div class="row" style="background-color: #FF9900; height: 10px; margin-top: 10px">&nbsp;
    </div>
</section>
<!--isi -->
<section class="content">
    <!-- baris pertama -->
    <div class="row">
        <div class="col-lg-6">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <!-- <div class="card"> -->
                  <div class="card-body">
                      <div class="row">
                              <div class="col">
                                  <div class="card card-cascade narrower">
                                      <div class="view view-cascade gradient-card-header lighten-2" style="padding: 5px 0px 0px 0px; background-color:#057050;">
                                          <div class="row">
                                              <div class="col-sm-8">
                                                  <h4 style="margin-right: 3px;font-size:50px;">RUANG SIDANG</h4>
                                              </div>
                                              <div class="col-sm-4" style="background-color: orange; color: black; text-align: left;">
                                                  <h4 style="font-weight: bolder;font-size:70px;font-family: 'Arial Black'"><center><?php echo $ruang_sidang; ?></center></h4>
                                              </div>
                                          </div>
                                          <hr style="border: solid orange 2px; margin: 0px;">
                                      </div>
                                      <div class="card-body card-body-cascade text-center '+i+'">
                                          <p style="margin: 0px;margin-top:-20px;font-size:480px; font-weight: bold; font-family: 'Arial Black'; color: darkred" id="no-antrian-<?php echo $ruang_sidang_id; ?>">A-5</p>
                                      </div>
                                  </div>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <!-- <div class="card"> -->
                  <div class="card-body">
                      <div class="row">
                              <div class="col">
                                  <div class="card card-cascade narrower">
                                      <div class="view view-cascade gradient-card-header lighten-2" style="padding: 5px 0px 0px 0px; background-color:#057050;">
                                          <div class="row">
                                              <div class="col-sm-8">
                                                  <h4 style="margin-right: 3px;font-size:50px;">DISKORS/DILEWAT</h4>
                                              </div>
                                              <div class="col-sm-4" style="background-color: orange; color: black; text-align: left;">
                                                  <h4 style="font-weight: bolder;font-size:70px;font-family: 'Arial Black'"><center>1</center></h4>
                                              </div>
                                          </div>
                                          <hr style="border: solid orange 2px; margin: 0px;">
                                      </div>
                                      <div class="card-body card-body-cascade text-center '+i+'">
                                          <p style="margin: 0px;margin-top:-20px;font-size:480px; font-weight: bold; font-family: 'Arial Black'; color: darkred" id="no-antrian-<?php echo "1"; ?>">A-5</p>
                                      </div>
                                  </div>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>


    </div>    
</section>

<footer class="footer">
    <div class="row">
        <div class="col-lg-12" style="background-color: #FF9900; height: 5px;">
            &nbsp;
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">

            <marquee direction="left" scrollamount="10" width="100%">
                <p style="font-size: 22px; font-style: italic; color: white; margin-top: -2px;"><?php echo $runningteks; ?> </p>
            </marquee>

        </div>
        <div class="col-md-2">
            <center>
                <div id="myClockDisplay" style="font-size:25px; border:0px solid #000;">
                </div>
            </center>
        </div>
    </div>
</footer>

<script type="text/javascript" src="<?php echo base_url('assets/jm/js/jquery-3.4.1.min.js');?>"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?php echo base_url('assets/jm/js/popper.min.js');?>"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo base_url('assets/jm/js/bootstrap.min.js');?>"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo base_url('assets/jm/js/mdb.min.js');?>"></script>


<script  type="text/javascript">

    function startWorker() {
        var w,y,z;
        if(typeof(Worker) !== "undefined") {
            if(typeof(w) == "undefined") {
                w = new Worker("<?php echo base_url() ?>assets/js/__display_status.js");
            }
            w.postMessage({'link': '<?php echo base_url() ?>display/update_display_ruang/<?php echo $ruang_sidang_id; ?>'});
            w.onmessage = function(event) {
                var arr_status = event.data;
                $(jQuery.parseJSON(JSON.stringify(arr_status))).each(function() {
                    if(this.hasil==1) {
                        var perkara = this.nomor_perkara;
                        var ruang_sidang = this.ruang_sidang;
                        var ruangan_id = this.ruangan_id;
                        var no_antrian = this.no_antrian;
                        var no_antrian_cetak = this.no_antrian_cetak;
                        var dilewat =this.dilewat;
                        var st_pgl = this.status_panggilan;
                        var datas = this.hasil;
                        var suara = this.suara;
                        pecah = perkara.split("/");
                        hasil = pecah[0] + pecah[1] + pecah[2] + pecah[3];
                        no_perk = pecah[0];
                        jenis_perk = pecah[1];
                        thn_perk = pecah[2];
                        kode_pa=pecah[3];
                        noantrian=no_antrian_cetak;
                        if(st_pgl==0) {
                            $('#modal_isi').html("<span style='font-size:50px'>"+suara.replace(/!/g,'')+"</span>");
                            $('#modalpanggil').modal('show');
                        } else {
                            $('#modalpanggil').modal('hide');
                        }
                    } else {
                        $('#modalpanggil').modal('hide');
                    }



                });
            };
            if(typeof(y) == "undefined") {
                y = new Worker("<?php echo base_url() ?>assets/js/__display_status.js");
            }
            y.postMessage({'link': '<?php echo base_url() ?>display/update_status_ruang/<?php echo $ruang_sidang_id; ?>'});
            y.onmessage = function (event) {
                var arr_status = event.data
                $(jQuery.parseJSON(JSON.stringify(arr_status))).each(function() {
                    var ruang_sidang = this.ruang;
                    var ruangan_id = this.ruangan_id;
                    var urutan = this.urutan;
                    var perkara = this.nomor_perkara;
                    var no_antrian = this.no_antrian;
                    var no_antrian_cetak = this.no_antrian_cetak;
                    var prioritas = this.prioritas;
                    var status = this.status_ruang;
                    var st_pgl = this.status_panggilan;
                    var dilewat =this.dilewat;
                    pecah = perkara.split("/");
                    hasil = pecah[0] + pecah[1] + pecah[2] + pecah[3];
                    no_perk = pecah[0];
                    jenis_perk = pecah[1];
                    thn_perk = pecah[2];
                    kode_pa=pecah[3];
                    noantrian=no_antrian_cetak;

                    $("#no-antrian-"+urutan).text(noantrian);
                    if(prioritas==1) {
                        $("#prioritas-"+urutan).show();
                        $("#prioritas-"+urutan).html("<span class='badge-pill badge-danger'>PRIORITAS</span>");
                    } else {
                        $("#prioritas-"+urutan).hide();
                    }
                    $("#no-perkara-"+urutan).text(no_perk);
                    $("#no-perkara2-"+urutan).text('/'+jenis_perk+'/'+thn_perk+'/'+kode_pa);
                    $("#status-"+urutan).text(status);
                    if(status==4) {
                        $("#status-"+urutan).fadeOut(500);
                        $("#status-"+urutan).fadeIn(500);
                    }
                });
            }
            if(typeof(z) == "undefined") {
                z = new Worker("<?php echo base_url() ?>assets/js/__display_status.js");
            }
            z.postMessage({'link': '<?php echo base_url() ?>display/update_status2_ruang/<?php echo $ruang_sidang_id; ?>'});
            z.onmessage = function (event) {
                var arr_status2 = event.data
                $(jQuery.parseJSON(JSON.stringify(arr_status2))).each(function() {
                    var ruang_sidang = this.ruang;
                    var ruangan_id = this.ruangan_id;
                    var urutan = this.urutan;
                    var perkara = this.nomor_perkara;
                    var no_antrian = this.no_antrian;
                    var no_antrian_cetak = this.no_antrian_cetak;
                    var status = this.status_ruang;
                    var st_pgl = this.status_panggilan;
                    var dilewat =this.dilewat;
                    pecah = perkara.split("/");
                    hasil = pecah[0] + pecah[1] + pecah[2] + pecah[3];
                    no_perk = pecah[0];
                    jenis_perk = pecah[1];
                    thn_perk = pecah[2];
                    kode_pa=pecah[3];
                    noantrian=no_antrian_cetak;
                    $("#no-antrians-"+urutan).text(noantrian);
                    $("#no-perkaras-"+urutan).text(no_perk);
                    $("#no-perkaras2-"+urutan).text('/'+jenis_perk+'/'+thn_perk+'/'+kode_pa);
                    $("#status2-"+urutan).text(status);
                    if(status==4) {
                        $("#status2-"+urutan).fadeOut(500);
                        $("#status2-"+urutan).fadeIn(500);
                    }
                });
            }

        } else {
            alert("Sorry, your browser does not support Web Workers");
        }
    }
    startWorker();
</script>
<div id="modalpanggil" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="display: none; ">
    <div class="modal-dialog  modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <h1><i class="glyphicon glyphicon-thumbs-up"></i>SEDANG MEMANGGIL</h1>
            </div>
            <div class="modal-body">
                <div id="modal_isi"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>