<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model RT_model
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

class RT_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getDataRT($id = null)
  {
    $this->db->select('daftar_rt.idRT, daftar_rt.namaRT, daftar_rt.ttdRT, daftar_rt.capRT, user.idUser, user.nama, daftar_rt.keteranganRT, daftar_rw.idRW, daftar_rw.namaRW ');
    $this->db->from('daftar_rt');
    if($id != null){
      $this->db->where('idRT', $id);
    }
    $this->db->join('user', 'daftar_rt.idUser = user.idUser');
    $this->db->join('daftar_rw', 'daftar_rt.idRW = daftar_rw.idRW');
    $query = $this->db->get();
    return $query;
  }

  public function getIdRTByUser($idUser)
  {
    $this->db->select('rt.idRT, rt.idRW');
    $this->db->from('daftar_rt as rt');
    $this->db->where('idUser', $idUser);
    $query = $this->db->get();
    return $query->row();
  }

  public function getRTByRW($idRW){
    $this->db->select('idRT, namaRT');
    $this->db->from('daftar_rt');
    $this->db->where('idRW', $idRW);
    $this->db->order_by('namaRT', 'ASC');
    $query = $this->db->get();
    return $query;
  }

  public function getRTDistByRW($idRW, $idRT){
    $this->db->select('idRT, namaRT');
    $this->db->from('daftar_rt');
    $this->db->where('idRW', $idRW);
    $this->db->where('idRT', $idRT);
    $this->db->order_by('namaRT', 'ASC');
    $query = $this->db->get();
    return $query;
  }
  
  public function addDataRT($post)
  {
    $params['namaRT'] = html_escape($post['nama']);
    $params['idRW'] = html_escape($post['namaRW']);
    $params['idUser'] = html_escape($post['ketuart']);

    $params['ttdRT'] = html_escape($post['ttdRT']);
    $params['capRT'] = html_escape($post['capRT']);
    // $params['capRW'] = null;
    $params['keteranganRT'] = html_escape($post['keterangan']);
    $this->db->insert('daftar_rt', $params);
  }

  public function editDataRT($post)
  {
    // $params['namaRW'] = html_escape($post['nama']);
    // $params['idUser'] = html_escape($post['ketuarw']);
    if (!empty($post['ttdRT'])) {
      $params['ttdRT'] = html_escape($post['ttdRT']);
      $this->session->set_flashdata('info', 'Data berhasil disimpan');
    }
    if (!empty($post['capRT'])) {
      $params['capRT'] = html_escape($post['capRT']);
      $this->session->set_flashdata('info', 'Data berhasil disimpan');
    }
    // $params['capRW'] = html_escape($post['capRW']);
    // $params['capRW'] = null;
    $params['keteranganRT'] = html_escape($post['keterangan']);
    $this->db->where('idRT', $post['idRT']);
    $this->db->update('daftar_rt', $params);
  }

  public function deleteDataRT($id)
  {
    
    $penduduk = $this->db->get_where('penduduk', array('idRT' => $id))->result();
    $surat = $this->db->get_where('surat_pengantar', array('idRT' => $id))->result();
    if($penduduk != null || $surat != null){
      $this->session->set_flashdata('info', 'Data gagal dihapus karena terkait dengan data lain');
    }else{
      $this->db->where('idRT', $id);
      $this->db->delete('daftar_rt');
      $this->session->set_flashdata('info', 'Data berhasil dihapus');
    }
   
  }


  public function getDetailRT($id)
  {
    $this->db->select('rt.idRT, rt.namaRT, rt.ttdRT, rt.capRT, u.idUser, u.nama');
    $this->db->from('daftar_rt as rt');
    $this->db->join('user as u', 'rt.idUser = u.idUser');
    $this->db->where('rt.IdRT', $id);
    $query = $this->db->get();
    return $query;
  }

}

/* End of file RT_model.php */
/* Location: ./application/models/RT_model.php */