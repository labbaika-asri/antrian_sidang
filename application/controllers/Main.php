<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Ngakses.php';
class Main extends Ngakses
{
    public $db_antrian;

    function __construct()
    {
        parent::__construct();
        $this->tokencek();
        $this->db_antrian=$this->config->item('db_antrian');
        $this->load->model('m_laporan','laporan');
        $this->load->model('m_sidang','sidang');
        $this->load->model('m_suara');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['hasil'] = $this->mproses->ambil_data();
        $this->load->view('header');
        $this->load->view('hal_kirim', $data);
        $this->load->view('footer');

    }


    Public function laporan_antrian() {
        $tgl_awal=$this->input->post('tgl_awal');
        $tgl_akhir=$this->input->post('tgl_akhir');
        $ruang=$this->input->post('ruang');
        //$ruang_kode=$this->sidang->ambil_kode_ruang($this->session->userdata('ruang_sidang'));
        if(isset($tgl_awal) and ($tgl_awal<>'')) {
            $tgl_awals=date_format(date_create($tgl_awal),'Y-m-d');
        } else {
            $tgl_awals=0;
        }

        if(isset($tgl_akhir) and ($tgl_akhir<>'')) {
            $tgl_akhirs=date_format(date_create($tgl_akhir),'Y-m-d');
        } else {
            $tgl_akhirs=0;
        }

        if (isset($ruang)) {
            $ruangs=$ruang;
        } else {
            $ruangs="0";
        }

        //echo "ruang ".$ruangs;exit;

        $datas['satker']=$this->sidang->ambil_satkers();
        $datas['antrian']=$this->laporan->ambil_data_antrian($tgl_awals,$tgl_akhirs,$ruangs);
        $datas['ruang']=$this->sidang->master_ruang();
        $datas['tglawal']=$tgl_awal;
        $datas['tglakhir']=$tgl_akhir;
        $datas['ruangs']=$ruangs;
        //$datas['majelis']=$this->laporan->ambil_data_majelis();
        $data['hal']=$this->load->view('halaman/v_laporan_antrian',$datas,true);
        $this->load->view('layout/main_laporan', $data);

    }

    Public function prioritas_antrian() {
        $tgl_prio=$this->input->post('tgl');
        if(!isset($tgl_prio)) {
            $tgl_prio=date('Y-m-d');
        }
        $tgl=$tgl_awals=date_format(date_create($tgl_prio),'Y-m-d');;
        $datas['satker']=$this->sidang->ambil_satkers();
        $datas['antrian']=$this->laporan->ambil_data_antrian_prioritas($tgl);
        $data['hal']=$this->load->view('halaman/v_prioritas',$datas,true);
        $this->load->view('layout/main_laporan', $data);
    }

    Public function jurnal_sidang() {
        $tgl_awal=$this->input->post('tgl_awal');
        if(isset($tgl_awal)) {
            $tglawal=date_format(date_create($tgl_awal),'Y-m-d');
        } else {
            $tglawal=date('Y-m-d');
        }
        $majelis=$this->input->post('majelis');
        if(isset($majelis)) {
            $majeliss=$majelis;
        } else {
            if($this->session->userdata('kewenangan')<>1) {
                $majeliss=$this->session->userdata('jabatan_singkat').'|'.$this->session->userdata('iduser').'|'.$this->session->userdata('nama');
            } else {
                $majeliss=0;
            }
        }
        $datas['tanggal']=date_format(date_create($tglawal),'d-m-Y');
        $datas['mjl']=$majeliss;
        $datas['satker']=$this->sidang->ambil_satkers();
        $datas['majelis']=$this->laporan->ambil_data_majelis();
        $datas['data_sidang']=$this->laporan->ambil_data_sidang_majelis($tglawal,$majeliss);
        $data['hal']=$this->load->view('halaman/v_jurnal_sidang',$datas,true);
        $this->load->view('layout/main_laporan', $data);

    }


    public function panggil_saksi() {
        $ruang=$this->input->post('ruang');
        $noperk=decrypt_url($this->input->post('noperk'));
        $jenis_pihak=$this->input->post('pihak');
        $this->m_suara->panggilsaksi($jenis_pihak,$noperk,$ruang);
    }


    public function panggil_non_sidang() {
        $ruang=$this->input->post('ruang');
        $jenis=$this->input->post('jenis');
        $this->m_suara->panggil_nonsidang($jenis,$ruang);
    }


    function check_tundaan() {
        $idperkara=$this->input->post('perkara_id');
        $noperk=decrypt_url($this->input->post('noperk'));
        $cek_tgl_tunda=$this->sidang->cek_ada_sidang_berikut($idperkara);
        $majelis=$this->sidang->majelis_perkara($idperkara);
        $jam_sidang=$this->sidang->ambil_jam($noperk);
        $jam=explode('|',$jam_sidang);
        $mjl=explode("|",$majelis);
        $majelis_kode=explode(',',$mjl[0]);
        $majelis_nama=$mjl[1];
        $userid=$this->session->userdata('iduser');
        if (!in_array($userid,$majelis_kode)) {
            echo json_encode(array('hasil'=>0,'noperk'=>$noperk,'pesan'=>"Perkara ini milik majelis/PP lain, <br><b>".$majelis_nama."</b> <br>anda tidak berwenang input putusan perkara ini (silahkan isi di SIPP/login KM/PP perkara tersebut)"));
            return;
        }

        if($cek_tgl_tunda<>0) {
            echo json_encode(array('hasil'=>0,'noperk'=>$noperk,'pesan'=>'Sudah ada tanggal tundaan <b>'.$cek_tgl_tunda.'</b><br>hapus terlebih dahulu tanggal tersebut di SIPP'));
        } else  {
            echo json_encode(array('hasil'=>1,'noperk'=>$noperk,'jam_mulai'=>$jam[0],'jam_selesai'=>$jam[1],'pesan'=>'OK bisa ditunda'));
        }
    }

