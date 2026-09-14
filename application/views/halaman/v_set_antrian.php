<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Setting Antrian Sidang</h4>
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
                                Urutan Huruf Cetak Antrian Ruang Sidang  <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                            </div>
                        </section>
                    </div>
                    <div id="data00" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                        <div class="card-body">
                            <form id="form1">
                                <div class="form-group row mb-6">
                                    <div class="col-12">
                                        <h6><b>Urutan Huruf Cetak Antrian Ruang Sidang</b></h6>
                                        <h6>Ruang sidang yang aktif sejumlah <?php echo $this->session->userdata('jumlah_ruang'); ?> yaitu (<?php echo $ruang_sidang; ?>), contoh urutanya A,B,C,D atau K,L,M,N (huruf kapital dipisah dengan koma)</h6>
                                    </div>
                                </div>
                                <div class="form-group row mb-6">
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="urut_antrian" id="urut_antrian" value="<?php echo $urutan; ?>" oninput="this.value = this.value.replace(/[^A-Z, ]/, '')">
                                        <input type="hidden" name="tipe" value=1>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn-sm btn-primary mt-3 simpan_set_antrian" data-tipe="1">Simpan</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingOne3">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data01" aria-expanded="true" aria-controls="data00">
                                <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></div>
                                Kehadiran Pihak  <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                            </div>
                        </section>
                    </div>


                    <div id="data01" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                        <div class="card-body">
                            <form id="form2">
                                <input type="hidden" name="tipe" value=2>
                                <div class="form-group row mb-6">
                                    <div class="col-2" id="hadir">
                                        <?php  echo ($status_kehadiran==1?'Kehadiran aktif':'Kehadiran tidak aktif'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-6">
                                    <div class="col-2">
                                        <label class="switch s-icons s-outline s-outline-primary mr-2">
                                            <input type="checkbox" name="status_kehadiran" id="status_kehadiran" <?php echo ($status_kehadiran==1?'checked':''); ?>>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn-sm btn-primary mt-3 simpan_set_antrian" data-tipe="2">Simpan</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingOne3">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data02" aria-expanded="true" aria-controls="data00">
                                <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></div>
                              Photo Ambil Antrian  <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                            </div>
                        </section>
                    </div>
                    <div id="data02" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                        <div class="card-body">
                            <form id="form3">
                                <input type="hidden" name="tipe" value=3>
                                <div class="form-group row mb-6">
                                    <div class="col-12" id="photo">
                                        <?php  echo ($status_photo==1?'Photo aktif':'Photo tidak aktif'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-6">
                                    <div class="col-2">
                                        <label class="switch s-icons s-outline s-outline-primary mr-2">
                                            <input type="checkbox" name="status_photo" id="status_photo" <?php echo ($status_photo==1?'checked':''); ?>>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn-sm btn-primary mt-3 simpan_set_antrian" data-tipe="3">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($this->session->userdata('jenis_pengadilan')==4): ?>
                <div class="card">
                    <div class="card-header" id="headingOne3">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data03" aria-expanded="true" aria-controls="data00">
                                <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></div>
                                Antrian Online  <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                            </div>
                        </section>
                    </div>
                    <div id="data03" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                        <div class="card-body">
                            <form id="form4">
                                <input type="hidden" name="tipe" value=4>
                                <div class="form-group row mb-6">
                                    <div class="col-2" id="grafs">
                                        <?php echo ($antrian==1?' <h6><b>Antrian online aktif</b></h6>':'<h6><b>Antrian online tidak aktif</b></h6>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-6">
                                    <div class="col-2" id="grafs">
                                        <label class="switch s-icons s-outline s-outline-primary mr-2">
                                            <input type="checkbox" name="status_antrian" id="status_antrian" <?php echo ($antrian==1?'checked':''); ?> value="aktif">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row mb-6">
                                    <div class="col-12" id="grafs">
                                        <h6><b>Waktu Ambil Antrian Online </b></h6>
                                        <h6>mulai @hari sebelum sidang s/d 1 hari sebelum sidang</h6>
                                    </div>
                                </div>
                                <div class="form-group row mb-6">
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="mulai_ambil" id="mulai_ambil" value="<?php echo $hari; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="3">
                                    </div>
                                </div>
                            </form>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn-sm btn-primary mt-3 simpan_set_antrian" data-tipe="4">Simpan</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>
                <div class="card">
                    <div class="card-header" id="headingOne3">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="collapsed" data-toggle="collapse" data-target="#data05" aria-expanded="true" aria-controls="data00">
                                <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></div>
                                Tipe Antrian (full Otomatis/Semi Otomatis)<div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                            </div>
                        </section>
                    </div>
                    <div id="data05" class="collapse" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                        <div class="card-body">
                            <form id="form5">
                                <input type="hidden" name="tipe" value=5>
                                <div class="form-group row mb-6">
                                    <label class="col-form-label col-xl-2 col-sm-3 col-sm-2 pt-0"><b>Pilih System Antrian Yang Digunakan</b></label>
                                        <div class="col-xl-9 col-lg-9 col-sm-10">
                                            <div class="form-check mb-2">
                                                <div class="custom-control custom-radio classic-radio-info">
                                                    <input type="radio" id="hRadio1" name="jenis_antrian" value=0 class="custom-control-input" <?php echo $jenis_antrian==0?'checked':''; ?>>
                                                    <label class="custom-control-label" for="hRadio1">Antrian Sidang Full Otonom</label>
                                                </div>
                                            </div>
                                            <div class="form-check mb-2">
                                                <div class="custom-control custom-radio classic-radio-info">
                                                    <input type="radio" id="hRadio2" name="jenis_antrian" value=1 class="custom-control-input" <?php echo $jenis_antrian==1?'checked':''; ?>>
                                                    <label class="custom-control-label" for="hRadio2">Antrian  Sidang Semi Otonom</label>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-6">
                                    <div class="col-xl-8 col-lg-8 col-sm-8">
                                        <b>Antrian Full Otonom</b> adalah antrian dimana pihak mengambil dan mencetak sendiri nomer antrianya, siapa datang terlebih dahulu maka akan dapat nomer antrian yg lebih awal;
                                    <br><b>Antrian Semi Otonom</b> adalah antrian dimana pihak hanya melakukan check in kehadiran, nomer antrian dan ruangan ditentukan oleh Pengadilan;
                                    </div>
                                </div>
                            </form>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn-sm btn-primary mt-3 simpan_set_antrian" data-tipe="5">Simpan</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




