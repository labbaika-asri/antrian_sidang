<?php
//echo"<pre>";
//print_r($this->session->all_userdata());exit;
?>
<div class="row layout-top-spacing" id="cancel-row">        
 <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="page-title-box">
            
        <?php
         if ($this->session->userdata('kewenangan')<>1) {
                ?>
                <h5 class="text-danger">RUANG SIDANG <?php echo strtoupper($this->session->userdata('ruang_sidang'));?></h5>
                <?php
            } else {
                $ruangsidang=0;
            }
            ?>

            <h5><strong>Daftar Perkara Yang Sidang <?php echo $tanggal_indo ?></strong></h5>
            <?php
            function hoursandmins($time, $format = '%02d:%02d')
            {
                if ($time < 1) {
                    return;
                }
                $hours = floor($time / 60);
                $minutes = ($time % 60);
                return sprintf($format, $hours, $minutes);
            }

            if ($daftar_sidang->num_rows() > 0) {
                $dur=0;
                $i=0;
                foreach ($daftar_sidang->result() as $row) {
                    if($row->ruangan_id==$this->session->userdata('ruangan_id')) {
                        $dur=$dur+$row->durasi;
                        $i++;
                    }
                }
                $dur=hoursandmins($dur, '%02d Jam, %02d menit');
                if($dur=='') {
                    $dur=" 0 menit";
                }
                if($durasi==1) {
                    echo "<h5>Total perkiraan durasi persidangan ".$i." perkara : ".$dur."</h5>";
                } else {
                    echo "<h5>Total perkara disidang  ".$i." perkara";
                }

            } else {
              if($durasi==1) {
                echo "<h5>Total perkiraaan durasi persidangan 0 menit</h5>";

              } else {
                    echo "<h5>Total perkara perkara disidang= 0";
              }
            }
            echo"<h5><b>Sekarang ".$tanggal_sekarang."</b></h5>";
            echo "<hr>";
            $jumlah_perkara= $daftar_sidang->num_rows();
            ?>
        </div>
    </div>
</div>

<div class="row">
<div class="col-xl-12 col-lg-12 col-sm-12 ">
    <?php
    echo "<button class='btn btn-info mb-4 mr-2 anti_gratifikasi'  $display>Text Anti Gratifikasi</button>";
    echo "<button class='btn btn-info mb-4 mr-2  panggil_non_sidang' data-jenis=1 $display><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-volume-2'><polygon points='11 5 6 9 2 9 2 15 6 15 11 19 11 5'></polygon><path d='M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07'></path></svg> Pengumuman Mulai Persidangan</button>";
    echo "<button class='btn btn-info mb-4 mr-2  panggil_non_sidang' data-jenis=2 $display><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-volume-2'><polygon points='11 5 6 9 2 9 2 15 6 15 11 19 11 5'></polygon><path d='M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07'></path></svg> Pengumuman Sidang Diskors Isoma</button>";
    echo "<button class='btn btn-info mb-4 mr-2 panggil_non_sidang' data-jenis=3 $display><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-volume-2'><polygon points='11 5 6 9 2 9 2 15 6 15 11 19 11 5'></polygon><path d='M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07'></path></svg> Pengumuman Sidang Dimulai Kembali</button>";
    echo "<button class='btn btn-info mb-4 mr-2 panggil_non_sidang' data-jenis=4 $display><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-volume-2'><polygon points='11 5 6 9 2 9 2 15 6 15 11 19 11 5'></polygon><path d='M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07'></path></svg> Pengumuman Persidangan selesai</button>";
    echo "<button class='btn btn-warning mb-4 mr-2  panggil_non_sidang' data-jenis=5 $display><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-volume-2'><polygon points='11 5 6 9 2 9 2 15 6 15 11 19 11 5'></polygon><path d='M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07'></path></svg> Panggil Petugas</button>";
    echo "<button class='btn btn-danger mb-4 mr-2  panggil_saksi' data-pihak='P'  data-noperk='".encrypt_url($noperk_dipanggil)."' $display><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-volume-2'><polygon points='11 5 6 9 2 9 2 15 6 15 11 19 11 5'></polygon><path d='M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07'></path></svg> Panggil Saksi P</button>";
    echo "<button class='btn btn-danger mb-4 mr-2  panggil_saksi' data-pihak='T'  data-noperk='".encrypt_url($noperk_dipanggil)."' $display><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-volume-2'><polygon points='11 5 6 9 2 9 2 15 6 15 11 19 11 5'></polygon><path d='M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07'></path></svg> Panggil Saksi T</button>";
    echo" <button type='button' class='btn btn-success  mb-4 jurnal_sidang' id='jurnal' >Jurnal Sidang</button>";
    echo" <button type='button' class='btn btn-secondary  mb-4 ' id='refresh_sidang' >Refresh</button>";

    ?>
    <div class="alert alert-arrow-right alert-icon-right alert-light-danger mb-12"
         role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" data-dismiss="alert" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
        <strong>Perhatian!</strong>, pastikan daftar nomor perkara yang akan disidangkan dibawah ini sama semua di ruang sidang <?php echo $this->session->userdata('ruang_sidang'); ?> , kalau ada yang  tidak sama dan itu sidang di ruang yanng berbeda, abaikan. akan tetapi jika itu seharusya sidang di ruang ini, edit/perbaiki ruang sidangnya di SIPP
    </div>