    function simpan_tundaan(){
        $idperkara=$this->input->post('perkara_id');
        $tanggalsebelum=date_format(date_create($this->input->post('tanggal_sidang')),'Y-m-d');
        $tgl_tunda=date_format(date_create($this->input->post('tgl_tunda')),'Y-m-d');
        $jam_sidang1=$this->input->post('jam_sidang1');
        $jam_sidang2=$this->input->post('jam_sidang2');
        $dateTimeObject1 = strtotime($jam_sidang1);
        $dateTimeObject2 = strtotime($jam_sidang2);
        $beda = $dateTimeObject2-$dateTimeObject1;
        if($beda <= 0) {
            echo json_encode(array('st'=>0,'msg'=> 'Jam sebelah kanan lebih kecil dari sebelah kiri atau Jam ada yang belum diisi'));
            return;
        }
        $agenda=$this->input->post('agenda_sebelum',TRUE);
        $this->form_validation->set_rules('agenda_sebelum', '<u>Agenda Sidang hari ini</u>', 'required|trim|max_length[500]|min_length[10]');
        $this->form_validation->set_rules('alasan_tunda', '<u>Alasan Tunda</u>', 'required|trim|max_length[500]|min_length[10]');
        $this->form_validation->set_rules('tgl_tunda', '<u>Tanggal Sidang Berikutnya</u>', 'required|trim|exact_length[10]');
        $this->form_validation->set_rules('jam_sidang_tunda', '<u>Jam Sidang Berikutnya</u>', 'required|trim|exact_length[5]');
        $this->form_validation->set_rules('agenda_tunda', '<u>Agenda Sidang Berikutnya</u>', 'required|trim|max_length[500]|min_length[10]');
        if ($this->form_validation->run() == FALSE){
            echo json_encode(array('st'=>0,'msg'=>validation_errors()));
            return;
        }

        $info_perkara = $this->sidang->get_data_mediasi_all($idperkara);
        if($info_perkara!=''){
            if($info_perkara->num_rows>0){
                foreach ($info_perkara->result() as $row) {
                    $hasil_mediasi = !empty($row->hasil_mediasi)?1:0;
                    $ada_data_mediasi = !empty($row->is_mediasi)?1:0;
                    $tahapan_mediasi = $row->tahapan_id;
                }
            } else {
                $hasil_mediasi=0;
                $ada_data_mediasi=0;
                $tahapan_mediasi='';
            }
        }
        $jenis_perkara_id = $this->tanggalhelper->getIDJenisPerkara($idperkara);
        if($tahapan_mediasi==16){
            $info_mediasi = ' Pada tahapan Verzet ';
        }else{
            $info_mediasi = '';
        }
        if($ada_data_mediasi==1 && $hasil_mediasi==0 && $jenis_perkara_id!=624){
            echo json_encode(array('st'=>0,'msg'=>'<strong>Peringatan:</strong><br /> Mohon mengisikan hasil mediasi terlebih dahulu '.$info_mediasi.' sebelum melakukan penundaan jadwal sidang.'));
            return;
        }


        $tanggaldipilih=$tgl_tunda;

        $jumverzet=$this->sidang->cek_apakah_verzet($idperkara);
        $tglpenetapansidangpertama=$this->tanggalhelper->getTanggalPenetapanSidangPertama($idperkara);
        if (!empty($tglpenetapansidangpertama)&&$jumverzet==0){
            if(empty($tglpenetapansidangpertama)){
                echo json_encode(array('st'=>0,'msg'=>'<strong>Peringatan:</strong><br /> Tanggal Penetapan Sidang Pertama Tidak Ditemukan.'));
                return;
            }
        }
        $selisih = $this->tanggalhelper->getSelisihHari($tglpenetapansidangpertama,$tanggaldipilih);
        if($selisih<0){
            echo json_encode(array('st'=>0,'msg'=>'<strong>Peringatan:</strong><br /> Tanggal Sidang Tidak Boleh Kurang dari Tanggal Penetapan Sidang Pertama.'));
            return;
        }

        $dayname = $this->tanggalhelper->getDayName($tanggaldipilih);
        if($dayname=='Saturday' OR $dayname=='Sunday'){
            echo json_encode(array('st'=>0,'msg'=>'<strong>Peringatan:</strong><br /> Tidak Dapat Memilih Tanggal Sidang Pada Hari Libur, Sabtu dan Minggu.'));
            return;
        }

        $urutanmaxid=$this->sidang->get_urutan_jadwal_terakhir($idperkara);
        $urutanBaru =  $urutanmaxid->row()->urutan + 1;

        $jam_mulai=$this->input->post('jammulai',TRUE);
        $jam_selesai=$this->input->post('jamselesai',TRUE);

        if ($this->input->post('ruangan',TRUE)=='Ditentukan Kemudian'){
            $id_ruangan_kirim=NULL;
            $nama_ruangan_kirim=NULL;
        }else{
            $data_ruangan=$this->input->post('ruang_sidang_sebelum',TRUE);
            $id_ruangan_kirim=$this->sidang->ambil_id_ruang($data_ruangan);
            if(!is_numeric($id_ruangan_kirim) OR !intval($id_ruangan_kirim)>0){
                echo json_encode(array('st'=>0,'msg'=>'Ruangan Tidak Ditemukannnnn.'));
                return;
            }
            $nama_ruangan_kirim=$data_ruangan;
        }

        $dihadiri_olehsblm = $this->input->post('kehadiran',TRUE);
        if(!is_numeric($dihadiri_olehsblm) OR intval($dihadiri_olehsblm)<1 OR intval($dihadiri_olehsblm)>11){
            echo json_encode(array('st'=>0,'msg'=>'Data Kehadirann Tidak Valid.'));
            return;
        }

        $data_update = array(
            'jam_sidang'=>$this->input->post('jam_sidang1',TRUE),
            'sampai_jam'=>$this->input->post('jam_sidang2',TRUE),
            'agenda'=>$this->input->post('agenda_sebelum',TRUE),
            'dihadiri_oleh'=>$this->input->post('kehadiran',TRUE),
            'ditunda'=>"Y",
            'alasan_ditunda'=>$this->input->post('alasan_tunda',TRUE),
            'sifat_sidang'=>$this->input->post('sifat_sidang',TRUE),
            'keterangan'=>$this->input->post('keterangan',TRUE),
            'diperbaharui_oleh' => $this->session->userdata('username'),
            'diperbaharui_tanggal' => date("Y-m-d h:i:s",time())
        );

        $data_insert = array(
            'perkara_id'=>$idperkara,
            'tanggal_sidang'=>$tgl_tunda,
            'jam_sidang'=>$this->input->post('jam_sidang_tunda',TRUE),
            'agenda'=>$this->input->post('agenda_tunda',TRUE),
            'diinput_oleh' => $this->session->userdata('username'),
            'diinput_tanggal' => date("Y-m-d h:i:s",time())
        );

        if ($this->input->post('sidkel1',TRUE)=='Y'){
            $data_update['ruangan_id']=NULL;
            $data_update['ruangan']=NULL;
            $data_update['sidang_keliling']="Y";
        }else{
            $data_ruangan=$this->input->post('ruang_sidang_sebelum',TRUE);
            $id_ruangan_update=$this->sidang->ambil_id_ruang($data_ruangan);
            $data_update['ruangan_id']=$id_ruangan_update;
            if(!is_numeric($data_update['ruangan_id']) OR !intval($data_update['ruangan_id'])>0){
                echo json_encode(array('st'=>0,'msg'=>'Ruangan Tidak Ditemukanuuuu.'));
                return;
            }
            $data_update['ruangan']=$data_ruangan;
            $data_update['sidang_keliling']="T";
        }

        if ($this->input->post('sidang_keliling',TRUE)=='Y'){
            $data_insert['ruangan_id']=NULL;
            $data_insert['ruangan']=NULL;
            $data_insert['sidang_keliling']="Y";
        }else{
            if ($this->input->post('ruangan',TRUE)=='Ditentukan Kemudian'){
                $data_insert['ruangan_id']=NULL;
                $data_insert['ruangan']=NULL;
            }else{
                $data_ruangan=$this->input->post('ruang_sidang',TRUE);
                $data_ruang_id=$this->sidang->ambil_id_ruang($data_ruangan);
                $data_insert['ruangan_id']=$data_ruang_id;
                if(!is_numeric($data_insert['ruangan_id']) OR !intval($data_insert['ruangan_id'])>0){
                    echo json_encode(array('st'=>0,'msg'=>'Ruangan Tidak Ditemukans.'));
                    return;
                }
                $data_insert['ruangan']= $data_ruangan;
            }
            $data_insert['sidang_keliling']="T";
        }

        $updateProses = TRUE;
        $idproses = 200;

        if ($jumverzet>'0'){
            $statjadsidterakhir=$this->sidang->cek_status_verzet_jadwalsidang_terakhir($idperkara);
            if ($statjadsidterakhir=="T"){
                $data_insert['verzet']='T';
            }else{
                $data_insert['verzet']='Y';
                $updateProses = TRUE;
                if($this->session->userdata('jenis_pengadilan')==3)
                    $idproses = 116;
                else
                    $idproses = 261;
            }
        }
        $jumkeberatan=$this->sidang->cek_apakah_keberatan($idperkara);
        if ($jumkeberatan>'0'){
            $data_insert['keberatan']='Y';
        }

        $jumikrartalak=$this->sidang->cek_apakah_ikrar_talak($idperkara);
        if ($jumikrartalak>'0'){
            $idproses = 294;
            $updateProses = FALSE;
            $data_insert['ikrar_talak']='Y';
        }

        $namahalaman="PENUNDAAN JADWAL SIDANG";
        $idjadwal=$this->sidang->ambil_id_jadwal($idperkara,$tanggalsebelum);
        $this->sidang->tunda_sidang($data_insert,$data_update,$idjadwal,$namahalaman);
        if ($urutanBaru>=2 AND $updateProses){
            $this->load->model('m_riwayat','riwayat');
            $this->riwayat->updateproses($idperkara,$idproses,$tanggaldipilih,'',$namahalaman,'1');
        }

        echo json_encode(array('st'=>1,'msg'=>'Tundaan Sidang Berhasil Disimpan'));
    }

