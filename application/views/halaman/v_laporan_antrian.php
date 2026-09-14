<div class="row layout-top-spacing" id="cancel-row">        
 <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="page-title-box">

            <h4><strong>Laporan Antrian Sidang</strong></h4>
            
        </div>
    </div>
</div>


<div class="row layout-top-spacing" id="cancel-rows">
<div class="table-responsive">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content-area br-4">
                    <div class="form-row mb-4">
        <form action="<?php echo base_url('main/laporan_antrian'); ?>" method="post" id="form_tahun" class="form-inline">
        <input class="form-control mb-2 mr-sm-2 tgl" id="tgl_awal" name="tgl_awal" type="text" value="<?php echo $tglawal; ?>" placeholder="Pilih Tanggal" readonly="readonly" required>
        <label for="inputState">&nbsp;<h5>S/D</h5>&nbsp;</label>
        <input class="form-control mb-2 mr-sm-2 tgl" id="tgl_akhir" name="tgl_akhir" type="text" value="<?php echo $tglakhir; ?>" placeholder="Pilih Tanggal Akhir" readonly="readonly" required>
        <label for="inputState">&nbsp;<h5>R-</h5>&nbsp;</label>
        <select id="ruang" name="ruang" class="form-control mb-2 mr-sm-2">
                <option value="0"<?php echo ($ruangs=="0"?'selected':''); ?>>-Ruang-</option>
               <?php foreach ($ruang->result() as $row) {
                echo "<option value='".$row->nama."' ".($ruangs==$row->nama?'selected':'').">$row->nama</option>";
               } ?>
            </select>
         <button class="btn btn-primary mb-2 mr-sm-2" type="submit">Proses</button>
        </form>
        <button class="btn btn-danger mb-4 mr-2 float-right cetak_lap_antrian" style="position: absolute; right: 0;">Cetak</button>
    </div>     
                <table id="data-tabel" class="table table-striped">
                    <thead>
                    <tr>
                        <th class='text-center'>#</th>
                        <th >Tanggal Sidang</th>
                        <th >Nomor Perkara</th>
                        <th >Jenis Perkara</th>
                        <th >Majelis</th>
                        <th >Agenda</th>
                        <th>Ruang</th>
                        <th>No Antrian</th>
                        <th>Diambil</th>
                        <th>Mulai Sidang</th>
                        <th>Selesai Sidang</th>
                        <th>Lama Sidang</th>
                        <th>Keterangan</th>
                    </tr>
                    </thead>

                    <tbody id="isitabel">
                    <?php
                    if ($antrian->num_rows() > 0) {
                        //$ruang=array('A','B','C','D','E','F');
                        $no=1;
                        foreach ($antrian->result() as $row) {
                            //$no_antrian=$ruang[$row->ruang_kode-1]."-".$row->no_antrian;
                            $date_a = new DateTime($row->jam_selesai);
                            $date_b = new DateTime($row->jam_mulai);
                            $interval = date_diff($date_a,$date_b);
                            $durasi=$interval->format('%h:%i:%s');
                            echo "<tr>";
                            echo "<td style='text-align:middle; vertical-align:top'>".$no."</td>";
                            echo "<td style='vertical-align:top'>$row->tgl_sidang</td>";
                            echo "<td style='vertical-align:top'>$row->nomor_perkara</td>";
                            echo "<td style='vertical-align:top'>$row->jenis_perkara_text</td>";
                            echo "<td style='vertical-align:top'>$row->majelis</td>";
                            echo "<td style='vertical-align:top'>$row->agenda_sidang</td>";
                            echo "<td style='vertical-align:top'><span class='badge badge-danger'>$row->ruang_sidang</span></td>";
                            echo "<td style='vertical-align:top'><span class='badge badge-info'>$row->no_antrian_cetak</span></td>";
                            echo "<td style='vertical-align:top'>$row->tgl_ambil</td>";
                            echo "<td style='vertical-align:top'>$row->mulai</td>";
                            echo "<td style='vertical-align:top'>$row->selesai</td>";
                            echo "<td style='vertical-align:top'>$durasi</td>";
                            echo "<td style='vertical-align:top' ><button class='btn btn-small lihat_poto' data-nomor_perkara='".$row->nomor_perkara."' data-tgl_sidang='".$row->tgl_sidang."'>photo</button></td>";
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
<div  class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" id="modal_poto">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">PHOTO AMBIL ANTRIAN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="isi"></div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
