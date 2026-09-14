
<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="page-title-box">
            <h3>DAFTAR ANTRIAN SIDANG DILEWAT/DISKORS</h3>
            <h5 class="text-danger">RUANG SIDANG <?php echo strtoupper($ruang_nama);?></h5>
            <h4><strong><?php echo $tanggal_indo ?></strong></h4>
            <a href="<?php echo base_url($url); ?>"><button type='button' class='btn btn-danger float-right'>Kembali Ke Antrian Utama</button></a>
        </div>
    </div>
</div>
<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12 ">
        <div id="kotak1" class="widget-content-area br-4">
            <div class="table-responsive">
                <table id="data-tabel" class="table table-striped">
                    <thead>
                    <tr>
                        <th class='text-center'>#</th>
                        <th>Nomor Perkara</th>
                        <th>Pihak</th>
                        <th>Jenis Perkara</th>
                        <th>Agenda</th>
                        <?php  if ($durasi==1) {
                            echo "<th>Durasi (menit)</th>";
                        }
                        ?>
                        <th>No. Antrian</th>
                        <th>Mulai Sidang</th>
                        <th>Selesai Sidang</th>
                        <th>aksi</th>
                        <th>Status</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if ($daftar_sidang->num_rows() > 0) {
                        $no=1;
                        foreach ($daftar_sidang->result() as $row) {
                            if($row->status== 1) {
                                $disabled='disabled';
                            } else {
                                $disabled='';
                            }
                            echo "<tr>";
                            echo "<td class='text-center' style='vertical-align:top;'>".$no."</td>";
                            echo "<td style='vertical-align:top;'>$row->nomor_perkara</td>";
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
                            echo "<td style='vertical-align:top;'>$row->jenis_perkara_text</td>";
                            echo "<td style='vertical-align:top;'>$row->agenda</td>";
                                if($durasi==1) {
                                    echo "<td style='text-align:middle; vertical-align:top'><span class='badge-pill badge-danger' style='font-size:20px'>$row->durasi</span></td>";
                                }
                                if($row->no_antrian<>'' and $row->no_antrian<>'-') {
                                    echo "<td style='text-align:middle; vertical-align:top'><span class='badge-pill badge-success' style='font-size:20px'>".$row->no_antrian_cetak."</span></td>";
                                } else {
                                    echo "<td style='text-align:middle; vertical-align:top'>$row->no_antrian</td>";
                                }
                                echo "<td style='vertical-align:top;'>$row->jam_mulai</td>";
                                echo "<td style='vertical-align:top;'>$row->jam_selesai</td>";
                            echo "<td style='vertical-align:top;'><div class='btn-group-vertical'>
                                        <button type='button' class='btn btn-primary btn-sm panggil_sidang' data-pkrid='".$pkrid."' data-no_antrian='".encrypt_url($row->no_antrian)."' data-noperk='".$noperk."' data-noperks='".decrypt_url($noperk)."' data-ruang='".$ruangsidang."' data-tglsidang='".$this->uri->segment(3)."' data-ruangan_id='".$ruangan_id."' data-no_antrian_cetak='".$row->no_antrian_cetak."' data-dilewat=1 $disabled>Panggil</button> 
                                        <button type='button' class='btn btn-success btn-sm mulai_sidang' data-no_antrian='".encrypt_url($row->no_antrian)."' data-noperk='".$noperk."' data-noperks='".decrypt_url($noperk)."' data-tglsidang='".$this->uri->segment(3)."' data-ruang='".$ruangsidang."' data-ruangan_id=$ruangan_id data-dilewat=1 $disabled>Mulai</button>
                                ".//($this->session->userdata('jenis_pengadilan')==4?"<button type='button' class='btn btn-info btn-sm isi_tundaan' data-no_antrian='".encrypt_url($row->no_antrian)."'data-noperk='".$noperk."' data-noperks='".decrypt_url($noperk)."' data-pkrid=$row->perkara_id data-tglsidang='".$this->uri->segment(3)."' data-agenda='".$row->agenda."' data-ruang='".$ruangsidang."' data-ruangan_id='".$ruangan_id."' data-jenisperk=$row->jenis_perkara_id data-alur=$row->alur_perkara_id  data-dilewat=1 $disabled>Tunda</button> 
                                //<button type='button' class='btn btn-success btn-sm isi_putusan' data-no_antrian='".encrypt_url($row->no_antrian)."' data-noperk='".$noperk."' data-noperks='".decrypt_url($noperk)."' data-pkrid=$row->perkara_id data-ruangan_id=$ruangan_id data-tglsidang='".$this->uri->segment(3)."' data-ruang='".$ruangsidang."' data-jenisperk=$row->jenis_perkara_id data-alur=$row->alur_perkara_id data-dilewat=1 $disabled>Putus</button>":"").
                                "<button type='button' class='btn btn-danger btn-sm selesai_sidang' data-no_antrian='".encrypt_url($row->no_antrian)."' data-noperk='".$noperk."' data-noperks='".decrypt_url($noperk)."' data-tglsidang='".$this->uri->segment(3)."' data-ruang='".$ruangsidang."' data-ruangan_id=$ruangan_id data-dilewat=1 $disabled>Selesai</button></div></td>";
                                if($row->status==1) {
                                    echo "<td style='vertical-align:top;'><span class='badge-pill badge-success statuspanggil'>selesai</span></td>";
                                } else if ($row->status==2) {
                                    echo "<td style='vertical-align:top;'><span class='badge-pill badge-danger statuspanggil'>dilewati</span></td>";
                                } else if ($row->status==3){
                                    echo "<td style='vertical-align:top;'><span class='badge-pill badge-warning statuspanggil'>sidang</span></td>";
                                } else if ($row->status==4) {
                                    echo "<td style='vertical-align:top;'><span class='badge-pill badge-secondary statuspanggil'>dipanggil</span></td>";
                                } else {
                                    echo "<td style='vertical-align:top;'><span class='badge-pill badge-secondary statuspanggil'>belum dipanggil</span></td>";
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
                        echo "<td>-</td>";
                        echo "</tr>";

                    }
                    ?>
                    </tbody>
                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>