    public function jurnal_keu() {
        $perkara_id=$this->input->post('perkara_id');
        $keu=$this->laporan->jurnal_keu($perkara_id);
        echo"<div class='table-responsive'><table class='table table-bordered mb-4' border='1'>
        <thead>
            <tr>
                <td><b>No</b></td>
                <td><b>Uraian</b></td>
                <td align='right'><b>Penerimaan</b></td>
                <td align='right'><b>Pengeluaran</b></td>
            </tr>
        </thead>
        <tbody>";
        $i=1;
        $debet=0;
        $kredit=0;
        foreach($keu->result() as $row) {
            echo"
            <tr>
                <td>$i</td>
                <td>$row->uraian</td>
                <td align='right'>".(number_format($row->debet)==0?'-':number_format($row->debet))."</td>
                <td align='right'>".(number_format($row->kredit)==0?'-':number_format($row->kredit))."</td>
            </tr>";
            $debet+=$row->debet;
            $kredit+=$row->kredit;
            $i++;
        }
        echo" 
  <tr>
                <td></td>
                <td align='right'><b>Total</b></td>
                <td align='right'><b>".number_format($debet)."</b></td>
                <td align='right'><b>".number_format($kredit)."</b></td>
            </tr>
             <tr>
                <td></td>
                <td align='right'> <b>Sisa panjar: ".number_format($debet-$kredit)."</b></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>";

    }

