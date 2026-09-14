<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Ngakses.php';
class Utama extends Ngakses {
   public $array_admin;
    function __construct() {
        parent::__construct();
        $pengguna = array(400690,401627);
        $this->dbsipp = $this->config->item('database_sipp');
        $dt=$this->db->select('value')
            ->from("$this->dbsipp.sys_config")
            ->where('name','kode_satker')->get()->row()->value;
        if (empty($dt)) {
            $dt=0;
        }

        if (!in_array($dt,$pengguna)) {
            redirect(base_url());
        }

        $this->tokencek();
        $this->load->model('m_sidang','sidang');
        $this->load->model('m_suara','suara');
        $this->load->model('m_konfig','konfig');
        $this->load->library('encrypt');
        $this->array_admin=array(1,411,412,413,414,421,422,423,431,441,442,443,444,451,452,453,454,461,462,463,471,472,473,1001,1002,1003,1011,1012,1013,1031,1032,1033,1034);
    }

    public function index()
    {
        //echo"<pre>";
        //print_r($this->session->all_userdata()); exit;
        $tanggal=date('Y-m-d');
        $periode=date('Y-m',strtotime($tanggal));
        $data_sidang=$this->sidang->ambil_total_sidang($periode,$this->session->userdata('iduser'));
        $data['tanggal_sidang']=$tanggal;
        $datas['satker']=$this->sidang->ambil_satkers();
        $datas['totalsidang']='Total sidang bulan ini sejumlah '.$data_sidang." perkara";
        $data['hal']=$this->load->view('halaman/kalenders',$datas,true);
        $this->load->view('layout/main', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());

    }


    public function jumlah_sidang() {
        $data_sidang=$this->sidang->ambil_jumlah_sidang($this->session->userdata('iduser'));
        //  echo "<pre>";
        // print_r($data_sidang);
        //  exit;
        $jenis_antrian=$this->session->userdata('jenis_antrian');
        if(count($data_sidang) > 0) {
            $html='';
            foreach($data_sidang as $data) {
                foreach ($data as $tanggal=>$jumlah) {
                    if(in_array($this->session->userdata('kewenangan'),$this->array_admin)) {
                        $urls='utama/list_sidangadmin/'.encrypt_url($tanggal);
                    } else {
                        $urls='utama/list_sidang/'.encrypt_url($tanggal);
                    }

                    $warna='#090ba1';
                    $detil_kegiatan[]= array(
                        'title'=>$jumlah[0]+$jumlah[1].' Perkara',
                        'start'=>$tanggal,
                        'url'=>$urls,
                        'color'=>$warna
                    );
                }
            }
            echo json_encode( $detil_kegiatan);
        }
    }





    public function list_sidang($tanggal) {
        $tgl_enc=$tanggal;
        $tanggal=decrypt_url($tanggal);
        if(in_array($this->session->userdata('kewenangan'),$this->array_admin)) {
            redirect(base_url().'utama/list_sidang_admin/'.$tanggal);
        }

        if(!strtotime($tanggal)){
            redirect(base_url('utama'));
        }
        if ($tanggal <> date('Y-m-d')) {
            $data['display']='style="display:none;"';
        } else {
            $data['display']='';
        }
        $data['satker']=$this->sidang->ambil_satkers();
        $data['tgl_sidang']=$tanggal;
        $data['masterruang']=$this->sidang->master_ruang();
        $data['daftar_sidang']=$this->sidang->daftar_sidang($tanggal,$this->session->userdata('iduser'));
        if(!in_array($this->session->userdata('kewenangan'),$this->array_admin)) {
            // $ruang=$this->sidang->ambil_ruang($this->session->userdata('iduser'),$tanggal)->row();
            $data['huruf']=$this->sidang->ambil_urut_antrian();
            $data['ruangsidang']=$this->session->userdata('ruang_sidang');
            $data['ruangan_id']=$this->session->userdata('ruangan_id');
            $data['jam_mulai']=$this->session->userdata('jam_mulai');
            $data_dipanggil=explode('|',$this->sidang->no_dipanggil($data['ruangan_id'],$tanggal));
            //echo "<pre>";
            //print_r($data_dipanggil);
            //exit;
            $data['no_dipanggil_cetak']=$data_dipanggil[1];
            $data['no_dipanggil']=$data_dipanggil[0];
            $data['prioritas']=$data_dipanggil[2];
            $data_antrian=$this->sidang->noperk_dipanggil($data['ruangan_id'],$tanggal,$data['no_dipanggil']);
            $antrian_data=explode('|',$data_antrian);
            $data['noperk_dipanggil']=$antrian_data[0];
            $data['perkara_id']=$antrian_data[1];
            $data['alur_perkara']=$antrian_data['3'];
            $data['jenis_perkara']=$antrian_data['4'];
            if($data['perkara_id']<>'-') {
                $majelis=$this->sidang->majelis_perkara($data['perkara_id']);
                $mjl=explode("|",$majelis);
                $data['majelis_kode']=$mjl[0];
                $data['majelis_nama']=$mjl[1];
            } else {
                $data['majelis_kode']="-";
                $data['majelis_nama']="-";
            }
            $data['status_putusan']=$this->sidang->getDataStatusPutusan(15);
            $data['faktor_percerian'] = $this->sidang->getDataFaktorPercerian();
            $data['agenda']=$antrian_data[2];
            $data['status_dipanggil']=$this->sidang->status_dipanggil($data['ruangan_id'],$tanggal,$data['no_dipanggil']);
            $data['jumlah_antrian']=$this->sidang->jumlah_antrian($data['ruangan_id'],$tanggal);
            $data['sisa_antrian']=$this->sidang->sisa_antrian($data['ruangan_id'],$tanggal);
            $data['jumlah_disidang']=$this->sidang->jumlah_disidang($data['ruangan_id'],$tanggal);
            $data['jumlah_dilewat']=$this->sidang->jumlah_dilewat($data['ruangan_id'],$tanggal);
            $data['no_dipanggill']=$this->sidang->no_dipanggill($data['ruangan_id'],$tanggal);
            $data['noperk_dipanggill']=$this->sidang->noperk_dipanggil($data['ruangan_id'],$tanggal,$data['no_dipanggill']);
            $data['sisa_dilewat']=$this->sidang->jumlah_dilewat_blm_selesai($data['ruangan_id'],$tanggal);
            $data['url_sipp']=$this->config->item('url_sipp');
        }
        $data_ses=array(
            "tgl_sidang"=>$tanggal,
        );
        $this->session->set_userdata($data_ses);
        $data['tanggal_indo']=$this->_tgl_indo($tanggal);
        $data['tanggal_sekarang']=$this->_tgl_indo(date('Y-m-d'));
        $data['durasi']=$this->session->userdata('aktif_durasi');
        $data['tgl_enc']=$tgl_enc;
        $data['hadir']=$this->sidang->ambil_setting_hadir();
        $data['hal']=$this->load->view('halaman/list_sidang',$data,true);
        $this->load->view('layout/main_list_sidang', $data);
    }

