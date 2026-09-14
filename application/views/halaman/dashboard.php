<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Dashboard 1</h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
        <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Buy Admin Now</a>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0)">Dashboard</a></li>
            <li class="active">Dashboard 1</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                   Rapor Penanganan Perkara Satker Berdasarkan SIPP
                <div class="pull-right"><a href="javascript:void(0)" data-perform="panel-collapse"><i class="ti-minus"></i></a>  </div>
                <div class="clearfix"></div>
            </div><!-- /.panel-heading -->
            <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-2 col-sm-6 row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-danger"><i class="ti-clipboard"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15"><?php echo $kinerja['jml_beban_perkara']; ?></h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Beban Perkara</h4>
                                            <a href="#" class="btn btn-outline btn-rounded btn-default">Detil</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-sm-6 row-in-br  b-r-none">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-info"><i class="ti-clipboard"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15"><?php echo $kinerja['jml_putus']; ?></h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Perkara Putus</h4>
                                            <a href="#" class="btn btn-outline btn-rounded btn-default">Detil</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-sm-6 row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-success"><i class=" ti-clipboard"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15"><?php echo $kinerja['beban_minutasi']; ?></h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Beban Minutasi</h4>
                                            <a href="#" class="btn btn-outline btn-rounded btn-default">Detil</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-sm-6  row-in-br b-r-none">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-warning"><i class="ti-clipboard"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15"><?php echo $kinerja['minutasi']; ?></h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Perkara Minutasi</h4>
                                            <a href="#" class="btn btn-outline btn-rounded btn-default">Detil</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-sm-6  row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-primary"><i class="ti-clipboard"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15"><?php echo $kinerja['sisa_upload']; ?></h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Sisa Upload Thn Lalu</h4>
                                            <a href="#" class="btn btn-outline btn-rounded btn-default">Detil</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-sm-6 row-in-br b-r-none">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-inverse"><i class="ti-clipboard"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15"><?php echo $kinerja['upload_putus_thn_ini']; ?></h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Upload Tahun Ini</h4>
                                            <a href="#" class="btn btn-outline btn-rounded btn-default">Detil</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-2 col-sm-6 row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-danger"><i class="ti-wallet"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15"><?php echo $kinerja['bobot_proses']; ?>%</h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Bobot Proses</h4>
                                            <a href="#" class="btn btn-outline btn-rounded btn-default">Detil</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-sm-6 row-in-br  b-r-none">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-info"><i class="ti-wallet"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15"><?php echo $kinerja['bobot_putus']; ?>%</h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Waktu Putus</h4>
                                            <a href="#" class="btn btn-outline btn-rounded btn-default">Detil</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-sm-6 row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-success"><i class="ti-wallet"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15"><?php echo $kinerja['bobot_minutasi']; ?>%</h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Waktu Minutasi</h4>
                                            <a href="#" class="btn btn-outline btn-rounded btn-default">Detil</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-sm-6  row-in-br b-r-none">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-warning"><i class="ti-wallet"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15"><?php echo $kinerja['bobot_upload']; ?>%</h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Bobot Upload</h4>
                                            <a href="#" class="btn btn-outline btn-rounded btn-default">Detil</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-sm-8 row-in-br b-r-none">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-inverse"><i class="ti-wallet"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15"><?php echo $kinerja['kinerja_satker']; ?>%</h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Nilai Kinerja Satker</h4>
                                            <a href="#" class="btn btn-outline btn-rounded btn-default">Detil</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-danger">
            <div class="panel-heading">
                Rapor Penanganan Perkara Hakim Berdasarkan SIPP
                <div class="pull-right"><a href="javascript:void(0)" data-perform="panel-collapse"><i class="ti-minus"></i></a>  </div>
                <div class="clearfix"></div>
            </div><!-- /.panel-heading -->
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">

                    <div class="table-responsive rounded mb-20">
                        <table id="tour-16" class="table color-table dark-table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center border-right" >#</th>
                                <th class="text-center border-right">Ketua Majelis</th>
                                <th class="text-center border-right">Sisa Lalu</th>
                                <th class="text-center border-right">Perkara Masuk</th>
                                <th class="text-center border-right">Beban Perkara</th>
                                <th class="text-center border-right">Putus</th>
                                <th class="text-center border-right">Sisa Minut Lalu</th>
                                <th class="text-center border-right">Beban Minut</th>
                                <th class="text-center border-right">Minutasi</th>
                                <th class="text-center border-right">Sisa Upload Lalu</th>
                                <th class="text-center border-right">Upload Putusan <br> Tahun ini</th>
                                <th  class="text-center border-right">Bobot Proses</th>
                                <th  class="text-center border-right">Waktu Putus</th>
                                <th class="text-center border-right" >Waktu Minutasi</th>
                                <th class="text-center border-right">Bobot Upload</th>
                                <th class="text-center border-right" >Nilai Akhir</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            function build_sorter($key) {
                                return function ($b, $a) use ($key) {
                                    return strnatcmp($a[$key], $b[$key]);
                                };
                            }

                            usort($kinerja_hakim_all, build_sorter('kinerja'));

                            $no=0;
                            foreach ($kinerja_hakim_all as $key=>$row) {

                                ?>
                                <tr>

                                    <td class="text-center border-right"><?php echo $no+=1; ?></td>
                                    <td>
                                        <?php echo $row['hakim']; ?>
                                    </td>
                                    <td class="text-center" ><?php echo $row['sisa_lalu']; ?></td>
                                    <td class="text-center" ><?php echo $row['masuk']; ?></td>
                                    <td class="text-center" ><?php echo $row['beban_perkara']; ?></td>
                                    <td class="text-center" ><?php echo $row['perkara_putus']; ?></td>
                                    <td class="text-center" ><?php echo $row['sisa_minut_lalu']; ?></td>
                                    <td class="text-center" ><?php echo $row['beban_minut']; ?></td>
                                    <td class="text-center" ><?php echo $row['minutasi']; ?></td>
                                    <td class="text-center" ><?php echo $row['sisa_upload']; ?></td>
                                    <td class="text-center" ><?php echo $row['upload_putus_thn_ini']; ?></td>
                                    <td class="text-center" ><?php echo $row['bobot_proses']; ?>%</td>
                                    <td class="text-center" ><?php echo $row['bobot_putus']; ?>%</td>
                                    <td class="text-center">
                                        <?php echo $row['bobot_minutasi']; ?>%
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['bobot_upload']; ?>%
                                    </td>
                                    <td class="text-center">
                                        <?php if ($row['kinerja']>=75) { ?>
                                            <span class="badge badge-pill badge-success rounded"><?php echo $row['kinerja']; ?>%</span>
                                        <?php } else if ($row['kinerja']>50 and $row['kinerja']<75) { ?>
                                            <span class="badge badge-pill badge-warning rounded"><?php echo $row['kinerja']; ?>%</span>
                                        <?php } else { ?>
                                            <span class="badge badge-pill badge-danger rounded" ><?php echo $row['kinerja']; ?>%</span>
                                        <?php } ?>
                                    </td>

                                </tr>
                                <?php

                            }
                            ?>

                            </tbody>
                        </table>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-danger">
            <div class="panel-heading">
                Rapor Penanganan Perkara Putus Hakim Berdasarkan SIPP
                <div class="pull-right"><a href="javascript:void(0)" data-perform="panel-collapse"><i class="ti-minus"></i></a>  </div>
                <div class="clearfix"></div>
            </div><!-- /.panel-heading -->
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">

                    <div class="table-responsive rounded mb-20">
                        <table id="tour-16" class="table color-table dark-table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center border-right" rowspan="2">#</th>
                                <th rowspan="2" class="text-center border-right">Ketua Majelis</th>
                                <th rowspan="2" class="text-center border-right">Sisa Lalu</th>
                                <th rowspan="2" class="text-center border-right">Masuk</th>
                                <th rowspan="2"class="text-center border-right" >Beban Perkara</th>
                                <th colspan= "6" class="text-center border-right">Perkara Putus</th>
                                <th rowspan="2"class="text-center border-right" >Total Putus</th>
                                <th rowspan="2"class="text-center border-right" >Belum Putus</th>
                                <th rowspan="2"class="text-center border-right" >Ratio Putus</th>
                                <th rowspan="2" class="text-center border-right">Bobot Putus</th>
                                <th rowspan="2" class="text-center border-right">Kinerja Putus</th>
                            </tr>
                            <tr>
                                <th class="trans-bg red bright" nowrap><div align="center"><= 1 Bln</div></th>
                                <th class="trans-bg red bright" nowrap><div align="center"><=2 Bln</div></th>
                                <th class="trans-bg red bright" nowrap><div align="center"><=3 Bln</div></th>
                                <th class="trans-bg purple bright" nowrap><div align="center"><= 4 Bln</div></th>
                                <th class="trans-bg purple bright" nowrap><div align="center"><= 5 Bln</div></th>
                                <th class="trans-bg purple bright" nowrap><div align="center">> 5 Bln</div></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            /* function build_sorter($key) {
                                 return function ($b, $a) use ($key) {
                                     return strnatcmp($a[$key], $b[$key]);
                                 };
                             }*/

                            usort($kinerja_putus_hakim, build_sorter('kinerja_putus'));

                            $no=0;
                            foreach ($kinerja_putus_hakim as $key=>$row) {

                                ?>
                                <tr>

                                    <td class="text-center border-right"><?php echo $no+=1; ?></td>
                                    <td>
                                        <span><?php echo $row['hakim'] ?></span>
                                    </td>
                                    <td class="text-center" ><?php echo $row['sisa_lalu']; ?></td>
                                    <td class="text-center" ><?php echo $row['masuk']; ?></td>
                                    <td class="text-center">
                                        <?php echo $row['beban_perkara']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['putus1_2']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['putus2_3']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['putus3_4']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['putus4_5']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['putus5']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['putus_lebih5']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['total_putus']; ?>
                                    <td class="text-center">
                                        <?php echo $row['sisa_putus']; ?>
                                    </td>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['ratio_putus']; ?>%
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['bobot_putus']; ?>%
                                    </td>
                                    <td class="text-center">
                                        <?php if ($row['kinerja_putus']>=75) { ?>
                                            <span class="badge badge-pill badge-success rounded"><?php echo $row['kinerja_putus']; ?>%</span>
                                        <?php } else if ($row['kinerja_putus']>50 and $row['kinerja_putus']<75) { ?>
                                            <span class="badge badge-pill badge-warning rounded"><?php echo $row['kinerja_putus']; ?>%</span>
                                        <?php } else { ?>
                                            <span class="badge badge-pill badge-danger rounded" ><?php echo $row['kinerja_putus']; ?>%</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php

                            }
                            ?>

                            </tbody>
                        </table>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-danger">
            <div class="panel-heading">
                Rapor Penanganan Perkara Minutasi Hakim Berdasarkan SIPP
                <div class="pull-right"><a href="javascript:void(0)" data-perform="panel-collapse"><i class="ti-minus"></i></a>  </div>
                <div class="clearfix"></div>
            </div><!-- /.panel-heading -->
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">

                    <div class="table-responsive rounded mb-20">
                        <table id="tour-16" class="table color-table dark-table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center border-right" rowspan="2">No.</th>
                                <th rowspan="2" class="text-center border-right">Ketua Majelis</th>
                                <th rowspan="2" class="text-center border-right">sisa lalu minut</th>
                                <th rowspan="2" class="text-center border-right">Perkara putus</th>
                                <th rowspan="2"class="text-center border-right" >Beban Minutasi</th>
                                <th colspan= "5" class="text-center border-right">Perkara MInutasi</th>
                                <th rowspan="2"class="text-center border-right" >Total Minutasi</th>
                                <th rowspan="2"class="text-center border-right" >Belum Minutasi</th>
                                <th rowspan="2"class="text-center border-right" >Ratio Minutasi</th>
                                <th rowspan="2" class="text-center border-right">Bobot Minutasi</th>
                                <th rowspan="2" class="text-center border-right">Kinerja Minutasi</th>
                            </tr>
                            <tr>
                                <th class="trans-bg red bright" nowrap><div align="center">ODM</div></th>
                                <th class="trans-bg red bright" nowrap><div align="center"><=3</div></th>
                                <th class="trans-bg red bright" nowrap><div align="center"><=7 </div></th>
                                <th class="trans-bg purple bright" nowrap><div align="center"><=8</div></th>
                                <th class="trans-bg purple bright" nowrap><div align="center"> > 14</div></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            usort($kinerja_minutasi_hakim, build_sorter('kinerja_minutasi'));

                            $no=0;
                            foreach ($kinerja_minutasi_hakim as $key=>$row) {

                                ?>
                                <tr>
                                    <td class="text-center border-right"><?php echo $no+=1; ?></td>
                                    <td>
                                        <span><?php echo $row['hakim'] ?></span>
                                    </td>
                                    <td class="text-center"><?php echo $row['sisa_lalu_minutasi'] ?></td>
                                    <td class="text-center"><?php echo $row['perkara_putus'] ?></td>
                                    <td class="text-center">
                                        <?php echo $row['beban_minutasi'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['minut5'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['minut3'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['minut2'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['minut1'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['minut0'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['total_minutasi'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['sisa_minutasi'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['ratio_minutasi'] ?>%
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row['bobot_minutasi'] ?>%
                                    </td>
                                    <td class="text-center">
                                        <?php if ($row['kinerja_minutasi']>=75) { ?>
                                            <span class="badge badge-pill badge-success rounded"><?php echo $row['kinerja_minutasi']; ?>%</span>
                                        <?php } else if ($row['kinerja_minutasi']>50 and $row['kinerja_minutasi']<75) { ?>
                                            <span class="badge badge-pill badge-warning rounded"><?php echo $row['kinerja_minutasi']; ?>%</span>
                                        <?php } else { ?>
                                            <span class="badge badge-pill badge-danger rounded" ><?php echo $row['kinerja_minutasi']; ?>%</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>

