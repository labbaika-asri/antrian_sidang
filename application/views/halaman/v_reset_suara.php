<div class="row layout-top-spacing" id="cancel-row">        
 <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="page-title-box">

            <h4><strong>Daftar Antrian Suara Belum Dipanggil (<?php echo $list_suara->num_rows(); ?>) </strong></h4>
           
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-sm-12 ">
<button class="btn btn-danger mb-4 mr-2 float-right reset_suara">Reset Antrian Suara Sidang</button> 
</div>
</div>


<div class="row layout-top-spacing" id="cancel-rows">
<div class="table-responsive">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content-area br-4">
                <table id="data-tabel" class="table table-striped">
                    <thead>
                    <tr>
                        <th class='text-center'>#</th>
                        <th >Tanggal</th>
                        <th >Suara</th>
                        <th>Status</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if ($list_suara->num_rows() > 0) {
                        $no=1;
                        foreach ($list_suara->result() as $row) {
                            echo "<tr>";
                            echo "<td style='text-align:middle; vertical-align:top'>".$no."</td>";
                            echo "<td style='vertical-align:top'>$row->tgl</td>";
                            echo "<td style='vertical-align:top'>$row->suara</td>";
                            echo "<td style='vertical-align:top'>$row->st_panggil</td>";
                            echo "</tr>";
                            $no++;
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
                </div>
    </div><!-- end col-->
</div>
</div>
<script>
    function list_dilewat(a) {
        window.open("<?php echo base_url(); ?>utama/list_dilewat/"+a, "_self", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
    }

</script>