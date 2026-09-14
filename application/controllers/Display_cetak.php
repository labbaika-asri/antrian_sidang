<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display_cetak extends CI_Controller {

    public $db_antrian;

    public function __construct()
    {
        parent::__construct();
        $this->db_antrian=$this->config->item('db_antrian');
        $this->load->model('m_sidang','sidang');
    }

    private function _tgl_indo($tanggal)
    {
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        $day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );

        $tanggal = strtoupper($dayList[$day] . ' ' . $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0]);
        return $tanggal;
    }

   private function _check_https() {

        if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {

            return 1;
        } else {
            return 0;
        }

    }

    public function v3() {
        $list['tgl']=$this->_tgl_indo(date('Y-m-d'));
        $tgl=date('Y-m-d');
        $list['daftar_sidang']=$this->sidang->ambil_perkara_sidang($tgl);
        $list['satker']=$this->sidang->ambil_satkers();
        $list['tanggal']=$this->_tgl_indo(date('Y-m-d'));
        $list['jenis_pengadilan']=$this->sidang->jenis_pengadilan();
        $list['durasi']=$this->sidang->status_durasi();
        $list['photo']=$this->db->query("SELECT status FROM $this->db_antrian.setting where jenis='photo'")->row()->status;
        $list['https']=$this->_check_https();
        $ip = $this->input->ip_address();
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'] . '/';
        $url =  $protocol . $domainName;
        $list['url_ptsp']=$url.$this->config->item('folder_aplikasi_ptsp')."/display/cetak";
        $this->load->view('halaman/v_display_cetak2',$list);
     }

    public function v2() {
        $list['tgl']=$this->_tgl_indo(date('Y-m-d'));
        $tgl=date('Y-m-d');
        $data['https']=$list['https']=$this->_check_https();
        $list['satker']=$this->sidang->ambil_satkers();
        $list['durasi']=$this->sidang->status_durasi();
        $list['hadir']=$this->db->query("SELECT status FROM $this->db_antrian.setting where jenis='hadir'")->row()->status;
        $data['photo']=$list['photo']=$this->db->query("SELECT status FROM $this->db_antrian.setting where jenis='photo'")->row()->status;
        $data['jenis_antrian']=$list['jenis_antrian']=$this->db->query("SELECT status FROM $this->db_antrian.setting where jenis='jenis_antrian'")->row()->status;
        if($data['jenis_antrian']==0) {
            $list['daftar_sidang']=$this->sidang->ambil_perkara_sidang($tgl);
            $data['hal']=$this->load->view('halaman/v_display_cetak',$list,true);
        } else {
            $list['daftar_sidang']=$this->sidang->ambil_perkara_sidang_semi($tgl);
            $data['hal']=$this->load->view('halaman/v_display_cetak3',$list,true);

        }

        $this->load->view('layout/main_antrian', $data);
    }

    public function index() {
        $list['tgl']=$this->_tgl_indo(date('Y-m-d'));
        $tgl=date('Y-m-d');
        $list['daftar_sidang']=$this->sidang->ambil_perkara_sidang($tgl);
        $list['satker']=$this->sidang->ambil_satkers();
        $list['tanggal']=$this->_tgl_indo(date('Y-m-d'));
        $list['jenis_pengadilan']=$this->sidang->jenis_pengadilan();
        $list['durasi']=$this->sidang->status_durasi();
        $list['photo']=$this->db->query("SELECT status FROM $this->db_antrian.setting where jenis='photo'")->row()->status;
        $list['https']=$this->_check_https();
        $ip = $this->input->ip_address();
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'] . '/';
        $url =  $protocol . $domainName;
        $list['url_ptsp']=$url.$this->config->item('folder_aplikasi_ptsp')."/display/cetak";
        $this->load->view('halaman/v_display_cetak4',$list);
     }



    public function check_antrian() {
     $barcode=$this->input->post('barcode');
     $barcode=decrypt_url(preg_replace('/\s+/','',$barcode));
     $bar=explode('|',$barcode);
     if ($bar[0]==1) {
         $perkara_id=$bar[1];
         $tgl_sidang=$bar[2];
         $tgl_sekarang=date('Y-m-d');
         if ($tgl_sidang< $tgl_sekarang) {
             echo json_encode(array("hasil"=>0,"pesan"=>"Tanggal sidang sudah lewat hari, tidak perlu dicetak"));
             return;
         }
         $info=$this->sidang->info_antrian($perkara_id,$tgl_sidang)->row();
         if (isset($info->no_antrian) && ($info->no_antrian > 0)) {
                     //echo json_encode(array("hasil" => 1, "pesan" => "antrian ditemukan  " . $barcode));
                     echo json_encode(array("hasil" => 1, "pesan" => "antrian ditemukan akan dicetak"));
              }  else {
                   //echo json_encode(array("hasil"=>0,"pesan"=>"Barcode tidak sesuai ".$barcode));
                   echo json_encode(array("hasil"=>0,"pesan"=>"Barcode tidak sesuai bukan dari aplikasi antrian ini ".$barcode));
              }

         }
             elseif ($bar[0]==2) {//atrian_Ptsp
                 $etiket=$bar[1];
                 $info_ptsp=$this->sidang->ambil_antrian_ptsp_online($etiket)->row();
                 $tgl_sekarang=date('Y-m-d');
                 $tgl_antrian=$info_ptsp->tanggal;
                 if ($tgl_antrian < $tgl_sekarang) {
                     echo json_encode(array("hasil"=>0,"pesan"=>"Tanggal antrian yag dipesan sudah lewat hari, silahkan ambil ulang"));
                     return;
                 }
                 if ($info_ptsp->no_antrian > 0) {
                     echo json_encode(array("hasil"=>1,"pesan"=>"antrian ptsp ditemukan  ".$barcode));
                 } else {
                     echo json_encode(array("hasil"=>0,"pesan"=>"Nomor tiket oline PTSP tidak ditemukan  silahkan konfirmasi ke meja informasi"));
                 }
             }
                elseif ($bar[0]==3) { //ekartu
                     $perkara_id=$bar[1];
                     $tgl_sidang=date('Y-m-d');
                     $info=$this->sidang->info_antrian2($perkara_id,$tgl_sidang);
                     if ($info->num_rows() > 0) {
                             echo json_encode(array("hasil"=>1,"pesan"=>"antrian ditemukan  ".$barcode));
                         } else {
                            $nomor_perkara=$this->sidang->ambilnoperk($perkara_id);
                            echo json_encode(array("hasil"=>0,"pesan"=>"Nomor perkara ".$nomor_perkara." Tidak ada sidang hari ini, silahkan konnfirmasi ke meja informasi"));
                     }
                 }
          else {
            echo json_encode(array("hasil"=>0,"pesan"=>"Barcode tidak sesuai, bukan dari aplikasi antrian ini"));
          }
          

   }

    public function _isi_antrian($perkara_id) {
        $huruf=$this->sidang->ambil_urut_antrian();
        $tgl_sidang=date('Y-m-d');
        $kweri_tanggal=$this->db->query("select a.tanggal_sidang as tgl_sidang,agenda,ifnull(a.ruangan_id,ifnull(h.ruangan_id,0)) as ruangan_id 
                                        from perkara_jadwal_sidang a
                                        left join $this->db_antrian.ruang_sidang_isian h  
                                            on a.perkara_id=h.perkara_id and a.tanggal_sidang=h.tanggal_sidang
                                        where a.perkara_id=$perkara_id and a.tanggal_sidang='".$tgl_sidang."'")->row();
        $ruangan_id=$kweri_tanggal->ruangan_id;
        $tgl_sidang=$kweri_tanggal->tgl_sidang;
        $ruangan_id_arr=$this->sidang->ambil_ruangan_id($ruangan_id);
        $posisi=$this->db->query("SELECT * FROM $this->db_antrian.antrian_sidang WHERE tanggal_sidang='".$tgl_sidang."' AND ruangan_id=$ruangan_id ORDER BY no_antrian DESC LIMIT 1")->row();
        if(!isset($posisi->no_antrian) or (empty($posisi->no_antrian))) {
            $posisi_antrian=0;
        } else {
            $posisi_antrian=$posisi->no_antrian;
        }
        $noperk=$this->sidang->ambilnoperk($perkara_id);
        $nama_ruang=$this->sidang->nama_ruang($ruangan_id);
        $no_antrian=$posisi_antrian+1;
        $no_antrian_cetak=$huruf[$ruangan_id_arr]."-".$no_antrian;
        $tgl_diambil= date("Y-m-d H:i:s");
        $tgl_diambil2= date_format(date_create($tgl_diambil),'d-m-Y H:i:s');
        $durasi=$this->sidang->status_durasi();
            $agenda=$this->sidang->ambil_agenda($perkara_id,$tgl_sidang);
            $data_insert=array(
                'nomor_perkara'=>$noperk,
                'perkara_id'=>$perkara_id,
                'tanggal_sidang'=>$tgl_sidang,
                'ruang_sidang'=>$nama_ruang,
                'ruang_kode'=>NULL,
                'ruangan_id'=>$ruangan_id,
                'agenda_sidang'=>$agenda,
                'no_antrian'=>$no_antrian,
                'no_antrian_cetak'=>$no_antrian_cetak,
                'tgl_ambil'=>$tgl_diambil
            );
            $this->sidang->insert_antrian($data_insert);
    }

    public function cetak_antrian_online() {
        $huruf=$this->sidang->ambil_urut_antrian();
        $barcode=urldecode($this->uri->segment(3));
        $barcode=decrypt_url(preg_replace('/\s+/','',$barcode));
        $bar=explode('|',$barcode);
        $perkara_id=$bar[1];
        if($bar[0]==1) {
            $tgl_sidang=$bar[2];
        } elseif ($bar[0]==3) {
            $tgl_sidang=date('Y-m-d');
            //cek apakah ada antrian//
            $kweri_ada=$this->db->query("select count(*) as jumlah from $this->db_antrian.antrian_sidang where perkara_id=$perkara_id and tanggal_sidang='".$tgl_sidang."'")->row();
            if($kweri_ada->jumlah==0){
                $this->_isi_antrian($perkara_id);
            }
        }
          elseif ($bar[0]==2) {
            //ceetak ptsp
              $tiket=$bar[1];
              $huruf=range('A','z');
              $data['nama_pa']=$this->sidang->ambil_satkers();
              $tanggal=date('Y-m-d');
              //cek sudah ambil atau belum
              $info=$this->sidang->ambil_antrian_ptsp_online($tiket)->row();
              $no_antrian=$info->no_antrian+1;
              $data['berantai']=$info->berantai;
              $data['no_antrian'] = $huruf[$info->no_loket-1]."-".$info->no_antrian;
              $data['no_loket'] = $info->no_loket;
              $data['tanggal']=date_format(date_create($info->tanggal),'d-m-Y');
              $data['nama_layanan']=$info->nama_layanan;
              $tgl_diambil= date("Y-m-d H:i:s");
              $data['tgl_diambil']=$tgl_diambil;
              $data['url_antrian_sidang_depan']=base_url('display_cetak');
              $this->load->view('halaman/v_antrian_cetak_ptsp',$data);
              return;
          }

        else {
            echo json_encode(array("hasil"=>0,"pesan"=>"Barcode tidak sesuai"));
        }
        $info=$this->sidang->info_antrian($perkara_id,$tgl_sidang)->row();
        $data['nama_pa']=str_replace("|","<br>",$this->sidang->ambil_satker());
        $data['no_perk']=$this->sidang->ambil_perkara($perkara_id);
        $data['no_antrian']=$info->no_antrian_cetak;
        $data['ruang']=($info->ruang_sidang);
        $data['tanggal_sidang']=date_format(date_create($info->tanggal_sidang),'d-m-Y');
        $data['jam_sidang']=date('H:i:s',strtotime($info->jam_mulai));
        $data['tgl_ambil']= date("d-m-Y H:i:s");
        $this->load->view('halaman/v_antrian_cetak',$data);

    }




    public function cetak_antrian() {
         $huruf=$this->sidang->ambil_urut_antrian();
         $pkrid=decrypt_url($this->uri->segment(3));
         $tanggal=decrypt_url($this->uri->segment(4));
         $ruangan_id=$this->uri->segment(5);
         $iduser=$this->session->userdata('iduser');
         if($iduser==0) {
             $admin='admin';
         } else {
             $admin='';
         }

         $ruangan_id_arr=$this->sidang->ambil_ruangan_id($ruangan_id);
         $data['nama_pa']=str_replace("|","<br>",$this->sidang->ambil_satker());
         $data['no_perk']=$this->sidang->ambil_perkara($pkrid);
         $durasi=$this->sidang->status_durasi();
         $noperk=$this->sidang->ambilnoperk($pkrid);
         //cek sudah ambil atau belum
         $info=$this->sidang->info_antrian($pkrid,$tanggal)->row();
         if (isset($info->no_antrian) and ($info->no_antrian > 0)) {
            $data['no_antrian']=$info->no_antrian_cetak;
            $data['ruang']=$info->ruang_sidang;
            $data['tanggal_sidang']=date_format(date_create($info->tanggal_sidang),'d-m-Y');
            $data['jam_sidang']=date('H:i:s',strtotime($info->jam_mulai));
            $tgl_ambil=$info->tgl_ambil;
         } else {
             $posisi=$this->sidang->posisi_antrian_akhir($ruangan_id,$tanggal)->row();
             if(empty($posisi->no_antrian)) {
                 $posisi_antrian=0;
             } else {
                 $posisi_antrian=$posisi->no_antrian;
             }

             $data['tanggal_sidang']=date('d-m-Y');
             $data['jam_sidang']='';
             $nama_ruang=$this->sidang->nama_ruang($ruangan_id);
             $noantrian=$posisi_antrian+1;
             $data['no_antrian'] = $huruf[$ruangan_id_arr]."-".$noantrian;
             $data['ruang'] = $nama_ruang;
             $tgl_ambil=date("Y-m-d H:i:s");
                 $agenda=$this->sidang->ambil_agenda($pkrid,$tanggal);
                 $data_insert=array(
                     'nomor_perkara'=>$noperk,
                     'perkara_id'=>$pkrid,
                     'tanggal_sidang'=>$tanggal,
                     'ruang_sidang'=>$nama_ruang,
                     'ruang_kode'=>NULL,
                     'ruangan_id'=>$ruangan_id,
                     'agenda_sidang'=>$agenda,
                     'no_antrian'=>$noantrian,
                     'no_antrian_cetak'=>$data['no_antrian'],
                     'tgl_ambil'=>$tgl_ambil
                 );
                 $this->sidang->insert_antrian($data_insert);
         }
         $data['tgl_ambil']= date_format(date_create($tgl_ambil),'d-m-Y H:i:s');
         if( $admin=='admin') {
             $this->load->view('halaman/v_antrian_cetaks',$data);
         } else {
             $this->load->view('halaman/v_antrian_cetak',$data);
         }

     }

    public function simpan_poto() {
        $this->load->model('m_suara','proses');
        $gbr = $this->input->post('image');
        $perkara=decrypt_url($this->input->post('nomor_perkara'));
        $tgl_sidang=decrypt_url($this->input->post('tgl_sidang'));
        $tgl_ambil=$this->input->post('tglambil');
        $modified=date("Y-m-d H:i:s");
        $folderPath = "photo_antrian/";
        $image_parts = explode(";base64,", $gbr);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $nama_file=time();
        $gbrs = $nama_file.'.'.$image_type;
        $file = $folderPath . $gbrs;
        if(file_put_contents($file, $image_base64)) {
            $this->proses->simpan_photo($perkara,$tgl_sidang,$gbrs);
        } else {

            echo "gagal simpan gambar";
        }
    }

    public function ambil_antrian() {
        $data=[];
        $pihak=$this->input->post('pihak');
        $nomor_perkara=decrypt_url($this->input->post('nomor_perkara'));
        if (isset($pihak)) {
            $tgl=date('Y-m-d H:i:s');
            foreach ($pihak as $pihaks) {
                $datas[]=array('nomor_perkara'=>$nomor_perkara,'tgl_sidang'=>date('Y-m-d'),'id_pihak'=>$pihaks,'tgl_ambil'=>$tgl);
            }
            $this->db->insert_batch("$this->db_antrian.kehadiran_sidang", $datas);
        }
        $perkara_id=$this->input->post("perkara_id",true);
        $tanggal=$this->input->post('tgl_sidang',true);
        $ruang=$this->input->post("ruang",true);
        if (isset($ruang) and !empty($ruang)) {
            $data=array (
                'status'=>1,
                'perkara_id'=>$perkara_id,
                'nomor_perkara'=>$nomor_perkara,
                'tanggal'=>$tanggal,
                'ruang'=>$ruang,
                'pesan'=>'OK bisa dicetak'
            );
        } else {
            $data=array (
                'status'=>0,
                'perkara_id'=>$perkara_id,
                'nomor_perkara'=>$nomor_perkara,
                'tanggal'=>$tanggal,
                'ruang'=>$ruang,
                'pesan'=>'Ruang sidang kosong, Silahkan isi terlebih dahulu'
            );
        }

        echo json_encode($data);

    }

}   