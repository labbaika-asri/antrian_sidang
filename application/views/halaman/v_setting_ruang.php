
<div class="row layout-top-spacing" id="cancel-row">        
 <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Setting Ruang Sidang</h4>
        </div>
    </div>
</div>
<div class="row layout-top-spacing" id="cancel-row">
<div class="col-xl-12 col-lg-12 col-sm-12 ">
<div id="kotak1" class="widget-content-area br-4">
                                    
<ul class="nav nav-pills mb-4 mt-3  justify-content-left" id="rounded-pills-icon-tab" role="tablist">
                                        <li class="nav-item ml-2 mr-2">
                                            <a class="nav-link mb-2 active text-center" id="rounded-pills-icon-home-tab" data-toggle="pill" href="#rounded-pills-icon-home" role="tab" aria-controls="rounded-pills-icon-home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>Ketua Majelis</a>
                                        </li>
                                        <li class="nav-item ml-2 mr-2">
                                            <a class="nav-link mb-2 text-center" id="rounded-pills-icon-profile-tab" data-toggle="pill" href="#rounded-pills-icon-profile" role="tab" aria-controls="rounded-pills-icon-profile" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>Panitera/PP</a>
                                        </li>
                                        <li class="nav-item ml-2 mr-2">
                                            <a class="nav-link mb-2 text-center" id="rounded-pills-icon-profile-tab" data-toggle="pill" href="#rounded-pills-icon-profiles" role="tab" aria-controls="rounded-pills-icon-profile" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>Ruang Sidang Antrian</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="rounded-pills-icon-tabContent">
                                        <div class="tab-pane fade show active" id="rounded-pills-icon-home" role="tabpanel" aria-labelledby="rounded-pills-icon-home-tab">
                                                    <div class="table-responsive">
                                                    <table  class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th class='text-center'>#</th>
                                                            <th>Ketua Majelis</th>
                                                            <th>Hari Sidang</th>
                                                            <th>Ruang Sidang</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php
                                                        if ($ruang_sidang->num_rows() > 0) {
                                                            $i=1;
                                                            $no=1;
                                                            foreach ($ruang_sidang->result() as $row) {
                                                                switch ($row->hari) {
                                                                    case 1:
                                                                        $hari='Minggu';
                                                                        break;
                                                                    case 2:
                                                                        $hari='Senin';
                                                                        break;
                                                                    case 3:
                                                                        $hari='Selasa';
                                                                        break;
                                                                    case 4:
                                                                        $hari='Rabu';
                                                                        break;
                                                                    case 5:
                                                                        $hari='Kamis';
                                                                        break;
                                                                    case 6:
                                                                        $hari='Jumat';
                                                                        break;
                                                                    case 7:
                                                                        $hari='Sabtu';
                                                                        break;
                                                                    default:
                                                                        $hari='tidak diketahui';
                                                                }
                                                                echo "<tr>";
                                                                echo "<td class='text-center'>".$i++."</td>";
                                                                echo "<td><a href='#' class='list_pkr pull-right' data-hakim_id=$row->hakim_id data-hakim_nama='".$row->hakim_nama."' data-hari=$row->hari data-hari2=$hari data-ruang='".$row->ruang."' id='tbsd".$no++."'>$row->hakim_nama</a></td>";
                                                                echo "<td>$hari</td>";
                                                                if(is_null($row->ruang) or $row->ruang=='') {
                                                                    echo "<td><a href='#' class='list_pkr pull-right' data-hakim_id=$row->hakim_id data-hakim_nama='".$row->hakim_nama."' data-hari=$row->hari data-hari2=$hari data-ruang='".$row->ruang."' id='tbsd".$no++."'><b>Belum diisi di SIPP</b></a></td>";
                                                                } else {
                                                                    echo "<td><span class='badge badge-danger'>$row->ruang</span></td>";
                                                                }
                                                                echo "</tr>";
                                                            }


                                                        } else {

                                                            echo "<tr>";
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
                                            </div>
                                        <div class="tab-pane fade" id="rounded-pills-icon-profile" role="tabpanel" aria-labelledby="rounded-pills-icon-profile-tab">
                                        <div class="table-responsive">
                                        <table  class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class='text-center'>#</th>
                                                <th>Panitera/PP</th>
                                                <th>Hari Sidang</th>
                                                <th>Ruang Sidang</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            if ($ruang_sidang_pp->num_rows() > 0) {
                                                $i=1;
                                                $no=1;
                                                foreach ($ruang_sidang_pp->result() as $row) {
                                                    switch ($row->hari) {
                                                        case 1:
                                                            $hari='Minggu';
                                                            break;
                                                        case 2:
                                                            $hari='Senin';
                                                            break;
                                                        case 3:
                                                            $hari='Selasa';
                                                            break;
                                                        case 4:
                                                            $hari='Rabu';
                                                            break;
                                                        case 5:
                                                            $hari='Kamis';
                                                            break;
                                                        case 6:
                                                            $hari='Jumat';
                                                            break;
                                                        case 7:
                                                            $hari='Sabtu';
                                                            break;
                                                        default:
                                                            $hari='tidak diketahui';
                                                    }
                                                    echo "<tr>";
                                                    echo "<td class='text-center'>".$i++."</td>";
                                                    echo "<td><a href='#' class='list_pkr_pp pull-right' data-hakim_id=$row->panitera_id data-hakim_nama='".$row->panitera_nama."' data-hari=$row->hari data-hari2=$hari data-ruang='".$row->ruang."' id='tbsd".$no++."'>$row->panitera_nama</a></td>";
                                                    echo "<td>$hari</td>";
                                                    if(is_null($row->ruang) or $row->ruang=='') {
                                                        echo "<td><a href='#' class='list_pkr_pp pull-right' data-hakim_id=$row->panitera_id data-hakim_nama='".$row->panitera_nama."' data-hari=$row->hari data-hari2=$hari data-ruang='".$row->ruang."' id='tbsd".$no++."'><b>Belum diisi di SIPP</b></a></td>";
                                                    } else {
                                                        echo "<td><span class='badge badge-danger'>$row->ruang</span></td>";
                                                    }
                                                    echo "</tr>";
                                                }


                                            } else {

                                                echo "<tr>";
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
                                        </div>

                                        <div class="tab-pane fade" id="rounded-pills-icon-profiles" role="tabpanel" aria-labelledby="rounded-pills-icon-profile-tab">
                                            <form id='formruang'>
                                            <table  class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="width:40%">Nama Ruang Sidang</th>
                                                        <th style="width:60%">Dipakai Sidang di Kantor</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php
                                                    if ($ruang_sidang_antrian->num_rows() > 0) {
                                                        foreach ($ruang_sidang_antrian->result() as $row) {
                                                            echo "<tr>";
                                                            echo "<td>".$row->nama."</td>";
                                                            echo "<td><input type='checkbox' name='ruang[]'  value=$row->id ".(($row->aktif=='Y')?'checked':'')."></td>";
                                                            echo "</tr>";
                                                        }
                                                    } else {

                                                        echo "<tr>";
                                                        echo "<td>-</td>";
                                                        echo "<td>-</td>";
                                                        echo "</tr>";


                                                    }
                                                    ?>

                                                    </tbody>
                                                </table>
                                            </form>
                                            </div> <!-- end card body-->
                                        </div>
    <button type="button" class="btn btn-danger btn-small" id="ambil_ruang">Ambil Ruang dari SIPP</button> <button type="button" class="btn btn-success btn-small" id="simpan_ruang">Simpan</button>
                                    </div>

    </div><!-- end col-->
</div>