<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_antrian extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        // $this->tokencek();
        $this->load->model('m_sidang', 'sidang');

    }

    public function index() {
        //cek julah ruangan antrian 
        $data['jumlah_ruang']=$this->sidang->data_ruang();
        $data['posisi_antrian']=$this->sidang->posisi_antrian();
        echo json_encode($data);
    }

    public function status() {
        $tanggal=$this->session->userdata('tgl_sidang');
        $ruangan_id=$this->session->userdata('ruangan_id');
        $status=$this->sidang->check_status($tanggal,$ruangan_id);
        $data_status=array("status_panggil"=>$status);
        $this->output->set_output(json_encode($data_status));
    }


} 