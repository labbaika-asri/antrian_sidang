<?php
class M_laporan extends CI_Model {

public $db_antrian;

function __construct() {
    parent::__construct();
    $this->db_antrian=$this->config->item('db_antrian');
}    

public function ambil_data_antrian($tgl1,$tgl2,$ruang) {
 
 if($tgl1<>0 and $tgl2<>0) {
    $sql="tanggal_sidang between '".$tgl1."' and '".$tgl2."'";    
 }  

 if($tgl1==0 and $tgl2==0) {
     $tglawaltahun=date('Y-01-01');
    $sql="tanggal_sidang between'".$tglawaltahun."' and curdate()";    
 }  

 if($tgl1<>0 and $tgl2==0) {
    $sql="tanggal_sidang)='".$tgl1."'";    
 }

 if ($ruang<>"0") {
     $sql_ruang="and ruang_sidang='".$ruang."'";
 } else {
     $sql_ruang="";
 }



 return $this->db->query("select a.nomor_perkara,date_format(a.tanggal_sidang,'%d-%m-%Y') as tgl_sidang,
                                    a.no_antrian,a.no_antrian_cetak,a.nohp,a.ruang_sidang,a.ruang_kode,a.agenda_sidang,b.jenis_perkara_text,
                            date_format(a.tgl_ambil,'%d-%m-%Y %T') as tgl_ambil,a.jam_mulai,date_format(a.jam_mulai,'%d-%m-%Y %T') as mulai,
                                a.jam_selesai,date_format(a.jam_selesai,'%d-%m-%Y %T') as selesai,concat(z.majelis_hakim_text,'\r\n',z.panitera_pengganti_text) as majelis
                            from $this->db_antrian.antrian_sidang a
                                 left join perkara b  on a.perkara_id=b.perkara_id
                                  left join perkara_penetapan z on a.perkara_id=z.perkara_id 
                                where $sql $sql_ruang order by tanggal_sidang desc,ruang_sidang, no_antrian");

}


public function ambil_data_sidang_majelis($tgl,$majelis) {
    if($majelis=="0") {
        $sql='';
    } else {
        $mjl=explode('|',$majelis);
        if($mjl[0]=='Hakim') {
            $hakim_id=$mjl[1];
            $sql="and (left(b.majelis_hakim_id,locate(',',b.majelis_hakim_id)-1)=$hakim_id or b.majelis_hakim_id=$hakim_id)";
        } else if ($mjl[0]=='PP') {
            $pp_id=$mjl[1];
            $sql=" and b.panitera_pengganti_id=$pp_id";
        } else {
            $sql='';
        }
    }

        return $this->db->query("
                      select 
                             a.perkara_id,
                             a.nomor_perkara, 
                             a.jenis_perkara_text as jenis_perkara,
                             a.para_pihak as pihak,
                             concat(if((pengacara_pihak1 is not null and pengacara_pihak1<>''),concat('<b>Pengacara PE</b>:<br>',pengacara_pihak1,'<br>'),''),if((pengacara_pihak2 is not null and pengacara_pihak2<>''),concat('<b>Pengacara TE</b>:<br>',pengacara_pihak2,'<br>'),''),if((pengacara_pihak3 is not null and pengacara_pihak3<>''),concat('<b>Pengacara Intervensi</b>:<br>',pengacara_pihak3,'<br>'),''),if((pengacara_pihak4 is not null and pengacara_pihak4<>''),concat('<b>Pengacara Turut</b>:<br>',pengacara_pihak4),''))
                                as pengacara, 
                             a.jenis_perkara_text,
                             c.tanggal_sidang,
                             c.agenda,
                             c.alasan_ditunda,
                              ifnull(h.nama_ruang,c.ruangan) as ruangan,
                             c.urutan as sidang_ke,
                             date_format(w.tgl_tunda,'%d-%m-%Y') as tgl_tunda,
                             concat(b.majelis_hakim_text,'<br>',b.panitera_pengganti_text) as majelis,
                             j.nama as jenis_putusan,
                             if(a.jenis_perkara_id in (346,347), n.nama,'') as faktor
                                    from perkara a 
                                    left join perkara_penetapan b on a.perkara_id=b.perkara_id
                                    left join perkara_jadwal_sidang c on a.perkara_id=c.perkara_id
                                        left join (select perkara_id, tanggal_sidang as tgl_tunda from perkara_jadwal_sidang where tanggal_sidang > '".$tgl."') as w
                                        on c.perkara_id=w.perkara_id	
                                        left join perkara_putusan y on c.perkara_id=y.perkara_id and c.tanggal_sidang=y.tanggal_putusan
                                        left join status_putusan j on y.status_putusan_id=j.id
                                        left join $this->db_antrian.ruang_sidang_isian h on c.perkara_id=h.perkara_id and c.tanggal_sidang=h.tanggal_sidang
                                        left join perkara_akta_cerai m on y.perkara_id=m.perkara_id
                                        left join faktor_perceraian n on m.faktor_perceraian_id=n.id and n.aktif='Y'					
                                         where c.tanggal_sidang='".$tgl."' $sql group by a.perkara_id 
                      union
                         select 
                             a.perkara_id,
                             a.nomor_perkara, 
                             a.jenis_perkara_text as jenis_perkara,
                             a.para_pihak as pihak,
                             concat(if((pengacara_pihak1 is not null and pengacara_pihak1<>''),concat('<b>Pengacara PE</b>:<br>',pengacara_pihak1,'<br>'),''),if((pengacara_pihak2 is not null and pengacara_pihak2<>''),concat('<b>Pengacara TE</b>:<br>',pengacara_pihak2,'<br>'),''),if((pengacara_pihak3 is not null and pengacara_pihak3<>''),concat('<b>Pengacara Intervensi</b>:<br>',pengacara_pihak3,'<br>'),''),if((pengacara_pihak4 is not null and pengacara_pihak4<>''),concat('<b>Pengacara Turut</b>:<br>',pengacara_pihak4),''))
                                as pengacara, 
                             a.jenis_perkara_text,
                             c.tanggal_musyawarah as tanggal_sidang,
                             convert(c.agenda_musyawarah using utf8) as agenda,
                             '' as alasan_ditunda,
                             ifnull(h.nama_ruang,'belum_ditentukan') as ruangan,
                             c.urutan as sidang_ke,
                             date_format(w.tgl_tunda,'%d-%m-%Y') as tgl_tunda,
                             concat(b.majelis_hakim_text,'<br>',b.panitera_pengganti_text) as majelis,
                             j.nama as jenis_putusan,
                             if(a.jenis_perkara_id in (346,347), n.nama,'') as faktor
                                from perkara a 
                                left join perkara_penetapan b on a.perkara_id=b.perkara_id
                                left join perkara_persiapan_proses c on a.perkara_id=c.perkara_id 
                                    left join (select perkara_id, tanggal_sidang as tgl_tunda from perkara_jadwal_sidang where tanggal_sidang > '".$tgl."') as w
                                    on c.perkara_id=w.perkara_id	
                                    left join perkara_putusan y on c.perkara_id=y.perkara_id and c.tanggal_musyawarah=y.tanggal_putusan
                                    left join status_putusan j on y.status_putusan_id=j.id
                                    left join $this->db_antrian.ruang_sidang_isian h  on c.perkara_id=h.perkara_id and c.tanggal_musyawarah=h.tanggal_sidang
                                    left join perkara_akta_cerai m on y.perkara_id=m.perkara_id
                                    left join faktor_perceraian n on m.faktor_perceraian_id=n.id and n.aktif='Y'					
                                     where c.tanggal_musyawarah='".$tgl."' $sql group by a.perkara_id order 
                                     by perkara_id asc                   
                                         ");

    }


public function kompilasi_data_laporan($tgl1,$tgl2,$ruang_sidang) {

        if($tgl1<>0 and $tgl2<>0) {
            $sql="tanggal_sidang between '".$tgl1."' and '".$tgl2."'";
        }

        if($tgl1==0 and $tgl2==0) {
            $tglawaltahun=date('Y-01-01');
            $sql="tanggal_sidang between'".$tglawaltahun."' and curdate()";
        }

        if($tgl1<>0 and $tgl2==0) {
            $sql="tanggal_sidang)='".$tgl1."'";
        }

        if ($ruang_sidang<>"0") {
            $sql_ruang="and ruang_sidang='".$ruang_sidang."'";
        } else {
            $sql_ruang="";
        }

        $kweri_satker=$this->db->query("select value as satker from sys_config where id=62")->row();
        $satker=$kweri_satker->satker;
        $kweri= $this->db->query("select a.nomor_perkara,date_format(a.tanggal_sidang,'%d-%m-%Y') as tgl_sidang,b.jenis_perkara_text as jenis_perkara,
                                    a.no_antrian_cetak,a.ruang_sidang,a.ruang_kode,a.agenda_sidang, concat(z.majelis_hakim_text,'\r\n',z.panitera_pengganti_text) as majelis,
                                    date_format(a.tgl_ambil,'%d-%m-%Y %T') as tgl_ambil,
                                    a.jam_mulai,date_format(a.jam_mulai,'%d-%m-%Y %T') as mulai,
                                    a.jam_selesai,date_format(a.jam_selesai,'%d-%m-%Y %T') as selesai
                                    from $this->db_antrian.antrian_sidang a
                                         left join perkara b  on a.perkara_id=b.perkara_id
                                         left join perkara_penetapan z on a.perkara_id=z.perkara_id
                                            where $sql $sql_ruang order by tanggal_sidang desc,ruang_sidang, no_antrian");

        if ($kweri->num_rows() > 0) {
            $no=[];
            $noperk=[];
            $tgl_sidang=[];
            $jenisperk=[];
            $majelis=[];
            $agenda=[];
            $no_antrian=[];
            $ruang=[];
            $tgl_ambil=[];
            $mulai=[];
            $selesai=[];
            $lama=[];
            $i=1;
            foreach($kweri->result() as $row) {
                $date_a = new DateTime($row->mulai);
                $date_b = new DateTime($row->selesai);
                $interval = date_diff($date_a,$date_b);
                $durasi=$interval->format('%h:%i:%s');
                $no[]=$i;
                $noperk[]=$row->nomor_perkara;
                $tgl_sidang[]=$row->tgl_sidang;
                $jenisperk[]=$row->jenis_perkara;
                $majelis[]=str_replace("</br>","\r\n",$row->majelis);
                $agenda[]=$row->agenda_sidang;
                $no_antrian[]=$row->no_antrian_cetak;
                $ruang[]=$row->ruang_sidang;
                $tgl_ambil[]=$row->tgl_ambil;
                $mulai[]=$row->mulai;
                $selesai[]=$row->selesai;
                $lama[]=$durasi;
                $i++;
            }
            $laporan=array('satker'=>$satker,'no'=>$no,'nomor_perkara'=>$noperk,'tgl_sidang'=>$tgl_sidang,'jenis_perkara'=>$jenisperk,'majelis'=>$majelis,'agenda'=>$agenda,'no_antrian'=>$no_antrian,'ruang'=>$ruang,'tgl_ambil'=>$tgl_ambil,'mulai'=>$mulai,'selesai'=>$selesai,'lama'=>$lama);

        } else {
            $laporan=array('no'=>0);
        }

         return $laporan;
    }

    public function kompilasi_data_jurnal($tgl1,$majelis) {
        $kweri_satker=$this->db->query("select value as satker from sys_config where id=62")->row();
        $satker=$kweri_satker->satker;
        if($majelis=="0") {
            $sql='';
        } else {
            $mjl=explode('|',$majelis);
            if($mjl[0]=='Hakim') {
                $hakim_id=$mjl[1];
                $sql="and (left(b.majelis_hakim_id,locate(',',b.majelis_hakim_id)-1)=$hakim_id or b.majelis_hakim_id=$hakim_id)";
            } else if ($mjl[0]=='PP') {
                $pp_id=$mjl[1];
                $sql=" and b.panitera_pengganti_id=$pp_id";
            } else {
                $sql='';
            }
        }

        $kweri= $this->db->query("
 
                          select 
                             a.perkara_id,
                             a.nomor_perkara, 
                             a.jenis_perkara_text as jenis_perkara,
                             concat(a.para_pihak,'\r\n',
                             concat(if((pengacara_pihak1 is not null and pengacara_pihak1<>''),concat('<b>Pengacara PE</b>:\r\n',pengacara_pihak1,'\r\n'),''),if((pengacara_pihak2 is not null and pengacara_pihak2<>''),concat('<b>Pengacara TE</b>:\r\n',pengacara_pihak2,'\r\n'),''),if((pengacara_pihak3 is not null and pengacara_pihak3<>''),concat('<b>Pengacara Intervensi</b>:\r\n',pengacara_pihak3,'\r\n'),''),if((pengacara_pihak4 is not null and pengacara_pihak4<>''),concat('<b>Pengacara Turut</b>:\r\n',pengacara_pihak4),'')))
                                as pihak, 
                             c.tanggal_sidang,
                              dayofweek(c.tanggal_sidang) as hari,  
                             c.agenda,
                             c.alasan_ditunda,
                              ifnull(h.nama_ruang,c.ruangan) as ruangan,
                             c.urutan as sidang_ke,
                             date_format(w.tgl_tunda,'%d-%m-%Y') as tgl_tunda,
                             mm.nama_gelar as pp,
                                    mm.kode as pp_kode,
                                    b.majelis_hakim_nama,
                                convert(concat(b.majelis_hakim_kode,'|',mm.kode)  using utf8) as majelis_kode,
                             concat(b.majelis_hakim_text,'\r\n',b.panitera_pengganti_text) as majelis,
                             j.nama as jenis_putusan,
                             if(a.jenis_perkara_id in (346,347), n.nama,'') as faktor
                                    from perkara a 
                                    left join perkara_penetapan b on a.perkara_id=b.perkara_id
                                    left join panitera_pn mm on b.panitera_pengganti_id=mm.id
                                    left join perkara_jadwal_sidang c on a.perkara_id=c.perkara_id
                                        left join (select perkara_id, tanggal_sidang as tgl_tunda from perkara_jadwal_sidang where tanggal_sidang > '".$tgl1."') as w
                                        on c.perkara_id=w.perkara_id	
                                        left join perkara_putusan y on c.perkara_id=y.perkara_id and c.tanggal_sidang=y.tanggal_putusan
                                        left join status_putusan j on y.status_putusan_id=j.id
                                        left join $this->db_antrian.ruang_sidang_isian h on c.perkara_id=h.perkara_id and c.tanggal_sidang=h.tanggal_sidang
                                        left join perkara_akta_cerai m on y.perkara_id=m.perkara_id
                                        left join faktor_perceraian n on m.faktor_perceraian_id=n.id and n.aktif='Y'					
                                         where c.tanggal_sidang='".$tgl1."' $sql group by a.perkara_id 
                      union
                         select 
                             a.perkara_id,
                             a.nomor_perkara, 
                             a.jenis_perkara_text as jenis_perkara,
                             concat(a.para_pihak,'\r\n',
                             concat(if((pengacara_pihak1 is not null and pengacara_pihak1<>''),concat('<b>Pengacara PE</b>:\r\n',pengacara_pihak1,'\r\n'),''),if((pengacara_pihak2 is not null and pengacara_pihak2<>''),concat('<b>Pengacara TE</b>:\r\n',pengacara_pihak2,'\r\n'),''),if((pengacara_pihak3 is not null and pengacara_pihak3<>''),concat('<b>Pengacara Intervensi</b>:\r\n',pengacara_pihak3,'\r\n'),''),if((pengacara_pihak4 is not null and pengacara_pihak4<>''),concat('<b>Pengacara Turut</b>:\r\n',pengacara_pihak4),'')))
                                as pihak, 
                             c.tanggal_musyawarah as tanggal_sidang,
                             dayofweek(c.tanggal_musyawarah) as hari,
                             convert(c.agenda_musyawarah using utf8) as agenda,
                             '' as alasan_ditunda,
                             ifnull(h.nama_ruang,'belum_ditentukan') as ruangan,
                             c.urutan as sidang_ke,
                             date_format(w.tgl_tunda,'%d-%m-%Y') as tgl_tunda,
                             mm.nama_gelar as pp,
                                    mm.kode as pp_kode,
                                    b.majelis_hakim_nama,
                                    convert(concat(b.majelis_hakim_kode,'|',mm.kode)  using utf8) as majelis_kode,
                             concat(b.majelis_hakim_text,'\r\n',b.panitera_pengganti_text) as majelis,
                             j.nama as jenis_putusan,
                             if(a.jenis_perkara_id in (346,347), n.nama,'') as faktor
                                from perkara a 
                                left join perkara_penetapan b on a.perkara_id=b.perkara_id
                                left join panitera_pn mm on b.panitera_pengganti_id=mm.id
                                left join perkara_persiapan_proses c on a.perkara_id=c.perkara_id 
                                    left join (select perkara_id, tanggal_sidang as tgl_tunda from perkara_jadwal_sidang where tanggal_sidang > '".$tgl1."') as w
                                    on c.perkara_id=w.perkara_id	
                                    left join perkara_putusan y on c.perkara_id=y.perkara_id and c.tanggal_musyawarah=y.tanggal_putusan
                                    left join status_putusan j on y.status_putusan_id=j.id
                                    left join $this->db_antrian.ruang_sidang_isian h  on c.perkara_id=h.perkara_id and c.tanggal_musyawarah=h.tanggal_sidang
                                    left join perkara_akta_cerai m on y.perkara_id=m.perkara_id
                                    left join faktor_perceraian n on m.faktor_perceraian_id=n.id and n.aktif='Y'					
                                     where c.tanggal_musyawarah='".$tgl1."' $sql group by a.perkara_id order 
                                     by perkara_id asc           
                                      ");

        if ($kweri->num_rows() > 0) {
            $no=[];
            $noperk=[];
            $jenisperk=[];
            $pihak=[];
            $sidangke=[];
            $jenis_putusan=[];
            $tanggal_tunda=[];
            $alasan_tunda=[];
            $faktor=[];
            $i=1;
            $haris=array(1=>'Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
            foreach($kweri->result() as $row) {
                $no[]=$i;
                $noperk[]=$row->nomor_perkara;
                $jenisperk[]=$row->jenis_perkara;
                $cari=array("<br />","<br>","<b>","</b>");
                $ganti=array("\r\n","\r\n","","");
                $pihak[]=str_replace($cari,$ganti,$row->pihak);
                $sidangke[]=$row->sidang_ke;
                $jenis_putusan[]=$row->jenis_putusan;
                $tanggal_tunda[]=$row->tgl_tunda;
                if($row->alasan_ditunda==0) {
                    $alasan=" ";
                } else {
                    $alasan=$row->alasan_ditunda;
                }
                $alasan_tunda[]=$alasan;
                $faktor[]=$row->faktor;
                $ruang=$row->ruangan;
                $hari=$haris[$row->hari];
                $majelis_kode=$row->majelis_kode;
                $majeliss=str_replace("<br>","\r\n",str_replace("</br>","\r\n",$row->majelis));
                $pp=$row->pp;
                if($row->pp_kode=="D") {
                    $panitera="Panitera";
                } else {
                    $panitera="Panitera Pengganti";
                }
                $pp_kode=$panitera;
                $i++;
            }
            $jurnal=array('satker'=>$satker,'no'=>$no,'noperk'=>$noperk,'jenisperk'=>$jenisperk,'pihak'=>$pihak,'ruang'=>$ruang,'hari'=>$hari,'pp'=>$pp,'pp_kode'=>$pp_kode,'majelis'=>$majeliss,'majelis_kode'=>$majelis_kode,'sidangke'=>$sidangke,'jenis_putusan'=>$jenis_putusan,'tanggal_tunda'=>$tanggal_tunda,'alasan_tunda'=>$alasan_tunda,'faktor'=>$faktor);
        } else {
            $jurnal=array('no'=>0);
        }
        return $jurnal;
    }



 public function ambil_data_majelis () {
    $majelis=[];
    $kweri_hakim=$this->db->query("select id,kode,nama_gelar from hakim_pn where aktif='Y'");
    foreach($kweri_hakim->result() as $row) {
        $hakim="Hakim|".$row->id."|".str_replace("'","",$row->nama_gelar);
        $majelis[]=$hakim;
    }
     $kweri_hakim=$this->db->query("select id,kode,nama_gelar from panitera_pn where aktif='Y'");
     foreach($kweri_hakim->result() as $row) {
         $pp="PP|".$row->id."|".str_replace("'","",$row->nama_gelar);
         $majelis[]=$pp;
     }
     return $majelis;
 }

 public function jurnal_keu($perkara_id) {
    return $this->db->query("
                                select uraian, if(jenis_transaksi=1,jumlah,'0') as debet, if(jenis_transaksi=-1,jumlah,'0') as kredit from perkara_biaya where perkara_id=$perkara_id and tahapan_id=10
                                order by tanggal_transaksi,id");

 }

 public function ambil_data_antrian_prioritas($tgl) {
 
    return $this->db->query("select a.nomor_perkara,a.keterangan_prioritas,date_format(a.tanggal_sidang,'%d-%m-%Y') as tgl_sidang,
                                       a.no_antrian,a.no_antrian_cetak,a.nohp,a.ruang_sidang,a.ruang_kode,a.agenda_sidang,b.jenis_perkara_text,
                               date_format(a.tgl_ambil,'%d-%m-%Y %T') as tgl_ambil,a.jam_mulai,date_format(a.jam_mulai,'%d-%m-%Y %T') as mulai,
                                   a.jam_selesai,date_format(a.jam_selesai,'%d-%m-%Y %T') as selesai,concat(z.majelis_hakim_text,'\r\n',z.panitera_pengganti_text) as majelis
                               from $this->db_antrian.antrian_sidang a
                                    left join perkara b  on a.perkara_id=b.perkara_id
                                     left join perkara_penetapan z on a.perkara_id=z.perkara_id 
                                   where a.tanggal_sidang='".$tgl."' and a.prioritas=1 order by tanggal_sidang desc,ruang_sidang, no_antrian");
   
   }

   public function ambil_antrian_non_prioritas($tgl) {
 
    return $this->db->query("select * from $this->db_antrian.antrian_sidang where tanggal_sidang='".$tgl."' and (prioritas is null or prioritas<>1)");
  
}


}   