</div>
</div>


<div  class="row layout-top-spacing" class="cancel-row" >
<div class="col-xl-12 col-lg-12 col-sm-12 ">
    <div id="kotak1" class="widget-content-area br-4" <?php echo $display ?>>
    <div class="table-responsive">
            <table id="tabel-antrian" class="table table-bordered table-hover table-striped mb-4">
                <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Nomor Perkara</th>
                     <th>Antrian</th>
                     <th>Sidang</th>
                   <?php if($this->session->userdata("jenis_pengadilan")==4) {
                    echo'<th>Proses</th>';
                    }?>
                    <th>Status</th>
                    <th>Total Perkara</th>
                    <th>Total Antrian <br> Yang telah diambil</th>
                    <th>Antrian<br>Belum Dipanggil</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(intval($no_dipanggil) > 0) {
                    $disabled='';
                    $prio=($prioritas==1?"<br><span class='badge-pill badge-danger'>prioritas</span>":"");
                    echo "<td style='vertical-align:top;' align='center'><font size='14px' style='color: blue;'><b>".$no_dipanggil_cetak."</b></font>$prio</td>";
                } else {
                    $disabled='disabled';
                    echo "<td style='vertical-align:top;' align='center'><font size='14px' style='color: red;'>
                        -</font>
                        </td>";
                }
                echo"<td align='center' style='vertical-align:top'><h4>$noperk_dipanggil</h4>$agenda<br><button class='btn-sm btn-primary jurnal_keu' data-perkara_id=$perkara_id data-nomor_perkara='".encrypt_url($noperk_dipanggil)."' data-nomor_perkaras='".$noperk_dipanggil."' $disabled>detil keuangan</button></td>";
                echo"
                    <td style='vertical-align:top' align='center'>
                        <div class='btn-group-vertical' role='group' aria-label='Basic example'>
                            <button type='button' class='btn btn-primary panggil_sidang'  data-no_antrian='".encrypt_url($no_dipanggil)."' data-no_antrian_cetak='".$no_dipanggil_cetak."' data-noperk='".encrypt_url($noperk_dipanggil)."' data-noperks='".$noperk_dipanggil."' data-tglsidang='".$this->uri->segment(3)."' data-ruang='".$ruangsidang."' data-ruangan_id=$ruangan_id data-dilewat=0 data-prioritas=$prioritas $disabled>Panggil</button>
                            <button type='button' class='btn btn-info panggil_sidang_asing'  data-no_antrian='".encrypt_url($no_dipanggil)."' data-no_antrian_cetak='".$no_dipanggil_cetak."' data-noperk='".encrypt_url($noperk_dipanggil)."' data-noperks='".$noperk_dipanggil."' data-tglsidang='".$this->uri->segment(3)."' data-ruang='".$ruangsidang."' data-ruangan_id=$ruangan_id data-dilewat=0 $disabled>Panggil Bhs Asing</button>
                            <button type='button' class='btn btn-danger lewati_sidang'   data-no_antrian='".encrypt_url($no_dipanggil)."' data-no_antrian_cetak='".$no_dipanggil_cetak."' data-noperk='".encrypt_url($noperk_dipanggil)."' data-tglsidang='".$this->uri->segment(3)."' data-ruang='".$ruangsidang."'  data-ruangan_id=$ruangan_id data-dilewat=0 $disabled>Skors/Lewati</button>
                        </div>
                    </td>";
                echo"
                    <td style='vertical-align:top;' align='center'>
                        <div class='btn-group-vertical' role='group' aria-label='Basic example'>
                            <button type='button' class='btn btn-success mulai_sidang'  data-no_antrian='".encrypt_url($no_dipanggil)."' data-noperk='".encrypt_url($noperk_dipanggil)."' data-noperks='".$noperk_dipanggil."' data-tglsidang='".$this->uri->segment(3)."' data-ruang='".$ruangsidang."' data-ruangan_id=$ruangan_id data-dilewat=0 $disabled >Mulai</button>
                              <button type='button' class='btn btn-danger selesai_sidang' data-no_antrian='".encrypt_url($no_dipanggil)."' data-noperk='".encrypt_url($noperk_dipanggil)."' data-noperks='".$noperk_dipanggil."' data-tglsidang='".$this->uri->segment(3)."' data-ruang='".$ruangsidang."' data-ruangan_id=$ruangan_id data-dilewat=0 $disabled >Selesai</button>
                          
                        </div>
                    </td>";
                 if($this->session->userdata("jenis_pengadilan")==40) {

                     echo" 
                    <td style='vertical-align:top;' align='center'>
                        <div class='btn-group-vertical' role='group' aria-label='Basic example'>
                            <button type='button' class='btn btn-success isi_tundaan'  data-no_antrian='".encrypt_url($no_dipanggil)."' data-noperk='".encrypt_url($noperk_dipanggil)."'  data-agenda='".$agenda."' data-pkrid='".$perkara_id."' data-tglsidang='".$this->uri->segment(3)."' data-ruang='".$ruangsidang."' data-jenisperk=$jenis_perkara data-alur=$alur_perkara data-majelis_kode=$majelis_kode data-majelis_nama='".$majelis_nama."' data-dilewat=0 $disabled>Tunda</button>
                            <button type='button' class='btn btn-danger isi_putusan' id='set_putus' data-no_antrian='".encrypt_url($no_dipanggil)."' data-noperk='".encrypt_url($noperk_dipanggil)."' data-agenda='".$agenda."' data-pkrid='".$perkara_id."'  data-tglsidang='".$this->uri->segment(3)."'  data-ruang=$ruangsidang data-jenisperk=$jenis_perkara data-alur=$alur_perkara data-majelis_kode=$majelis_kode data-majelis_nama='".$majelis_nama."' data-dilewat=0 $disabled >Putus</button>
                        </div> 
                    </td>";
                 }

                if($status_dipanggil==1) {
                    echo "<td align='center' style='vertical-align:top' ><span id='status_antrian'><b>SELESAI</b></span></td>";
                } else if ($status_dipanggil==2) {
                    echo "<td align='center' style='vertical-align:top'><span id='status_antrian'><b>LEWAT</b></span></td>";
                } else if ($status_dipanggil==3){
                    echo "<td align='center' style='vertical-align:top'><span id='status_antrian'><b>SIDANG<br>mulai:$jam_mulai</b></span></td>";
                } else if ($status_dipanggil==4) {
                    echo "<td align='center' style='vertical-align:top'><span id='status_antrian'><b>PANGGIL</b></span></td>";
                } else {
                    echo "<td align='center' style='vertical-align:top'><span id='status_antrian'><b>BELUM DIPANGGIL</b></span></td>";
                }
                echo "<td align='center'><font size='30px' style='color: orange;'> 
                       ".$i."
                         </font></td>";
                echo "<td align='center'><font size='30px' style='color: orange;'>".$jumlah_antrian."</font></td>";
                echo "<td align='center'><font size='30px' style='color: orange;'>".$sisa_antrian."</font></td>";
                ?>

                </tbody>
            </table>
      </div> 
                <table id="tabel-antrian" class="table table-striped">
                    <thead>
                    <tr align='center'>
                        <th>Antrian dilewat</th>
                        <th>Total Antrian<br>Dilewat/Diskors</th>
                        <th>Sisa Antrian<br>Dilewat Belum Selesai</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //$tgl=$this->session->userdata('tgl_sidang');
                  echo"
                    <tr style='vertical-align:top;' >
                    <td  align='center'>
                            <button type='button' class='btn btn-success' onclick=\"list_dilewat('$tgl_enc')\">Daftar antrian dilewat/diskors</button>
                    </td>";
                    echo "<td  align='center'><font size='30px' style='color: orange;'>".$jumlah_dilewat."</font></td>";
                    echo "<td  align='center'><font size='30px' style='color: orange;'>".$sisa_dilewat."</font></td>";
                    echo "</tr>";
                    ?>
                    </tbody>
                </table>
    </div>
    </div><!-- end col-->

