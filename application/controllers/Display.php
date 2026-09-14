<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sidang','sidang');
        $this->load->model('m_konfig','konfig');
    }

    public function index() {
        $hari=date('N');
        $tgl_server=$this->session->userdata('tgl_server');
        if(isset($tgl_server)) {
            $tgl_server=$this->session->userdata('tgl_server');
        } else {
            $tgl_server=date('y-m-d');
        }
        $data['ruang_sidang']=$this->konfig->ambil_ruangss();
        $data['daftar_sidang']=$this->sidang->daftar_sidang_display($tgl_server);
        $tanggal=$this->__tgl_indo(date('Y-m-d'));
        $data['tanggal']=$tanggal;
        $satker=explode('|',$this->sidang->ambil_satker());
        $data['satker']=$satker[0];
        $data['alamat_satker']=$satker[1];
        $data['runningteks']=$this->sidang->ambil_runningteks();
        $data['jenis_pengadilan']=$this->sidang->jenis_pengadilan();
        $this->load->view('halaman/v_display',$data);

    }

    public function v7() {
        $this->load->view('halaman/v_display_test');
    }
    public function v2() {
        $hari=date('N');
        $tgl_server=$this->session->userdata('tgl_server');
        if(isset($tgl_server)) {
            $tgl_server=$this->session->userdata('tgl_server');
        } else {
            $tgl_server=date('y-m-d');
        }
        $data['huruf']=$this->sidang->ambil_urut_antrian();
        $data['ruang_sidang']=$this->konfig->ambil_ruangss();
        $data['daftar_sidang']=$this->sidang->daftar_sidang_display($tgl_server);
        $tanggal=$this->__tgl_indo(date('Y-m-d'));
        $data['tanggal']=$tanggal;
        $satker=explode('|',$this->sidang->ambil_satker());
        $data['satker']=$satker[0];
        $data['alamat_satker']=$satker[1];
        $data['jenis_pengadilan']=$this->sidang->jenis_pengadilan();
        $data['runningteks']=$this->sidang->ambil_runningteks();
        $this->load->view('halaman/v_display2',$data);

    }

    public function v4() {
        $hari=date('N');
        $tgl_server=$this->session->userdata('tgl_server');
        if(isset($tgl_server)) {
            $tgl_server=$this->session->userdata('tgl_server');
        } else {
            $tgl_server=date('y-m-d');
        }
        $data['huruf']=$this->sidang->ambil_urut_antrian();
        $data['ruang_sidang']=$this->konfig->ambil_ruangss();
        $data['daftar_sidang']=$this->sidang->daftar_sidang_display($tgl_server);
        $tanggal=$this->__tgl_indo(date('Y-m-d'));
        $data['tanggal']=$tanggal;
        $satker=explode('|',$this->sidang->ambil_satker());
        $data['satker']=$satker[0];
        $data['alamat_satker']=$satker[1];
        $data['jenis_pengadilan']=$this->sidang->jenis_pengadilan();
        $data['runningteks']=$this->sidang->ambil_runningteks();
        $this->load->view('halaman/v_display4',$data);

    }

    public function v3() {
        $hari=date('N');
        $tgl_server=$this->session->userdata('tgl_server');
        if(isset($tgl_server)) {
            $tgl_server=$this->session->userdata('tgl_server');
        } else {
            $tgl_server=date('y-m-d');
        }
        $data['data_loket']=$this->sidang->data_loket_aktif();
        $data['ruang_sidang']=$this->konfig->ambil_ruangss();
        $data['daftar_sidang']=$this->sidang->daftar_sidang_display($tgl_server);
        $tanggal=$this->__tgl_indo(date('Y-m-d'));
        $data['tanggal']=$tanggal;
        $satker=explode('|',$this->sidang->ambil_satker());
        $data['satker']=$satker[0];
        $data['alamat_satker']=$satker[1];
        $data['runningteks']=$this->sidang->ambil_runningteks();
        $data['jenis_pengadilan']=$this->sidang->jenis_pengadilan();
        $this->load->view('halaman/v_display3',$data);

    }


    public function v5() {
        $hari=date('N');
        $tgl_server=$this->session->userdata('tgl_server');
        if(isset($tgl_server)) {
            $tgl_server=$this->session->userdata('tgl_server');
        } else {
            $tgl_server=date('y-m-d');
        }
        $data['ruang_sidang']=$this->konfig->ambil_ruangss();
        $data['daftar_sidang']=$this->sidang->daftar_sidang_display($tgl_server);
        $tanggal=$this->__tgl_indo(date('Y-m-d'));
        $data['tanggal']=$tanggal;
        $satker=explode('|',$this->sidang->ambil_satker());
        $data['satker']=$satker[0];
        $data['alamat_satker']=$satker[1];
        $data['runningteks']=$this->sidang->ambil_runningteks();
        $data['jenis_pengadilan']=$this->sidang->jenis_pengadilan();
        $this->load->view('halaman/v_display',$data);

    }

    function __tgl_indo($tanggal){
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

    public function update_display(){
        $data = $this->sidang->get_antrian();
        $this->output->set_output(json_encode($data));
    }

    public function update_status(){
        $tanggal=$this->session->userdata('tgl_server');
        $status=$this->sidang->ambil_status($tanggal);
        $this->output->set_output(json_encode($status));
    }

    public function update_status2(){
        $tanggal=$this->session->userdata('tgl_server');
        $status=$this->sidang->ambil_status2($tanggal);
        $this->output->set_output(json_encode($status));
    }

    public function update_display_loket(){
        $result  = $this->sidang->get_antrian_status();
        $this->output->set_output(json_encode($result));
    }

    public function ruang_sidang($ruang_sidang_id) {
        $data['ruang_sidang_id']=$ruang_sidang_id;
        $data['ruang_sidang']=$this->sidang->ambil_nama_ruang($ruang_sidang_id);
        $tanggal=$this->__tgl_indo(date('Y-m-d'));
        $data['tanggal']=$tanggal;
        $satker=explode('|',$this->sidang->ambil_satker());
        $data['satker']=$satker[0];
        $data['alamat_satker']=$satker[1];
        $data['jenis_pengadilan']=$this->sidang->jenis_pengadilan();
        $data['runningteks']=$this->sidang->ambil_runningteks();
        $this->load->view('halaman/v_display4',$data);

    }

    public function update_status_ruang($ruang_sidang_id){
        $tanggal=$this->session->userdata('tgl_server');
        if (!isset($tanggal)) {
            $tanggal=date('Y-m-d');
        }
        $status=$this->sidang->ambil_status_ruang($tanggal,$ruang_sidang_id);
        $this->output->set_output(json_encode($status));
    }


    public function update_status2_ruang($ruang_sidang_id){
        $tanggal=$this->session->userdata('tgl_server');
        if (!isset($tanggal)) {
            $tanggal=date('Y-m-d');
        }
        $status=$this->sidang->ambil_status2_ruang($tanggal,$ruang_sidang_id);
        $this->output->set_output(json_encode($status));
    }

    public function update_display_ruang($ruang_sidang_id){
        $data = $this->sidang->get_antrian_ruang($ruang_sidang_id);
        $this->output->set_output(json_encode($data));
    }


}
