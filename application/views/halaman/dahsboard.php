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
        <div class="panel">
            <div class="panel-heading">
                <div class="pull-left">
                    <h4 class="panel-title">Rapor Penanganan Perkara Satker Berdasarkan SIPP</h4>
                </div><!-- /.pull-left -->
                <div class="pull-right">
                    <button class="btn btn-sm" data-action="expand" data-toggle="tooltip" data-placement="top" data-title="Expand"><i class="fa fa-expand"></i></button>
                    <button class="btn btn-sm" data-action="refresh" data-toggle="tooltip" data-placement="top" data-title="Refresh"><i class="fa fa-refresh"></i></button>
                    <button class="btn btn-sm" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
                    <button class="btn btn-sm" data-action="remove" data-toggle="tooltip" data-placement="top" data-title="Remove"><i class="fa fa-times"></i></button>
                </div><!-- /.pull-right -->
                <div class="clearfix"></div>
            </div><!-- /.panel-heading -->
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <div class="mini-stat-type-4 bg-success shadow">
                            <h4>BEBAN PERKARA</h4>
                            <h2 ><?php echo $kinerja['jml_beban_perkara']; ?></h2>
                            <a href="#" class="btn bg-success">Detil</a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <div class="mini-stat-type-4 bg-primary shadow">
                            <h4>PERKARA PUTUS</h4>
                            <H2 ><?php echo $kinerja['jml_putus']; ?></H2>
                            <a href="#" class="btn bg-primary">Detil</a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <div class="mini-stat-type-4 bg-danger shadow">
                            <h4>BEBAN MINUTASI</h4>
                            <H2><span ><?php echo $kinerja['beban_minutasi']; ?></span></H2>
                            <a href="#" class="btn bg-danger">Detil</a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <div class="mini-stat-type-4 bg-success shadow">
                            <h4>MINUTASI</h4>
                            <H2><span ><?php echo $kinerja['minutasi']; ?></span></H2>
                            <a href="#" class="btn bg-success">Detil</a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <div class="mini-stat-type-4 bg-primary shadow">
                            <h4>SISA UPLOAD</h4>
                            <h2 ><?php echo $kinerja['sisa_upload']; ?></h2>
                            <a href="#" class="btn bg-primary">Detil</a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <div class="mini-stat-type-4 bg-danger shadow">
                            <h4>UPLOAD PUTUS</h4>
                            <h2 ><?php echo $kinerja['upload_putus_thn_ini']; ?></h2>
                            <a href="#" class="btn bg-danger">Detil</a>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <div class="mini-stat-type-4 bg-success shadow">
                            <h4>BOBOT PROSES</h4>
                            <H2><span ><?php echo $kinerja['bobot_proses']; ?></span> %</H2>
                            <a href="#" class="btn bg-success">Detil</a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <div class="mini-stat-type-4 bg-primary shadow">
                            <h4>WAKTU PUTUS</h4>
                            <h2><span ><?php echo $kinerja['bobot_putus']; ?></span> %</h2>
                            <a href="#" class="btn bg-primary">Detil</a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <div class="mini-stat-type-4 bg-danger shadow">
                            <h4>WAKTU MINUTASI</h4>
                            <h2><span ><?php echo $kinerja['bobot_minutasi']; ?></span> %</h2>
                            <a href="#" class="btn bg-danger">Detil</a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <div class="mini-stat-type-4 bg-success shadow">
                            <h4>BOBOT UPLOAD</h4>
                            <h2><span ><?php echo $kinerja['bobot_upload']; ?></span> %</h2>
                            <a href="#" class="btn bg-success">Detil</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="mini-stat-type-4 bg-primary shadow">
                            <h4>PROSENTASE KINERJA SATKER</h4>
                            <h2><span><?php echo $kinerja['kinerja_satker']; ?></span> %</h2>
                            <a href="#" class="btn bg-primary">Detil</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>