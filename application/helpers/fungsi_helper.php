<?php

function check_already_login() {
    $ci =& get_instance();
    $user_session = $ci->session->userdata('idUser');
    if($user_session) {
        if($ci->fungsi->user_login()->level == 1) {
            redirect('Admin');
        }
        if($ci->fungsi->user_login()->level == 2) {
            redirect('KetuaRW');
        }
        if($ci->fungsi->user_login()->level == 3) {
            redirect('KetuaRT');
        }
        
    }
}

function check_not_login() {
    $ci =& get_instance();
    $user_session = $ci->session->userdata('idUser');
    if(!$user_session) {
        redirect('Autentikasi');
    }
}

function check_admin() {
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->level != 1) {
        redirect('Autentikasi/logout');
    }
}

function check_ketuarw() {
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->level != 2) {
        redirect('Autentikasi/logout');
    }
}

function check_ketuart() {
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->level != 3) {
        redirect('Autentikasi/logout');
    }


}
?>