    public function check_syarat_putus() {
        $perkara_id=$this->input->post('perkara_id');
        $noperk=decrypt_url($this->input->post('noperk'));
        $majelis=$this->sidang->majelis_perkara($perkara_id);
        $mjl=explode("|",$majelis);
        $majelis_kode=explode(',',$mjl[0]);
        $majelis_nama=$mjl[1];
        $userid=$this->session->userdata('iduser');
        if (!in_array($userid,$majelis_kode)) {
            echo json_encode(array('hasil'=>3,'pesan'=>"Perkara ini milik majelis/PP lain, <br><b>".$majelis_nama."</b> <br>anda tidak berwenang input putusan perkara ini (silahkan isi di SIPP/login KM/PP perkara tersebut)"));
            return;
        }
        $ada_putusan=$this->sidang->cek_ada_putusan($perkara_id);
        if($ada_putusan<>0) {
            echo json_encode(array('hasil'=>0,'pesan'=>'Perkara sudah putus tanggal <b>'.$ada_putusan.'</b><br> Silahkan edit di <b>SIPP</b>'));
            return;
        }
        $kehadiran_pihak=$this->sidang->getInfoKehadiranPihak($perkara_id);
        $jenisperk=$this->input->post('jenisperk');
        $alur=$this->sidang->getAlurPerkara($perkara_id);
        $alurs=explode('|',$alur);
        $alur_perkara=$alurs[0];
        $jenis_perkara_id=$alurs[1];
        $idproses=$this->sidang->cek_idproses($perkara_id);
        $statusPihakHadir = $this->sidang->cekStatusPihakHadir($perkara_id);
        $ada_data_mediasi=$this->sidang->cek_ada_mediasi($perkara_id);
        $cek_tgl_putus=$this->sidang->cek_ada_sidang_berikut($perkara_id);
        $ada_hasil_mediasi=$this->sidang->cek_ada_hasil_mediasi($perkara_id);
        $StatusPihak = $statusPihakHadir->row(($statusPihakHadir->num_rows())-1);
        $list_amar = $this->sidang->getTemplateAmar_agama($jenis_perkara_id);


        if($cek_tgl_putus<>0) {
            echo json_encode(array('hasil'=>0,'pesan'=>'Ada tanggal tundaan '.$cek_tgl_putus.'<br> hapus terlebih dahulu tanggal tersebut di SIPP'));
            return;
        }
        if(!empty($StatusPihak)){
            $StatusPihakHadir = $StatusPihak->dihadiri_oleh;
        } else {
            $StatusPihakHadir=0;
        }

        if($alur_perkara==15 AND $ada_data_mediasi==1 AND $ada_hasil_mediasi==0){
            echo json_encode(array('hasil'=>0,'pesan'=>'<b>Isi terlebih dahulu hasil mediasinya</b><br>Silahkan isi di SIPP'));
            return;
        }

        if($alur_perkara==15 && $kehadiran_pihak==1 && $ada_data_mediasi==0){
            echo json_encode(array('hasil'=>0,'pesan'=>'Pihak hadir semua, harus dilakukan mediasi terlebih  dahulu, tambah mediasi di SIPP'));
            return;
        }

        if(($alur_perkara==15 or $alur_perkara==16) and $kehadiran_pihak==0){
            echo json_encode(array('hasil'=>2,'noperk'=>$noperk,'pesan'=>'isi kehadiran pihak di jadwal sidang terlebih dahulu, cek di SIPP'));
            return;
        }


        if($ada_data_mediasi==1 && $hasil_mediasi== 0 && $jenis_perkara_id!=624){
            echo json_encode(array('hasil'=>0,'noperk'=>$noperk,'pesan'=>'Hasil mediasi belum ada/diisi'));
            return;
        }

        if (intval($kehadiran_pihak)>0) {
            $html="<option value=0>-Pilih Jenis Template Amar-</option>";
            if(!empty($list_amar)){
                foreach ($list_amar as $key => $value) {
                    $html.="<option value='".$value->id."'>".$value->nama."</option>";
                }
            }
            echo json_encode(array('hasil'=>1,'noperk'=>$noperk,'pesan'=>'Putusan bisa dibuat/diisi','jenis_amar'=>$html));
        } else {
            echo json_encode(array('hasil'=>0,'noperk'=>$noperk,'pesan'=>'Putusan tidak bisa dibuat, silahkan cek kelengkapan data di SIPP'));
        }


    }

