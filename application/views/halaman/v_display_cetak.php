<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <h4>SILAHKAN AMBIL/CETAK ANTRIAN SIDANG HARI  <?php echo $tgl; ?></h4>
            <h4> <?php echo strtoupper($satker); ?></h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-secondary bg-secondary text-white border-0" role="alert">
        </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-12">
        <div><h4>Jumlah sidang <?php echo $daftar_sidang->num_rows(); ?> Perkara <button class="btn btn-warning btn-small pull-right" onclick="javascript: history.go(-1)"">Kembali Halaman Utama</button> <button class="btn btn-primary btn-small pull-right" onclick="javascript: location.reload(); ">Refresh</button></h4></div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table id="data-sidang" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nomor Perkara</th>
                        <th>Jenis Perkara</th>
                        <th>Pihak</th>
                        <th>Agenda</th>
                        <th>Ruang</th>
                        <th>Antrian</th>
                        <th>Keterangan</th>
                        <th></th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    //$CI =& get_instance();
                    //$CI->load->library('encrypt');
                    if ($daftar_sidang->num_rows() > 0) {
                       $no=0;
                        foreach ($daftar_sidang->result() as $row) {
                            echo "<tr>";
                            echo "<td style='vertical-align:top'><b>$row->nomor_perkara</b></td>";
                            echo "<td style='vertical-align:top'>$row->jenis_perkara_text</td>";
                            $cari=array('Penggugat','Tergugat','Pemohon','Termohon','Penuntut Umum','Terdakwa','Pelanggar','Turut','Intervensi');
                            $ganti=array('<b>Penggugat</b>','<b>Tergugat</b>','<b>Pemohon</b>','<b>Termohon</b>','<b>Penuntut Umum</b>','<b>Terdakwa</b>','<b>Pelanggar</b>','<b>Turut</b>','<b>Intervensi</b>');
                            $pihak=preg_replace('/[0-9.]+/', '', $row->pihak);
                            $pengacara=preg_replace('/[0-9.]+/', '', $row->pengacara);
                            $pkrid=encrypt_url($row->perkara_id);
                            $noperk=encrypt_url($row->nomor_perkara);
                            $tglsidang=encrypt_url($row->tgl_sidang);
                            echo "<td style='vertical-align:top'>".str_replace($cari,$ganti,$pihak)." ".($row->pengacara<>''?"<br>$pengacara":'')."</td>";
                            //echo "<td>$row->majelis</td>";
                            echo "<td style='vertical-align:top'>$row->agenda</td>";
                            echo "<td align='center' style='vertical-align:top'><b><span class='badge badge-info'>$row->ruangan</span></b></td>";
                            if($row->no_antrian<>'') {
                                echo "<td align='center' style='vertical-align:top'><span class='badge-pill badge-warning'>$row->no_antrian_cetak</span></td>";
                            } else {
                                echo "<td style='vertical-align:top'>$row->no_antrian_cetak</td>";
                            }

                            if ($row->tgl_ambil<>'') {
                                $ket="<span class=\"badge badge-danger\">Diambil</span><br>".date('d-m-Y H:i:s',strtotime($row->tgl_ambil))."<br>";
                                if($row->status==1) {
                                    $ket.=" <span class=\"badge badge-danger\">Status</span><br> Selesai";
                                } else if($row->status==2) {
                                    $ket.=" <span class=\"badge badge-danger\">Status</span><br> Dilewat";
                                }  else if($row->status==3) {
                                    $ket.=" <span class=\"badge badge-danger\">Status</span><br> Sidang";
                                } else {
                                    $ket.=" <span class=\"badge badge-danger\">Status</span><br> Belum dipanggil";
                                }

                            } else {
                                $ket='';
                            }
                            $tanggale= date('Y-m-d');
                            echo "<td style='vertical-align:top'>$ket</td>";
                            echo "<td align='center' style='vertical-align:top'>";
                            $cetak=($jenis_antrian=='0'?'Cetak':'Check In');
                            if ($hadir==1 and $row->ruangan_id<>0) {
                                echo"<button type='button' class='btn btn-danger btn-rounded btn-sm cetak_antrian' data-tgl_sidang='".$tglsidang."' data-ruang='".$row->ruangan_id."' data-pkrid='".$pkrid."' data-nomor_perkara='".$noperk."' data-nomor_perkaras='".decrypt_url($noperk)."'><b>$cetak</b></button></td>";
                            } else {
                                if($row->ruangan_id<>0) {
                                    echo"<button type='button'  class='btn btn-danger btn-rounded btn-sm'  onclick=\"cetak_antrians('$noperk','$pkrid','$tglsidang','$row->ruangan_id');\"><b>$cetak</b></button></td>";
                                }

                            }

                            echo "</tr>";
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
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Nomor Perkara</th>
                        <th>Jenis Perkara</th>
                        <th>Pihak</th>
                        <th>Agenda</th>
                        <th>Ruang</th>
                        <th>No</th>
                        <th>Keterangan</th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div  class="modal bs-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_poto" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="#" id="form">
                    <input type="hidden" id="nomor_perkara" name="nomor_perkara" value="">
                    <input type="hidden" id="tgl_sidang" name="tgl_sidang" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="my_camera"></div>
                            <br/>
                           <!-- <input type=button value="Ambil Photo" onClick="take_snapshot()"> -->
                            <input type="hidden" name="image" class="image-tag">
                        </div>
                        <div class="col-md-6">
                            <div id="results"></div>
                            <span id="tgl_ambil" tgl=""></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

