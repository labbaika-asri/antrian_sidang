
<hr>
<div class="row">
    <div class="col-12">
        <div class="alert alert-secondary bg-secondary text-white border-0" role="alert">
        <?php if  ($this->session->userdata('kewenangan')<>1) {
            ?>
        <h3>RUANG SIDANG <?php echo $ruangsidang; ?></h3>
        <?php
        } else {
            $ruangsidang=0;
        }
        ?>
        </div>

    </div>

</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="overflow: scroll;">
                   <table id="data-tabel" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class='text-center'>#</th>
                                    <th>Nomor Perkara</th>
                                    <th>Pihak</th>
                                    <th>Pengacara</th>
                                    <th>Jenis Perkara</th>
                                    <th>Agenda</th>
                                    <th>Durasi (menit)</th>
                                    <th>Antrian</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                if ($daftar_sidang->num_rows() > 0) {
                                    $no=1;
                                    foreach ($daftar_sidang->result() as $row) {
                                        echo "<tr>";
                                        echo "<td class='text-center'>".$no++."</td>";
                                        echo "<td>$row->nomor_perkara</td>";
                                        echo "<td>$row->p</td>";
                                        echo "<td>$row->pengacara</td>";
                                        echo "<td>$row->jenis_perkara_text</td>";
                                        echo "<td>$row->agenda</td>";
                                       if  ($this->session->userdata('kewenangan')==1) { 
                                            if(is_null($row->durasi) or $row->durasi=='') {
                                                echo "<td>-</td>";
                                            } else {
                                                echo "<td>$row->durasi</td>";
                                            }   
                                            echo "<td>$row->no_antrian</td>";
                                            echo "<td>$row->slot</td>";
                                            echo "<td align='center'>-</td>"; 
                                       } else {
                                        if(is_null($row->durasi) or $row->durasi=='') {
                                            echo "<td><button type='button' class='btn btn-primary btn-rounded waves-effect waves-light durasi' pkrid=$row->perkara_id tglsidang='".$this->uri->segment(3)."' ruang=$ruangsidang id='tb".$no."'>Durasi</button></td>";
                                        } else {
                                            echo "<td><span class='badge-pill badge-danger'>$row->durasi</span><button type='button' class='btn btn-primary btn-rounded btn-sm waves-effect waves-light edit_durasi pull-right' pkrid=$row->perkara_id tglsidang='".$this->uri->segment(3)."' ruang=$ruangsidang durasi=$row->durasi id='tb".$no++."'>Edit</button></td>";
                                        }
                                            if($row->no_antrian<>'' and $row->no_antrian<>'-') {
                                                echo "<td align='center'><span class='badge-pill badge-success'>".$row->no_antrian."</span></td>";
                                            } else {
                                                echo "<td align='center'>$row->no_antrian</td>";
                                            }

                                        echo "<td>$row->status</td>";
                                        /*echo "<td align='center'>
                                        <div class='btn-group-vertical' role='group' aria-label='Basic example'>
                                        <button type='button' class='btn btn-primary panggil_sidang' noperk=$row->nomor_perkara pkrid=$row->perkara_id no_antrian=$row->no_antrian tglsidang='".$this->uri->segment(3)."' ruang=$ruangsidang id='tb".$no++."'>Panggil</button>
                                        <button type='button' class='btn btn-warning'>Lewati</button>
                                        <button type='button' class='btn btn-danger'>Selesai</button>
                                         </div>
                                        </td>";*/
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