    public function simpan_hasil_sidang() {
        $tanggal_sidang=date_format(date_create($this->input->post('tgl_sidang_edit')),'Y-m-d');
        $alur_perkara=$this->input->post('alur_perkara_id');
        $jenis_perkara_id=$this->input->post('jenis_perkara_id');
        $nomor_perkara=$this->input->post('noperk');
        $jam_sidang1 =$this->input->post('jam_edit_sidang1');
        $jam_sidang2 =$this->input->post('jam_edit_sidang2');
        $agenda =$this->input->post('agenda_edit');
        $kehadiran =$this->input->post('kehadiran_edit');
        $perkara_id=$this->input->post('perkara_id');
        $dateTimeObject1 = strtotime($jam_sidang1);
        $dateTimeObject2 = strtotime($jam_sidang2);
        $cek_tgl_sidang=$this->sidang->cek_ada_sidang_berikut($perkara_id);
        if($cek_tgl_sidang<>0) {
            echo json_encode(array('hasil'=>0,'pesan'=>'Ada tanggal sidang melebihi tanggal sidang sekarang, hapus terlebih dahulu tanggal tersebut di SIPP'));
            return;
        }
        $beda = $dateTimeObject2-$dateTimeObject1;
        if($beda <= 0) {
            echo json_encode(array('hasil'=>0,'pesan'=> 'Jam sebelah kanan lebih kecil dari sebelah kiri atau Jam ada yang belum diisi'));
            return;
        }

        if (trim($agenda)=='') {
            echo json_encode(array('hasil'=>0,'pesan'=> 'Agenda Tidak boleh kosonng'));
            return;

        }

        if (trim($kehadiran)==0) {
            echo json_encode(array('hasil'=>0,'pesan'=> 'Kehadiran pihak belum dipilih'));
            return;

        }
        $sidkel=$this->input->post('sidkel_edit');
        $sifat_sidang=$this->input->post('sifat_sidang_edit');
        $keterangan=$this->input->post('keterangan_edit');

        $data_edit=array(
            'tanggal_sidang'=>$tanggal_sidang,
            'jam_sidang'=>$jam_sidang1,
            'sampai_jam'=>$jam_sidang2,
            'agenda'=>$agenda,
            'dihadiri_oleh'=>$kehadiran,
            'sifat_sidang'=>$sifat_sidang,
            'keterangan'=>$keterangan,
            'diperbaharui_oleh' => $this->session->userdata('iduser'),
            'diperbaharui_tanggal' => date("Y-m-d h:i:s",time())
        );

        if ($sidkel=='Y'){
            $data_edit['ruangan_id']=NULL;
            $data_edit['ruangan']=NULL;
            $data_edit['sidang_keliling']="Y";
        }else{
            $data_ruangan=$this->input->post('ruang_sidang_edit');
            $data_ruangan=explode('|',$data_ruangan);
            $data_edit['ruangan_id']=$data_ruangan[0];
            if(!is_numeric($data_edit['ruangan_id']) OR !intval($data_edit['ruangan_id'])>0){
                echo json_encode(array('hasil'=>0,'pesan'=>'Ruangan Tidak Ditemukan.'));
                return;
            }
            $data_edit['ruangan']=$data_ruangan[1];
            $data_edit['sidang_keliling']="T";
        }

        $namahalaman='EDIT JADWAL SIDANG';
        $idjadwal=$this->sidang->ambil_id_jadwal($perkara_id,$tanggal_sidang);
        $this->sidang->update_jadwal_sidang($idjadwal,$data_edit,$perkara_id,$namahalaman);

        $this->load->model('m_riwayat','riwayat');
        $this->riwayat->updateproses($perkara_id,'200',$tanggal_sidang,'',$namahalaman,'1');
        #echo json_encode(array('hasil'=>1,'pesan'=>'Perubahan Data Hasil Sidang Berhasil','alur'=>$alur,'pkrid'=>$perkara_id,'jenisperk'=>$jenisperk,'noperk'=>$nomor_perkara,'tgl_sidang'=>date('d-m-Y')));
        #return;
        #Putusan akan dibuat#
        $ada_putusan=$this->sidang->cek_ada_putusan($perkara_id);
        if($ada_putusan<>0) {
            echo json_encode(array('hasil'=>0,'pesan'=>'Perkara sudah putus tanggal <b>'.$ada_putusan.'</b><br> Silahkan edit di <b>SIPP</b>'));
            return;
        }
        $kehadiran_pihak=$this->sidang->getInfoKehadiranPihak($perkara_id);
        $idproses=$this->sidang->cek_idproses($perkara_id);
        $statusPihakHadir = $this->sidang->cekStatusPihakHadir($perkara_id);
        $ada_data_mediasi=$this->sidang->cek_ada_mediasi($perkara_id);
        $cek_tgl_putus=$this->sidang->cek_ada_sidang_berikut($perkara_id);
        $ada_hasil_mediasi=$this->sidang->cek_ada_hasil_mediasi($perkara_id);
        $StatusPihak = $statusPihakHadir->row(($statusPihakHadir->num_rows())-1);
        $list_amar = $this->sidang->getTemplateAmar_agama($jenis_perkara_id);


        if($cek_tgl_putus<>0) {
            echo json_encode(array('hasil'=>0,'pesan'=>'Ada tanggal tundaan '.$cek_tgl_putus.'<br> hapus terlebih dahulu tanggal tersebut di SIPP'));
            return;
        }
        if(!empty($StatusPihak)){
            $StatusPihakHadir = $StatusPihak->dihadiri_oleh;
        } else {
            $StatusPihakHadir=0;
        }

        if($alur_perkara==15 AND $ada_data_mediasi==1 AND $ada_hasil_mediasi==0){
            echo json_encode(array('hasil'=>0,'pesan'=>'<b>Isi terlebih dahulu hasil mediasinya</b><br>Silahkan isi di SIPP'));
            return;
        }

        if($alur_perkara==15 && $kehadiran_pihak==1 && $ada_data_mediasi==0){
            echo json_encode(array('hasil'=>0,'pesan'=>'Pihak hadir semua, harus dilakukan mediasi terlebih  dahulu, tambah mediasi di SIPP'));
            return;
        }

        if(($alur_perkara==15 or $alur_perkara==16) and $kehadiran_pihak==0){
            echo json_encode(array('hasil'=>2,'pesan'=>'isi kehadiran pihak di jadwal sidang terlebih dahulu, cek di SIPP'));
            return;
        }


        if($ada_data_mediasi==1 && $hasil_mediasi== 0 && $jenis_perkara_id!=624){
            echo json_encode(array('hasil'=>0,'pesan'=>'Hasil mediasi belum ada/diisi'));
            return;
        }

        if (intval($kehadiran_pihak)>0) {
            $html="<option value=0>-Pilih Jenis Template Amar-</option>";
            if(!empty($list_amar)){
                foreach ($list_amar as $key => $value) {
                    $html.="<option value='".$value->id."'>".$value->nama."</option>";
                }
            }
            echo json_encode(array('hasil'=>1,'pesan'=>'Putusan bisa dibuat/diisi','jenis_amar'=>$html,'alur'=>$alur_perkara,'pkrid'=>$perkara_id,'jenisperk'=>$jenis_perkara_id,'noperk'=>$nomor_perkara,'tgl_sidang'=>date('d-m-Y')));
        } else {
            echo json_encode(array('hasil'=>0,'pesan'=>'Putusan tidak bisa dibuat, silahkan cek kelengkapan data di SIPP'));
        }

    }

    public function relaas() {
        $perkara_id=$this->input->post('perkara_id');
        $tglsidang=$this->input->post('tgl_sidang');
        $tgl_sidang=date_format(date_create($tglsidang),'Y-m-d');
        $data_relaas=$this->sidang->daftar_relaas($tgl_sidang,$perkara_id);
        $url_sipp=$this->config->item('url_sipp');
        echo"<div class='table-responsive'><table class='table table-bordered mb-4' border='1'>
        <thead>
            <tr>
                <td><b>No</b></td>
                <td><b>Nama</b></td>
                <td><b>Tanggal Relaas</b></td>
                <td><b>Keterangan Relaas</b></td>
                <td><b>E-doc Relaas</b></td>
                <td><b>Keterangan</b></td>
            </tr>
        </thead>
        <tbody>";
        $i=1;
        foreach($data_relaas->result() as $row) {
            $pihak=explode('|',$row->p);
            echo"
            <tr>
                <td>$i</td>
                <td>$pihak[0]</td>
                <td>".($row->tanggal_relaas<>''?date_format(date_create($row->tanggal_relaas),'d-m-Y'):'')."</td>
                <td>$row->ket_hasil_relaas</td>
                <td>".($row->doc_relaas<>''?'<a href="'.$url_sipp.$row->doc_relaas.'">[download]</a>':'')."</td>
                <td>$pihak[1]</td>
            </tr>";

            $i++;
        }
        echo" 
        </tbody>
    </table>
</div>";
    }

