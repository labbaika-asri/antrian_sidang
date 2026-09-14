
<div class="row layout-top-spacing" id="cancel-row">        
 <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Setting Suara</h4>
        </div>
    </div>
</div>

<div class="row layout-top-spacing" id="cancel-row">
<div class="col-xl-12 col-lg-12 col-sm-12 ">
    <div id="kotak1" class="widget-content-area br-4">
    <?php

            $row1=$audio[0];
            $row2=$audio[1];
            $row3=$audio[2];
            $row4=$audio[3];
            $row5=$audio[4];
            $row6=$audio[5];
            $row7=$audio[6];
        
    ?>
                                <form class="form-horizontal" id="formaudio">
                                <div class="form-group row mb-3">
                                        <label for="istirahat" class="col-3 col-form-label"><b>Pengumuman Mulai Sidang</b></label>
                                        <div class="col-9">
                                        <textarea id="awal" name="awal" class="form-control" rows="2"><?php echo $row1; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="istirahat" class="col-3 col-form-label"><b>Pengumuman Sidang Diskors Untuk Istirahat</b></label>
                                        <div class="col-9">
                                        <textarea id="awal" name="skors" class="form-control" rows="2"><?php echo $row2; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="istirahat" class="col-3 col-form-label"><b>Pengumuman Sidang dimulai setelah Diskors Untuk Istirahat</b></label>
                                        <div class="col-9">
                                        <textarea id="awal" name="skors2" class="form-control" rows="2"><?php echo $row7; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="awal" class="col-3 col-form-label"><b>Panggil Saksi Pemohon/Penggugat</b></label>
                                        <div class="col-9">
                                        <textarea id="awal" name="saksip" class="form-control" rows="2"><?php echo $row3; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="istirahat" class="col-3 col-form-label"><b>Panggil Saksi Termohon/Tergugat</b></label>
                                        <div class="col-9">
                                        <textarea id="awal" name="saksit" class="form-control" rows="2"><?php echo $row4; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="mulai" class="col-3 col-form-label"><b>Panggil Petugas</b></label>
                                        <div class="col-9">
                                        <textarea id="awal" name="petugas" class="form-control" rows="2"><?php echo $row5; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="mulai" class="col-3 col-form-label"><b>Audio Gratifikasi</b> <br>(akan diputar tiap 2 jam sekali mulai jam 08.00)</label>
                                        <div class="col-9">
                                        <textarea id="gratifkasi" name="gratifikasi" class="form-control" rows="10"><?php echo  $row6; ?></textarea>
                                        </div>
                                    </div>
                                    </form>
                                    <div class="form-group mb-0 justify-content-end row">
                                        <div class="col-9">
                                        <button type="submit" class="btn btn-info waves-effect waves-light" onclick="simpan_audio()">Simpan</button>
                                        </div>
                                    </div>
                                   
                                    
                            </div>  <!-- end card-body -->
                        </div>
    </div><!-- end col-->
</div>