    public function antrian_sidang_admin() {
        $enc=$this->uri->segment(3);
        if(!isset($enc)) {
            $rr=$this->input->post('ruang',TRUE);
            if($rr<>"0") {
                $tgl_enc=$this->input->post('haris',TRUE);
                $this->session->set_userdata('tgl_enc',$tgl_enc);
                $tanggal=decrypt_url($tgl_enc);
                $ruang=explode('|',decrypt_url($this->input->post('ruang',TRUE)));
                $ruang_nama=$ruang[0];
                $ruangan_id=$ruang[1];
            } else {
                $tgl_enc=encrypt_url($this->session->userdata('tgl_sidang'));
                redirect(base_url('utama/list_sidang_admin/'.$tgl_enc));
            }

        } else {
            $data_dec=decrypt_url($enc);
            $hsl=explode('|',$data_dec);
            $tanggal=$hsl[0];
            $tgl_enc=encrypt_url($tanggal);
            $ruang_nama=$hsl[1];
            $ruangan_id=$hsl[2];
        }
        $this->session->set_userdata('ruang_sidang',$ruang_nama);
        $this->session->set_userdata('ruangan_id',$ruangan_id);
        if(!strtotime($tanggal)){
            redirect(base_url(utama));
        }
        $tgl_sidang=$this->session->userdata('tgl_sidang');
        if ($tgl_sidang<> date('Y-m-d')) {
            $data['display']='style="display:none;"';
        } else {
            $data['display']='';
        }
        $data['ruang']=$this->konfig->ambil_ruangss();
        $data['ruang_nama']=$ruang_nama;
        $data['satker']=$this->sidang->ambil_satkers();
        $data['tgl_sidang']=$tgl_enc;
        $data['masterruang']=$this->sidang->master_ruang();
        $data['daftar_sidang']=$this->sidang->daftar_sidang_admin($tanggal,$ruangan_id);
        // $ruang=$this->sidang->ambil_ruang($this->session->userdata('iduser'),$tanggal)->row();
        $data['huruf']=$this->sidang->ambil_urut_antrian();
        $data['ruangan_id']=$ruangan_id;
        $data['jam_mulai']=$this->session->userdata('jam_mulai');
        //$data['ruangsidangkode']=$this->sidang->ambil_kode_ruang($ruang_nama);
        $data_dipanggil=explode('|',$this->sidang->no_dipanggil($data['ruangan_id'],$tanggal));
        $data['no_dipanggil_cetak']=$data_dipanggil[1];
        $data['no_dipanggil']=$data_dipanggil[0];
        $data_antrian=$this->sidang->noperk_dipanggil($data['ruangan_id'],$tanggal,$data['no_dipanggil']);
        $antrian_data=explode('|',$data_antrian);
        $data['noperk_dipanggil']=$antrian_data[0];
        $data['perkara_id']=$antrian_data[1];
        $data['alur_perkara']=$antrian_data['3'];
        $data['jenis_perkara']=$antrian_data['4'];
        if($data['perkara_id']<>'-') {
            $majelis=$this->sidang->majelis_perkara($data['perkara_id']);
            $mjl=explode("|",$majelis);
            $data['majelis_kode']=$mjl[0];
            $data['majelis_nama']=$mjl[1];
        } else {
            $data['majelis_kode']="-";
            $data['majelis_nama']="-";
        }
        $data['status_putusan']=$this->sidang->getDataStatusPutusan(15);
        $data['faktor_percerian'] = $this->sidang->getDataFaktorPercerian();
        $data['agenda']=$antrian_data[2];
        $data['status_dipanggil']=$this->sidang->status_dipanggil($data['ruangan_id'],$tanggal,$data['no_dipanggil']);
        $data['jumlah_antrian']=$this->sidang->jumlah_antrian($data['ruangan_id'],$tanggal);
        $data['sisa_antrian']=$this->sidang->sisa_antrian($data['ruangan_id'],$tanggal);
        $data['jumlah_disidang']=$this->sidang->jumlah_disidang($data['ruangan_id'],$tanggal);
        $data['jumlah_dilewat']=$this->sidang->jumlah_dilewat($data['ruangan_id'],$tanggal);
        $data['no_dipanggill']=$this->sidang->no_dipanggill($data['ruangan_id'],$tanggal);
        $data['noperk_dipanggill']=$this->sidang->noperk_dipanggil($data['ruangan_id'],$tanggal,$data['no_dipanggill']);
        $data['sisa_dilewat']=$this->sidang->jumlah_dilewat_blm_selesai($data['ruangan_id'],$tanggal);
        $data['url_sipp']=$this->config->item('url_sipp');
        $data_ses=array(
            "tgl_sidang"=>$tanggal,
        );
        $this->session->set_userdata($data_ses);
        $data['tanggal_indo']=$this->_tgl_indo($tanggal);
        $data['tanggal_sekarang']=$this->_tgl_indo(date('Y-m-d'));
        $data['durasi']=$this->session->userdata('aktif_durasi');
        $data['tgl_enc']=$tgl_enc;
        $data['hadir']=$this->sidang->ambil_setting_hadir();
        $data['hal']=$this->load->view('halaman/list_antrian_sidang_admin',$data,true);
        $this->load->view('layout/main_list_sidang', $data);
    }


