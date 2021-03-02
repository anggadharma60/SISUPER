<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model RW_model
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

class RW_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  public function getDataRW($id = null)
  {
    $this->db->select('daftar_rw.idRW, daftar_rw.namaRW, daftar_rw.ttdRW, daftar_rw.capRW, user.idUser, user.nama, daftar_rw.keteranganRW ');
    $this->db->from('daftar_rw');
    if($id != null){
      $this->db->where('idRW', $id);
    }
    $this->db->join('user', 'daftar_rw.idUser = user.idUser');
    $query = $this->db->get();
    return $query;
  }
  
  public function getDaftarRW(){
    $this->db->select('idRW, namaRW');
    $this->db->from('daftar_rw');
    $query = $this->db->get();
    return $query;
  }

  public function getDaftarRWDist($id)
  {
    $this->db->select('idRW, namaRW');
    $this->db->from('daftar_rw');
    $this->db->where('idRW!=', $id);
    $query = $this->db->get();
    return $query;
  }

  public function addDataRW($post)
  {
    $params['namaRW'] = html_escape($post['nama']);
    $params['idUser'] = html_escape($post['ketuarw']);
    $params['ttdRW'] = html_escape($post['ttdRW']);
    $params['capRW'] = html_escape($post['capRW']);
    // $params['capRW'] = null;
    $params['keteranganRW'] = html_escape($post['keterangan']);
    $this->db->insert('daftar_rw', $params);
  }

  public function editDataRW($post)
  {
    // $params['namaRW'] = html_escape($post['nama']);
    // $params['idUser'] = html_escape($post['ketuarw']);
    if (!empty($post['ttdRW'])) {
      $params['ttdRW'] = html_escape($post['ttdRW']);
      $this->session->set_flashdata('info', 'Data berhasil disimpan');
    }
    if (!empty($post['capRW'])) {
      $params['capRW'] = html_escape($post['capRW']);
      $this->session->set_flashdata('info', 'Data berhasil disimpan');
    }
    // $params['capRW'] = html_escape($post['capRW']);
    // $params['capRW'] = null;
    $params['keteranganRW'] = html_escape($post['keterangan']);
    $this->db->where('idRW', $post['idRW']);
    $this->db->update('daftar_rw', $params);
  }

  public function deleteDataRW($id)
  {
    $rt = $this->db->get_where('daftar_rt', array('idRW' => $id))->result();
    $penduduk = $this->db->get_where('penduduk', array('idRW' => $id))->result();
    $surat = $this->db->get_where('surat_pengantar', array('idRW' => $id))->result();
    if($rt != null || $penduduk != null || $surat != null){
      $this->session->set_flashdata('info', 'Data gagal dihapus karena terkait dengan data lain');
    }else{
      $this->db->where('idRW', $id);
      $this->db->delete('daftar_rw');
      $this->session->set_flashdata('info', 'Data berhasil dihapus');
    }
   
  }

  public function getDetailRW($id)
  {
    $this->db->select('rw.idRW, rw.namaRW, rw.ttdRW, rw.capRW, u.idUser, u.nama');
    $this->db->from('daftar_rw as rw');
    $this->db->join('user as u', 'rw.idUser = u.idUser');
    $this->db->where('rw.IdRW', $id);
    $query = $this->db->get();
    return $query;
  }

  public function getIdRWByUser($idUser)
  {
    $this->db->select('rw.idRW');
    $this->db->from('daftar_rw as rw');
    $this->db->where('idUser', $idUser);
    $query = $this->db->get();
    return $query->row();
  }

}

/* End of file RW_model.php */
/* Location: ./application/models/RW_model.php */