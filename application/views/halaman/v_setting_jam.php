
<div class="row layout-top-spacing" id="cancel-row">        
 <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Setting Jam dan Durasi</h4>
        </div>
    </div>
</div>

<div class="row layout-top-spacing" id="cancel-row">
<div class="col-xl-12 col-lg-12 col-sm-12 ">
    <div id="kotak1" class="widget-content-area br-4">

                                <h4 class="mb-3 header-title">Setting Jam Persidangan</h4>

                                <form class="form-horizontal" id="form">
                                    <div class="form-group row mb-3">
                                        <label for="awal" class="col-3 col-form-label">Jam Awal Mulai Sidang</label>
                                        <div class="col-9">
                                            <input type="time" class="form-control" name="jam_awal" id="jam_awal" placeholder="format 09:00" value="<?php echo  empty($jam_sidang->jam_mulai_sidang)?'':$jam_sidang->jam_mulai_sidang; ?>"> 
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="istirahat" class="col-3 col-form-label">Jam Istirahat</label>
                                        <div class="col-9">
                                            <input type="time" class="form-control" name="jam_istirahat" id="jam_istirahat" placeholder="format 09:00" value="<?php echo empty($jam_sidang->jam_istirahat_sidang)?'':$jam_sidang->jam_istirahat_sidang; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="mulai" class="col-3 col-form-label">Jam Awal Mulai Sidang Setelah Istirahat</label>
                                        <div class="col-9">
                                            <input type="time" class="form-control"  name="jam_mulai_istirahat" id="jam_mulai_istirahat" placeholder="format 09:00" value="<?php echo empty($jam_sidang->jam_mulai_istirahat)?'':$jam_sidang->jam_mulai_istirahat; ?>">
                                        </div>
                                    </div>
                                    </form>
                                    <div class="form-group mb-0 justify-content-end row">
                                        <div class="col-9">
                                            <button type="submit" class="btn btn-info waves-effect waves-light" onclick="simpan_jam()">Simpan</button>
                                        </div>
                                    </div>
                              

                            </div>  <!-- end card-body -->
                        </div>
    </div><!-- end col-->
    <div class="row layout-top-spacing" id="cancel-row">
<div class="col-xl-12 col-lg-12 col-sm-12 ">
    <div id="kotak1" class="widget-content-area br-4">

                                <h4 class="mb-3 header-title">Setting Durasi Sidang</h4>

                                <form id="formdurasi">
                                    <div class="form-group row mb-6">
                                        <div class="col-2" id="grafs">
                                            <?php echo ($durasi==1?'Setting Durasi aktif':'Setting Durasi tidak aktif'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-6">
                                        <div class="col-2" id="grafs">
                                            <label class="switch s-icons s-outline s-outline-primary mr-2">
                                                <input type="checkbox" name="status" id="status" <?php echo ($durasi==1?'checked':''); ?>>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                    </div>
                                  </form>
                                    <div class="form-group mb-6 row">
                                        <div class="col-2">
                                            <button type="submit" class="btn btn-info waves-effect waves-light" onclick="simpan_durasi()">Simpan</button>
                                        </div>
                                    </div>
                            </div>  <!-- end card-body -->
                        </div>
    </div><!-- end col-->

