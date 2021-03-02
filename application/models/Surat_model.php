<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Penduduk_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Surat_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  // public function getDataPenduduk($id=null)
  // {
  //   $this->db->select('penduduk.idPenduduk, penduduk.nama, penduduk.NIK, penduduk.jenisKelamin, penduduk.tempatLahir, penduduk.tanggalLahir, penduduk.kewarganegaraan, penduduk.agama, penduduk.status, penduduk.pendidikan, penduduk.pekerjaan, penduduk.alamat, daftar_rt.idRT, daftar_rt.namaRT, daftar_rw.idRW, daftar_rw.namaRW');
  //   $this->db->from('penduduk');
  //   if($id != null){
  //     $this->db->where('idPenduduk', $id);
  //   }
  //   $this->db->join('daftar_rt', 'penduduk.idRT = daftar_rt.idRT');
  //   $this->db->join('daftar_rw', 'daftar_rt.idRW = daftar_rw.idRW');
  //   $query = $this->db->get();
  //   return $query;
  // }
  public function getDataSurat($id = null)
  {
    $this->db->select('surat_pengantar.idSurat, surat_pengantar.nomorSurat, penduduk.idPenduduk, penduduk.NIK, penduduk.nama,surat_pengantar.keperluan, surat_pengantar.keterangan, surat_pengantar.validasiRT, surat_pengantar.validasiRW, surat_pengantar.status, daftar_rt.idRT, daftar_rt.namaRT, daftar_rw.idRW, daftar_rw.namaRW');
    $this->db->from('surat_pengantar');
    $this->db->join('penduduk', 'surat_pengantar.idPenduduk = penduduk.idPenduduk');
    $this->db->join('daftar_rt', 'surat_pengantar.idRT = daftar_rt.idRT');
    $this->db->join('daftar_rw', 'surat_pengantar.idRW = daftar_rw.idRW');
    if ($id != null) {
      $this->db->where('idSurat', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function getDataSuratByRW($idRW)
  {
    $this->db->select('surat_pengantar.idSurat, surat_pengantar.nomorSurat, penduduk.idPenduduk, penduduk.NIK, penduduk.nama,surat_pengantar.keperluan, surat_pengantar.keterangan, surat_pengantar.validasiRT, surat_pengantar.validasiRW, surat_pengantar.status, daftar_rt.idRT, daftar_rt.namaRT, daftar_rw.idRW, daftar_rw.namaRW');
    $this->db->from('surat_pengantar');
    $this->db->join('penduduk', 'surat_pengantar.idPenduduk = penduduk.idPenduduk');
    $this->db->join('daftar_rt', 'surat_pengantar.idRT = daftar_rt.idRT');
    $this->db->join('daftar_rw', 'surat_pengantar.idRW = daftar_rw.idRW');
    $this->db->where('daftar_rw.idRW', $idRW);
    $query = $this->db->get();
    return $query;
  }

  public function getDataSuratByRTRW($idRT,$idRW)
  {
    $this->db->select('surat_pengantar.idSurat, surat_pengantar.nomorSurat, penduduk.idPenduduk, penduduk.NIK, penduduk.nama,surat_pengantar.keperluan, surat_pengantar.keterangan, surat_pengantar.validasiRT, surat_pengantar.validasiRW, surat_pengantar.status, daftar_rt.idRT, daftar_rt.namaRT, daftar_rw.idRW, daftar_rw.namaRW');
    $this->db->from('surat_pengantar');
    $this->db->join('penduduk', 'surat_pengantar.idPenduduk = penduduk.idPenduduk');
    $this->db->join('daftar_rt', 'surat_pengantar.idRT = daftar_rt.idRT');
    $this->db->join('daftar_rw', 'surat_pengantar.idRW = daftar_rw.idRW');
    $this->db->where('daftar_rw.idRW', $idRW);
    $this->db->where('daftar_rt.idRT', $idRT);
    $query = $this->db->get();
    return $query;
  }

  public function getLastSurat()
  {
    $this->db->select('nomorSurat');
    $this->db->from('surat_pengantar');
    $this->db->order_by('idSurat', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query;
  }
  public function addDataSurat($post)
  {

    $params['nomorSurat'] = html_escape($post['nomor']);
    $NIK = html_escape($post['NIK']);
    $temp = $this->Penduduk_model->getIdbyNIK($NIK);
    $params['idPenduduk'] = $temp->idPenduduk;
    $params['keperluan'] = html_escape($post['keperluan']);
    $params['keterangan'] = html_escape($post['keterangan']);
    $params['idRT'] = $temp->idRT;
    $params['idRW'] = $temp->idRW;
    $params['validasiRT'] = 'Belum Validasi';
    $params['validasiRW'] = 'Belum Validasi';
    $params['status'] = 'Proses';

    $this->db->insert('surat_pengantar', $params);
  }

  public function editDataPenduduk($post)
  {

    $params['nama'] = html_escape($post['nama']);
    $params['NIK'] = html_escape($post['NIK']);
    $params['jenisKelamin'] = html_escape($post['jenisKelamin']);
    $params['tempatLahir'] = html_escape($post['tempatLahir']);
    $temp = html_escape($post['tanggalLahir']);
    $tgl = date('Y-m-d', strtotime($temp));
    $params['tanggalLahir'] = $tgl;
    $params['kewarganegaraan'] = html_escape($post['kewarganegaraan']);
    $params['agama'] = html_escape($post['agama']);
    $params['status'] = html_escape($post['status']);
    $params['pendidikan'] = html_escape($post['pendidikan']);
    $params['pekerjaan'] = html_escape($post['pekerjaan']);
    $params['alamat'] = html_escape($post['alamat']);
    if ($post['namaRW'] != null) {
      $params['idRW'] = html_escape($post['namaRW']);
    }
    if ($post['namaRT'] != null) {
      $params['idRT'] = html_escape($post['namaRT']);
    }

    $this->db->where('idPenduduk', $post['idPenduduk']);
    $this->db->update('penduduk', $params);
  }

  public function deleteDataSurat($id)
  {
    $this->db->where('idSurat', $id);
    $this->db->delete('surat_pengantar');
  }

  public function validateRT($id)
  {
    $params['validasiRT'] = 'Sudah Validasi';
    $this->db->where('idSurat', $id);
    $this->db->update('surat_pengantar', $params);
  }

  public function unvalidateRT($id)
  {
    $params['validasiRT'] = 'Belum Validasi';
    $params['validasiRW'] = 'Belum Validasi';
    $this->db->where('idSurat', $id);
    $this->db->update('surat_pengantar', $params);
  }

  public function validateRW($id)
  {
    $params['validasiRW'] = 'Sudah Validasi';
    $this->db->where('idSurat', $id);
    $this->db->update('surat_pengantar', $params);
  }

  public function unvalidateRW($id)
  {
    $params['validasiRW'] = 'Belum Validasi';
    $this->db->where('idSurat', $id);
    $this->db->update('surat_pengantar', $params);
  }

  public function checkSurat($nomor)
  {

    $this->db->select('validasiRT, validasiRW, status');
    $this->db->from('surat_pengantar');
    $this->db->where('nomorSurat', $nomor);
    $query = $this->db->get();
    // return $query->row();
    if ($query->num_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function getDetailSurat($id)
  {
    $this->db->select('*');
    $this->db->from('surat_pengantar as sp');
    $this->db->join('penduduk as p', 'sp.idPenduduk = p.idPenduduk');
    $this->db->where('idSurat', $id);
    $query = $this->db->get();
    return $query;
  }

  public function getDetailSuratByNomor($nomor)
  {
    $this->db->select('*');
    $this->db->from('surat_pengantar as sp');
    $this->db->join('penduduk as p', 'sp.idPenduduk = p.idPenduduk');
    $this->db->where('nomorSurat', $nomor);
    $query = $this->db->get();
    return $query;
  }

  public function checkStatus($nomor)
  {
    $this->db->select('validasiRT, validasiRW, status');
    $this->db->from('surat_pengantar');
    $this->db->where('nomorSurat', $nomor);
    $query = $this->db->get();
    return $query->row();
  }
}

/* End of file RT_model.php */
/* Location: ./application/models/RT_model.php */