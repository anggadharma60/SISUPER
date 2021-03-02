<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Auntentikasi
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Autentikasi extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    check_already_login();
    $this->load->view('login');
  }

  public function login(){
    $post=$this->input->post(null,TRUE);
  
    if(isset($post['btnlogin'])){
      $this->load->model('User_model');
      $query = $this->User_model->getLogin($post);
      if($query->num_rows() > 0){
        $row = $query->row();
        $params = array(
          'idUser' => $row->idUser,
          'level' => $row->level
        );
        //set session userdata
        $this->session->set_userdata($params); 

        if ($params['level'] == 1) {
          redirect('Admin');
        } else if ($params['level'] == 2) {
          redirect('KetuaRW');
        } else if ($params['level'] == 3) {
          redirect('KetuaRT');
        }
       
      }else{
        die(
          "<script>
  				alert('Login Gagal, username / password salah');
  				window.location='".site_url('Autentikasi')."';
        </script>"
        ) ;

      }
    }else{
      print_r("Kosong");
    }
  }

  public function logout()
  {
    $params = array('idUser', 'level');
    $this->session->unset_userdata($params);
    redirect('Autentikasi');
  }

}


/* End of file Auntentikasi.php */
/* Location: ./application/controllers/Auntentikasi.php */