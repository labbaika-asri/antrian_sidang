<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Ngakses.php';
class Konfig extends Ngakses
{


    function __construct()
    {
        parent::__construct();
        $this->tokencek();
        $this->load->model('m_sidang', 'sidang');
        $this->load->model('m_konfig', 'konfig');
        $this->load->model('m_suara', 'suara');
    
    }

    public function ruang_sidang() {
        $data['satker']=$this->sidang->ambil_satkers(); 
         $data['ruang_sidang']=$this->sidang->ambil_konfig_ruang();
         $data['ruang_sidang_pp']=$this->sidang->ambil_konfig_ruang_pp();
         $data['ruang_sidang_antrian']=$this->konfig->ambil_ruangs();
         $data['hal']=$this->load->view('halaman/v_setting_ruang',$data,true);
         $this->load->view('layout/main_konfig', $data);
      }


    
  public function jam_sidang() {
    $data['satker']=$this->sidang->ambil_satkers();
    $data['jam_sidang']=$this->sidang->ambil_konfig_jam();
    $data['durasi']=$this->sidang->ambil_setting_durasi();
    $data['hal']=$this->load->view('halaman/v_setting_jam',$data,true);
    $this->load->view('layout/main_konfig', $data);
 }


 public function ambil_ruang() {
        $hasil=$this->konfig->ambil_ruang();
 }

    public function simpan_ruang() {

        if (count($_POST['ruang'])>0) {
            $this->konfig->reset_ruang();
            foreach($_POST['ruang'] as $key=>$value) {
                //echo "key: $key, value: $value <br>";
                $this->konfig->update_ruang($value);
            }
        }
    }


public function isi_ruang_pp() {
    $panitera_id=$this->input->post('panitera_id',TRUE);
    $panitera_nama=$this->input->post('pp',TRUE);
    $hari=$this->input->post('hari',TRUE);
    $ruang=$this->input->post('ruang',TRUE);
    $this->sidang->isi_ruang_pp($panitera_id,$panitera_nama,$hari,$ruang);

}


 public function reset_suara() {
    $data['list_suara']=$this->sidang->list_suara_sidang();
    $data['satker']=$this->sidang->ambil_satkers();
    $data['hal']=$this->load->view('halaman/v_reset_suara',$data,true);
    $this->load->view('layout/main_konfig', $data);
 }


 public function reset_suara_sidang() {
    $this->sidang->hapus_antrian_suara();
 }

    public function isi_ruang() {
        $hakim_id=$this->input->post('hakim_id',TRUE);
        $hakim_nama=$this->input->post('km',TRUE);
        $hari=$this->input->post('hari',TRUE);
        $ruang=$this->input->post('ruang',TRUE);
        $this->sidang->isi_ruang($hakim_id,$hakim_nama,$hari,$ruang);
    }

    public function set_ruang_isian() {
        $pkrid=decrypt_url($this->input->post('perkara_id'));
        $tgl_sidang=decrypt_url($this->input->post('tgl_sidang'));
        $ruangan_id=$this->input->post('ruang_isian',TRUE);
        $this->sidang->set_ruang_isian($pkrid,$tgl_sidang,$ruangan_id);
    }


    public function isi_jam() {
        $jam_awal=$this->input->post('jam_awal',TRUE);
        $jam_istirahat=$this->input->post('jam_istirahat',TRUE);
        $jam_mulai_istirahat=$this->input->post('jam_mulai_istirahat',TRUE);
        $this->sidang->isi_jam($jam_awal,$jam_istirahat,$jam_mulai_istirahat);

    }

