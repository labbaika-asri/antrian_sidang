<div class="row layout-top-spacing" id="cancel-row">        
 <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="page-title-box">

            <h4><strong>Jurnal Sidang</strong></h4>
            
        </div>
    </div>
</div>


<div class="row layout-top-spacing" id="cancel-rows">
<div class="table-responsive">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content-area br-4">
                    <div class="form-row mb-4">
                        <form action="<?php echo base_url('main/jurnal_sidang'); ?>" method="post" id="form_tahun" class="form-inline">
                            <input class="form-control mb-2 mr-sm-2 tgl" id="tgl_awal" name="tgl_awal" type="text" value="<?php echo $tanggal; ?>" placeholder="Pilih Tanggal Awal" readonly="readonly" required>
                            <select id="majelis" name="majelis" class="form-control mb-2 mr-sm-2">
                                <option value="0">-Pilih Ketua Majelis/PP-</option>
                                <?php
                                $x=0;
                                for ($x = 0; $x < count($majelis); $x++) {
                                    if($majelis[$x]==$mjl) {
                                        $select="selected";
                                    } else {
                                        $select="";
                                    }
                                    $hakim=explode('|',$majelis[$x]);
                                    echo"<option value='".$majelis[$x]."' $select>".$hakim[0]." - ".$hakim[2]."</option>";
                                }
                                ?>
                            </select>
                            <button class="btn btn-primary mb-2 mr-sm-2" type="submit">Proses</button>
                            <button class="btn btn-primary mb-2 mr-sm-2" onclick="javascript:history.go(-1);">Kembali</button>
                        </form>

                         <button class="btn btn-danger mb-4 mr-2 float-right cetak_jurnal_sidang" style="position: absolute; right: 0;">Cetak</button>
    </div>
                <table id="data-tabel" class="table table-striped">
                    <thead>
                    <tr>
                        <th class='text-center'>#</th>
                        <th>Nomor Perkara</th>
                        <th>Jenis Perkara</th>
                        <th>Majelis</th>
                        <th>Para Pihak</th>
                        <th>Sidang Ke</th>
                        <th>Tanggal Tunda</th>
                        <th>Alasan Tunda</th>
                        <th>Jenis Putusan</th>
                        <?php if ($this->session->userdata('jenis_pengadilan')==4) {
                            echo '<th>Faktor Penyebab</th>';
                        } ?>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if ($data_sidang->num_rows() > 0) {
                        $no=1;
                        foreach ($data_sidang->result() as $row) {
                            echo "<tr>";
                            echo "<td style='text-align:middle; vertical-align:top'>".$no."</td>";
                            echo "<td style='vertical-align:top'>$row->nomor_perkara</td>";
                            echo "<td style='vertical-align:top'>$row->jenis_perkara</td>";
                            $cari=array('Hakim Ketua','Hakim Anggota 1:','Hakim Anggota 2:','Hakim Anggota 3:','Panitera','Pengganti');
                            $ganti=array('<b>Hakim Ketua</b>','<b>Hakim Anggota 1:</b>','<b>Hakim Anggota 2:</b>','<b>Hakim Anggota 3:</b>','<b>Panitera</b>','<b>Pengganti</b>');
                            echo "<td style='vertical-align:top'>".str_replace($cari,$ganti,$row->majelis)."</td>";
                            $cari=array('Penggugat','Tergugat','Pemohon','Termohon','Penuntut Umum','Terdakwa','Pelanggar','Turut','Intervensi');
                            $ganti=array('<b>Penggugat</b>','<b>Tergugat</b>','<b>Pemohon</b>','<b>Termohon</b>','<b>Penuntut Umum</b>','<b>Terdakwa</b>','<b>Pelanggar</b>','<b>Turut</b>','<b>Intervensi</b>');
                            $pihak=preg_replace('/[0-9.]+/', '', $row->pihak);
                            $pengacara=preg_replace('/[0-9.]+/', '', $row->pengacara);
                            echo "<td style='vertical-align:top'>".str_replace($cari,$ganti,$pihak)." ".($row->pengacara<>''?"<br>$pengacara":'')."</td>";
                            echo "<td style='vertical-align:top'>$row->sidang_ke</td>";
                            echo "<td style='vertical-align:top'>$row->tgl_tunda</td>";
                            echo "<td style='vertical-align:top'>".($row->alasan_ditunda=="0"?'':$row->alasan_ditunda)."</td>";
                            echo "<td style='vertical-align:top'>$row->jenis_putusan</td>";
                            if ($this->session->userdata('jenis_pengadilan') == 4) {
                                echo "<td style='vertical-align:top'>$row->faktor</td>";
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
                        if ($this->session->userdata('jenis_pengadilan') == 4) {
                            echo "<td style='vertical-align:top'>-</td>";
                        }
                        echo "</tr>";

                    }
                    ?>
                    </tbody>
                </table>
                </div>
    </div><!-- end col-->
</div>
</div>