    function get_amar(){
        $id_template = $this->input->post('jenis_amar');
        if(intval($id_template)<=0){
            echo '';
        }else{
            $idperkara = $this->input->post('perkara_id');
            if(intval($idperkara)<=0){
                echo '';
            }
            $template = '';
            $res = $this->sidang->getContentTemplateAmar($id_template);
            if(!empty($res)){
                if($res->num_rows()>0){
                    $template = $res->row()->template;
                }
            }
            $datakecamatan_pihak1= $this->sidang->get_data_alamat_pihak1($idperkara)->row();
            $datakecamatan_pihak2= $this->sidang->get_data_alamat_pihak2($idperkara)->row();
            $datapernikahan= $this->sidang->get_data_pernikahan($idperkara)->row();
            if(isset($datapernikahan->kua_tempat_nikah) and !empty($datapernikahan->kua_tempat_nikah)) {
                $template = str_replace('#kua_tempat_nikah#', $datapernikahan->kua_tempat_nikah, $template);
                $template = str_replace('#tanggal_nikah#', $this->templatehelper->convertKeTglIndo($datapernikahan->tgl_nikah), $template);
            }
            $template = str_replace('#kua_kecamatan_pihak1#', $this->templatehelper->ambil_kecamatan($datakecamatan_pihak1->alamat), $template);
            $template = str_replace('#kua_kabupaten_pihak1#', $this->templatehelper->ambil_kabupaten($datakecamatan_pihak1->alamat), $template);
            if(isset($datapernikahan->kua_tempat_nikah) and !empty($datakecamatan_pihak2->alamat)) {
                $template = str_replace('#kua_kecamatan_pihak2#', $this->templatehelper->ambil_kecamatan($datakecamatan_pihak2->alamat), $template);
                $template = str_replace('#kua_kabupaten_pihak2#', $this->templatehelper->ambil_kabupaten($datakecamatan_pihak2->alamat), $template);
            }


            $biaya= $this->sidang->get_var_biaya($idperkara);
            foreach ($biaya->result() as $row){
                $biaya = $row->biaya_proses;
                $pendaftaran = $row->biaya_pendaftaran;
                $panggilan = $row->biaya_panggilan;
                $redaksi = $row->biaya_redaksi;
                $meterai = $row->biaya_meterai;
                $leges = $row->biaya_leges;
                $pemeriksaan = $row->biaya_pemeriksaan;
                $sita = $row->biaya_sita;
            }

            $total_biaya = $biaya + $pendaftaran + $panggilan  + $redaksi + $meterai;
            $terbilang= $this->templatehelper->Terbilang(intval(str_replace('.', '',intval($total_biaya))));
            $template = str_replace('#angka_biaya#', $total_biaya, $template);
            $template = str_replace('#terbilang_biaya#',$terbilang, $template);
            $dataperkara= $this->sidang->getDataPihak1_pihak2($idperkara);
            foreach ($dataperkara->result() as $row){

                $template = str_replace('#nomor_perkara#', $row->nomor_perkara, $template);
                $template = str_replace('#nama_pihak1#', $row->nama_pihak1, $template);
                $template = str_replace('#nama_pihak2#', $row->nama_pihak2, $template);
                $template = str_replace('#nama_satker#', ucwords(strtolower($this->session->userdata('satker'))) , $template);

                if(($row->jenis_perkara_id==346 AND $row->alur_perkara_id==15) OR ($row->alur_perkara_id>1 AND $row->alur_perkara_id<7)){
                    $template = str_replace('#permohonan/gugatan#', 'Permohonan', $template);
                    $template = str_replace('#penggugat/pemohon#', 'Pemohon', $template);
                }elseif($row->alur_perkara_id==16){
                    $template = str_replace('#permohonan/gugatan#', 'Permohonan', $template);
                    $template = str_replace('#penggugat/pemohon#', '<b>Pemohon/penggugat Bukan Perkara Cerai</b>', $template);
                }else{
                    $template = str_replace('#permohonan/gugatan#', 'Gugatan', $template);
                    $template = str_replace('#penggugat/pemohon#', 'Penggugat', $template);
                    $template = str_replace('#tergugat/termohon#', 'Tergugat', $template);
                }
            }

            //str_replace disini ya
            //echo $template;
            //$template = str_replace('#kua_kecamatan_pihak2#', $this->templatehelper->ambil_kecamatan($datakecamatan_pihak2->alamat), $template);
            echo $template;
        }

    }

