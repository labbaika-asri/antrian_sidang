<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">></a></li>
                    <li class="breadcrumb-item active">Daftar Sidang</li>
                </ol>
            </div>
            <h4 class="page-title">DAFTAR REGISTRASI ANTRIAN SIDANG</h4>
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
        <div class="card">
            <div class="card-body">
                <table id="data-tabel" class="table table-striped">
                    <thead>
                    <tr>
                        <th class='text-center'>#</th>
                        <th>Nomor Perkara</th>
                        <th>Pihak</th>
                        <th>Jenis Perkara</th>
                        <th>tanggal Sidang</th>
                        <th>Agenda</th>
                        <th>Ruang</th>
                        <th>Antrian</th>
                        <th>Slot</th>
                        <th>Diambil Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if ($daftar_registrasi->num_rows() > 0) {
                        $no=1;
                        foreach ($daftar_registrasi->result() as $row) {
                            switch ($row->slot) {
                                case 1 :
                                    $jam = "09.00 sd 10.00";
                                    break;
                                case 2 :
                                    $jam = "10.00 sd 11.00";
                                    break;
                                case 3 :
                                    $jam = "11.00 sd 12.00";
                                    break;
                                case 4 :
                                    $jam = "13.30 sd 14.30";
                                    break;
                                case 5 :
                                    $jam = "14.30 sd 15.30";
                                    break;
                                case 6 :
                                    $jam = "15.30 sd 16.30";
                                    break;
                                default :
                                    $jam = "gak ada";
                            }

                            echo "<tr>";
                            echo "<td class='text-center'>".$no++."</td>";
                            $ids='reg'.$no;
                            echo "<td>$row->nomor_perkara</td>";
                            echo "<td>$row->pihak</td>";
                            echo "<td>$row->jenis_perkara_text</td>";
                            //echo "<td>$row->nohp</td>";
                            echo "<td>$row->tgl_sidang</td>";
                            echo "<td>$row->agenda</td>";
                            echo "<td>$row->ruangan</td>";
                            echo "<td>$row->no_antrian</td>";
                            echo "<td>$jam</td>";
                            echo "<td>$row->tgl_ambil</td>";
                            echo "<td align='center'>";
                            if ($row->no_antrian=='') {
                            echo "<button type='button' class='btn btn-primary registrasi btn-sm' slots=$row->slot pkrids=$row->perkara_id  tgls='".$row->tanggal_sidang."' ruangs=$row->ruangan id=$ids>Registrasi</button></td>";
                            } else {
                              echo "Teregistrasi";
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
                        echo "</tr>";


                    }
                    ?>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>