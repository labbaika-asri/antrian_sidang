<?php
class M_suara extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->db_antrian=$this->config->item('db_antrian');
    }
   public function ambil_suara() {
       $suara=[];
       $kweri=$this->db->query("select id,suara,asing from $this->db_antrian.panggilan_sidang where tgl_sidang=curdate() and st_panggil=0 order by id asc");
       $kweri_jenis=$this->db->query("select status from $this->db_antrian.audio where id=1");
       if ($kweri->num_rows() > 0) {

           foreach ($kweri->result() as $row) {
               $pesan=array(
                               "id_suara"=>$row->id,
                               "teks"=>$row->suara,
                               "asing"=>$row->asing,
                               "jenis_suara"=>$kweri_jenis->row()->status
               );
               $suara[]=$pesan;
           }

       } else {
           $pesan=array(
               "id_suara"=>0,
               "teks"=>0
           );
           $suara[]=$pesan;
       }
     return $suara;
   }


   public function ambil_config() {
       $kweri=$this->db->query("select suara, status from $this->db_antrian.audio where id=10");
        if($kweri->num_rows() > 0) {
            if ($kweri->row()->status==0) {
                return array("aktif"=>0,"suara"=>"0");
            } else if  ($kweri->row()->status==1) {
                return array("aktif"=>1,"suara"=>$kweri->row()->suara);
            }
        } else {
               return array("aktif"=>0,"suara"=>"0");
        }

}

    public function update_panggilan($id) {
        $this->db->query(" update $this->db_antrian.panggilan_sidang set st_panggil=1 where id=$id");
    }

    public function ambil_suara_non() {
        $suara=[];
        $kweri=$this->db->query("select id,suara from $this->db_antrian.panggil_audio where tgl=curdate() and status is null order by id asc");
        if ($kweri->num_rows() > 0) {

            foreach ($kweri->result() as $row) {
                $pesan=array(
                    "id_suara"=>$row->id,
                    "teks"=>$row->suara
                );
                $suara[]=$pesan;
            }

        } else {
            $pesan=array(
                "id_suara"=>0,
                "teks"=>0
            );
            $suara[]=$pesan;
        }
        return $suara;
    }

    public function update_panggilan_non($id) {
        $kweri=$this->db->query(" update $this->db_antrian.panggil_audio set status=1 where id=$id");
    }


    public function ambil_audio() {
       $audio=[];
       $kweri= $this->db->query("select * from $this->db_antrian.audio order by id asc");
       foreach($kweri->result() as $row) {
          $audio[]=array('id'=>$row->id,'suara'=>$row->suara,'status'=>$row->status);
       }
       return $audio;
    }




    public function  update_audio($id,$suara,$status) {
       try {
           $data_update=array(
                              'suara'=>$suara,
                              'status'=>$status
                            );

           $this->db->where('id',$id);
           $this->db->update("$this->db_antrian.audio",$data_update);
           return TRUE;
       } catch (Exception $e) {
           return FAlSE;
       }

    }


    public function  update_aktif($id,$status) {
      $this->db->query("update $this->db_antrian.audio set status=$status where id=$id");
    }



     public function panggil_nonsidang($jenis,$ruang) {

       if ($jenis==1) {
           $kweri=$this->db->query("select suara from $this->db_antrian.audio where id=3")->row();

           if ($kweri->suara=='' or empty($kweri->suara)) {

               $suara="Bismillahirrohmanirrohim Assalamu alaikum warohmatullohi wabarokatuh !!! Persidangan di ruang sidang $ruang telah di buka oleh ketua majelis .! Selanjutnya kami panggil";

           } else {
               $suara=str_replace("#ruang#","$ruang",$kweri->suara);

           }

       }

         if ($jenis==2) {
             //ambil format
             $kweri=$this->db->query("select suara from $this->db_antrian.audio where id=4")->row();

             if ($kweri->suara=='' or empty($kweri->suara)) {

                 $suara="Persidangan di ruang sidang $ruang di skors untuk sholat duhur.";

             } else {
                 $suara=str_replace("#ruang#","$ruang",$kweri->suara);

             }


         }

         if ($jenis==3) {
             //ambil format
             //ambil format
             $kweri = $this->db->query("select suara from $this->db_antrian.audio where id=5")->row();

             if ($kweri->suara == '' or empty($kweri->suara)) {

                 $suara = "Persidangann akan dimulai lagi di ruang sidang" . $ruang;

             } else {
                 $suara = str_replace("#ruang#", "$ruang", $kweri->suara);

             }

         }

             if ($jenis==4) {

                 $kweri=$this->db->query("select suara from $this->db_antrian.audio where  id=6")->row();

                 if ($kweri->suara=='' or empty($kweri->suara)) {

                     $suara="Persidangan di ruang sidang ".$ruang." telah selesau";

                 } else {
                     $suara=str_replace("#ruang#","$ruang",$kweri->suara);

                 }

             }

         if ($jenis==5) {

             $kweri=$this->db->query("select suara from $this->db_antrian.audio where id=9")->row();

             if ($kweri->suara=='' or empty($kweri->suara)) {

                 $suara="petugas masuk ke ruang sidang ".$ruang;

             } else {
                 $suara=str_replace("#ruang#","$ruang",$kweri->suara);

             }

         }

         $tgl=date('Y-m-d');
         $tgl2=date('Y-m-d H:i:s');
         $data_insert=array(
                            'tgl'=>$tgl,
                            'suara'=>$suara,
                            'waktu_panggil'=>$tgl2
                            );
         $this->db->insert("$this->db_antrian.panggil_audio",$data_insert);
     }


      Public function panggilsaksi($status_pihak,$nomor_perkara,$ruang) {
          $split=explode("/",$nomor_perkara);
          $noperk0=$split[0];
          $noperk1=str_replace('.',' ',$split[1]);
          $noperk2=$split[2];
          $noperk=$noperk0."  ".$noperk1."  ".$noperk2;
          $kweris=$this->db->query("select alur_perkara_id, jenis_perkara_id from perkara where nomor_perkara='".$nomor_perkara."'")->row();
          if ($this->jenis_pengadilan() == 4) {
              if ($status_pihak=='P') {
                  $tabel='perkara_pihak1';
                  if($kweris->alur_perkara_id==15) {
                      if ($kweris->jenis_perkara_id==346) {
                          $status="pemohon";
                      } else {
                          $status="penggugat";
                      }
                  } else {
                      $status="pemohon";
                  }
              } else if ($status_pihak=='T') {
                  $tabel='perkara_pihak2';
                  if($kweris->alur_perkara_id==15) {
                      if ($kweris->jenis_perkara_id == 346) {
                          $status = "termohon";
                      } else {
                          $status = "tergugat";
                      }
                  }

              } else {
                  $status="-";
              }

              //ambil pihak
              $kweri_pihak=$this->db->query("select group_concat(nama SEPARATOR ' . ') as pihak from $tabel where perkara_id=(select perkara_id from perkara where nomor_perkara='".$nomor_perkara."') group by perkara_id")->row();

              //ambil format
              $kweri=$this->db->query("select suara from $this->db_antrian.audio where id=7")->row();

              if ($kweri->suara=='' or empty($kweri->suara)) {
                  $suara="Para saksi dari $status ! ".strlower($kweri->suara)."nomor perkara ".$noperk.". silahkan masuk ke ruang sidang".$ruang;
              } else {
                  $cari=array('#status_pihak#','#pihak#','#ruang#');
                  $ganti=array($status,$kweri_pihak->pihak,$ruang);
                  $suara=str_replace($cari,$ganti,$kweri->suara);

              }
              $tgl=date('Y-m-d');
              $tgl2=date('Y-m-d H:i:s');

              $data_insert=array(
                  'tgl'=>$tgl,
                  'suara'=>$suara,
                  'waktu_panggil'=>$tgl2
              );
              $this->db->insert("$this->db_antrian.panggil_audio",$data_insert);

          } else if ($this->jenis_pengadilan() == 1) {

              $alur_gugatan = array(1, 3, 4, 5, 6, 7, 8);
              $alur_permohonan = array(2, 18);
              if ($status_pihak=='P') {
                  $tabel='perkara_pihak1';
                  if ($kweris->alur_perkara_id >= 111) {
                      $status = "Penuntut Umum";
                  } else if (in_array($kweris->alur_perkara_id, $alur_gugatan)) {
                          $status= "Penggugat ";
                  } else if (in_array($kweris->alur_perkara_id, $alur_permohonan)) {
                          $status = "Pemohon ";
                  } else {
                      $status = "Penggugat";
                  }
              } else if ($status_pihak=='T') {
                  $tabel='perkara_pihak2';
                  if ($kweris->alur_perkara_id >= 111) {
                      $status = "Terdakwa";
                  } else if (in_array($kweris->alur_perkara_id, $alur_gugatan)) {
                      $status= "Tergugat";
                  } else if (in_array($kweris->alur_perkara_id, $alur_permohonan)) {
                      $status = "Termohon";
                  } else {
                      $status = "Tergugat";
                  }

              } else {
                  $status="Tergugat";
              }



              $suara="Para saksi dari ".$status." nomor perkara ".$noperk.". silahkan masuk ke ruang sidang".$ruang;
              $tgl=date('Y-m-d');
              $tgl2=date('Y-m-d H:i:s');

              $data_insert=array(
                  'tgl'=>$tgl,
                  'suara'=>$suara,
                  'waktu_panggil'=>$tgl2
              );
              $this->db->insert("$this->db_antrian.panggil_audio",$data_insert);


          } else if ($this->jenis_pengadilan() == 3){

              $alur_gugatan = array(9, 11, 14,);
              $alur_permohonan = array(10, 12, 13);

              if ($status_pihak=='P') {
                  $tabel='perkara_pihak1';
                  if (in_array($kweris->alur_perkara_id, $alur_gugatan)) {
                      $status = "Penggugat";
                  } else if (in_array($kweris->alur_perkara_id, $alur_permohonan)) {
                      $status= "Pemohon ";
                  } else {
                      $status = "Penggugat";
                  }
              } else if ($status_pihak=='T') {
                  $tabel='perkara_pihak2';
                  if (in_array($kweris->alur_perkara_id, $alur_gugatan)) {
                      $status = "Tergugat";
                  } else if (in_array($kweris->alur_perkara_id, $alur_permohonan)) {
                      $status= "Termohon";
                  } else {
                      $status = "Tergugat";
                  }

              } else {
                  $status="Tergugat";
              }

              $suara="Para saksi dari ".$status."nomor perkara ".$noperk.". silahkan masuk ke ruang sidang".$ruang;
              $tgl=date('Y-m-d');
              $tgl2=date('Y-m-d H:i:s');

              $data_insert=array(
                  'tgl'=>$tgl,
                  'suara'=>$suara,
                  'waktu_panggil'=>$tgl2
              );
              $this->db->insert("$this->db_antrian.panggil_audio",$data_insert);

          } else {
              $suara="Para saksi dari Penggugat nomor perkara ".$noperk."silahkan masuk ke ruang sidang".$ruang;
              $tgl=date('Y-m-d');
              $tgl2=date('Y-m-d H:i:s');

              $data_insert=array(
                  'tgl'=>$tgl,
                  'suara'=>$suara,
                  'waktu_panggil'=>$tgl2
              );
              $this->db->insert("$this->db_antrian.panggil_audio",$data_insert);

          }



      }



      Public function panggil_gratifikasi($durasi) {

        $durasi='';

        //ambil format
        $kweri=$this->db->query("select suara from $this->db_antrian.audio where jenis=6")->row();
        return $kweri->suara;
  
  
      }

      public function ambil_teks_gratifikasi($id) {

       return $this->db->query("select suara from $this->db_antrian.audio where id =$id")->row()->suara;


      }


      public function setting_bin() {

       return $this->db->query("select status from $this->db_antrian.audio where id=2")->row()->status;

      }

    public function check_status() {
        //check status Panggilan
        $kweri=$this->db->query("Select status from $this->db_antrian.panggil_audio  where tgl=curdate()  order by waktu_panggil desc limit 1");
        if ($kweri->num_rows() > 0) {
            return $kweri->row()->status;
        } else {
            return 0;
        }

    }

    public function set_urutan($urutan) {
        return $this->db->query("update $this->db_antrian.audio set suara='".$urutan."' where id=13");
    }

    public function set_aktif_antrian($antrian,$hari) {
        return $this->db->query("update $this->db_antrian.setting set status=$antrian,ket=$hari where id=2");
    }

    public function set_hadir($hadir) {
        return $this->db->query("update $this->db_antrian.setting set status=$hadir where id=4");
    }

    public function set_photo($photo) {
        return $this->db->query("update $this->db_antrian.setting set status=$photo where id=5");
    }

    public function set_jenis_antrian($jenis) {
        try {
            $this->db->update("$this->db_antrian.setting",array('status'=>$jenis),'id=6');
            if($jenis==1) {
                $this->set_hadir(1);
            }
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }

    }

    public function ambil_aktif_antrian() {
        return $this->db->query("select * from $this->db_antrian.setting where id=2");
    }

    public function ambil_aktif_hadir() {
        return $this->db->query("select * from $this->db_antrian.setting where id=4");
    }

    public function ambil_aktif_photo() {
        return $this->db->query("select * from $this->db_antrian.setting where id=5");
    }

    public function ambil_aktif_jenis() {
        return $this->db->query("select * from $this->db_antrian.setting where id=6");
    }
    public function ambil_template_suara() {

       $kwerig=$this->db->query("select suara from $this->db_antrian.audio where id=14");
       if($kwerig->num_rows()>0) {
           $suara_g=str_replace('|',' ',$kwerig->row()->suara);
       } else {
           $suara_g="antrian #no_antrian# nomor perkara #nomor_perkara# #pe# #pengacaraP# melawan #te# #pengacaraT# . silahkan masuk ke  ruang sidang #ruang_sidang#";
       }
       $kwerip=$this->db->query("select suara from $this->db_antrian.audio where id=15");
        if($kwerip->num_rows()>0) {
            $suara_p=str_replace('|',' ',$kwerip->row()->suara);
        } else {
            $suara_g="antrian #no_antrian# nomor perkara #nomor_perkara# #pe# #pengacaraP#  silahkan masuk ke  ruang sidang #ruang_sidang#";
        }

        return $suara_g."|".$suara_p;

    }

    public function simpan_photo($nomor_perkara,$tgl_sidang,$file) {
       try {
           $data_insert=array(
               'id'=>NULL,
               'nomor_perkara'=>$nomor_perkara,
               'tanggal_sidang'=>$tgl_sidang,
               'photo'=>$file
           );
           $this->db->insert("$this->db_antrian.photo_antrian",$data_insert);
           return TRUE;
       } catch (Exception $e) {
           return FALSE;
       }

    }


    public function lihat_photo($nomor_perkara,$tgl_sidang) {
      return  $this->db->query("select photo from $this->db_antrian.photo_antrian where nomor_perkara='".$nomor_perkara."' and date_format(tanggal_sidang,'%d-%m-%Y')='".$tgl_sidang."'");
    }

    public function ruang_sidang() {
       $this->db->select('nama');
       $this->db->from('ruangan_sidang');
       $this->db->where('aktif','y');
       $ruang=[];
       foreach ($this->db->get()->result() as $row) {
           $ruang[]=$row->nama;
       }
       $ruangs=implode(',',$ruang);
       return $ruangs;
    }

    public function jenis_pengadilan() {
       $this->db->select('value as jp')->from('sys_config')->where('name','jenis_pengadilan');
        return $this->db->get()->row()->jp;
    }

    public function  jenis_perkara() {
      return  $this->db->select('*')->from("$this->db_antrian.jenis_perkara")->get();
    }


}