<div class="row layout-top-spacing" class="cancel-row">              
        <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="widget-content-area">
         <div class="table-responsive">
                <table id="data-tabel" class="table table-striped">
                    <thead>
                    <tr>
                        <th class='text-center'>#</th>
                        <th >Nomor Perkara</th>
                        <th width="25%">Pihak</th>
                        <th width="30%">Majelis</th>
                        <th>Jenis Perkara</th>
                        <th>Agenda</th>
                        <?php if($alur_perkara<111) {
                          echo'<th>Relaas</th>';
                        }?>
                        <?php  if ($durasi==1) {
                             echo "<th>Durasi (menit)</th>";
                        }
                        ?>
                        <th>No. Antrian</th>
                        <th>R.Sidang</th>
                        <th>Mulai Sidang</th>
                        <th>Selesai Sidang</th>
                        <th>Status</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if ($daftar_sidang->num_rows() > 0) {
                        $no=1;
                        foreach ($daftar_sidang->result() as $row) {
                            $prio=($row->prioritas==1?"<br><span class='badge-pill badge-danger'>prioritas</span>":"");
                            echo "<tr>";
                            echo "<td style='text-align:middle; vertical-align:top'>".$no."</td>";
                            echo "<td style='vertical-align:top'>$row->nomor_perkara</td>";
                            $CI =& get_instance();
                            $CI->load->model('m_sidang','sidang');
                            $hadirs=$CI->sidang->kehadiran($row->nomor_perkara,$row->tanggal_sidang);
                            $cari=array('Penggugat','Tergugat','Pemohon','Termohon','Penuntut Umum','Terdakwa','Pelanggar','Turut','Intervensi');
                            $ganti=array('<b>Penggugat</b>','<b>Tergugat</b>','<b>Pemohon</b>','<b>Termohon</b>','<b>Penuntut Umum</b>','<b>Terdakwa</b>','<b>Pelanggar</b>','<b>Turut</b>','<b>Intervensi</b>');
                            $pihak=preg_replace('/[0-9.]+/', '', $row->pihak);
                            $pengacara=preg_replace('/[0-9.]+/', '', $row->pengacara);
                            $CI =& get_instance();
                            $CI->load->model('m_sidang','sidang');
                            $hadirs=$CI->sidang->kehadiran($row->nomor_perkara,$row->tanggal_sidang);
                            $total=$CI->sidang->total_kehadiran($row->perkara_id);
                            $persen=round(($hadirs/$total)*100,2);
                            $pkrid=encrypt_url($row->perkara_id);
                            $noperk=encrypt_url($row->nomor_perkara);
                            echo "<td style='vertical-align:top'>".str_replace($cari,$ganti,$pihak)." ".($row->pengacara<>''?"<br>$pengacara":'').($hadir==1?"<br><button type='button' class='btn-sm btn-info hadir' data-pkrid=$pkrid data-noperk='".$noperk."' data-noperks='".decrypt_url($noperk)."' data-tgl_sidang='".encrypt_url($row->tanggal_sidang)."'>Hadir <b>".$persen."%</b> [".$hadirs."/".$total."]</button>":"")."</td>";
                            echo "<td style='vertical-align:top'>".($this->session->userdata('iduser')==$row->iduser?$row->majelis:"<font color=red>".$row->majelis."</font>")."</td>";
                            echo "<td style='vertical-align:top'>$row->jenis_perkara_text</td>";
                            echo "<td style='vertical-align:top'>$row->agenda</td>";
                            if ($alur_perkara < 111) {
                                echo "<td style='vertical-align:top'>$row->jurusita<br> <button type='button' class='btn-sm btn-warning relaas' data-noperk='".$row->nomor_perkara."'   data-tgl_sidang='".$row->tgl_sidang."'  data-perkara_id=$row->perkara_id>relaas</button></td>";
                            }

                            if  ($this->session->userdata('kewenangan')==1) {
                                if($durasi==1) {
                                    if(is_null($row->durasi) or $row->durasi=='') {
                                        echo "<td style='vertical-align:top'>-</td>";
                                    } else {
                                        echo "<td style='vertical-align:top'>$row->durasi</td>";
                                    }
                                }

                                echo "<td style='vertical-align:top'>$row->no_antrian_cetak</td>";
                                echo "<td style='vertical-align:top'>$row->slot</td>";
                                echo "<td style='vertical-align:top'>-</td>";
                            } else {
                                if($durasi==1) {

                                    if(is_null($row->durasi) or $row->durasi=='') {
                                        echo "<td style='text-align:middle; vertical-align:top'><button type='button' class='btn btn-primary btn-rounded waves-effect waves-light durasi' pkrid=$row->perkara_id tglsidang='".$this->uri->segment(3)."' ruang='".$ruangsidang."' id='tb".$no."'>Durasi</button></td>";
                                    } else {
                                        echo "<td style='text-align:middle; vertical-align:top'><span class='badge-pill badge-danger' style='font-size:20px'>$row->durasi</span><button type='button' class='btn btn-primary btn-rounded btn-sm waves-effect waves-light edit_durasi pull-right' pkrid=$row->perkara_id tglsidang='".$this->uri->segment(3)."' ruang=$ruangsidang durasi=$row->durasi id='tb".$no."'>Edit</button></td>";
                                    }

                                }

                                if($row->no_antrian<>'' and $row->no_antrian<>'-') {
                                    echo "<td style='text-align:middle; vertical-align:top'><span class='badge-pill badge-danger' style='font-size:20px'>".$row->no_antrian_cetak."</span></td>";
                                } else {
                                    echo "<td style='text-align:middle; vertical-align:top'>$row->no_antrian_cetak</td>";
                                }

                                if($row->ruangan_id > 0) {

                                    echo "<td style='text-align:middle; vertical-align:top'><span class='badge badge-info'>".$row->nama_ruang."</span>".($this->session->userdata('ruangan_id')<>$row->ruangan_id?'<br><span class="badge badge-danger">Perkara ini tidak sidang di ruang ini<br>Silahkan rubah di SIPP</span>':'')."</td>";

                                } else {

                                        echo "<td style='text-align:middle; vertical-align:top'><span class='badge badge-danger'>".($row->sidang_keliling=='Y'?'Sidang Keliling':$row->nama_ruang)."</span><br><br><button type='button' class='btn btn-small btn-danger btn-rounded waves-effect waves-light set_ruang' data-noperk='".$noperk."' data-noperks='".decrypt_url($noperk)."' data-pkrid='".$pkrid."' data-tgl_sidang='".$this->uri->segment(3)."' >Set Ruang</button></td>";
                                    }

                                echo "<td style='text-align:middle; vertical-align:top'>$row->jam_mulai</td>";
                                echo "<td style='text-align:middle; vertical-align:top'>$row->jam_selesai</td>";
                                if($row->status==1) {
                                    echo "<td style='text-align:middle; vertical-align:top'>$prio <span class='badge-pill badge-success'>selesai</span></td>";
                                } else if ($row->status==2) {
                                    echo "<td style='text-align:middle; vertical-align:top'>$prio <span class='badge-pill badge-danger'>dilewati</span></td>";
                                } else if ($row->status==3){
                                   echo "<td style='text-align:middle; vertical-align:top'>$prio <span class='badge-pill badge-warning'>sidang</span></td>";
                                } else if ($row->status==4) {
                                    echo "<td style='text-align:middle; vertical-align:top'>$prio <span class='badge-pill badge-secondary'>dipanggil</span></td>";
                                } else {
                                    echo "<td style='text-align:middle; vertical-align:top'>$prio <b>belum dipanggil</b>
                                </td>";
                                }

                            }

                            echo "</tr>";
                            $no++;
                        }
                    } else {

                        echo "<tr>";
                        echo "<td>-</td>";
                        echo "<td>-</td>";
                        echo "<td>-</td>";
                        echo "<td>-</td>";
                        echo "<td>-</td>";
                        echo "<td>-</td>";
                        echo "<td>-</td>";
                        echo "<td>-</td>";
                        echo "<td>-</td>";
                        echo "<td>-</td>";
                        echo "</tr>";

                    }
                    ?>
                    </tbody>
                </table>
                        </div>
                </div>
    </div><!-- end col-->
</div>
<script>
    function list_dilewat(a) {
        window.open("<?php echo base_url(); ?>utama/list_dilewat/"+a, "_self", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
    }

</script>