    public function simpan_audio() {
        $tipe=$this->input->post('tipe');
        if($tipe==1) {
         $status=$this->input->post('suara');   
         $this->suara->update_aktif($tipe,$status);
        }
        if($tipe==2) { 
            $status=$this->input->post('binti');    
           if(isset($status)) {
               $status=1;
           } else {
               $status=0;
           }
            $this->suara->update_aktif($tipe,$status); 
         }
         if($tipe==3) {
            $suara=$this->input->post('awal',TRUE);
            $this->suara->update_audio($tipe,$suara,1);
           
         }
         if($tipe==4) {
            $suara=$this->input->post('skors',TRUE);
            $this->suara->update_audio($tipe,$suara,1);
         }
         if($tipe==5) {
            $suara=$this->input->post('skors2',TRUE);
            $this->suara->update_audio($tipe,$suara,1);
         }
         if($tipe==6) {
            $suara=$this->input->post('selesai',TRUE);
            $this->suara->update_audio($tipe,$suara,1);
         }
         if($tipe==7) {
            $suara=$this->input->post('saksip',TRUE);
            $this->suara->update_audio($tipe,$suara,1);
         }
         if($tipe==8) {
            $suara=$this->input->post('saksit',TRUE);
            $this->suara->update_audio($tipe,$suara,1);
         }
         if($tipe==9) {
            $suara=$this->input->post('petugas',TRUE);
            $this->suara->update_audio($tipe,$suara,1);
         }
         if($tipe==10) {
            $aktif=$this->input->post('aktif');
            if (isset($aktif)) {
                $status=1;
            } else {
                $status=0;
            }
            $suara=$this->input->post('gratifikasi',TRUE);
            $this->suara->update_audio($tipe,$suara,$status);
         }

        if($tipe==11) {
            $suara=$this->input->post('teks_gratifikasi',TRUE);
            $this->suara->update_audio($tipe,$suara,1);
        }

        if($tipe==12) {
            $suara=$this->input->post('running_teks',TRUE);
            $this->suara->update_audio($tipe,$suara,1);
        }

        if($tipe==13) {
            $suara=$this->input->post('antrian_sidang',TRUE);
            $this->suara->update_audio($tipe,$suara,1);
        }

        if($tipe==14) {
            $suara_g=$this->input->post('suara_g',TRUE);
            $this->suara->update_audio(14,$suara_g,1);
            $suara_p=$this->input->post('suara_p',TRUE);
            $this->suara->update_audio(15,$suara_p,1);
        }

        redirect(base_url('konfig/suara'));

    }

    public function simpan_set_antrian() {
        $tipe=$this->input->post('tipe');
        if($tipe==1) {
            $urutan=$this->input->post('urut_antrian');
            $this->suara->set_urutan($urutan);
        }

        if($tipe==2) {
            $hadir=$this->input->post('status_kehadiran');
            if(isset($hadir)) {
                $hadir=1;
            } else {
                $hadir=0;
            }
            $this->suara->set_hadir($hadir);
        }

        if($tipe==3) {
            $photo=$this->input->post('status_photo');
            if(isset($photo)) {
                $photo=1;
            } else {
                $photo=0;
            }
            $this->suara->set_photo($photo);
        }

        if($tipe==4) {
            $antrian=$this->input->post('status_antrian');
            $hari=$this->input->post('mulai_ambil');
            if(isset($antrian)) {
                $antrian=1;
            } else {
                $antrian=0;
            }
            $this->suara->set_aktif_antrian($antrian,$hari);
        }

        if($tipe==5) {
            $jenis_antrian=$this->input->post('jenis_antrian');
            $this->suara->set_jenis_antrian($jenis_antrian);
        }


        redirect(base_url('konfig/set_antrian'));

    }


    public function suara() {
        $datas['satker']=$this->sidang->ambil_satkers();
        $datas['audio']=$this->suara->ambil_audio();
        $data['hal']=$this->load->view('halaman/v_setting_suara',$datas,true);
        $this->load->view('layout/main_konfig', $data);
     }

     public function set_durasi() {
         $aktif=$this->input->post('status');
         if (isset($aktif)) {
             $status=1;
         } else {
             $status=0;
         }
         $this->sidang->update_durasi($status);
         redirect(base_url('konfig/jam_sidang'));
     }

     public function ambil_teks_gratifikasi() {

        echo $this->suara->ambil_teks_gratifikasi(11);
     }

    public function set_antrian() {
       // $data['list_suara']=$this->sidang->list_suara_sidang();
        $data['satker']=$this->session->userdata('satker');
        $data['urutan']=implode(',',$this->sidang->ambil_urut_antrian());
        $data['ruang_sidang']=$this->suara->ruang_sidang();
        $data['antrian']=$this->suara->ambil_aktif_antrian()->row()->status;
        $data['status_kehadiran']=$this->suara->ambil_aktif_hadir()->row()->status;
        $data['status_photo']=$this->suara->ambil_aktif_photo()->row()->status;
        $data['hari']=$this->suara->ambil_aktif_antrian()->row()->ket;
        $data['jenis_antrian']=$this->suara->ambil_aktif_jenis()->row()->status;
        $data['hal']=$this->load->view('halaman/v_set_antrian',$data,true);
        $this->load->view('layout/main_konfig', $data);
    }

    public function ambil_config() {
        $konfig=$this->suara->ambil_config();
        json_encode(array('hasil'=>$konfig));

    }



}