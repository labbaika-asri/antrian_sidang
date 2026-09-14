<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Display Antrian</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/jm/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url('assets/jm/css/mdb.min.css'); ?>" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?php echo base_url('assets/jm/css/style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/antrian/css/jumbotron-narrow-monitoring.css"'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/jm/jquery.bootstrap.newsbox.js');?>" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Tinos&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<style>
    body{
        font-family: 'Ubuntu', sans-serif !important;
        width: 100%;
        overflow: hidden;
        background-color: black;
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
        height: 105px;
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

</style>
<body>

<!-- MULAI -->
<!--header -->
<section class="atas">
    <div class="row">
        <div class="col-lg-1 text-center">
            <div style="height: 80px; text-align: center;">
                <img style="max-width: 100%; max-height: 100%; margin-left: 20px;" src="<?php echo base_url('assets/logopa.png');?>">
            </div>
        </div>
        <div class="col-lg-11">
            <div>
                <h1><?php echo $satker; ?></h1>
                <div style="margin-top: -15px; font-size: 24px;"><strong>Antrian Sidang <?php echo ($tanggal) ?></strong></div>
            </div>
        </div>
    </div>
    <div class="row" style="background-color: #FF9900; height: 10px; margin-top: 10px">
        &nbsp;
    </div>
</section>
<!--isi -->
<section class="content">
    <div class="row">
    <div class="col-lg-5" style="margin-top:20px">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <!-- <div class="card"> -->
                  <div class="card-body">
                      <div class="row">
                              <div class="col">
                                  <div class="card card-cascade narrower">
                                      <div class="view view-cascade gradient-card-header lighten-2" style="padding: 5px 0px 0px 0px; background-color:#057050;">
                                          <div class="row">
                                              <div class="col-sm-4">
                                                  <h4 style="margin-right: -15px;font-size:70px;">LOKET</h4>
                                              </div>
                                              <div class="col-sm-8" style="background-color: orange; color: black; text-align: left;">
                                                  <h4 style="font-weight: bolder;font-size:70px;font-family: 'Arial Black'"><center><?php echo "1";?></center></h4>
                                              </div>
                                          </div>
                                          <hr style="border: solid orange 2px; margin: 0px;">
                                      </div>
                                      <div class="card-body card-body-cascade text-center">
                                          <p style="margin: 0px;margin-top:-70px;font-size:500px; font-weight: bold; font-family: 'Arial Black'; color: darkred" id="no-antrian"><?php echo "A2"; ?></p>
                                            <span style="margin-top:-200px;font-size:50px; font-weight: bold; font-family: 'Arial Black'; color: darkred;" class="badge rounded-pill bg-info text-dark" id="pg">Dipanggil</span>    
                                           <span style="margin-top:-200px;font-size:50px; font-weight: bold; font-family: 'Arial Black'; color: darkred; display:none" class="badge rounded-pill bg-warning text-dark" id="prioritas">Prioritas</span>
                                        </div>
                                  </div>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <!-- <div class="card"> -->
                  <div class="card-body">
                      <div class="row">
                              <div class="col">
                                  <div class="card card-cascade narrower">
                                      <div class="card-body card-body-cascade text-center">
                                      <div class="embed-responsive embed-responsive-16by9 muted autoplay loop">
                                      <iframe width="1440" height="646" src="https://www.youtube.com/embed/RsN8zaYpkVw" title="VIDEO ALUR BERPERKARA DI PENGADILAN AGAMA CIAMIS" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                  </div>
                                     </div>
                                  </div>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="margin-left: 20px">
            <div class="card" style="padding-right: 10px;background-color:black">
                <div class="card-body" style="height: 100%; padding-top: 10px; padding-bottom: 20px; padding-right: 10px">
                    <div class="row">
                        <?php
                        $r=0;
                        foreach ($ruang_sidang->result() as $rows):
                        ?>
                            <div class="col">
                                <div class="card card-cascade narrower">
                                    <div class="view view-cascade gradient-card-header lighten-2" style="padding: 5px 0px 0px 0px; background-color:orangered;">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h5 style="margin-right: -15px;">R. SIDANG<br><?php echo $rows->nama ?></h5>
                                            </div>
                                        </div>
                                        <hr style="border: solid orange 2px; margin: 0px;">
                                    </div>
                                    <div class="card-body card-body-cascade text-center '+i+'">
                                        <p style="margin: 0px; font-weight: bold;">Nomor Antrian</p>
                                        <p class="card-text" style="font-size: 40px; font-weight: bold; color: black; margin: -13px;" id="no-antrians-<?php echo $r ?>">'-'</p>
                                        <hr style="margin: 0px; border: solid 1px orange;">
                                        <p style="margin: 0px; font-weight: bold;">Nomor Perkara</p>
                                        <p class="card-text" style="font-size: 20px; font-weight: bold; color: #057050; margin: -10px;" id="no-perkaras-<?php echo $r ?>">----</p>
                                        <p class="card-text" style="font-size: 12px; color: black; margin: -10px;" id="no-perkaras2-<?php echo $r ?>">/----/----</p>
                                        <hr style="margin: 10px; border: solid 1px orange;">
                                        <p class="card-text blink" style="font-size: 20px; color: red; margin: -10px;" id="status2-<?php echo $r ?>">&nbsp;</p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $r++;
                        endforeach ?>
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
            w.postMessage({'link': '<?php echo base_url() ?>display/update_display'});
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
            y.postMessage({'link': '<?php echo base_url() ?>display/update_status'});
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
            z.postMessage({'link': '<?php echo base_url() ?>display/update_status2'});
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