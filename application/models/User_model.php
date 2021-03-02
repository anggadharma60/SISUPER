<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model User_model
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

class User_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------
  
  public function getLogin($post)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username', $post['username']);
    $this->db->where('password', md5($post['password']));
    $query = $this->db->get();
    return $query;
  }

  public function getDataUser($id = null)
  {
    $this->db->from('user');
    if($id != null){
      $this->db->where('idUser', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function getDaftarRW(){
    $this->db->select('*');
    $sql = "SELECT * FROM user WHERE NOT EXISTS (SELECT * FROM daftar_rw WHERE user.idUser = daftar_rw.idUser) AND level=2";
    $query = $this->db->query($sql);
    return $query;
  }

  public function getDaftarRT(){
    $this->db->select('*');
    $sql = "SELECT * FROM user WHERE NOT EXISTS (SELECT * FROM daftar_rt WHERE user.idUser = daftar_rt.idUser) AND level=3";
    $query = $this->db->query($sql);
    return $query;
  }

  public function addDataUser($post)
  {
    $nama =html_escape($post['nama']);
    $temp = str_word_count($nama,1);
    $indeks = str_word_count($nama);
    $new = '';
    for ($i=0; $i <$indeks ; $i++) { 
      $new.= ' ' .ucfirst($temp[$i]);
    } 
  
    // print_r($new);
    $params['nama'] = $new;
    $params['username'] = html_escape($post['username']);
    $params['password'] = md5(html_escape($post['password']));
    $params['level'] = html_escape($post['level']);
    $this->db->insert('user', $params);
  }

  public function editDataUser($post)
  {
    $nama =html_escape($post['nama']);
    $temp = str_word_count($nama,1);
    $indeks = str_word_count($nama);
    $new = '';
    for ($i=0; $i <$indeks ; $i++) { 
      $new.= ' ' .ucfirst($temp[$i]);
    } 
    
    $params['nama'] = $new;
    $params['username'] = html_escape($post['username']);
    if (!empty($post['password'])) {
      $params['password'] = md5(html_escape($post['password']));
    }
    $params['level'] = html_escape($post['level']);
    $this->db->where('idUser', $post['idUser']);
    $this->db->update('user', $params);
  }  

  public function deleteDataUser($id)
  {
    $rt = $this->db->get_where('daftar_rt', array('idUser' => $id))->result();
    $rw = $this->db->get_where('daftar_rw', array('idUser' => $id))->result();
    if($rt != null || $rw != null){
      $this->session->set_flashdata('info', 'Data gagal dihapus karena terkait dengan data lain');
    }else{
      $this->db->where('idUser', $id);
      $this->db->delete('user');
      $this->session->set_flashdata('info', 'Data berhasil dihapus');
    }
   
  }


}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */