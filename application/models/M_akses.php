<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_akses extends CI_Model {

    public $db_antrian;

    function __construct() {
        parent::__construct();
        $this->db_antrian=$this->config->item('db_antrian');
    }
    function chek_userpass()
    {
       //$this->session->sess_destroy();
        //chek ruag sidag sudah ada ?
        $array_admin=array(1,411,412,413,414,421,422,423,431,441,442,443,444,451,452,453,454,461,462,463,471,472,473,1001,1002,1003,1011,1012,1013,1031,1032,1033,1034);
        $hakim=array(10,20);
        $pp=array(30,410,420,430,440,450,460,470,500,1000,1010,1020,1030);
        $ada_ruang=$this->db->query("select * from  $this->db_antrian.ruangan_sidang");
        if($ada_ruang->num_rows() == 0) {
            // $this->db->query("insert into  $this->db_antrian.ruangan_sidang select * from ruangan_sidang");
			$this->db->query("INSERT INTO {$this->db_antrian}.ruangan_sidang (id,kode,nama,keterangan,aktif,diedit_oleh,diedit_tanggal,diinput_oleh,diinput_tanggal,diperbaharui_oleh,diperbaharui_tanggal) SELECT id,kode,nama,keterangan,aktif,diedit_oleh,diedit_tanggal,diinput_oleh,diinput_tanggal,diperbaharui_oleh,diperbaharui_tanggal FROM ruangan_sidang");

        }

        $ruang=$this->input->post('ruang');
        $ruangs=explode('|',$ruang);
        $kweri_password=$this->db->query("select password,userid from sys_users where username='".$this->input->post('username')."' and block=0")->row();
       if (!empty($kweri_password->password)) {

           $password=$kweri_password->password;
           $user_id=$kweri_password->userid;

       } else {

           $password='';
           $user_id='';
       }

        $pass = $this->getPassword();
        if ($pass != false AND !empty($password)) {
            if ($pass === $password) {
                $kweri_user=$this->db->query("
                                               select a.fullname,a.username,b.groupid,c.name as jabatan from sys_users a 
                                               left join sys_user_group b on a.userid=b.userid
                                               left join sys_groups c on b.groupid=c.groupid
                                               where a.userid=$user_id
                                            
                                             ")->row();

                if (in_array($kweri_user->groupid,$hakim)) {

                    $kweri=$this->db->query("select hakim_id from user_hakim where userid=$user_id")->row();
                    $iduser=$kweri->hakim_id;
                    $jabatan_singkat='Hakim';
                    if($ruangs[1]==0):
                        $this->session->set_userdata('logine','oraoke');
                        $this->session->set_userdata('hasil','gadjah');
                        return 'bebek';
                    endif;

                } else if (in_array($kweri_user->groupid,$pp)) {

                    $kweri=$this->db->query("select panitera_id from user_panitera where userid=$user_id")->row();
                    $iduser=$kweri->panitera_id;
                    $jabatan_singkat='PP';
                    if($ruangs[1]==0):
                        $this->session->set_userdata('logine','oraoke');
                        $this->session->set_userdata('hasil','gadjah');
                        return 'bebek';
                    endif;

                } else if ($kweri_user->groupid==600) {

                    $kweri=$this->db->query("select jurusita_id from user_jurusita where userid=$user_id")->row();
                    $iduser=$kweri->jursita_id;
                    if($ruangs[1]==0):
                        $this->session->set_userdata('logine','oraoke');
                        $this->session->set_userdata('hasil','gadjah');
                        return 'bebek';
                    endif;

                } else if (in_array($kweri_user->groupid,$array_admin)) {

                    $iduser=0;
                    $jabatan_singkat='admin';

                } else {
                    $this->session->set_userdata('logine','oraoke');
                    $this->session->set_userdata('hasil','gadjah');
                    return 'gajah';
                }

                $nama_satker=$this->db->query("SELECT VALUE as pa FROM sys_config WHERE id=62")->row();
                $aktif_durasi=$this->db->query("SELECT status FROM  $this->db_antrian.setting where jenis='durasi'")->row()->status;
                $jumlah_ruang=$this->db->query("SELECT count(*) as jumlah FROM ruangan_sidang where aktif='Y'")->row()->jumlah;
                $jenis_pengadilan=$this->db->query("SELECT VALUE as jenis FROM sys_config WHERE name='jenis_pengadilan'")->row();
                if (version_compare(PHP_VERSION, '5.6.0') >= 0) {
                   $ver_php=1;
                } else {
                    $ver_php=0;
                }
                $php_ver=phpversion();
                $jenis_antrian=$this->db->query("select status from  $this->db_antrian.setting where jenis='jenis_antrian'")->row()->status;
                $data_login=array(
                                'satker'=>$nama_satker->pa,
                                'nama'=>str_replace("'","",$kweri_user->fullname),
                                'kewenangan'=>$kweri_user->groupid,
                                'iduser'=>$iduser,
                                'username'=>$kweri_user->username,
                                'jabatan' =>$kweri_user->jabatan,
                                'jabatan_singkat'=>$jabatan_singkat,
                                'jenis_pengadilan'=>$jenis_pengadilan->jenis,
                                'tgl_server' => date('Y-m-d'),
                                'login_time' => date('Y-m-d H:i:s'),
                                'aktif_durasi' => $aktif_durasi,
                                'ruang_sidang' => $ruangs[0],
                                'ruangan_id' => $ruangs[1],
                                'jumlah_ruang'=> $jumlah_ruang,
                                'jenis_antrian'=>$jenis_antrian,
                                'ver_php'=>$ver_php,
                                'php_ver'=>$php_ver
                              );
                $this->session->set_userdata($data_login);
                $this->session->set_userdata('hasil','wedhus');
                return 'wedhus';
            } else {
                $this->session->set_userdata('logine','oraoke');
                $this->session->set_userdata('hasil','gadjah');
                return 'gajah';
            }
        } else {
            $this->session->set_userdata('logine','oraoke');
            $this->session->set_userdata('hasil','gadjah');
            return 'gajah';
        }
    }


    function arr2md5($arrinput){
        $hasil='';
        foreach($arrinput as $val){
            if($hasil==''){
                $hasil=md5($val);
            }
            else {
                $code=md5($val);
                for($hit=0;$hit<min(array(strlen($code),strlen($hasil)));$hit++){
                    $hasil[$hit]=chr(ord($hasil[$hit]) ^ ord($code[$hit]));
                }
            }
        }
        return(md5($hasil));
    }


    function getPassword(){
        $kweri=$this->db->query("select code_activation from sys_users where username='".$this->input->post('username',TRUE)."'")->row();
        if (!empty($kweri->code_activation)) {
            $pass = $this->arr2md5(array($kweri->code_activation, $this->input->post('password',TRUE)));
            return $pass;

        }else{
            return false;
        }
    }



    public function chek_hp($nohp) {

        $nohps=str_replace('+62','',$nohp);

       $kweri=$this->db->query("select count(*) as jumlah from pihak where telepon like '%".$nohps."%'")->row();

       if ($kweri->jumlah > 0) {

           return 1;
       } else {

           return 0;
       }


    }


    public function smsotp ($nohp) {

        //sms

        $pin=$this->generate_otp();
        $pesan='Pin masuk antrian sidang adalah '.$pin." akan kadaluarsa dalam waktu 60 menit";
        $this->db->query("INSERT INTO smsku.outbox(DestinationNumber, TextDecoded,CreatorID) VALUES ('$nohp','$pesan','gammu')");
        //masukan ke db antrinpin
        $tanggals = date("Y-m-d H:i:s");
        $this->db->query("insert into antrian.antrian_pin (nohp,pin,tgl) values ('$nohp','$pin','$tanggals')");

    }


    public function chek_pin($nohp,$pin) {

        $kweri=$this->db->query("select pin,tgl from antrian.antrian_pin where  nohp like '%".$nohp."%' order by tgl desc limit 1")->row();

        if (isset($kweri->pin)) {

            if ($pin==$kweri->pin) {

              return 1;

                 $data_login=array(
                     'satker'=>'pihak',
                     'nama'=>'nama_pihak',
                     'kewenangan'=>'kewenangan_pihak',
                     'iduser'=>'id_pihak',
                     'jabatan' =>'pihak/pengacara',
                     'login_time' => date('Y-m-d H:i:s')
                 );

                 $this->session->set_userdata($data_login);

            } else {

                return 0;

            }

        } else {

            return 0;
        }


    }


    public function list_perkara_pihak ($nohp) {


        $kweri_pihak=$this->db->query("select a.nomor_perkara,a.perkara_id,group_concat(distinct b.nama separator '<br>') as p, group_concat(distinct j.nama separator '<br>') as t,a.jenis_perkara_text,
                                            date_format(x.tanggal_sidang,'%d-%m-%Y') as tgl_sidang from perkara a
                                            left join perkara_pihak1 b on a.perkara_id=b.perkara_id
                                            left join perkara_pihak2 j on a.perkara_id=j.perkara_id	
                                            left join pihak z on b.pihak_id=z.id 
                                            left join perkara_jadwal_sidang x on a.perkara_id=x.perkara_id
                                            where z.telepon like '%".$nohp."%' and x.tanggal_sidang >=curdate() group by a.perkara_id order by x.tanggal_sidang asc");
        if ($kweri_pihak->num_rows() > 0) {

            return $kweri_pihak;

        } else {

            $kweri_pengacara=$this->db->query("select a.nomor_perkara,a.perkara_id,group_concat(distinct b.nama separator '<br>') as p, group_concat(distinct j.nama separator '<br>') as t,a.jenis_perkara_text,
                                                date_format(x.tanggal_sidang,'%d-%m-%Y') as tgl_sidang,k.nama as pengacara from perkara a
                                                left join perkara_pihak1 b on a.perkara_id=b.perkara_id
                                                left join perkara_pihak2 j on a.perkara_id=j.perkara_id	
                                                left join perkara_pengacara k on a.perkara_id=k.perkara_id
                                                left join pihak z on k.pengacara_id=z.id 
                                                left join perkara_jadwal_sidang x on a.perkara_id=x.perkara_id
                                                where z.telepon like '%".$nohp."%' and x.tanggal_sidang > curdate() group by a.perkara_id order by x.tanggal_sidang asc");

            if ($kweri_pengacara->num_rows() > 0) {

                return $kweri_pengacara;


            } else {


                return 0;
            }

        }




    }



    private function generate_otp($length = 6)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function send_otp($phone_number)
    {
        $otp_code = $this->generate_otp();
        $data = [
            'phone_number' => $phone_number,
            'otp_code' => $otp_code,
            'created' => time()
        ];
        $this->db->insert('antrian_otp', $data);
        $sms = '<#> Kode OTP Antrian Sidang Anda: '.$otp_code.' qvRG9eDX1PE';
    }

    /*
    function ambil_id($userid){

        $kweri=$this->db->query("

                                select a.userid,b.hakim_id,c.panitera_id,

                                ")


        $this->db->select('su.userid, uh.hakim_id, uj.jurusita_id, up.panitera_id');
        $this->db->from('sys_users su');
        $this->db->join('user_hakim uh','su.userid=uh.userid','left');
        $this->db->join('user_jurusita uj','su.userid=uj.userid','left');
        $this->db->join('user_panitera up','su.userid=up.userid','left');
        $this->db->where('su.userid', $userid);
        $res=$this->db->get();
        return $res->row(0);

    }
*/

    public function hapus_sesi(){
        $userName = $this->session->userdata('userid');
        if(empty($userName)){
            $this->session->sess_destroy();
            redirect('login');
        }
    }


    function chek_userpass_ptsp()
    {
        //checkuserpass
        $username=$this->input->post('username',true);
        $passowrd=$this->input->post('password',true);
        $kweri=$this->db->query("select * from m_loket where username='".$username."' and password='".$password."'");
        if($kweri->num_rows() > 0) {
            $data_login=array(
                'username'=>$kweri->row()->username,
                'layanan'=>$kweri->row()->nama_layanan,
                'tanggal'=>date('Y-m-d'),
                'id_loket'=>$kweri->row()->id,
                'no_loket' =>$kweri->row()->no_loket,
                'loket' =>$kweri->row()->nama_loket,
                'login_time' => date('Y-m-d H:i:s'),
                'logine' =>'oke'
            );
            $this->session->set_userdata($data_login);
            return 'wedhus';
        } else {
            $this->session->set_userdata('logine','oraoke');
            return 'gajah';
        }
    }


    function check_admin()
    {
        $array_admin = array(1, 411, 412, 413, 414, 421, 422, 423, 431, 441, 442, 443, 444, 451, 452, 453, 454, 461, 462, 463, 471, 472, 473, 1001, 1002, 1003, 1011, 1012, 1013, 1031, 1032, 1033, 1034);
        $kweri_password = $this->db->query("select password,userid from sys_users where username='" . $this->input->post('username') . "' and block=0")->row();
        if (!empty($kweri_password->password)) {

            $password = $kweri_password->password;
            $user_id = $kweri_password->userid;

        } else {

            $password = '';
            $user_id = '';
        }

        $pass = $this->getPassword();
        if ($pass != false and !empty($password)) {

            $kweri_user = $this->db->query("
                                               select a.fullname,a.username,b.groupid,c.name as jabatan from sys_users a 
                                               left join sys_user_group b on a.userid=b.userid
                                               left join sys_groups c on b.groupid=c.groupid
                                               where a.userid=$user_id
                                            
                                             ")->row();

            if (in_array($kweri_user->groupid, $array_admin)) {
                return array('hasil' => 1);
            } else {
                return array('hasil' => 0);
            }
        }

    }



}