    function simpan_putusan(){

        $alurperkara = $this->input->post('alur_perkara_id');
        $amar=$this->input->post('isi_amar');
        $status_putusan=$this->input->post('status_putusan');
        $jenis_perkara_id=$this->input->post('jenis_perkara_id');
        $verstek=$this->input->post('verstek');
        $faktor_cerai=$this->input->post('faktor_cerai');
        $istri=$this->input->post('istri');
        $tgl_putusan=date_format(date_create($this->input->post('tgl_putusan')),'Y-m-d');
        $data_putusan=[];
        if($status_putusan==0) {
            echo json_encode(array('hasil'=>0,'pesan'=>'<strong>Tidak berhasil:</strong><br> Status putusan belum dipilih'));
            return;
        }
        if($verstek=="0") {
            echo json_encode(array('hasil'=>0,'pesan'=>'<strong>Tidak berhasil:</strong><br> Status Verstek belum dipilih'));
            return;
        }
        $sumber_hukum=$this->input->post('sumber');

        if(isset($sumber_hukum)) {
            $sumberHukum = implode(',',$sumber_hukum);
        } else {
            echo json_encode(array('hasil'=>0,'pesan'=>'<strong>Tidak berhasil:</strong><br> Sumber hukum harus dipilih/ceklist minimal 1'));
            return;
        }
        if($status_putusan==62 and ($jenis_perkara_id==346 or $jenis_perkara_id==347)) {
            if($faktor_cerai==0) {
                echo json_encode(array('hasil'=>0,'pesan'=>'<strong>Tidak berhasil:</strong><br> Faktor penyebab perceraian belum dipilih'));
                return;
            }
            if($istri==0) {
                echo json_encode(array('hasil'=>0,'pesan'=>'<strong>Tidak berhasil:</strong><br> Status/keadaan istri belum dipilih'));
                return;
            }
        }

        $this->form_validation->set_rules('isi_amar', 'Amar Putusan', 'trim|required|min_length[50]');

        if($alurperkara<100 || $alurperkara==119 || $alurperkara==123){
            $this->form_validation->set_rules('status_putusan', 'Status Putusan', 'trim|required');
            if($sumberHukum=='' || empty($sumberHukum)){
                echo json_encode(array('hasil'=>0,'pesan'=>'<strong>Peringatan:</strong><br> Tidak Berhasil, Sumber Hukum Belum Dipilih'));
                return;
            }
            if($alurperkara!=9 AND $alurperkara!=2 AND $alurperkara!=10 AND $alurperkara!=11 AND $alurperkara!=12 AND $alurperkara!=13 AND $alurperkara!=14){
                $this->form_validation->set_rules('verstek', 'Apakah Putusan Verstek', 'trim|required');
            }
        }

        if ($this->form_validation->run() === FALSE){
            echo json_encode(array('hasil'=>0,'pesan'=>'<strong>Peringatan:</strong><br /> Tidak Berhasil'.validation_errors()));
        }else{
            $idperkara = $this->input->post('perkara_id');
            if(!is_numeric($idperkara) OR intval($idperkara) <1){
                echo json_encode(array('hasil'=>0,'pesan'=>'<strong>Peringatan:</strong><br /> Perkara Tidak Diketahui.'));
                return;
            }
            $is_islam_ikrar=$this->sidang->getInfoAgamaPeCT($idperkara);
            $date_sidang = $this->sidang->getSidangPertama($idperkara);


            if($date_sidang=='' AND $status_putusan!=7 AND $status_putusan!=37 AND $status_putusan!=67){
                echo json_encode(array('hasil'=>0,'pesan'=>"<strong>Peringatan: $date_sidang</strong><br /> Tidak Dapat Memasukan Data Putusan. Jadwal Sidang Pertama Masih Kosongsss."));
                return;
            }



            $curr_date = date('Y-m-d');
            $todayDate = date('d/m/Y');

            $amar = str_replace("&nbsp;", " ", $amar);
            $amar=str_replace("'","",$amar);

            if(strlen($amar)<50){
                echo json_encode(array('hasil'=>0,'pesan'=>'<strong>Peringatan:</strong><br /> Amar Putusan Tidak Boleh kurang dari 50 Karakter'));
                return;
            }


            $data_putusan = array(
                'perkara_id' => $idperkara,
                'tanggal_putusan' => $tgl_putusan,
                'status_putusan_id' => $status_putusan,
                'amar_putusan' => $amar,
                'catatan_putusan' => $this->input->post('keterangan',TRUE)
            );

            if($alurperkara<100){
                $data_putusan['sumber_hukum_id'] = $sumberHukum;
                if($status_putusan!= 5 AND $status_putusan !=6 AND $status_putusan!=7){
                    if($alurperkara!=9 AND $alurperkara!=2 AND $alurperkara!=10 AND $alurperkara!=11){
                        $verstek = $this->input->post('verstek',TRUE);
                        if(empty($verstek) OR ($verstek!='Y' AND $verstek!='T')){
                            echo json_encode(array('hasil'=>0,'pesan'=>'Error <br> Status Verstek Tidak Valid.'));
                            return;
                        }
                        $data_putusan['putusan_verstek'] = $verstek;
                    }
                }else {
                    $data_putusan['putusan_verstek'] = NULL;
                }
            }

            $data_putusan['diinput_oleh'] = $this->session->userdata('username');
            $data_putusan['diinput_tanggal'] = date("Y-m-d h:i:s",time());


            $addData = $this->sidang->add_putusan($data_putusan,$idperkara);
            if($alurperkara==15 AND $status_putusan ==62 and ($jenis_perkara_id==346 or $jenis_perkara_id==347)) {
                $addData == $this->sidang->addFaktorPenyebab($faktor_cerai, $idperkara, $status_putusan);
            }

            if($alurperkara==15 AND $status_putusan ==62 AND ($jenis_perkara_id==346 or $jenis_perkara_id==347) ){
                $addData == $this->sidang->updateKeadaanIstri($istri,$idperkara);
            }

            if($addData){
                echo json_encode(array('hasil'=>1,'pesan'=>' Datas Putusan Berhasil Disimpan'));
            }else{
                echo json_encode(array('hasil'=>0,'pesan'=>' Data Putusan Tidak Berhasil Disimpan'));
            }

        }
    }

    public function lihat_photo() {
        $nomor_perkara=$this->input->post('nomor_perkara',TRUE);
        $tgl_sidang=$this->input->post('tgl_sidang',TRUE);
        $this->load->model('m_suara','proses');
        $poto=$this->proses->lihat_photo($nomor_perkara,$tgl_sidang);
        $html1="<h2>Perkara ".$nomor_perkara." tanggal sidang ".$tgl_sidang."</h2>";
        $html="";
        if($poto->num_rows() > 0) {
            foreach($poto->result() as $row) {
                $potos=base_url()."photo_antrian/".$row->photo;
                $html.='<img src="'.$potos.'" style="width: auto;height: auto">';
            }
        } else {
            $html="<br><h5>-- Tidak ada photo --</h5>";
        }

        $htmls=$html1.$html;
        echo $htmls;
    }


