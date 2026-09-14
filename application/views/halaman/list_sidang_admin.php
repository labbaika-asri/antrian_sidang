
<div class="row layout-top-spacing" id="cancel-row">        
 <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="page-title-box">    
        <h4><strong>Daftar Perkara Yang Sidang <?php echo $tanggal_indo ?></strong></h4>
            <?php
            echo"<h4><b>Total Perkara ".$daftar_sidang->num_rows()."</b></h4>";
            echo "<hr>";
            ?>
        </div>
    </div>
</div>
<div class="row layout-top-spacing" id="cancel-rows">
<div class="table-responsive">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content-area br-4">
                        <form action="<?php echo base_url().'utama/antrian_sidang_admin'; ?>" method="POST">
                            <input type="hidden" name="haris" value="<?php echo $tgl_enc; ?>">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" name="ruang">
                                            <option value=0 selected="">--Pilih Ruang Dipanggil-</option>
                                            <?php
                                             foreach($ruang->result() as $row) {
                                             echo "<option value='".encrypt_url($row->nama.'|'.$row->id)."'>".$row->nama."</option>";
                                             }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Prosess" class="btn btn-primary">
                                    </div>
                                </div>

                            </div>

                        </form>
                <table id="data-tabel" class="table table-striped">
                    <thead>
                    <tr>
                        <th class='text-center'>#</th>
                        <th >Nomor Perkara</th>
                        <th>Pihak</th>
                        <th>Jenis Perkara</th>
                        <th>Agenda</th>
                        <th>Mejelis</th>
                        <th>Durasi (menit)</th>
                        <th>No. Antrian</th>
                        <th>Ruang Sidang</th>
                        <th>Diambil Tgl</th>
                        <th>Diambil Oleh</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if ($daftar_sidang->num_rows() > 0) {
                        $no=1;
                        foreach ($daftar_sidang->result() as $row) {
                            echo "<tr>";
                            echo "<td style='text-align:middle; vertical-align:top'>".$no."</td>";
                            echo "<td style='vertical-align:top'>$row->nomor_perkara</td>";
                            $cari=array('Penggugat','Tergugat','Pemohon','Termohon','Penuntut Umum','Terdakwa','Pelanggar','Turut');
                            $ganti=array('<b>Penggugat</b>','<b>Tergugat</b>','<b>Pemohon</b>','<b>Termohon</b>','<b>Penuntut Umum</b>','<b>Terdakwa</b>','<b>Pelanggar</b>','<b>Turut</b>');
                            $pihak=preg_replace('/[0-9.]+/', '', $row->pihak);
                            $pengacara=preg_replace('/[0-9.]+/', '', $row->pengacara);
                            echo "<td style='vertical-align:top'>".str_replace($cari,$ganti,$pihak)." ".($row->pengacara<>''?"<br><br><b>Pengacara</b><br>$pengacara":'')."</td>";
                            echo "<td style='vertical-align:top'>$row->jenis_perkara_text</td>";
                            echo "<td style='vertical-align:top'>$row->agenda</td>";
                            echo "<td style='vertical-align:top'>$row->majelis</td>";
                           echo "<td style='vertical-align:top'>$row->durasi</td>";
                                echo "<td style='vertical-align:top'>$row->no_antrian</td>";
                                echo "<td style='vertical-align:top'>$row->nama_ruang</td>";
                                echo "<td style='vertical-align:top'></td>";
                                echo "<td style='vertical-align:top'></td>";
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
    </div><!-- end col-->
</div>
</div>
