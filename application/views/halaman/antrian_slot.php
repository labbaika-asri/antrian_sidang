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
            <h4 class="page-title">DAFTAR ANTRIAN SIDANG <?php echo strtoupper($tanggal_indo); ?></h4>
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
                        <th>Penggugat/Pemohon</th>
                        <th>Tergugat/Termohon</th>
                        <th>Jenis Perkara</th>
                        <th>Agenda</th>
                        <th>Ruang</th>
                        <th>Antrian</th>
                        <th>Slot</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Durasi</th>
                        <th>Aksi</th>
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
                            echo "<td>$row->t</td>";
                            echo "<td>$row->jenis_perkara_text</td>";
                            echo "<td>$row->agenda</td>";
                            echo "<td>$row->ruangan</td>";
                            echo "<td>$row->no_antrian</td>";
                            echo "<td>09.00-10.00</td>";
                            echo "<td>$row->jam_sidang</td>";
                            echo "<td>$row->sampai_jam</td>";
                            echo "<td>$row->durasi</td>";
                            echo "<td align='center'>
                            <button type='button' class='btn btn-primary btn-rounded btn-sm'>Panggil</button>
                            <button type='button' class='btn btn-danger btn-rounded btn-sm'>Tunda</button></td>";
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