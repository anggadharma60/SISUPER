<?php

Class Fungsi {
    
    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }

    function user_login() {
        $this->ci->load->model('User_model');
        $idUser = $this->ci->session->userdata('idUser');
        $user_data = $this->ci->User_model->getDataUser($idUser)->row();
        return $user_data;
    }
    
}
?>