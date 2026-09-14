<div class="row layout-top-spacing" id="cancel-row">        
 <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="page-title-box">

            <h4><strong>Antrian Prioritas Sidang</strong></h4>
            
        </div>
    </div>
</div>


<div class="row layout-top-spacing" id="cancel-rows">
<div class="table-responsive">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content-area br-4">
                    <div class="form-row mb-4">
        <form action="<?php echo base_url('main/prioritas_antrian'); ?>" method="post" id="form_tahun" class="form-inline">
        <input class="form-control mb-2 mr-sm-2 tgl" id="tgl" name="tgl" type="text" value="<?php echo date('d/m/Y'); ?>" placeholder="Pilih Tanggal" readonly="readonly" required>
         <button class="btn btn-primary mb-2 mr-sm-2" type="submit">Tampilkan</button>
        </form>
        <button class="btn btn-danger mb-4 mr-2 float-right" style="position: absolute; right: 0;" onclick="tambah_prioritas();">Tambah Prioritas</button>
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
                            echo  "<td style='vertical-align:top'>$row->keterangan_prioritas ".(!empty($row->keterangan_prioritas)?'<button class="btn-sm btn-danger pull-right hapus_prioritas" data-antrian="'.$row->no_antrian_cetak.'" data-tgl="'.$row->tgl_sidang.'">Hapus</button>':'')."</td>";
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

<div  class="modal bs-example-modal-lg" id="modalprioritas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" id="modal_poto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Prioritas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="isi_prioritas"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success waves-effect text-left" onclick="simpan_prioritas()">Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

