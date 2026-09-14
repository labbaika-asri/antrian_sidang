<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ambil_suara extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_suara');

    }

    public function ambil() {
       $apine=$this->input->get('kuncine');
       // if ($apine<>'W3dhu56emBeL') {
        // echo json_encode(array("hasill"=>"ANDA TIDAK BERHAK AKSES !!!!"));
    //  } else {
            $hasil=$this->m_suara->ambil_suara();

            echo json_encode(array("hasil"=>$hasil));
     // }
    }

    public function ambil_config() {
        $apine=$this->input->get('kuncine');
      //  if ($apine<>'W3dhu56emBeL') {
        //    echo json_encode(array("hasill"=>"ANDA TIDAK BERHAK AKSES !!!!"));
        //} else {
            $hasil=$this->m_suara->ambil_config();
            echo json_encode(array("hasil"=>$hasil));
        //}
    }


    public function ambil_non() {
        $apine=$this->input->get('kuncine');
        if ($apine<>'W3dhu56emBeL') {
            echo json_encode(array("hasill"=>"ANDA TIDAK BERHAK AKSES !!!!"));
        } else {
            $hasil=$this->m_suara->ambil_suara_non();

            echo json_encode(array("hasil"=>$hasil));
        }
    }

    public function update_panggilan() {
        $this->load->model('m_suara');
        $apine=$this->input->post('kuncine');
        $id=$this->input->post('id');
        if ($apine<>'W3dhu56emBeL') {
            $this->session->sess_destroy();
            redirect(base_url());
        } else {
            $pesan=$this->m_suara->update_panggilan($id);
        }
    }

    public function update_panggilan_non() {
        $this->load->model('m_suara');
        $apine=$this->input->post('kuncine');
        $id=$this->input->post('id');
        if ($apine<>'W3dhu56emBeL') {
            $this->session->sess_destroy();
            redirect(base_url());
        } else {
            $pesan=$this->m_suara->update_panggilan_non($id);
        }
    }

    public function status() {
        $status=$this->m_suara->check_status();
        $data_status=array("status_panggil_non"=>$status);
        $this->output->set_output(json_encode($data_status));
    }


}