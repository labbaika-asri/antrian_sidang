<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_konfig extends CI_Model {

    public $db_antrian;

    function __construct() {
        parent::__construct();
        $this->db_antrian=$this->config->item('db_antrian');
    }

    public function ambil_ruang() {
      try {
          $this->db->query("truncate table $this->db_antrian.ruangan_sidang");
          $this->db->query("insert into $this->db_antrian.ruangan_sidang select * from ruangan_sidang where aktif='Y'");
          return TRUE;
      }
      catch (Exception $e) {
          return FALSE;
        }


    }

    public function ambil_ruangs () {
        return $this->db->select("id,nama,aktif")->from("$this->db_antrian.ruangan_sidang")->where("aktif='Y' order by id asc")->get();
    }

    public function ambil_ruangss () {
        return $this->db->select("id,nama,aktif")->from("$this->db_antrian.ruangan_sidang")->where("aktif='Y' order by id asc")->get();
    }

    public function update_ruang($id) {
        try {
            $this->db->query("update $this->db_antrian.ruangan_sidang set aktif='Y' where id=$id");
            return TRUE;
        }
        catch (Exception $e) {
            return FALSE;
        }


    }

    public function reset_ruang($id) {
        try {
            $this->db->query("update $this->db_antrian.ruangan_sidang set aktif='T'");
            return TRUE;
        }
        catch (Exception $e) {
            return FALSE;
        }


    }

}