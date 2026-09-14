<?php
ini_set("memory_limit", "-1");
set_time_limit(0);
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH .'/libraries/excelss/vendor/autoload.php';
require_once APPPATH .'controllers/Ngakses.php';
use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValue;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class Laporan extends Ngakses
{
    
    public $db_antrian;

    function __construct()
    {
        parent::__construct();
        $this->tokencek();
        $this->db_antrian=$this->config->item('db_antrian');
        $this->load->model('m_laporan','laporan');
    }


    public function index() {
        redirect(base_url());
    }

    public function bikin_laporan() {
               $tgl_awal=$this->input->post('tgl_awal');
                $tgl_akhir=$this->input->post('tgl_akhir');
                $ruang_sidang=$this->input->post('ruang_sidang');

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
                $lap=$this->laporan->kompilasi_data_laporan($tgl_awals,$tgl_akhirs,$ruangs);
                if($tgl_awals<>0 and $tgl_akhirs<>0) {
                   $tgl_lap='TANGGAL '.$tgl_awal.' S/D '.$tgl_akhir;
                }

                if($tgl_awals==0 and $tgl_akhirs==0) {
                    $tglawaltahun=date('01-01-Y');
                    $tgl_lap='TANGGAL '.$tglawaltahun.' S/D '.date('d-m-Y');
                }

                if($tgl_awals<>0 and $tgl_akhirs==0) {
                   $tgl_lap='Tanggal '.$tgl_awal;
                }

                if($tgl_awals==$tgl_akhirs) {
                    $tgl_lap='Tanggal '.$tgl_awal;
                }

                $file_nama = 'lap_antrian_'.str_replace('-','_',$tgl_awal).'.xlsx';
                $blangko= 'lap/template_lap_antrian.xlsx';
                if($lap['no']==0) {
                    $nama_file = 0;
                } else {
                    $nama_file = 'lap/'.$file_nama;
                    $params = [
                        '{satker}' => new ExcelParam(CellSetterStringValue::class,$lap['satker']),
                        '{tgl_sidang}' => new ExcelParam(CellSetterStringValue::class,$tgl_lap),
                        '[no]' => new ExcelParam(CellSetterArrayValue::class, $lap['no']),
                        '[noperk]' => new ExcelParam(CellSetterArrayValue::class, $lap['nomor_perkara']),
                        '[jenisperk]' => new ExcelParam(CellSetterArrayValue::class, $lap['jenis_perkara']),
                        '[majelis]' => new ExcelParam(CellSetterArrayValue::class, $lap['majelis']),
                        '[tgl_sidang]' => new ExcelParam(CellSetterArrayValue::class, $lap['tgl_sidang']),
                        '[agenda]' => new ExcelParam(CellSetterArrayValue::class, $lap['agenda']),
                        '[ruang]' => new ExcelParam(CellSetterArrayValue::class, $lap['ruang']),
                        '[no_antrian]' => new ExcelParam(CellSetterArrayValue::class, $lap['no_antrian']),
                        '[tgl_ambil]' => new ExcelParam(CellSetterArrayValue::class, $lap['tgl_ambil']),
                        '[tgl_mulai]' => new ExcelParam(CellSetterArrayValue::class, $lap['mulai']),
                        '[tgl_selesai]' => new ExcelParam(CellSetterArrayValue::class, $lap['selesai']),
                        '[lama_sidang]' => new ExcelParam(CellSetterArrayValue::class, $lap['lama']),
                    ];
                    PhpExcelTemplator::saveToFile($blangko, $nama_file, $params);
                }

                    echo json_encode (array('nama_file'=>$nama_file));

    }

    public function cetak_jurnal() {
        $tgl_awal=$this->input->post('tgl_awal');
        $majelis=$this->input->post('majelis');
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
            $majeliss="0";
        }
        $tanggal=date_format(date_create($tglawal),'d-m-Y');
        $lap=$this->laporan->kompilasi_data_jurnal($tglawal,$majelis);
        $file_nama = 'jurnal_sidang'.str_replace('-','_',$tgl_awal).'.xlsx';
        if($this->session->userdata('jenis_pengadilan')==4) {
            $blangko= 'lap/template_jurnal_sidang.xlsx';
        } else {
            $blangko= 'lap/template_jurnal_sidang_nonpa.xlsx';
        }

        if($lap['no']==0) {
            $nama_file = 0;
        } else {
            $nama_file = 'lap/'.$file_nama;
            $params = [
                '{satker}' => new ExcelParam(CellSetterStringValue::class,$lap['satker']),
                '{hari}' => new ExcelParam(CellSetterStringValue::class,$lap['hari']),
                '{tanggal}' => new ExcelParam(CellSetterStringValue::class,$tgl_awal),
                '{kode_majelis}' => new ExcelParam(CellSetterStringValue::class,$lap['majelis_kode']),
                '{majelis}' => new ExcelParam(CellSetterStringValue::class,$lap['majelis']),
                '{ruang_sidang}' => new ExcelParam(CellSetterStringValue::class,$lap['ruang']),
                '{pp}' => new ExcelParam(CellSetterStringValue::class,$lap['pp_kode']),
                '{panitera}' => new ExcelParam(CellSetterStringValue::class,$lap['pp']),
                '[no]' => new ExcelParam(CellSetterArrayValue::class, $lap['no']),
                '[noperk]' => new ExcelParam(CellSetterArrayValue::class, $lap['noperk']),
                '[jenisperk]' => new ExcelParam(CellSetterArrayValue::class, $lap['jenisperk']),
                '[pihak]' => new ExcelParam(CellSetterArrayValue::class, $lap['pihak']),
                '[ruang]' => new ExcelParam(CellSetterArrayValue::class, $lap['ruang']),
                '[sidangke]' => new ExcelParam(CellSetterArrayValue::class, $lap['sidangke']),
                '[jenis_putusan]' => new ExcelParam(CellSetterArrayValue::class, $lap['jenis_putusan']),
                '[tanggal_tunda]' => new ExcelParam(CellSetterArrayValue::class, $lap['tanggal_tunda']),
                '[alasan_tunda]' => new ExcelParam(CellSetterArrayValue::class, $lap['alasan_tunda']),
                '[faktor]' => new ExcelParam(CellSetterArrayValue::class, $lap['faktor']),
            ];
            PhpExcelTemplator::saveToFile($blangko, $nama_file, $params);
        }

        echo json_encode (array('nama_file'=>$nama_file));

    }



    public function majelis() {
        $data=$this->laporan->ambil_data_majelis();
        echo"<pre>";
       print_r($data);exit;
    }

    public function view_tambah_prioritas() {
        $tgl=date('Y-m-d');
        $daftar_antrian=$this->laporan->ambil_antrian_non_prioritas($tgl);
        $html='            
        <div class="row"> <div class="col-12">
                            <form action="#" id="form_prioritas">';
        $html.= '
                       
                                     <div class="form-group">
                                        <label for="jenis_layanan" class="control-label">Antrian sidang tanggal '.date('d-m-Y').' yang sudah dicetak</label>
                                        <select name="antrian" id="antrian_prioritas" class="form-control">';
                                        $html.="<option value=0>- pilih -</option>";
                                        if($daftar_antrian->num_rows() > 0) {
                                            foreach($daftar_antrian->result() as $row) {
                                                $html.="<option value=".$row->no_antrian_cetak.">".$row->no_antrian_cetak."</option>";
                                            }    
                                        } else {
                                            $html.="<option value=0>Belum ada antrian yang diambil/cetak</option>";
                                        }
                                                                   

         $html.='                               </select>
                                    </div>  
                                    <div class="form-group">
                                    <label for="ket_layanan" class="control-label">Keterangan Prioritas</label>
                                    <textarea class="form-control" id="ket" name="ket" rows="8" required></textarea>
                                  </div>

                                      
                </form> </div>   
                </div>   ';
  
            echo $html;
    }

    public function simpan_prioritas() {
        
        $no_antrian=$this->input->post('antrian',true);
        $ket_prioritas=$this->input->post('ket',true);
        $data=array('prioritas'=>1,'keterangan_prioritas'=>$ket_prioritas);
        $this->db->where(array('tanggal_sidang'=>date('Y-m-d'),'no_antrian_cetak'=>$no_antrian));
        $this->db->update('antrian_sidang_terpadu.antrian_sidang',$data);
        
    }

    public function hapus_prioritas() {
        $tgl=date_format(date_create($this->input->post('tgl',true)),'Y-m-d');
        $no_antrian_cetak=$this->input->post('antrian',true);
        $data=array('prioritas'=>null,'keterangan_prioritas'=>null);
        $arr_where=array('tanggal_sidang'=>$tgl,'no_antrian_cetak'=>$no_antrian_cetak);
        $this->db->where($arr_where);
        $this->db->update('antrian_sidang_terpadu.antrian_sidang',$data);

    }
}