    //update
    Public function kehadiran_sidang() {
        $perkara_id=$this->input->post('perkara_id');
        $data_pihak=$this->sidang->daftar_pihak(decrypt_url($perkara_id));
        $ruang=$this->input->post('ruang',true);
        $nomor_perkara=$this->input->post('nomor_perkara');
        $tgl_sidang=$this->input->post('tgl_sidang');
        //check yag hadir
        $kehadiran=$this->sidang->kehadiran_pihak(decrypt_url($nomor_perkara),decrypt_url($tgl_sidang));
        $jenis_antrian=$this->db->query("SELECT status FROM $this->db_antrian.setting where jenis='jenis_antrian'")->row()->status;

        echo"
       <form action='#' id='form_cetak'>
       <input type='hidden' name='nomor_perkara' value='".$nomor_perkara."'>
        <input type='hidden' name='perkara_id' value='".$perkara_id."'>
        <input type='hidden' name='tgl_sidang' value='".$tgl_sidang."'>
           <input type='hidden' name='ruang' value='".$ruang."'>
       <div class='table-responsive'><table class='table table-bordered mb-4' border='1'>
        <thead>
            <tr>
                <th><b>No</b></th>
                <th><b>Nama</b></th>
                <th><b>Sebagai</b></th>
                <th><b>Keterangan</b></th>
            </tr>
        </thead>
        <tbody>";
        $i=1;
        foreach($data_pihak->result() as $row) {
            $pihak=explode('|',$row->pihak);
            echo"
            <tr>
                <td>$i</td>
                <td>$row->nama</td>
                <td>$pihak[1]</td>
                <td>";
            if (in_array($pihak[0],$kehadiran)) {
                $data_cekin=$this->sidang->check_in($pihak[0],decrypt_url($tgl_sidang));
                echo "<b>Check in $data_cekin</b>";
            } else {
                echo  "<input type=checkbox name='pihak[]' value=$pihak[0]> hadir";
            }
            echo " </td>
            </tr>";

            $i++;
        }
        echo" 
        </tbody>
    </table> </form>
</div> ";
        echo '<div class="modal-footer">'.
            ($jenis_antrian==0?'<button type="button" class="btn btn-primary" onclick="cetak_antrian()">Cetak</button>':'<button type="button" class="btn btn-danger" onclick="simpan_antrian()">Simpan</button>').'<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
';




    }

    Public function kehadiran_sidang_list() {
        $perkara_id=$this->input->post('perkara_id');
        $data_pihak=$this->sidang->daftar_pihak(decrypt_url($perkara_id));
        $ruang=$this->input->post('ruang',true);
        $nomor_perkara=$this->input->post('nomor_perkara');
        $tgl_sidang=$this->input->post('tgl_sidang');
        //check yag hadir
        $kehadiran=$this->sidang->kehadiran_pihak(decrypt_url($nomor_perkara),decrypt_url($tgl_sidang));
        $jenis_antrian=$this->session->userdata('jenis_antrian');
        echo"
       <form action='#' id='form_cetak'>
       <input type='hidden' name='nomor_perkara' value='".$nomor_perkara."'>
        <input type='hidden' name='perkara_id' value='".$perkara_id."'>
         <input type='hidden' name='ruang' value='".$ruang."'>
       <div class='table-responsive'><table class='table table-bordered mb-4' border='1'>
        <thead>
            <tr>
                <th><b>No</b></th>
                <th><b>Nama</b></th>
                <th><b>Sebagai</b></th>
                <th><b>Keterangan</b></th>
            </tr>
        </thead>
        <tbody>";
        $i=1;
        foreach($data_pihak->result() as $row) {
            $pihak=explode('|',$row->pihak);
            echo"
            <tr>
                <td style='vertical-align: top'>$i</td>
                <td style='vertical-align: top'>$row->nama</td>
                <td style='vertical-align: top'>$pihak[1]</td>
                <td style='vertical-align: top'>";
            if (in_array($pihak[0],$kehadiran)) {
                $data_cekin=$this->sidang->check_in($pihak[0],decrypt_url($tgl_sidang));
                echo "<b>Check in $data_cekin</b>";
            } else {
                echo  "Belum Check In";
            }
            echo " </td>
            </tr>";

            $i++;
        }
        echo" 
        </tbody>
    </table> </form>
</div>";
        echo '<div class="modal-footer">'.($jenis_antrian==0?'<button type="button" class="btn btn-primary" onclick="cetak_antrian()">Cetak</button>':'<button type="button" class="btn btn-danger" onclick="simpan_antrian()">Simpan</button>').'<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>

';



    }

    Public function kehadiran_sidang_lists() {
        $perkara_id=$this->input->post('perkara_id');
        $data_pihak=$this->sidang->daftar_pihak(decrypt_url($perkara_id));
        $ruang=$this->input->post('ruang',true);
        $nomor_perkara=$this->input->post('nomor_perkara');
        $tgl_sidang=$this->input->post('tgl_sidang');
        //check yag hadir
        $kehadiran=$this->sidang->kehadiran_pihak(decrypt_url($nomor_perkara),decrypt_url($tgl_sidang));
        $jenis_antrian=$this->session->userdata('jenis_antrian');
        echo"
       <form action='#' id='form_cetak'>
       <input type='hidden' name='nomor_perkara' value='".$nomor_perkara."'>
        <input type='hidden' name='perkara_id' value='".$perkara_id."'>
         <input type='hidden' name='tgl_sidang' value='".$tgl_sidang."'>
         <input type='hidden' name='ruang' value='".$ruang."'>
       <div class='table-responsive'><table class='table table-bordered mb-4' border='1'>
        <thead>
            <tr>
                <th><b>No</b></th>
                <th><b>Nama</b></th>
                <th><b>Sebagai</b></th>
                <th><b>Keterangan</b></th>
            </tr>
        </thead>
        <tbody>";
        $i=1;
        foreach($data_pihak->result() as $row) {
            $pihak=explode('|',$row->pihak);
            echo"
            <tr>
                <td style='vertical-align: top'>$i</td>
                <td style='vertical-align: top'>$row->nama</td>
                <td style='vertical-align: top'>$pihak[1]</td>
                <td style='vertical-align: top'>";
            if (in_array($pihak[0],$kehadiran)) {
                $data_cekin=$this->sidang->check_in($pihak[0],decrypt_url($tgl_sidang));
                echo "<b>Check in $data_cekin</b>";
            } else {
                echo  "Belum Check In";
            }
            echo " </td>
            </tr>";

            $i++;
        }
        echo" 
        </tbody>
    </table> </form>
</div>";
        echo '<div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>

';



    }



    public function isi_kehadiran() {
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
        echo json_encode(array('nomor_perkara'=>$nomor_perkara));
    }


}