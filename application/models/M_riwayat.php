<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_riwayat extends CI_Model{

    function get_data_riwayat_perkara($perkara_id)
    {
        if(empty($perkara_id))
        {
            return '';
        }
        try
        {
            $qry="SELECT *, IFNULL(diperbaharui_tanggal,diinput_tanggal) AS disp_diinput_tanggal 
					FROM perkara_proses WHERE perkara_id='".$perkara_id."'
					ORDER BY tanggal ASC, proses_id ASC,urutan ASC, tahapan_id ASC, disp_diinput_tanggal ASC;";
            // $qry="SELECT *, IFNULL(diperbaharui_tanggal,diinput_tanggal) AS disp_diinput_tanggal
            // FROM perkara_proses WHERE perkara_id='".$perkara_id."'
            // ORDER BY tahapan_id ASC,  proses_id ASC, tanggal ASC, disp_diinput_tanggal ASC;";
            return $this->db->query($qry)->result();
        }
        catch (Exception $e) {
            log_message('error', $e);
        }
    }

    //=== $aksi : 1 - Menambahkan Proses ; 2 - Menghapus Proses
    function updateproses($perkara_id,$idproses,$tanggal,$urutan,$namahalaman,$aksi){
        try {
            $alur_perkara_id = $this->db->query('SELECT alur_perkara_id FROM perkara WHERE perkara_id ='.$perkara_id)->row()->alur_perkara_id;
            $proses_alur_perkara=$this->db->query("SELECT * FROM proses_alur_perkara WHERE alur_perkara_id=$alur_perkara_id AND proses_id=$idproses")->row(0);

            if ($aksi==1){
                $this->db->simple_query("CALL perkara_proses_update('".$perkara_id."','".$proses_alur_perkara->tahapan_id."','".$proses_alur_perkara->tahapan_nama."',
									'".$proses_alur_perkara->proses_id."','".$proses_alur_perkara->proses_nama."','".$tanggal."','".$urutan."','".$this->session->userdata('username')."','".date("Y-m-d H:i:s")."');");
            }else{
                $this->db->where('proses_id',$idproses);
                $this->db->where('perkara_id',$perkara_id);
                $this->db->delete('perkara_proses');
            }

            $qry="SELECT *, IFNULL(diperbaharui_tanggal,diinput_tanggal) AS disp_diinput_tanggal 
					FROM perkara_proses WHERE perkara_id='".$perkara_id."'
					ORDER BY tahapan_id DESC, proses_id DESC,   tanggal DESC,urutan DESC,  disp_diinput_tanggal DESC LIMIT 1;";
            $proses_alur_perkara=$this->db->query($qry)->row(0);

            $data_tahapan=array(
                'tahapan_terakhir_id'	=> $proses_alur_perkara->tahapan_id,
                'tahapan_terakhir_text'	=> $proses_alur_perkara->tahapan_nama,
                'proses_terakhir_id'	=> $proses_alur_perkara->proses_id,
                'proses_terakhir_text'	=> $proses_alur_perkara->proses_nama,
                'diperbaharui_oleh'		=> $this->session->userdata('username'),
                'diperbaharui_tanggal'	=> date('Y-m-d H:i:s')
            );

            $namatabel="perkara";
            $primarykey="perkara_id";
            $this->db->where($primarykey, $perkara_id);
            $this->db->update($namatabel, $data_tahapan);
            $title = "UPDATE table <b>".$namatabel."</b> dari halaman <b>".$namahalaman."</b> dengan Primary Key [perkara_id=".$perkara_id."]";
            $descrip = $this->fetch_description($title,$data_tahapan);
            $this->add_audittrail("UPDATE",$title,$descrip,$namatabel,$namahalaman);

        }catch (Exception $e) {
            return FALSE;
        }
    }

    function fetch_description($title,$data){
        $descrip = '<br><table style="vertical-align:top" cellspacing="0" cellpadding="1" border="1">';
        $descrip .= '<tr><th>Nama Kolom</th><th>Nilai</th></tr>';
        foreach ($data as $key => $value) {
            $descrip .= '<tr>';
            $descrip .= '<td>'.$key.'</td>';
            $descrip .= '<td>'.$value.'</td>';
            $descrip .= '</tr>';
        }
        $descrip .= '</table>';
        return $descrip;
    }

    function add_audittrail($action,$title,$descrip,$tablename,$namahalaman){
        try {
            $data = array(
                'datetime' => date("Y-m-d H:i:s"),
                'ipaddress' => $this->input->ip_address(),
                'username' => $this->session->userdata('username'),
                'tablename' => $tablename,
                'formname' => $namahalaman,
                'action' => $action,
                'title' => $title,
                'description' => $descrip
            );
            $this->db->insert('sys_audittrail', $data);
        } catch (Exception $e) {

        }
    }

}
?>