    public function list_sidang_admin($tanggal) {
        $tgl_enc=$tanggal;
        $tanggal=decrypt_url($tanggal);
        if(!strtotime($tanggal)){
            redirect(base_url(utama));
        }
        $data['ruang']=$this->konfig->ambil_ruangss();
        $data['tgl_sidang']=$tanggal;
        $data['daftar_sidang']=$this->sidang->daftar_sidang_all_admin($tanggal,$this->session->userdata('iduser'));
        $data_ses=array(
            "tgl_sidang"=>$tanggal,
            "ruang_sidang"=> '0'
        );
        $this->session->set_userdata($data_ses);
        $data['tanggal_indo']=$this->_tgl_indo($tanggal);
        $data['tanggal_sekarang']=$this->_tgl_indo(date('Y-m-d'));
        $data['satker']=$this->sidang->ambil_satkers();
        $data['tgl_enc']=$tgl_enc;
        $data['hal']=$this->load->view('halaman/list_sidang_admin',$data,true);
        $this->load->view('layout/main_list_sidang', $data);
    }

    public function list_sidangadmin($tanggal) {
        $tgl_enc=$tanggal;
        $tanggal=decrypt_url($tanggal);
        if(!strtotime($tanggal)){
            redirect(base_url(utama));
        }
        $data['ruang']=$this->konfig->ambil_ruangss();
        $data['tgl_sidang']=$tgl_enc;
        $data['daftar_sidang']=$this->sidang->daftar_sidang_all_admin($tanggal);
        //echo"<pre>";
        // print_r($data['daftar_sidang']->result());exit;
        $data_ses=array(
            "tgl_sidang"=>$tanggal,
            "ruang_sidang"=> '0'
        );
        $this->session->set_userdata($data_ses);
        $data['tanggal_indo']=$this->_tgl_indo($tanggal);
        $data['tanggal_sekarang']=$this->_tgl_indo(date('Y-m-d'));
        $data['satker']=$this->sidang->ambil_satkers();
        $data['tgl_enc']=$tgl_enc;
        $data['hadir']=$this->sidang->ambil_setting_hadir();
        $data['jenis_antrian']=$this->session->userdata('jenis_antrian');
        $data['hal']=$this->load->view('halaman/list_sidang_admins',$data,true);
        $this->load->view('layout/main_list_sidang_admin', $data);
    }



    public function list_dilewat($tanggal) {
        $tgl_enc=$tanggal;
        $tanggal=decrypt_url($tanggal);
        $data['masterruang']=$this->sidang->master_ruang();
        $data['ruangan_id']=$this->session->userdata('ruangan_id');
        $data['hadir']=$this->sidang->ambil_setting_hadir();
        //$data['ruangsidangkode']=$this->sidang->ambil_kode_ruang($this->session->userdata('ruang_sidang'));
        $data['jumlah_dilewat']=$this->sidang->jumlah_dilewat($data['ruangan_id'],$tanggal);
        $data['sisa_dilewat']=$this->sidang->jumlah_dilewat_blm_selesai($data['ruangan_id'],$tanggal);
        $data['status_putusan']=$this->sidang->getDataStatusPutusan(15);
        $data['faktor_percerian'] = $this->sidang->getDataFaktorPercerian();
        $data['ruangsidang']=$this->session->userdata('ruang_sidang');
        $data['satker']=$this->sidang->ambil_satkers();
        $data['tanggal_indo']=$this->_tgl_indo($tanggal);
        $data['daftar_sidang']=$this->sidang->daftar_sidang_dilewat($tanggal,$this->session->userdata('iduser'));
        $data['durasi']=$this->session->userdata('aktif_durasi');
        $data['tgl']=$tanggal;
        $data['tgl_enc']=$tgl_enc;
        $data['masterruangs']=$this->sidang->master_ruang();
        $data['hal']=$this->load->view('halaman/v_sidang_dilewat',$data,true);
        $this->load->view('layout/main_list_sidang_dilewat', $data);
    }

    public function list_dilewat_admin($tanggal) {
        $tgl_enc=$tanggal;
        $tanggal=decrypt_url($tanggal);
        $data['masterruang']=$this->sidang->master_ruang();
        $data['hadir']=$this->sidang->ambil_setting_hadir();
        $data['ruangan_id']=$this->session->userdata('ruangan_id');
        //$data['ruangsidangkode']=$this->sidang->ambil_kode_ruang($this->session->userdata('ruang_sidang'));
        $data['jumlah_dilewat']=$this->sidang->jumlah_dilewat($data['ruangan_id'],$tanggal);
        $data['sisa_dilewat']=$this->sidang->jumlah_dilewat_blm_selesai($data['ruangan_id'],$tanggal);
        $data['status_putusan']=$this->sidang->getDataStatusPutusan(15);
        $data['faktor_percerian'] = $this->sidang->getDataFaktorPercerian();
        $data['ruangsidang']=$data['ruang_nama']=$this->session->userdata('ruang_sidang');
        $data['url']="utama/antrian_sidang_admin/".encrypt_url($tanggal.'|'.$data['ruang_nama'].'|'.$data['ruangan_id']);
        $data['satker']=$this->sidang->ambil_satkers();
        $data['tanggal_indo']=$this->_tgl_indo($tanggal);
        $data['daftar_sidang']=$this->sidang->daftar_sidang_dilewat_admin($tanggal,$this->session->userdata('ruangan_id'));
        $data['durasi']=$this->session->userdata('aktif_durasi');
        $data['tgl']=$tanggal;
        $data['tgl_enc']=$tgl_enc;
        $data['masterruangs']=$this->sidang->master_ruang();
        $data['hal']=$this->load->view('halaman/v_sidang_dilewat_admin',$data,true);
        $this->load->view('layout/main_list_sidang_dilewat', $data);
    }


