<div class="row layout-top-spacing" id="cancel-row">        
 <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Setting Suara dan Teks</h4>
        </div>
    </div>
</div>         
<div class="row layout-top-spacing" id="cancel-row">
<div class="col-xl-12 col-lg-12 col-sm-12 ">                       
                                <div class="widget-content widget-content-area">
                                    <div id="iconsAccordion" class="accordion-icons">
                                    <div class="card">
                                            <div class="card-header" id="headingOne3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data00" aria-expanded="true" aria-controls="data00">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></div>
                                                        Jenis Suara Antrian  <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div>
                                            <div id="data00" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                <form id="form1">  
                                                    <div class="form-group row mb-3">
                                                    <div class="col-9">
                                                    <div class="n-chk">
                                                            <label class="new-control new-radio radio-primary">
                                                            <input type="radio" class="new-control-input" name="suara" value=1 <?php echo ($audio[0]['status']==1?'checked':''); ?>>
                                                            <span class="new-control-indicator"></span>Suara Laki-Laki atau perempuan (Tidak memerlukan koneksi internet)
                                                            </label>
                                                            
                                                        </div>
                                                        <div class="n-chk">
                                                            <label class="new-control new-radio radio-primary">
                                                            <input type="radio" class="new-control-input" name="suara" value=0 <?php echo ($audio[0]['status']==0?'checked':''); ?>>
                                                            <span class="new-control-indicator"></span>Suara Perempuan Natural (memerlukan koneksi internet)
                                                            </label>
                                                            
                                                        </div>
                                                         </div>
                                                       
                                                         <div class="col-9">
                                                         Jika yang dipilih suara perempuan jika koneksi internet putus/tidak ada, maka secara otomatis akan menggunakan suara laki-laki, sehingga tidak mengganggu  proses pemanggilan antrian
                                                                    
                                                                    </div>
                                                        </div>     
                                                   <input type="hidden" name="tipe" value=1> 
                                                </form>
                                                <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn-sm btn-primary mt-3 simpan_suara" data-tipe="1">Simpan</button>
                                                        </div>
                                                       
                                                </div>
                                                </div>
                                            </div>
                                    </div>
                                        <div class="card">
                                            <div class="card-header" id="headingOne3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data14" aria-expanded="true" aria-controls="data00">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></div>
                                                        Format Suara Antrian  <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div>
                                            <div id="data14" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                    <form id="form14">
                                                        <div class="form-group row mb-3">
                                                            <div class="col-9">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Format suara antrian sidang perkara gugatan/pidana</label>
                                                                    <textarea class="form-control" id="suara_g" name="suara_g" rows="3"><?php echo $audio[13]['suara'];?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Format suara antrian sidang perkara permohonan</label>
                                                                    <textarea class="form-control" id="suara_p" name="suara_p" rows="3"><?php echo $audio[14]['suara'];?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-9">
                                                               Kalimat yang diapit tanda <b>#....#</b> jangan dihapus/dirubah
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="tipe" value=14>
                                                    </form>
                                                    <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn-sm btn-primary mt-3 simpan_suara" data-tipe="14">Simpan</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="card">
                                            <div class="card-header" id="headingOne3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data0" aria-expanded="true" aria-controls="data0">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></div>
                                                        Kelengkapan Nama Para Pihak <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div> 
                                           
                                            <div id="data0" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                <form id="form2">  
                                                    <div class="form-group row mb-3">
                                                    <div class="col-9">
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox new-checkbox-text checkbox-primary">
                                                        <input type="checkbox" class="new-control-input" name="binti" <?php echo ($audio[1]['status']==1?'checked':''); ?>>
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">BIN atau BINTI disebut/panggil</span>
                                                        </label>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <input type="hidden" name="tipe" value=2>
                                                </form>
                                                <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn-sm btn-primary mt-3 simpan_suara" data-tipe="2">Simpan</button>
                                                        </div>
                                                       
                                                </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card">
                                            <div class="card-header" id="headingOne3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data1" aria-expanded="true" aria-controls="data1">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></div>
                                                        Pengumuman mulai sidang di ruang sidang <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div>

                                            <div id="data1" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                <form id="form3">  
                                                    <div class="form-group row mb-3">
                                                        <div class="col-12">
                                                        <textarea id="awal" name="awal" class="form-control" rows="2"><?php echo $audio[2]['suara']; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="tipe" value=3>
                                                </form>
                                                <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary mt-3 simpan_suara" data-tipe="3">Simpan</button>
                                                        </div>
                                                </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card">
                                            <div class="card-header" id="headingOne3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data2" aria-expanded="true" aria-controls="data2">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></div>
                                                        Pengumuman Sidang Diskors Untuk Istirahat <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div>

                                            <div id="data2" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                <form id="form4">  
                                                    <div class="form-group row mb-3">
                                                    <div class="col-12">
                                                        <textarea id="skors" name="skors" class="form-control" rows="2"><?php echo $audio[3]['suara']; ?></textarea>
                                                    </div>
                                                    </div>
                                                    <input type="hidden" name="tipe" value=4>
                                                </form>
                                                <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary mt-3 simpan_suara" data-tipe="4">Simpan</button>
                                                        </div>
                                                </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card">
                                            <div class="card-header" id="headingOne3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data3" aria-expanded="true" aria-controls="data3">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></div>
                                                        Pengumuman Sidang dimulai setelah Diskors Untuk Istirahat <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div>

                                            <div id="data3" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                <form id="form5">  
                                                    <div class="form-group row mb-3">
                                                    <div class="col-12">
                                                    <textarea id="awal" name="skors2" class="form-control" rows="2"><?php echo $audio[4]['suara']; ?></textarea>
                                                    </div>
                                                    </div>
                                                    <input type="hidden" name="tipe" value=5>
                                                </form>
                                                <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary mt-3 simpan_suara" data-tipe="5">Simpan</button>
                                                        </div>
                                                </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card">
                                            <div class="card-header" id="headingOne3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data4" aria-expanded="true" aria-controls="data4">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></div>
                                                        Pengumuman seluruh sidang sudah selesai di ruang sidang <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div>

                                            <div id="data4" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                <form id="form6">  
                                                    <div class="form-group row mb-3">
                                                    <div class="col-12">
                                                    <textarea id="awal" name="selesai" class="form-control" rows="2"><?php echo $audio[5]['suara']; ?></textarea>
                                                    </div>
                                                    </div>
                                                    <input type="hidden" name="tipe" value=6>
                                                </form>
                                                <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary mt-3 simpan_suara" data-tipe="6">Simpan</button>
                                                        </div>
                                                </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card">
                                            <div class="card-header" id="headingOne3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data5" aria-expanded="true" aria-controls="data5">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></div>
                                                        Panggil Saksi Pemohon/Penggugat <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div>

                                            <div id="data5" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                <form id="form7">  
                                                    <div class="form-group row mb-3">
                                                    <div class="col-12">
                                                    <textarea id="awal" name="saksip" class="form-control" rows="2"><?php echo $audio[6]['suara']; ?></textarea>
                                                    </div>
                                                    </div>
                                                    <input type="hidden" name="tipe" value=7>
                                                </form>
                                                <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary mt-3 simpan_suara" data-tipe="7">Simpan</button>
                                                        </div>
                                                </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card">
                                            <div class="card-header" id="headingOne3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data6" aria-expanded="true" aria-controls="data6">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></div>
                                                        Panggil Saksi Termohon/Tergugat <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div>

                                            <div id="data6" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                <form id="form8">  
                                                    <div class="form-group row mb-3">
                                                    <div class="col-12">
                                                    <textarea id="awal" name="saksit" class="form-control" rows="2"><?php echo $audio[7]['suara']; ?></textarea>
                                                    </div>
                                                    </div>
                                                    <input type="hidden" name="tipe" value=8>
                                                </form>
                                                <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary mt-3 simpan_suara" data-tipe="8">Simpan</button>
                                                        </div>
                                                </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card">
                                            <div class="card-header" id="headingOne3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data7" aria-expanded="true" aria-controls="data7">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></div>
                                                        Panggil Petugas <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div>

                                            <div id="data7" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                <form id="form9">  
                                                    <div class="form-group row mb-3">
                                                    <div class="col-12">
                                                    <textarea id="awal" name="petugas" class="form-control" rows="2"><?php echo $audio[8]['suara']; ?></textarea>
                                                    </div>
                                                    </div>
                                                    <input type="hidden" name="tipe" value=9>
                                                </form>
                                                <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary mt-3 simpan_suara" data-tipe="9">Simpan</button>
                                                        </div>
                                                </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card">
                                            <div class="card-header" id="headingOne3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data8" aria-expanded="true" aria-controls="data8">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></div>
                                                        Audio Gratifikasi (akan diputar tiap 2 jam sekali mulai jam 08.00) </b> <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div>

                                            <div id="data8" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                <form id="form10">  
                                                    <div class="form-group row mb-3">
                                                    <div class="col-12">
                                                    <textarea id="awal" name="gratifikasi" class="form-control" rows="10"><?php echo $audio[9]['suara']; ?></textarea>
                                                    </div>
                                                    </div> 
                                                    <div class="form-group row mb-3">
                                                    <div class="col-11" style="text-align:right" id="graf">
                                                    <?php echo ($audio[9]['status']==1?'Suara aktif':'Suara tidak aktif'); ?>
                                                    </div>
                                                    <div class="col-1" >
                                                    <label class="switch s-icons s-outline s-outline-primary mr-2">
                                                    <input type="checkbox" name="aktif" id="aktif" <?php echo ($audio[9]['status']==1?'checked':''); ?>>
                                                    <span class="slider"></span>
                                                    </label>
                                                    </div>
                                                    </div>
                                                    <input type="hidden" name="tipe" value=10>
                                                </form>
                                                <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary mt-3 simpan_suara" data-tipe="10">Simpan</button>
                                                        </div>
                                                       
                                                </div>
                                                </div>
                                            </div>
                                    </div>
                                        <div class="card">
                                            <div class="card-header" id="headingOne3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data9" aria-expanded="true" aria-controls="data9">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg></div>
                                                        Teks Anti Gratifikasi di Ruang Sidang <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div>

                                            <div id="data9" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                    <form id="form11">
                                                        <div class="form-group row mb-3">
                                                            <div class="col-12">
                                                                <textarea id="teks_gratifikasi" name="teks_gratifikasi" class="form-control" rows="7"><?php echo $audio[10]['suara']; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="tipe" value=11>
                                                    </form>
                                                    <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary mt-3 simpan_suara" data-tipe="11">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingOne3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data10" aria-expanded="true" aria-controls="data10">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg></div>
                                                        Running Text Display Antrian <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div>

                                            <div id="data10" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                    <form id="form12">
                                                        <div class="form-group row mb-3">
                                                            <div class="col-12">
                                                                <textarea id="running_teks" name="running_teks" class="form-control" rows="2"><?php echo $audio[11]['suara']; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="tipe" value=12>
                                                    </form>
                                                    <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary mt-3 simpan_suara" data-tipe="12">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


              </div>
              </div>            
                          

                               




