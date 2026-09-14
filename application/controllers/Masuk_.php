<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH ."/libraries/upd/k2021.php";
require_once APPPATH . "/libraries/upd/f2021.php";
class Masuk extends CI_Controller {

    public $db_antrian;

    function __construct() {
        parent::__construct();
        $this->db_antrian=$this->config->item('db_antrian');
        $this->load->model('m_sidang','sidang');
    }
    
    public function index()

    {

       $datas['versi']='Antrian Sidang Versi 1.0 - 042021 <br>'.$html;

        $datas['satker']=$this->sidang->ambil_satkers();
        $datas['ruang']=$this->sidang->master_ruang();
        $this->load->view('halaman/login',$datas);
    }


}