    public function panggil_sidang() {
        $asing=$this->input->post('asing');
        if (isset($asing)) {
            $asing=$this->input->post('asing');
        } else {
            $asing="0";
        }
        $huruf=$this->sidang->ambil_urut_antrian();
        $jenis_pengadilan=$this->sidang->jenis_pengadilan();
        $tgl_sidang=decrypt_url($this->input->post('tglsidang'));
        $nama_ruang=$this->input->post('ruang');
        $ruangan_id=$this->input->post('ruangan_id');
        $no_antrian=decrypt_url($this->input->post('no'));
        $ruangan_id_arr=$this->sidang->ambil_ruangan_id($ruangan_id);
        //ambil perkara_id da nomor_perkara
        $noperk=$this->sidang->ambil_noperk($tgl_sidang,$ruangan_id,$no_antrian);
        $no_perk=explode('|',$noperk);
        $pkrid=$no_perk[0];
        $noperks=$no_perk[1];
        $prioritas=$no_perk[2];
        $prio=($prioritas==1?'Prioritas':'');
        //cari alur perkara
        $alur=$this->sidang->getAlurPerkara($pkrid);
        $alurs=explode('|',$alur);
        $alur_perkara=$alurs[0];
        $split=explode("/",$noperks);
        //ambil majelis
        $ambil_majelis=$this->sidang->ambil_majelis($pkrid);
        $dt_majelis=explode('|',$ambil_majelis);
        $hakim=$dt_majelis[0];
        $pp=$dt_majelis[1];
        $ambil_pihak=$this->sidang->ambil_pihak($pkrid);
        $pihak=explode('|',$ambil_pihak);
        $pihak_p=strtolower($pihak[0]);
        $pihak_t=strtolower($pihak[1]);
        $pihak_intervensi=strtolower($pihak[2]);
        $pihak_turut=strtolower($pihak[3]);
        //$ambil_pihak2=$this->sidang->ambil_pihak2($pkrid);
        //echo "pihak ".$ambil_pihak;exit;
        //$pihak2=explode('|',$ambil_pihak2);
        $pihak_display=$this->sidang->ambil_pihak2($pkrid);
        $noperk0=$split[0];
        $noperk1=str_replace('.',' ',$split[1]);
        $noperk2=$split[2];
        $nomor_perkara=$noperk0."  ".$noperk1."  ".$noperk2;
        $pengacarap=$this->sidang->ambil_pengacarap($pkrid);
        if($pengacarap<>'') {
            $pengacarap =" dengan Kuasa hukum ".strtolower($pengacarap);
        } else {
            $pengacarap="";
        }

        $pengacarat=$this->sidang->ambil_pengacarat($pkrid);
        if($pengacarat<>'') {
            $pengacarat =" dengan Kuasa hukum ".strtolower($pengacarat);
        } else {
            $pengacarat="";
        }

        $pengacara_intervensi=$this->sidang->ambil_pengacara_intervensi($pkrid);
        if($pengacara_intervensi<>'') {
            $pengacara_intervensi =" dengan Kuasa hukum ".strtolower($pengacara_intervensi);
        } else {
            $pengacara_intervensi="";
        }

        $pengacara_turut=$this->sidang->ambil_pengacara_turut($pkrid);
        if($pengacara_turut<>'') {
            $pengacara_turut =" dengan Kuasa hukum ".strtolower($pengacara_turut);
        } else {
            $pengacara_turut="";
        }


        $waktu = date('Y-m-d H:i:s');
        $status=4;
        $st_panggil = 0;
        $template=$this->suara->ambil_template_suara();
        $temp=explode('|',$template);
        $suara_g=$temp[0];
        $suara_p=$temp[1];
        if($asing=="0") {
            if ($jenis_pengadilan==4) {
                if ($alur_perkara=='15' || $alur_perkara=='17') {
                    $cari=array("#no_antrian#","#nomor_perkara#","#pe#","#pengacaraP#","#te#","#pengacaraT#","#turut_tergugat#","#pengacara_turut#","#intervensi#","#pengacara_intervensi#","#ruang_sidang#");
                    $ganti=array($huruf[$ruangan_id_arr] ."  ". $no_antrian,$nomor_perkara,$pihak_p,$pengacarap,$pihak_t,$pengacarat,$pihak_turut,$pengacara_turut,$pihak_intervensi,$pengacara_intervensi,$nama_ruang);
                    $suara=$prio." ".str_replace($cari,$ganti,$suara_g);
                    $suara_display="$prio Antrian <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> nomor perkara <span style=\'color: red;\'>".$noperks."</span> ".$pihak_display."  silahkan masuk ke ruangan ".$nama_ruang;
                }

                else  if ($alur_perkara=='16') {
                    $cari=array("#no_antrian#","#nomor_perkara#","#pe#","#pengacaraP#","#ruang_sidang#");
                    $ganti=array($huruf[$ruangan_id_arr] ."  ". $no_antrian,$nomor_perkara,$pihak_p,$pengacarap,$nama_ruang);
                    $suara=$prio." ".str_replace($cari,$ganti,$suara_p);
                    $suara_display="$prio Antrian <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> nomor perkara <span style=\'color: red;\'>".$noperks."</span> ".$pihak_display."  silahkan masuk ke ruangan ".$nama_ruang;
                } else {
                    $cari=array("#no_antrian#","#nomor_perkara#","#pe#","#pengacaraP#","#te#","#pengacaraT#","#turut_tergugat#","#pengacara_turut#","#intervensi#","#pengacara_intervensi#","#ruang_sidang#");
                    $ganti=array($huruf[$ruangan_id_arr] ."  ". $no_antrian,$nomor_perkara,$pihak_p,$pengacarap,$pihak_t,$pengacarat,$pihak_turut,$pengacara_turut,$pihak_intervensi,$pengacara_intervensi,$nama_ruang);
                    $suara=$prio." ".str_replace($cari,$ganti,$suara_g);
                    $suara_display="$prio Antrian <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> nomor perkara <span style=\'color: red;\'>".$noperks."</span> ".$pihak_display."  silahkan masuk ke ruangan ".$nama_ruang;
                }
            } else if ($jenis_pengadilan==1) {
                $alur_gugatan = array(1, 3, 4, 5, 6, 7, 8);
                $alur_permohonan = array(2, 18);

                if (in_array($alur_perkara,$alur_permohonan)) {
                    $cari=array("#no_antrian#","#nomor_perkara#","#pe#","#pengacaraP#","#ruang_sidang#");
                    $ganti=array($huruf[$ruangan_id_arr] ."  ". $no_antrian,$nomor_perkara,$pihak_p,$pengacarap,$nama_ruang);
                    $suara=$prio." ".str_replace($cari,$ganti,$suara_p);
                    $suara_display="$prio Antrian <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> nomor perkara <span style=\'color: red;\'>".$noperks."</span> ".$pihak_display."  silahkan masuk ke ruangan ".$nama_ruang;
                } else if (in_array($alur_perkara,$alur_gugatan) or $alur_perkara>=111) {
                    $cari=array("#no_antrian#","#nomor_perkara#","#pe#","#pengacaraP#","#te#","#pengacaraT#","#turut_tergugat#","#pengacara_turut#","#intervensi#","#pengacara_intervensi#","#ruang_sidang#");
                    $ganti=array($huruf[$ruangan_id_arr] ."  ". $no_antrian,$nomor_perkara,$pihak_p,$pengacarap,$pihak_t,$pengacarat,$pihak_turut,$pengacara_turut,$pihak_intervensi,$pengacara_intervensi,$nama_ruang);
                    $suara=$prio." ".str_replace($cari,$ganti,$suara_g);
                    if ($alur_perkara==114) {
                        $suara=$prio." ".str_replace('melawan','',$suara);
                    }
                    $suara_display="$prio Antrian <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> nomor perkara <span style=\'color: red;\'>".$noperks."</span> ".$pihak_display."  silahkan masuk ke ruangan ".$nama_ruang;
                } else {
                    $cari=array("#no_antrian#","#nomor_perkara#","#pe#","#pengacaraP#","#te#","#pengacaraT#","#turut_tergugat#","#pengacara_turut#","#intervensi#","#pengacara_intervensi#","#ruang_sidang#");
                    $ganti=array($huruf[$ruangan_id_arr] ."  ". $no_antrian,$nomor_perkara,$pihak_p,$pengacarap,$pihak_t,$pengacarat,$pihak_turut,$pengacara_turut,$pihak_intervensi,$pengacara_intervensi,$nama_ruang);
                    $suara=$prio." ".str_replace($cari,$ganti,$suara_g);
                }

            } else if ($jenis_pengadilan==3) {
                $alur_gugatan = array(9, 11, 14,);
                $alur_permohonan = array(10, 12, 13);

                if (in_array($alur_perkara,$alur_permohonan)) {
                    $cari=array("#no_antrian#","#nomor_perkara#","#pe#","#pengacaraP#","#ruang_sidang#");
                    $ganti=array($huruf[$ruangan_id_arr] ."  ". $no_antrian,$nomor_perkara,$pihak_p,$pengacarap,$nama_ruang);
                    $suara=$prio." ".str_replace($cari,$ganti,$suara_p);
                    $suara_display="$prio Antrian <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> nomor perkara <span style=\'color: red;\'>".$noperks."</span> ".$pihak_display."  silahkan masuk ke ruangan ".$nama_ruang;
                } else  if (in_array($alur_perkara,$alur_gugatan)) {
                    $cari=array("#no_antrian#","#nomor_perkara#","#pe#","#pengacaraP#","#te#","#pengacaraT#","#turut_tergugat#","#pengacara_turut#","#intervensi#","#pengacara_intervensi#","#ruang_sidang#");
                    $ganti=array($huruf[$ruangan_id_arr] ."  ". $no_antrian,$nomor_perkara,$pihak_p,$pengacarap,$pihak_t,$pengacarat,$pihak_turut,$pengacara_turut,$pihak_intervensi,$pengacara_intervensi,$nama_ruang);
                    $suara=$prio." ".str_replace($cari,$ganti,$suara_g);
                    $suara_display="$prio Antrian <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> nomor perkara <span style=\'color: red;\'>".$noperks."</span> ".$pihak_display."  silahkan masuk ke ruangan ".$nama_ruang;
                } else {
                    $suara="$prio Antrian !".$huruf[$ruangan_id_arr] ."  ". $no_antrian."! nomor perkara ".$nomor_perkara."! ".strtolower($pihaks1)."  ".$pengacarap.".".$melawan."  ".strtolower($pihaks2).". ".$pengacarat." silahkan masuk ke ruangan ".$nama_ruang.".";
                    $suara_display="$prio Antrian <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> nomor perkaras <span style=\'color: red;\'>".$noperks."</span> ".$pihak_display."  silahkan masuk ke ruangan ".$nama_ruang;
                }

            }

            $bahasa="Bahasa Indonesia";
        } else
            if($asing=="1") {
                $suara="$prio nomer antrian !".$huruf[$ruangan_id_arr]."-".$no_antrian."! nomor perkara ".strtoupper($nomor_perkara)."! silahkan masuk ke ruangan ".$nama_ruang;
                $suara_display="queue <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> case Number <span style=\'color: red;\'>".$noperks." please enter courtroom ".$nama_ruang;
                $bahasa="Bahasa Inggris";
            } else if($asing=="2") {
                $suara="$prio antrian !".$huruf[$ruangan_id_arr]."-".$no_antrian."! nomor perkara ".strtoupper($nomor_perkara)."! silahkan masuk ke ruangan ".$nama_ruang;
                $suara_display="número de cola <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> número de caso <span style=\'color: red;\'>".$noperks." por favor ingrese a la sala del tribunal ".$nama_ruang;
                $bahasa="Bahasa Spanyol";
            }
            else if($asing=="3") {
                $suara="$prio antrian !".$huruf[$ruangan_id_arr]."-".$no_antrian."! nomor perkara ".strtoupper($nomor_perkara)."! silahkan masuk ke ruangan ".$nama_ruang;
                $suara_display="queue <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> numéro de dossier <span style=\'color: red;\'>".$noperks." veuillez entrer dans la salle d\'audience ".$nama_ruang;
                $bahasa="Bahasa Perancis";
            }
            else if($asing=="4") {
                $suara="$prio antrian !".$huruf[$ruangan_id_arr]."-".$no_antrian."! nomor perkara ".strtoupper($nomor_perkara)."! silahkan masuk ke ruangan ".$nama_ruang;
                $suara_display="Warteschlange <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> Fallnummer <span style=\'color: red;\'>".$noperks." bitte betreten Sie den Hauptgerichtssaal ".$nama_ruang;
                $bahasa="Bahasa Jerman";
            }
            else if($asing=="5") {
                $suara="$prio antrian !".$huruf[$ruangan_id_arr]."-".$no_antrian."! nomor perkara ".strtoupper($nomor_perkara)."! silahkan masuk ke ruangan ".$nama_ruang;
                $suara_display="Numero di coda <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> numero di caso <span style=\'color: red;\'>".$noperks." si prega di entrare in aula ".$nama_ruang;
                $bahasa="Bahasa Italia";
            }
            else if($asing=="6") {
                $suara="antrian !".$huruf[$ruangan_id_arr]."-".$no_antrian."! nomor perkara ".strtoupper($nomor_perkara)."! silahkan masuk ke ruangan ".$nama_ruang;
                $suara_display="Warteschlange <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> zaaknummer <span style=\'color: red;\'>".$noperks." ga de rechtszaal binnen ".$nama_ruang;
                $bahasa="Bahasa Belanda";
            }
            else if($asing=="7") {
                $suara="antrian !".$huruf[$ruangan_id_arr]."-".$no_antrian."! nomor perkara ".strtoupper($nomor_perkara)."! silahkan masuk ke ruangan ".$nama_ruang;
                $suara_display="номер очереди <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> номер дела <span style=\'color: red;\'>".$noperks." пожалуйста, войдите в зал суда ".$nama_ruang;
                $bahasa="Bahasa Rusia";
            }
            else if($asing=="8") {
                $suara="$prio antrian !".$huruf[$ruangan_id_arr]."-".$no_antrian."! nomor perkara ".strtoupper($nomor_perkara)."! silahkan masuk ke ruangan ".$nama_ruang;
                $suara_display="queue <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> case Number <span style=\'color: red;\'>".$noperks." please enter courtroom ".$nama_ruang;
                $bahasa="Bahasa Arab";
            }
            else if($asing=="9") {
                $suara="$prio antrian !".$huruf[$ruangan_id_arr]."-".$no_antrian."! nomor perkara ".strtoupper($nomor_perkara)."! silahkan masuk ke ruangan ".$nama_ruang;
                $suara_display="queue <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> case Number <span style=\'color: red;\'>".$noperks." please enter courtroom ".$nama_ruang;
                $bahasa="Bahasa Turki";
            }
            else if($asing=="10") {
                $suara="antrian !".$huruf[$ruangan_id_arr]."-".$no_antrian."! nomor perkara ".strtoupper($nomor_perkara)."! silahkan masuk ke ruangan ".$nama_ruang;
                $suara_display="queue <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> case Number <span style=\'color: red;\'>".$noperks." please enter courtroom ".$nama_ruang;
                $bahasa="Bahasa India";
            }
            else if($asing=="11") {
                $suara="antrian !".$huruf[$ruangan_id_arr]."-".$no_antrian."! nomor perkara ".strtoupper($nomor_perkara)."! silahkan masuk ke ruangan ".$nama_ruang;
                $suara_display="queue <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> case Number <span style=\'color: red;\'>".$noperks." please enter courtroom ".$nama_ruang;
                $bahasa="Bahasa Mandarin/China";
            }
            else if($asing=="12") {
                $suara="$prio antrian !".$huruf[$ruangan_id_arr]."-".$no_antrian."! nomor perkara ".strtoupper($nomor_perkara)."! silahkan masuk ke ruangan ".$nama_ruang;
                $suara_display="queue <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> case Number <span style=\'color: red;\'>".$noperks." please enter courtroom ".$nama_ruang;
                $bahasa="Bahasa Jepang";
            }
            else if($asing=="13") {
                $suara="$prio antrian !".$huruf[$ruangan_id_arr]."-".$no_antrian."! nomor perkara ".strtoupper($nomor_perkara)."! silahkan masuk ke ruangan ".$nama_ruang;
                $suara_display="queue <span style=\'color: red;\'>".$huruf[$ruangan_id_arr]."-".$no_antrian."</span> case Number <span style=\'color: red;\'>".$noperks." please enter courtroom ".$nama_ruang;
                $bahasa="Bahasa Korea";
            }

            else {
                $suara="Tidak diketahui";
                $suara_display="Tidak diketahui";
                $bahasa="Tidak diketahui";
            }

        $data_insert=array(
            'perkara_id'=>$pkrid,
            'suara'=>$suara,
            'suara_display'=>$suara_display,
            'tgl_sidang'=>$tgl_sidang,
            'waktu'=>$waktu,
            'ruang'=>$nama_ruang,
            'ruangan_id'=>$ruangan_id,
            'no_antrian'=>$no_antrian,
            'st_panggil'=>$st_panggil,
            'status'=>$status,
            'asing'=>$asing
        );
        //echo "<pre>";
        // print_r($data_insert);exit;
        $this->sidang->input_panggilan($pkrid,$tgl_sidang,$data_insert);
        echo json_encode(array('bahasa'=>$bahasa));
    }

