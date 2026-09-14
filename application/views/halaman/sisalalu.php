<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">SISA LALU</h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="javascript:void(0)">Tabulasi Perkara</a></li>
            <li class="active">Sisa Lalu</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="table-responsive rounded mb-20">
            <table id="data" class="table table-striped table-bordered table-theme">
                <thead>
                <tr>
                    <th class='text-center'>#</th>
                    <th>Nomor Perkara</th>
                    <th>Tanggal Daftar</th>
                    <th>Tanggal PMH</th>
                    <th>Tanggal PHS</th>
                    <th>Tanggal Putus</th>
                    <th>Majelis</th>
                    <th>Jenis Perkara</th>
                    <th>Status Akhir</th>

                </tr>
                </thead>
                <tbody>
                <?php
                if ($sisa_lalu->num_rows() > 0) {
                    $no=1;
                    foreach ($sisa_lalu->result() as $row) {
                        echo "<tr>";
                        echo "<td class='text-center'>".$no++."</td>";
                        echo "<td>$row->nomor_perkara</td>";
                        echo "<td>$row->tgl_daftar</td>";
                        echo "<td>$row->tgl_pmh</td>";
                        echo "<td>$row->tgl_phs</td>";
                        echo "<td>$row->tgl_putus</td>";
                        echo "<td>$row->majelis</td>";
                        echo "<td>$row->jenis_perkara_nama</td>";
                        echo "<td>$row->status</td>";
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
                <tfoot>
                <tr>
                    <th class='text-center'>#</th>
                    <th>Nomor Perkara</th>
                    <th>Tanggal Daftar</th>
                    <th>Tanggal PMH</th>
                    <th>Tanggal PHS</th>
                    <th>Tanggal Putus</th>
                    <th>Majelis</th>
                    <th>Jenis Perkara</th>
                    <th>Status Akhir</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
