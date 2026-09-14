<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH ."/libraries/upd/k2021.php";
require_once APPPATH . "/libraries/upd/f2021.php";
class Masuk extends CI_Controller {

    public function index()

    {
        $this->load->model('m_sidang','sidang');
        $upd=ausGetVersion();
        if ($upd['notification_case']=="notification_operation_ok")
        {
            $versi=$upd['notification_data']['version_number'];
            $versi2='';
        }
        else
        {
            $versi2=$upd['notification_text'];
            $versi='';
        }
        $html='';
        if($versi=='' and $versi2=='11') {
            $html.="<br><font color='red'><b><b>ADA ERROR UPDATE:<br>SILAHKAN CHECK APAKAH SUDAH DI CHOWN APACHE.APACHE (atau user/group yg dipakai webserver) FOLDER ANTRIAN SIDANG NYA dan ";
            $html.="CHECK APAKAH TANGGAL SERVER SAMA DENGAN TANGGAL KALENDAR SEKARANG</b></font><br><br>";
        }

        $ada_versi=$this->db->query("SELECT COUNT(*) as jumlah
                                        FROM information_schema.tables 
                                        WHERE table_schema = 'antrian_sidang_terpadu' 
                                        AND table_name = 'versi'")->row();
        if ($ada_versi->jumlah==1) {
            $versi_lokal=$this->db->select('versi,tanggal')->from('antrian_sidang_terpadu.versi')->where('jenis',1)->get()->row();
            if (empty($versi_lokal->versi)) {
                if($versi2=='00') {
                    $datas['versi']='Antrian Sidang Versi 1.0 - 042021';
                } else  if ($versi2<>'11') {
                    $datas['versi']='Antrian Sidang Versi 1.0 - 042021 <br><font style="color: red;font-weight: bold">Ada versi Terbaru Versi '.$versi.'.0 tanggal '.date_format(date_create($upd['notification_data']['version_date']),'d-m-Y').'<br> Silahkan update dengan login Admin SIPP</font>';
                } else {
                    $datas['versi']='Antrian Sidang Versi 1.0 - 042021 <br>'.$html;
                }
            } else {
                if($versi=='' and $versi2=='11') {
                    $datas['versi']='Antrian Sidang Versi '.$versi_lokal->versi.'.0 tanggal '.date_format(date_create($versi_lokal->tanggal),'d-m-Y')."<br>".$html;
                } else {
                    if ($versi > $versi_lokal->versi) {
                        $datas['versi']='Antrian Sidang Versi '.$versi_lokal->versi.'.0 tanggal '.date_format(date_create($versi_lokal->tanggal),'d-m-Y').'<br><font style="color: red;font-weight: bold">Ada versi Terbaru Versi '.$versi.'.0 tanggal '.date_format(date_create($upd['notification_data']['version_date']),'d-m-Y').'<br> Silahkan update dengan login Admin SIPP</font>';
                    } else {
                        $datas['versi']='Antrian Sidang Versi '.$versi_lokal->versi.'.0 tanggal '.date_format(date_create($versi_lokal->tanggal),'d-m-Y');
                    }
                }
            }


        } else {
            if($versi<>'') {
                $datas['versi']='Antrian Sidang Versi 1.0 - 042021 <br><font style="color: red;font-weight: bold">Ada versi Terbaru Versi '.$versi.'.0 tanggal '.date_format(date_create($upd['notification_data']['version_date']),'d-m-Y').'<br> Silahkan update dengan login Admin SIPP</font>';
            } else {
                $datas['versi']='Antrian Sidang Versi 1.0 - 042021 <br>'.$html;
            }

        }
        $datas['satker']=$this->sidang->ambil_satkers();
        $datas['ruang']=$this->sidang->master_ruang();
        $this->load->view('halaman/login',$datas);
    }


}
