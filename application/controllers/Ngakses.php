<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/JWT.php';
require APPPATH . '/libraries/BeforeValidException.php';
require APPPATH . '/libraries/ExpiredException.php';
require APPPATH . '/libraries/SignatureInvalidException.php';
use Firebase\JWT\JWT;

class Ngakses extends CI_Controller {

    private $secretkey = '';

    public $db_antrian;

    function __construct() {
        parent::__construct();
        $this->secretkey=base64_decode(($this->config->item('jwt_key')));
        $this->db_antrian=$this->config->item('db_antrian');
    }


    public function index() {
        redirect(base_url());
    }


    //method untuk melihat token pada user
    public function validasiuser(){
        $this->load->model('m_akses');
        $loket=strtoupper($this->input->post('username'));
            if ($this->m_akses->chek_userpass()=='wedhus') {
                $data['idtoken'] = base64_encode($this->secretkey);
                $output = JWT::encode($data,$this->secretkey,'HS256');
                $this->session->set_userdata('tokencuk',$output);
                $this->session->set_userdata('logine','oke');
                echo json_encode(array('st'=>1,'pesan'=>'Username dan Password benar..'));
            } else if ($this->m_akses->chek_userpass()=='bebek') {
                echo json_encode(array('st'=>0,'pesan'=>'Ruang sidang belum dipilih'));
            }
            else {
                $this->session->set_userdata('logine','oraoke');
                echo json_encode(array('st'=>0,'pesan'=>'Salah Username atau Password'));
            }

    }

    public function check_admin() {
        $this->load->model('m_akses');
        $loket=strtoupper($this->input->post('username'));
        echo json_encode($this->m_akses->check_admin());
    }

    public function validasihp(){

        $this->load->model('m_akses');
        //chek hp_pihak
        $nohp=$this->input->post('nohp');
        $cekhp=$this->m_akses->chek_hp($nohp);

        if ($cekhp==1) {
            //kirim sms ke pihak
            $this->m_akses->smsotp($nohp);
            $data['nohp']= $nohp;
            $data['pesan']='';
            $this->load->view('halaman/login_otp',$data);
        }

        else {

            $data['pesan']="nomer HP anda belum/tidak terdaftar silahkan hubungi Meja Pendaftaran";
            $this->load->view('halaman/login_pihak',$data);

        }


    }


    public function validasiotp(){

        $this->load->model('m_akses');
        //chek hp_pihak
        $nohp=$this->input->post('nohp');
        $pin=$this->input->post('pinhp');
        $cekhp=$this->m_akses->chek_pin($nohp,$pin);
        $data['nohp']=$nohp;
        if ($cekhp==1) {
            $data['daftar_sidang_pihak']=$this->m_akses->list_perkara_pihak($nohp);
            $data['hal']= $this->load->view('halaman/list_perkara_pihak',$data,TRUE);
            $this->load->view('layout/main_pihak', $data);
        }
        else {
            $data['pesan']= 'salah PIN atau sudah kadaluarsa';
            $this->load->view('halaman/login_otp',$data);

        }


    }


    //method untuk melihat token pada user
    public function validasipin(){

        $nohp='';
        $this->load->model('m_akses');
        if ($this->m_akses->chek_pin()==1) {
            $data['idtoken'] = base64_encode($this->secretkey);
            $output = JWT::encode($data,$this->secretkey,'HS256');
            $this->session->set_userdata('tokencuk',$output);
            $this->session->set_userdata('login_pihak','oke');
            redirect('utama_pihak');
        }
        else {

            $data['nohp']= $nohp;
            $this->load->view('halaman/login_otp');
        }


    }




    public function tokencek(){

        if ($this->session->userdata('logine')<>'oke') {
            redirect(base_url());
        }

        $token=base64_encode($this->secretkey);
        $jwt = $this->session->userdata('tokencuk');

        try {

            $decode = JWT::decode($jwt,$this->secretkey,array('HS256'));

            if ($decode->idtoken==$token) {
                return true;
            } else {
                redirect(base_url());
            }

        } catch (Exception $e) {

            redirect(base_url());
            exit;
        }
    }
}