<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ANTRIAN</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/jm/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url('assets/jm/css/mdb.min.css'); ?>" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?php echo base_url('assets/jm/css/style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/antrian/css/jumbotron-narrow-monitoring.css"'); ?>" rel="stylesheet">
  <script src="<?php echo base_url('assets/jm/jquery.bootstrap.newsbox.min.js');?>" type="text/javascript"></script>
</head>

<body style="width:100%">
<style>
#table_scroll,#table_scroll_pid {
  width: 100%;
  margin-top: 10px;
  margin-bottom: 10px;
  border-collapse: collapse;
}

.th { font: bold 20px "Century Gothic", Century Gothic, Geneva, AppleGothic, sans-serif; color: black; font-weight: bold; color: #EEEEEE; border-right: 1px solid #C1DAD7; border-bottom: 1px solid #C1DAD7; border-top: 1px solid #C1DAD7; letter-spacing: 2px; text-transform: uppercase; text-align: center; padding: 5px 5px 5px 5px; background: green; }
.td { font: bold 18px "Century Gothic", Century Gothic, Geneva, AppleGothic, sans-serif; color: black; border-right: 0.1em solid #C1DAD7; border-bottom: 0.1em solid #C1DAD7; border-left: 0.1em solid #C1DAD7; border-top: 0.1em solid #C1DAD7; padding: 6px 6px 6px 6px; }
  	.content {
    width:100%;
    height; 100%;
		padding-top:10px;
    padding-right:10px;
  padding-bottom:10px;
	}
  .atas {
		background-color:#B81015;
    width:100%;
    height: 100%;
		padding-top:25px;
    padding-left:25px;
    padding-right:25px;
		padding-bottom:0px;
	}
  .footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 100px;
      padding-top:25px;
      padding-left:25px;
      padding-right:25px;
      padding-bottom:25px;
      background-color:#B81015;
      color:#fff;
  }
</style>  
 <section class="atas">
   <div class="row">
     <div class="col-lg-12">
     <div align="center"><h2><font color="#ffff">ANTRIAN SIDANG <?php echo strtoupper($tanggal) ?><BR><?php echo $satker; ?><font></h2></div>
    </div> 
   </div> 
</section>
  <section class="content">
  <div class="row">
    <div class="col-md-6">
     <div class="card" style="min-height: 450px;">
        <div class="card-body">
            <?php
    if ($daftar_sidang->num_rows() > 0) {
       echo '<marquee direction="down" scrolldelay="100" height="450px" loop="infinite">';
       $i=1;
         echo"<ul class='jadwal'>";
         foreach ($daftar_sidang->result() as $row) {
          echo "<li class='news-item'>";
           echo "<table cellspacing='0' align='center' border='1' id='table_scroll_pid'>";
           echo "<tr>";
           echo "<td class='td' style='width:5%;vertical-align:top;' rowspan='6' align='center'>".$i++."</td>";
           echo "<td class='td' style='width:25%;vertical-align:top;''>NO PERKARA</td>";
           echo "<td class='td' style='width:70%; color:red;'>".$row->nomor_perkara."</td>";
           echo "</tr>";
           echo "<tr>";
           echo "<td class='td' style='width:25%;vertical-align:top;''>JENIS PERKARA</td>";
           echo "<td class='td' style='width:70%;'>".$row->jenis_perkara_text."</td>";
           echo "</tr>";
           echo "<tr>";
           echo "<td class='td' style='width:25%;vertical-align:top;'>MAJELIS</td>";
           echo "<td class='td' style='width:70%;'>".$row->majelis."</td>";
           echo "</tr>";
           echo "<tr>";
           echo "<td class='td' style='width:25%;vertical-align:top;'>PIHAK</td>";
           echo "<td class='td' style='width:70%;'>".$row->p."</td>";
           echo "</tr>";
           echo "<tr>";
           echo "<td class='td' style='width:25%;vertical-align:top;''>AGENDA SIDANG</td>";
           echo "<td class='td' style='width:70%;'>".$row->agenda."</td>";
           echo "</tr>";
           echo "<tr>";
           echo "<td class='td' style='width:25%;vertical-align:top;''>RUANG SIDANG</td>";
           echo "<td class='td' style='width:70%;'>2</td>";
           echo "</tr>";
           echo "</table>";
           echo "</li>";
         }

         echo '</marquee>';

    } else {

        echo " TIDAK ADA SIDANG HARI INI";


    }



   ?>
        </div>
     </div>
    </div>
    <div class="col-md-6">
       <div class="row display_ruang">
       </div>
    </div>
  </div>
  </section>
    <footer class="footer text-white">
        <div class="container">
        </div>
    </footer>

  <script type="text/javascript" src="<?php echo base_url('assets/jm/js/jquery-3.4.1.min.js');?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url('assets/jm/js/popper.min.js');?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('assets/jm/js/bootstrap.min.js');?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('assets/jm/js/mdb.min.js');?>"></script>
</body>
<script type="text/javascript">
	$("document").ready(function(){
		var ruang=0;
		setInterval(function() {
			$.post("<?php echo base_url('check_antrian');?>",function(data){

				if(ruang!=data['jumlah_ruang']){
					$(".col-xl").remove();
					  ruang=0;
				}
				if (ruang==0) {
					for (var i = 1; i<= data['jumlah_ruang']; i++) {
						
						display_ruang =' <div class="col-xl"> '+
								'<div class="card card-cascade narrower"> '+
								'<div class="view view-cascade gradient-card-header light-blue lighten-1"> '+
								'<h4 class="card-header-title">R.Sidang <br>'+i+' </h4> '+
								'<div class="text-center"> '+
								'</div>'+
									'</div>'+
									'<div class="card-body card-body-cascade text-center '+i+'">'+
									'<p class="card-text"><h1 style="font-size: 150px; font-weight: bold; color: black">'+data["posisi_antrian"][i]+'<h1></p>'+
                                    '<p class="card-text"><small><b>2935/Pdt.G/2018</b></small></p>'+
									'</div>'+
									'</div>'+
									'</div>';
                        $(".display_ruang").append(display_ruang);
					} 
					  ruang= data['jumlah_ruang'];
				}

                for (var i = 1; i <= data['jumlah_ruang']; i++) {
                    if (data["counter"]==i) {
                        $("."+i+" h1").html(data["next"]);
                    }
                }
                if (data["next"]) {
                    var angka = data["next"];
                    for (var i = 0 ; i < angka.toString().length; i++) {
                        $(".audio").append('<audio id="suarabel'+i+'" src="../audio/new/'+angka.toString().substr(i,1)+'.MP3" ></audio>');
                    };
                    mulai(data["next"],data["counter"]);
                }else{
                    for (var i = 1; i <= data['jumlah_ruang']; i++) {
                        if (data["counter"]==i) {
                            $("."+i+" h1").html(data["next"]);
                        }
                    }
                }


			}, "json"); 
		}, 1000);
		//change
	    });
	</script>
</html>