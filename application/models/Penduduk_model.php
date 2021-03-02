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

class Penduduk_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getDataPenduduk($id = null)
  {
    $this->db->select('penduduk.idPenduduk, penduduk.nama, penduduk.NIK, penduduk.jenisKelamin, penduduk.tempatLahir, penduduk.tanggalLahir, penduduk.kewarganegaraan, penduduk.agama, penduduk.status, penduduk.pendidikan, penduduk.pekerjaan, penduduk.alamat, daftar_rt.idRT, daftar_rt.namaRT, daftar_rw.idRW, daftar_rw.namaRW');
    $this->db->from('penduduk');
    if ($id != null) {
      $this->db->where('idPenduduk', $id);
    }
    $this->db->join('daftar_rt', 'penduduk.idRT = daftar_rt.idRT');
    $this->db->join('daftar_rw', 'daftar_rt.idRW = daftar_rw.idRW');
    $query = $this->db->get();
    return $query;
  }

  public function getAllNIK()
  {
    $this->db->select('idPenduduk, NIK');
    $this->db->from('penduduk');
    $query = $this->db->get();
    return $query;
  }

  public function checkNIK($NIK)
  {
    $this->db->select('NIK');
    $this->db->from('penduduk');
    $this->db->where('NIK', $NIK);
    $query = $this->db->get();
    if($query->num_rows()>0){
      return TRUE;
    }else{
      return FALSE;
    }
    
  }


  public function getIdbyNIK($NIK){
    $this->db->select('idPenduduk, idRT, idRW');
    $this->db->from('penduduk');
    $this->db->where('NIK=', $NIK);
    $query = $this->db->get();
    return $query->row();
  }

  public function addDataPenduduk($post)
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
    $params['idRW'] = html_escape($post['namaRW']);
    $params['idRT'] = html_escape($post['namaRT']);
    $this->db->insert('penduduk', $params);
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

 

  public function deleteDataPenduduk($id)
  {
    
   
    $surat = $this->db->get_where('surat_pengantar', array('idPenduduk' => $id))->result();
    if($surat != null){
      $this->session->set_flashdata('info', 'Data gagal dihapus karena terkait dengan data lain');
    }else{
      $this->db->where('idPenduduk', $id);
      $this->db->delete('penduduk');
      $this->session->set_flashdata('info', 'Data berhasil dihapus');
    }
   
  }
}

/* End of file RT_model.php */
/* Location: ./application/models/RT_model.php */