    public function lewati_sidang() {

        $tgl_sidang=decrypt_url($this->input->post('tglsidang'));
        $ruangan_id=$this->input->post('ruangan_id');
        $no_antrian=decrypt_url($this->input->post('no'));
        $this->sidang->lewati_sidang($tgl_sidang,$ruangan_id,$no_antrian);
    }

    public function mulai_sidang() {
        $this->session->set_userdata('jam_mulai',date('H:i:s'));
        $tgl_sidang=decrypt_url($this->input->post('tglsidang'));
        $ruangan_id=$this->input->post('ruangan_id');
        $no_antrian=decrypt_url($this->input->post('no'));
        $this->sidang->mulai_sidang($tgl_sidang,$ruangan_id,$no_antrian);
    }


    public function  selesai_sidang() {
        $tgl_sidang=decrypt_url($this->input->post('tglsidang'));
        $ruangan_id=$this->input->post('ruangan_id');
        $no_antrian=decrypt_url($this->input->post('no'));
        $this->sidang->selesai_sidang($tgl_sidang,$ruangan_id,$no_antrian);
    }




    function _tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
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

        $tanggal='Hari '.$dayList[$day].' '.$pecahkan[2].' '.$bulan[ (int)$pecahkan[1] ].' '.$pecahkan[0];
        return $tanggal;
    }



    public function view_isi_durasi() {
        $pkrid=$this->input->post('pkrid',TRUE);
        $tglsidang=$this->input->post('tglsidang',TRUE);
        $tglsidang=decrypt_url($tglsidang);
        $ruangan_id=$this->input->post('ruangan_id',TRUE);
        $isi=$this->sidang->ambil_data_sidang($pkrid,$tglsidang);
        $durasi=$this->input->post('durasi',TRUE);
        $masterruang=$this->sidang->master_ruang();

        echo <<<EOT
    <form action="#" id="form">
    <div class="form-group">
    <label for="jabatan" class="control-label">Nomor Perkara</label>
    <input type="text" class="form-control" id="noperk" name="noperk" value="$isi->nomor_perkara" readonly>
    <input type="hidden" name="pkrid" value="$isi->perkara_id">
     <input type="hidden" name="tgl_sidangs" value="$isi->tanggal_sidang">
     <input type="hidden" name="ruangan_id" value="$ruangan_id">
    <label for="jabatan" class="control-label">Tanggal Sidang</label>
    <input type="text" class="form-control" id="tgl_sidang" name="tgl_sidang" value="$isi->tgl_sidang" readonly>
    <label for="agenda" class="control-label">Agenda Sidang</label>
     <textarea class="form-control" id="agenda" name="agenda" rows="3" readonly>$isi->agenda</textarea>
    <label for="isi" class="control-label">Durasi Sidang (menit)</label>
    <input type="text" class="form-control " id="isi" name="durasi" maxlength="5" value=$durasi>
      </form>
EOT;

    }

    public function isi_durasi() {
        $perkaraid=$this->input->post('pkrid',TRUE);
        $tglsidang=$this->input->post('tgl_sidangs',TRUE);
        $durasi=$this->input->post('durasi',TRUE);
        $this->sidang->isi_durasi($perkaraid,$tglsidang,$durasi);

    }


    public function view_isi_ruang() {
        $hakim_id=$this->input->post('hakim_id',TRUE);
        $hakim_nama=$this->input->post('hakim_nama',TRUE);
        $hari=$this->input->post('hari',TRUE);
        switch ($hari) {
            case 1:
                $haris='Minggu';
                break;
            case 2:
                $haris='Senin';
                break;
            case 3:
                $haris='Selasa';
                break;
            case 4:
                $haris='Rabu';
                break;
            case 5:
                $haris='Kamis';
                break;
            case 6:
                $haris='Jumat';
                break;
            case 7:
                $haris='Sabtu';
                break;
            default:
                $haris='tidak diketahui';
        }
        echo <<<EOT
    <form action="#" id="form">
    <div class="form-group">
    <label for="km" class="control-label">Ketua Majelis</label>
    <input type="text" class="form-control" id="km" name="km" value="$hakim_nama" readonly>
    <input type="hidden" name="hakim_id" value="$hakim_id">
    <input type="hidden" name="hari" value="$hari">
    <label for="hari" class="control-label">Hari</label>
    <input type="text" class="form-control" id="hari" name="haris" value="$haris" readonly>
    <label for="isi" class="control-label">Ruang</label>
    <input type="text" class="form-control" id="isi" name="ruang_ikrar" value="" required>
    </form>
EOT;

    }

    public function view_bahasa_asing() {

        echo <<<EOT
    <form action="#" id="form_asing">
    <input type="hidden" name="nomor_perkara">
      <input type="hidden" name="no_antrian_cetak">
        <input type="hidden" name="ruang">
        <input type="hidden" name="ruangan_id">
        <input type="hidden" name="tglsidang">
         <input type="hidden" name="no">
         <input type="hidden" name="asing" value=1>
    <div class="n-chk">
    <label class="new-control new-radio radio-danger">
    <input type="radio" class="new-control-input" name="asing" value=1>
    <span class="new-control-indicator"></span>Bahasa Inggris
    </label>
    </div>
    <div class="n-chk">
    <label class="new-control new-radio radio-danger">
    <input type="radio" class="new-control-input" name="asing" value=2>
    <span class="new-control-indicator"></span>Bahasa Spanyol
    </label>
    </div>
    <div class="n-chk">
    <label class="new-control new-radio radio-danger">
    <input type="radio" class="new-control-input" name="asing" value=3>
    <span class="new-control-indicator"></span>Bahasa Perancis
    </label>
    </div>
    <div class="n-chk">
    <label class="new-control new-radio radio-danger">
    <input type="radio" class="new-control-input" name="asing" value=4>
    <span class="new-control-indicator"></span>Bahasa Jerman
    </label>
    </div>
     <div class="n-chk">
    <label class="new-control new-radio radio-danger">
    <input type="radio" class="new-control-input" name="asing" value=5>
    <span class="new-control-indicator"></span>Bahasa Italia
    </label>
    </div>
    <div class="n-chk">
    <label class="new-control new-radio radio-danger">
    <input type="radio" class="new-control-input" name="asing" value=6>
    <span class="new-control-indicator"></span>Bahasa Belanda
    </label>
    </div>
     <div class="n-chk">
    <label class="new-control new-radio radio-danger">
    <input type="radio" class="new-control-input" name="asing" value=7>
    <span class="new-control-indicator"></span>Bahasa Rusia
    </label>
    </div>
       <div class="n-chk">
    <label class="new-control new-radio radio-danger">
    <input type="radio" class="new-control-input" name="asing" value=8>
    <span class="new-control-indicator"></span>Bahasa Arab
    </label>
    </div>
    <div class="n-chk">
    <label class="new-control new-radio radio-danger">
    <input type="radio" class="new-control-input" name="asing" value=9>
    <span class="new-control-indicator"></span>Bahasa Turki
    </label>
    </div>
        <div class="n-chk">
    <label class="new-control new-radio radio-danger">
    <input type="radio" class="new-control-input" name="asing" value=10>
    <span class="new-control-indicator"></span>Bahasa India
    </label>
    </div>
      <div class="n-chk">
    <label class="new-control new-radio radio-danger">
    <input type="radio" class="new-control-input" name="asing" value=11>
    <span class="new-control-indicator"></span>Bahasa Mandarin/China
    </label>
    </div>
       <div class="n-chk">
    <label class="new-control new-radio radio-danger">
    <input type="radio" class="new-control-input" name="asing" value=12>
    <span class="new-control-indicator"></span>Bahasa Jepang
    </label>
    </div>
      <div class="n-chk">
    <label class="new-control new-radio radio-danger">
    <input type="radio" class="new-control-input" name="asing" value=13>
    <span class="new-control-indicator"></span>Bahasa Korea
    </label>
    </div>
    </form>
EOT;

    }




    public function view_edit_ruang() {
        $hakim_id=$this->input->post('hakim_id',TRUE);
        $hakim_nama=$this->input->post('hakim_nama',TRUE);
        $hari=$this->input->post('hari',TRUE);
        $ruang=$this->input->post('ruang',TRUE);
        $masterruang=$this->sidang->master_ruang();
        switch ($hari) {
            case 1:
                $haris='Minggu';
                break;
            case 2:
                $haris='Senin';
                break;
            case 3:
                $haris='Selasa';
                break;
            case 4:
                $haris='Rabu';
                break;
            case 5:
                $haris='Kamis';
                break;
            case 6:
                $haris='Jumat';
                break;
            case 7:
                $haris='Sabtu';
                break;
            default:
                $haris='tidak diketahui';
        }
        echo <<<EOT
    <form action="#" id="form">
    <div class="form-group">
    <label for="km" class="control-label">Ketua Majelis</label>
    <input type="text" class="form-control" id="km" name="km" value="$hakim_nama" readonly>
    <input type="hidden" name="hakim_id" value="$hakim_id">
    <input type="hidden" name="hari" value="$hari">
    <label for="hari" class="control-label">Hari</label>
    <input type="text" class="form-control" id="hari" name="haris" value="$haris" readonly>
    <label for="isi" class="control-label">Ruang</label>
EOT;
        echo'<select class="form-control" id="isi" name="ruang">';
        echo'<option value=0>-Pilih ruang sidang-</option>';
        foreach ($masterruang->result() as $rows) {
            if ($rows->nama==$ruang) {
                $selected="selected";
            } else {
                $selected="123";
            }
            echo"<option value='".$rows->nama."' $selected>$rows->nama</option>";
        }
        echo'   
  </select>
    </form>
';

    }


    public function view_list_pkr() {
        $hakim_id=$this->input->post('hakim_id',TRUE);
        $hakim_nama=$this->input->post('hakim_nama',TRUE);
        $hari=$this->input->post('hari',TRUE);
        $ruang=$this->input->post('ruang',TRUE);

        $pkr=$this->sidang->ambil_perkara_hakim($hakim_id,$ruang);
        switch ($hari) {
            case 1:
                $haris='Minggu';
                break;
            case 2:
                $haris='Senin';
                break;
            case 3:
                $haris='Selasa';
                break;
            case 4:
                $haris='Rabu';
                break;
            case 5:
                $haris='Kamis';
                break;
            case 6:
                $haris='Jumat';
                break;
            case 7:
                $haris='Sabtu';
                break;
            default:
                $haris='tidak diketahui';
        }
        //$html ='<h4>Perkara '.$hakim_nama.' </h4>';
        //$html .='<h4>Hari sidang '.$haris.' </h4>';
        $html='';
        $i=1;
        foreach($pkr->result() as $row) {
            $html.='<tr>';
            $html .= '<td>'.$i++.'</td>';
            $html .= '<td>'.$row->nomor_perkara.'</td>';
            $html .= '<td>'.$row->tgl_sidang.'</td>';
            $html .= '<td>'.$row->ruang.'</td>';
            $html .= '<td>'.$row->agenda.'</td>';
            $html .= '<td>'.$row->sidkel.'</td>';
            $html .='</tr>';
        }
        echo $html;

    }


    public function view_list_pkr_pp() {
        $hakim_id=$this->input->post('hakim_id',TRUE);
        $hakim_nama=$this->input->post('hakim_nama',TRUE);
        $hari=$this->input->post('hari',TRUE);
        $ruang=$this->input->post('ruang',TRUE);
        $pkr=$this->sidang->ambil_perkara_pp($hakim_id,$ruang);
        switch ($hari) {
            case 1:
                $haris='Minggu';
                break;
            case 2:
                $haris='Senin';
                break;
            case 3:
                $haris='Selasa';
                break;
            case 4:
                $haris='Rabu';
                break;
            case 5:
                $haris='Kamis';
                break;
            case 6:
                $haris='Jumat';
                break;
            case 7:
                $haris='Sabtu';
                break;
            default:
                $haris='tidak diketahui';
        }
        //$html ='<h4>Perkara '.$hakim_nama.' </h4>';
        //$html .='<h4>Hari sidang '.$haris.' </h4>';
        $html='';
        $i=1;
        foreach($pkr->result() as $row) {
            $html.='<tr>';
            $html .= '<td>'.$i++.'</td>';
            $html .= '<td>'.$row->nomor_perkara.'</td>';
            $html .= '<td>'.$row->tgl_sidang.'</td>';
            $html .= '<td>'.$row->ruang.'</td>';
            $html .= '<td>'.$row->agenda.'</td>';
            $html .= '<td>'.$row->sidkel.'</td>';
            $html .='</tr>';
        }
        echo $html;

    }

    public function view_set_ruang() {
        $perkara_id=$this->input->post('pkrid');
        $tgl_sidang=$this->input->post('tgl_sidang');
        $masterruang=$this->sidang->master_ruang();
        echo <<<EOT
    <form action="#" id="form">
    <div class="form-group">
    <input type="hidden" name="perkara_id" value="$perkara_id">
    <input type="hidden" name="tgl_sidang" value="$tgl_sidang">
    <label for="isi" class="control-label">Ruang</label>
EOT;
        echo'<select class="form-control" id="isi" name="ruang_isian">';
        foreach ($masterruang->result() as $rows) {
            echo"<option value=$rows->id".($this->session->userdata('ruangan_id')==$rows->id?' selected':'').">".$rows->nama."</option>";
        }
        echo'   
  </select>
    </form>
';

    }


}
