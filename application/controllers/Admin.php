<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
require_once 'vendor/dompdf/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

/**
 *
 * Controller Admin
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

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    check_admin();

    $this->load->model('User_model');
    $this->load->model('RW_model');
    $this->load->model('RT_model');
    $this->load->model('Penduduk_model');
    $this->load->model('Surat_model');
  }

  public function index()
  {
    $this->template->load('template', 'dashboard');
  }

  public function getUser()
  {
    $data['user'] = $this->User_model->getDataUser();
    $this->template->load('template', 'user/user_data', $data);
  }

  public function addUser()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required|regex_match[/^[a-zA-Z ]+$/]|max_length[50]|trim');
    $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|is_unique[user.username]|min_length[5]|max_length[20]|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|alpha_numeric|min_length[5]|max_length[16]|trim');
    $this->form_validation->set_rules(
      'passconf',
      'Konfirmasi Password',
      'required|matches[password]|alpha_numeric|min_length[5]|max_length[16]|trim',
      array('matches' => '%s tidak sesuai dengan password')
    );
    $this->form_validation->set_rules('level', 'Level', 'required|trim');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
    $this->form_validation->set_message('min_length', '%s minimal %s karakter');
    $this->form_validation->set_message('max_length', '%s maksimal %s karakter');
    $this->form_validation->set_message('regex_match', '{field} berisi karakter');
    $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
    $this->form_validation->set_message('alpha_numeric_spaces', '{field} berisi karakter');
    $this->form_validation->set_message('alpha_numeric', '{field} berisi karakter dan numerik');

    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template', 'user/user_data_add');
    } else {
      $post = $this->input->post(null, TRUE);
      $this->User_model->addDataUser($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('info', 'Data berhasil ditambahkan');
      }
      redirect('Admin/getUser');
    }
  }

  public function editUser($id)
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required|regex_match[/^[a-zA-Z ]+$/]|min_length[0]|max_length[50]|trim');
    $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|callback_username_check|min_length[5]|max_length[20]|trim');
    if ($this->input->post('password')) {
      $this->form_validation->set_rules('password', 'Password', 'alpha_numeric|min_length[5]|max_length[16]|trim');
      $this->form_validation->set_rules(
        'passconf',
        'Konfirmasi Password',
        'matches[password]|alpha_numeric|min_length[5]|max_length[16]|trim',
        array('matches' => '%s tidak sesuai dengan password')
      );
    }
    if ($this->input->post('passconf')) {
      $this->form_validation->set_rules(
        'passconf',
        'Konfirmasi Password',
        'matches[password]|alpha_numeric|min_length[5]|max_length[16]|trim',
        array('matches' => '%s tidak sesuai dengan password')
      );
    }
    $this->form_validation->set_rules('level', 'Level', 'required');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
    $this->form_validation->set_message('min_length', '%s minimal %s karakter');
    $this->form_validation->set_message('max_length', '%s maksimal %s karakter');
    $this->form_validation->set_message('regex_match', '{field} berisi karakter');
    $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
    $this->form_validation->set_message('alpha_numeric_spaces', '{field} berisi karakter');
    $this->form_validation->set_message('alpha_numeric', '{field} berisi karakter dan numerik');

    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {
      $query = $this->User_model->getDataUser($id);
      if ($query->num_rows() > 0) {
        $data['row'] = $query->row();
        $this->template->load('template', 'user/user_data_edit', $data);
      } else {
        $this->session->set_flashdata('info', 'Data tidak ditemukan');
        redirect('Admin/getUser');
      }
    } else {
      $post = $this->input->post(null, TRUE);
      $this->User_model->editDataUser($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('info', 'Data berhasil disimpan');
      }
      redirect('Admin/getUser');
    }
  }

  public function deleteUser()
  {
    $id = $this->input->post('idUser');
    $this->User_model->deleteDataUser($id);
    redirect('Admin/getUser');
  }

  function username_check()
  {
    $post = $this->input->post(null, TRUE);
    $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND idUser != '$post[idUser]'");
    if ($query->num_rows() > 0) {
      $this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silahkan ganti');
      return FALSE;
    } else {
      return TRUE;
    }
  }

  function getRW()
  {
    $data['rw'] = $this->RW_model->getDataRW();
    $this->template->load('template', 'rw/rw_data', $data);
  }

  public function addRW()
  {
    $data['ketuarw'] = $this->User_model->getDaftarRW();
    $this->form_validation->set_rules('nama', 'Nama RT', 'required|regex_match[/^[0-9]+$/]|max_length[3]|is_unique[daftar_rw.namaRW]|trim');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|max_length[50]');
    $this->form_validation->set_rules('ketuarw', 'Nama Ketua RW', 'required');
    $this->form_validation->set_rules('ttdRW', 'Tanda Tangan RW', 'callback_checkFileValidation');
    $this->form_validation->set_rules('capRW', 'Cap RW', 'callback_checkFileValidation');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
    $this->form_validation->set_message('min_length', '%s minimal %s karakter');
    $this->form_validation->set_message('max_length', '%s maksimal %s karakter');
    $this->form_validation->set_message('regex_match', '{field} berisi karakter');
    $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
    $this->form_validation->set_message('alpha_numeric_spaces', '{field} berisi karakter');
    $this->form_validation->set_message('alpha_numeric', '{field} berisi karakter dan numerik');

    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template', 'rw/rw_data_add', $data);
    } else {
      $post = $this->input->post(null, TRUE);
      $post['ttdRW'] = $this->uploadttdRW('ttd-RW', $post['nama']);
      $post['capRW'] = $this->uploadcapRW('cap-RW', $post['nama']);
      // print_r($_FILES['ttdRW']['name']);
      // print_r($_FILES['capRW']['name']);

      $this->RW_model->addDataRW($post);
      // print_r($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('info', 'Data berhasil ditambahkan');
      }
      redirect('Admin/getRW');
    }
  }

  public function editRW($id)
  {

    $this->form_validation->set_rules('nama', 'Nama RW', '');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|max_length[50]');
    $this->form_validation->set_rules('ketuarw', 'Nama Ketua RW', '');
    $this->form_validation->set_rules('ttdRW', 'Tanda Tangan RW', '');
    $this->form_validation->set_rules('capRW', 'Cap RW', '');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
    $this->form_validation->set_message('min_length', '%s minimal %s karakter');
    $this->form_validation->set_message('max_length', '%s maksimal %s karakter');
    $this->form_validation->set_message('regex_match', '{field} berisi karakter');
    $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
    $this->form_validation->set_message('alpha_numeric_spaces', '{field} berisi karakter');
    $this->form_validation->set_message('alpha_numeric', '{field} berisi karakter dan numerik');

    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {
      $query = $this->RW_model->getDataRW($id);
      if ($query->num_rows() > 0) {
        $data['ketuarw'] = $query->row();
        $query2 = $this->User_model->getDaftarRW();
        if ($query2->num_rows() > 0) {
          $data['rw'] = $query2;
        } else {
          $data['rw'] = null;
        }
        $this->template->load('template', 'rw/rw_data_edit', $data);
      } else {
        $this->session->set_flashdata('info', 'Data tidak ditemukan');
        redirect('Admin/getRW');
      }
    } else {
      $post = $this->input->post(null, TRUE);
      $post['ttdRW'] = $this->uploadttdRW('ttd-RW', $post['nama']);
      $post['capRW'] = $this->uploadcapRW('cap-RW', $post['nama']);
      // print_r($post);
      $this->RW_model->editDataRW($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('info', 'Data berhasil disimpan');
      }

      redirect('Admin/getRW');
    }
  }

  public function deleteRW()
  {
    $id = $this->input->post('idRW');
    $this->RW_model->deleteDataRW($id);
    redirect('Admin/getRW');
  }

  function getRT()
  {
    $data['rt'] = $this->RT_model->getDataRT();
    $this->template->load('template', 'rt/rt_data', $data);
  }

  public function addRT()
  {
    $data['ketuart'] = $this->User_model->getDaftarRT();
    $data['daftarrw'] = $this->RW_model->getDaftarRW();

    $this->form_validation->set_rules('nama', 'Nama RT', 'required|regex_match[/^[0-9]+$/]|max_length[3]|trim');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|max_length[50]');
    $this->form_validation->set_rules('ketuart', 'Nama Ketua RT', 'required');
    $this->form_validation->set_rules('namaRW', 'Nama RW', 'required');
    $this->form_validation->set_rules('ttdRT', 'Tanda Tangan RW', 'callback_checkFileValidationv2');
    $this->form_validation->set_rules('capRT', 'Cap RW', 'callback_checkFileValidationv2');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
    $this->form_validation->set_message('min_length', '%s minimal %s karakter');
    $this->form_validation->set_message('max_length', '%s maksimal %s karakter');
    $this->form_validation->set_message('regex_match', '{field} berisi karakter');
    $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
    $this->form_validation->set_message('alpha_numeric_spaces', '{field} berisi karakter');
    $this->form_validation->set_message('alpha_numeric', '{field} berisi karakter dan numerik');

    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template', 'rt/rt_data_add', $data);
    } else {
      $post = $this->input->post(null, TRUE);
      $post['ttdRT'] = $this->uploadttdRT('ttd-RT', $post['nama']);
      $post['capRT'] = $this->uploadcapRT('cap-RT', $post['nama']);
      // print_r($_FILES['ttdRW']['name']);
      // print_r($_FILES['capRW']['name']);

      $this->RT_model->addDataRT($post);
      // print_r($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('info', 'Data berhasil ditambahkan');
      }
      redirect('Admin/getRT');
    }
  }

  public function editRT($id)
  {

    $this->form_validation->set_rules('nama', 'Nama', '');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|max_length[50]');
    $this->form_validation->set_rules('ketuarw', 'Ketua RW', '');
    $this->form_validation->set_rules('ttdRT', 'Tanda Tangan RT', '');
    $this->form_validation->set_rules('capRT', 'Cap RT', '');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
    $this->form_validation->set_message('min_length', '%s minimal %s karakter');
    $this->form_validation->set_message('max_length', '%s maksimal %s karakter');
    $this->form_validation->set_message('regex_match', '{field} berisi karakter');
    $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
    $this->form_validation->set_message('alpha_numeric_spaces', '{field} berisi karakter');
    $this->form_validation->set_message('alpha_numeric', '{field} berisi karakter dan numerik');

    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {
      $query = $this->RT_model->getDataRT($id);
      if ($query->num_rows() > 0) {
        $data['ketuart'] = $query->row();
        $query2 = $this->RW_model->getDaftarRW();
        if ($query2->num_rows() > 0) {
          $data['rw'] = $query2;
        } else {
          $data['rw'] = null;
        }
        $this->template->load('template', 'rt/rt_data_edit', $data);
      } else {
        $this->session->set_flashdata('info', 'Data tidak ditemukan');
        redirect('Admin/getRT');
      }
    } else {
      $post = $this->input->post(null, TRUE);
      $post['ttdRT'] = $this->uploadttdRT('ttd-RT', $post['nama']);
      $post['capRT'] = $this->uploadcapRT('cap-RT', $post['nama']);
      // print_r($post);
      $this->RT_model->editDataRT($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('info', 'Data berhasil disimpan');
      }

      redirect('Admin/getRT');
    }
  }

  public function deleteRT()
  {
    $id = $this->input->post('idRT');
    $this->RT_model->deleteDataRT($id);
    redirect('Admin/getRT');
  }

  function getRTByRW($idRW)
  {
    $RT = $this->RT_model->getRTByRW($idRW)->result();
    header('Content-Type: application/json');
    echo json_encode($RT);
  }

  function getPenduduk()
  {
    $data['penduduk'] = $this->Penduduk_model->getDataPenduduk();
    $this->template->load('template', 'penduduk/penduduk_data', $data);
  }

  public function addPenduduk()
  {
    $data['daftarrw'] = $this->RW_model->getDaftarRW();
    $this->form_validation->set_rules('nama', 'Nama', 'required|regex_match[/^[a-zA-Z ]+$/]|max_length[50]|trim');
    $this->form_validation->set_rules('NIK', 'NIK', 'required|regex_match[/^[0-9]+$/]|min_length[16]|max_length[16]|is_unique[penduduk.NIK]|trim');
    $this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('tempatLahir', 'Tempat Lahir', 'required|regex_match[/^[a-zA-Z ]+$/]|max_length[25]|trim');
    $this->form_validation->set_rules('tanggalLahir', 'Tanggal Lahir', 'required|trim');
    $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required|trim');
    $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
    $this->form_validation->set_rules('status', 'Status', 'required|trim');
    $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');
    $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[75]|trim');
    $this->form_validation->set_rules('namaRW', 'Nama RW', 'required|trim');
    $this->form_validation->set_rules('namaRT', 'Nama RT', 'required|trim');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
    $this->form_validation->set_message('min_length', '%s minimal %s karakter');
    $this->form_validation->set_message('max_length', '%s maksimal %s karakter');
    $this->form_validation->set_message('regex_match', '{field} berisi karakter');
    $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
    $this->form_validation->set_message('alpha_numeric_spaces', '{field} berisi karakter');
    $this->form_validation->set_message('alpha_numeric', '{field} berisi karakter dan numerik');

    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template', 'penduduk/penduduk_data_add', $data);
    } else {
      $post = $this->input->post(null, TRUE);
      $this->Penduduk_model->addDataPenduduk($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('info', 'Data berhasil ditambahkan');
      }
      redirect('Admin/getPenduduk');
    }
  }

  public function editPenduduk($id)
  {
    $data['daftarrw'] = $this->RW_model->getDaftarRW();
    $this->form_validation->set_rules('nama', 'Nama', 'required|regex_match[/^[a-zA-Z ]+$/]|max_length[50]|trim');
    $this->form_validation->set_rules('NIK', 'NIK', 'required|regex_match[/^[0-9]+$/]|min_length[16]|max_length[16]|callback_nik_check|trim');
    $this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('tempatLahir', 'Tempat Lahir', 'required|regex_match[/^[a-zA-Z ]+$/]|max_length[25]|trim');
    $this->form_validation->set_rules('tanggalLahir', 'Tanggal Lahir', 'required|trim');
    $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required|trim');
    $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
    $this->form_validation->set_rules('status', 'Status', 'required|trim');
    $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');
    $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[75]|trim');
    $this->form_validation->set_rules('namaRW', 'Nama RW', 'trim');
    $this->form_validation->set_rules('namaRT', 'Nama RT', 'trim');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
    $this->form_validation->set_message('min_length', '%s minimal %s karakter');
    $this->form_validation->set_message('max_length', '%s maksimal %s karakter');
    $this->form_validation->set_message('regex_match', '{field} berisi karakter');
    $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
    $this->form_validation->set_message('alpha_numeric_spaces', '{field} berisi karakter');
    $this->form_validation->set_message('alpha_numeric', '{field} berisi karakter dan numerik');

    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {
      $query = $this->Penduduk_model->getDataPenduduk($id);
      if ($query->num_rows() > 0) {
        $data['penduduk'] = $query->row();
        // $data['rw'] = $this->RW_model->getDaftarRWDist($data['penduduk']->idRW);

        $this->template->load('template', 'penduduk/penduduk_data_edit', $data);
      } else {
        $this->session->set_flashdata('info', 'Data tidak ditemukan');
        redirect('Admin/getPenduduk');
      }
    } else {
      $post = $this->input->post(null, TRUE);
      $this->Penduduk_model->editDataPenduduk($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('info', 'Data berhasil disimpan');
      }
      redirect('Admin/getPenduduk');
    }
  }

  public function deletePenduduk()
  {
    $id = $this->input->post('idPenduduk');
    $this->Penduduk_model->deleteDataPenduduk($id);
    redirect('Admin/getPenduduk');
  }

  public function getSurat()
  {

    $data['surat'] = $this->Surat_model->getDataSurat();
    $this->template->load('template', 'surat/surat_data', $data);
  }

  public function addSurat()
  {
    $nomor = $this->Surat_model->getLastSurat()->row();
    if ($nomor != null) {
      $test = [];
      $test = explode("/", $nomor->nomorSurat);
      $no = $test[0] + 1;
    } else {
      $no = 1;
    }

    $bulan = date('m');
    $tahun = date('Y');
    $data['nomorSurat'] = $no . "/" . $bulan . "/" . $tahun;
    $data['NIK'] = $this->Penduduk_model->getAllNIK();


    $data['daftarrw'] = $this->RW_model->getDaftarRW();
    $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
    $this->form_validation->set_rules('NIK', 'NIK', 'required|regex_match[/^[0-9]+$/]|min_length[16]|max_length[16]|callback_nik_test|trim');

    $this->form_validation->set_rules('keperluan', 'Keperluan', 'required|max_length[255]|trim');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|max_length[255]|trim');


    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
    $this->form_validation->set_message('min_length', '%s minimal %s karakter');
    $this->form_validation->set_message('max_length', '%s maksimal %s karakter');
    $this->form_validation->set_message('regex_match', '{field} berisi karakter');
    $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
    $this->form_validation->set_message('alpha_numeric_spaces', '{field} berisi karakter');
    $this->form_validation->set_message('alpha_numeric', '{field} berisi karakter dan numerik');

    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('template', 'surat/surat_data_add', $data);
    } else {
      $post = $this->input->post(null, TRUE);
      $this->Surat_model->addDataSurat($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('info', 'Data berhasil ditambahkan');
      }
      redirect('Admin/getSurat');
    }
  }



  public function editSurat($id)
  {
    $data['daftarrw'] = $this->RW_model->getDaftarRW();
    $this->form_validation->set_rules('nama', 'Nama', 'required|regex_match[/^[a-zA-Z ]+$/]|max_length[50]|trim');
    $this->form_validation->set_rules('NIK', 'NIK', 'required|regex_match[/^[0-9]+$/]|min_length[16]|max_length[16]|callback_nik_check|trim');
    $this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('tempatLahir', 'Tempat Lahir', 'required|regex_match[/^[a-zA-Z ]+$/]|max_length[25]|trim');
    $this->form_validation->set_rules('tanggalLahir', 'Tanggal Lahir', 'required|trim');
    $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required|trim');
    $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
    $this->form_validation->set_rules('status', 'Status', 'required|trim');
    $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');
    $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[75]|trim');
    $this->form_validation->set_rules('namaRW', 'Nama RW', 'trim');
    $this->form_validation->set_rules('namaRT', 'Nama RT', 'trim');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
    $this->form_validation->set_message('min_length', '%s minimal %s karakter');
    $this->form_validation->set_message('max_length', '%s maksimal %s karakter');
    $this->form_validation->set_message('regex_match', '{field} berisi karakter');
    $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
    $this->form_validation->set_message('alpha_numeric_spaces', '{field} berisi karakter');
    $this->form_validation->set_message('alpha_numeric', '{field} berisi karakter dan numerik');

    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {
      $query = $this->Penduduk_model->getDataPenduduk($id);
      if ($query->num_rows() > 0) {
        $data['penduduk'] = $query->row();
        // $data['rw'] = $this->RW_model->getDaftarRWDist($data['penduduk']->idRW);

        $this->template->load('template', 'penduduk/penduduk_data_edit', $data);
      } else {
        $this->session->set_flashdata('info', 'Data tidak ditemukan');
        redirect('Admin/getPenduduk');
      }
    } else {
      $post = $this->input->post(null, TRUE);
      $this->Penduduk_model->editDataPenduduk($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('info', 'Data berhasil disimpan');
      }
      redirect('Admin/getPenduduk');
    }
  }

  public function deleteSurat()
  {
    $id = $this->input->post('idSurat');
    $this->Surat_model->deleteDataSurat($id);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('info', 'Data berhasil dihapus');
    }
    redirect('Admin/getSurat');
  }

  public function tanggal_indo($tanggal)
  {
    $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
  }

  public function cetakPDF($id)
  {
    $data['detail'] = $this->Surat_model->getDetailSurat($id)->row();
    $data['detailRT'] = $this->RT_model->getDetailRT($data['detail']->idRT)->row();
    $data['detailRW'] = $this->RW_model->getDetailRW($data['detail']->idRW)->row();
    $validasiRT = $data['detail']->validasiRT;
    $validasiRW = $data['detail']->validasiRW;
    $data['tanggalLahir'] = $this->tanggal_indo($data['detail']->tanggalLahir);
    $data['tanggalNow'] = $this->tanggal_indo(date('Y-m-d'));
    // print_r($data['tanggalNow']);
    if ($validasiRT == 'Belum Validasi') {
      $this->session->set_flashdata('info', 'Surat belum divalidasi oleh RT');
      // redirect('Admin/getSurat');
    }
    if ($validasiRT == 'Sudah Validasi' && $validasiRW == 'Belum Validasi') {
      $this->session->set_flashdata('info', 'Surat belum divalidasi oleh RW');
      // redirect('Admin/getSurat');
    }
    if ($validasiRT == 'Sudah Validasi' && $validasiRW == 'Sudah Validasi') {


      $this->load->view('surat', $data);

      $options = new Options();
      $options->set('isRemoteEnabled', TRUE);
      $dompdf = new Dompdf($options);

      $html = $this->output->get_output();
      $dompdf->loadHTML($html);
      $dompdf->setPaper('A4', 'portrait');
      $dompdf->render();
      // $dompdf->stream("surat_pengantar.pdf", array('Attachment' => 0));
      $dompdf->stream("surat_pengantar.pdf");
      $this->session->set_flashdata('info', 'Surat sudah divalidasi');
    }
    redirect('Admin/getSurat');
  }

  public function validasiRT($id)
  {
    // $id = $this->input->post('idSurat');
    $this->Surat_model->validateRT($id);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('info', 'Data berhasil dihapus');
    }
    redirect('Admin/getSurat');
  }

  public function unvalidasiRT($id)
  {
    // $id = $this->input->post('idSurat');
    $this->Surat_model->unvalidateRT($id);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('info', 'Data berhasil dihapus');
    }
    redirect('Admin/getSurat');
  }

  public function validasiRW($id)
  {
    // $id = $this->input->post('idSurat');
    $this->Surat_model->validateRW($id);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('info', 'Data berhasil dihapus');
    }
    redirect('Admin/getSurat');
  }

  public function unvalidasiRW($id)
  {
    // $id = $this->input->post('idSurat');
    $this->Surat_model->unvalidateRW($id);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('info', 'Data berhasil dihapus');
    }
    redirect('Admin/getSurat');
  }

  function nik_check()
  {
    $post = $this->input->post(null, TRUE);
    $query = $this->db->query("SELECT * FROM penduduk WHERE NIK = '$post[NIK]' AND idPenduduk != '$post[idPenduduk]'");
    if ($query->num_rows() > 0) {
      $this->form_validation->set_message('nik_check', '{field} ini sudah dipakai, silahkan ganti');
      return FALSE;
    } else {
      return TRUE;
    }
  }

  function nik_test()
  {
    $post = $this->input->post(null, TRUE);
    $query = $this->db->query("SELECT * FROM penduduk WHERE NIK = '$post[NIK]'");
    if ($query->num_rows() > 0) {
      
      return TRUE;
    } else {
      $this->form_validation->set_message( __FUNCTION__ , '{field} belum terdaftar');
      return FALSE;
    }
  }

  public function uploadttdRW($pre, $nama)
  {
    $ttdRW = '';
    $config['upload_path'] = './assets_sisuper/ttd/';
    $config['allowed_types'] = 'png';
    $config['file_name'] = $pre . $nama;
    $config['overwrite'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (isset($_FILES['ttdRW']['name'])) {

      if ($this->upload->do_upload('ttdRW')) {
        $ttdRW = html_escape($this->upload->data('file_name'));
        print_r($ttdRW);
      }
    } else {
      print_r('gambar kosong');
    }
    return $ttdRW;
  }

  public function uploadcapRW($pre, $nama)
  {
    $capRW = '';
    $config['upload_path'] = './assets_sisuper/cap/';
    $config['allowed_types'] = 'png';
    $config['file_name'] = $pre . $nama;
    $config['overwrite'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (isset($_FILES['capRW']['name'])) {

      if ($this->upload->do_upload('capRW')) {
        $capRW = html_escape($this->upload->data('file_name'));
        print_r($capRW);
      }
    } else {
      print_r('gambar kosong');
    }
    return $capRW;
  }

  public function uploadttdRT($pre, $nama)
  {
    $ttdRT = '';
    $config['upload_path'] = './assets_sisuper/ttd/';
    $config['allowed_types'] = 'png';
    $config['file_name'] = $pre . $nama;
    $config['max_size'] = 2048;
    $config['overwrite'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (isset($_FILES['ttdRT']['name'])) {

      if ($this->upload->do_upload('ttdRT')) {
        $ttdRT = $this->upload->data('file_name');
        print_r($ttdRT);
      }
    } else {
      print_r('gambar kosong');
    }
    return $ttdRT;
  }

  public function uploadcapRT($pre, $nama)
  {
    $capRT = '';
    $config['upload_path'] = './assets_sisuper/cap/';
    $config['allowed_types'] = 'png';
    $config['file_name'] = $pre . $nama;
    $config['overwrite'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (isset($_FILES['capRT']['name'])) {

      if ($this->upload->do_upload('capRT')) {
        $capRT = html_escape($this->upload->data('file_name'));
        print_r($capRT);
      }
    } else {
      print_r('gambar kosong');
    }
    return $capRT;
  }

  function namaRW_check()
  {
    $post = $this->input->post(null, TRUE);
    $query = $this->db->query("SELECT * FROM daftar_rw WHERE namaRW = '$post[nama]' AND idUser != '$post[idRW]'");
    if ($query->num_rows() > 0) {
      $this->form_validation->set_message('nama_check', '{field} ini sudah dipakai, silahkan ganti');
      return FALSE;
    } else {
      return TRUE;
    }
  }

  public function checkFileValidation()
  {
    if (isset($_FILES['ttdRW']['name'])) {
      // $arr_file = explode('.', $_FILES['ttdRW']['name']);
      // $extension = end($arr_file);
      $extension = pathinfo($_FILES['ttdRW']['name'], PATHINFO_EXTENSION);
      if ($extension == 'png') {
        return true;
      } else {
        $this->form_validation->set_message('checkFileValidation', 'Mohon memilih file yang sesuai dengan format.');
        return false;
      }
    } else {
      $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
      return false;
    }
    if (isset($_FILES['capRW']['name'])) {
      // $arr_file = explode('.', $_FILES['ttdRW']['name']);
      // $extension = end($arr_file);
      $extension = pathinfo($_FILES['capRW']['name'], PATHINFO_EXTENSION);
      if ($extension == 'png') {
        return true;
      } else {
        $this->form_validation->set_message('checkFileValidation', 'Mohon memilih file yang sesuai dengan format.');
        return false;
      }
    } else {
      $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
      return false;
    }
  }

  public function checkFileValidationv2()
  {
    if (isset($_FILES['ttdRT']['name'])) {
      // $arr_file = explode('.', $_FILES['ttdRW']['name']);
      // $extension = end($arr_file);
      $extension = pathinfo($_FILES['ttdRT']['name'], PATHINFO_EXTENSION);
      if ($extension == 'png') {
        return true;
      } else {
        $this->form_validation->set_message('checkFileValidationv2', 'Mohon memilih file yang sesuai dengan format.');
        return false;
      }
    } else {
      $this->form_validation->set_message('checkFileValidationv2', 'Please choose a file.');
      return false;
    }
    if (isset($_FILES['capRWT']['name'])) {
      // $arr_file = explode('.', $_FILES['ttdRW']['name']);
      // $extension = end($arr_file);
      $extension = pathinfo($_FILES['capRT']['name'], PATHINFO_EXTENSION);
      if ($extension == 'png') {
        return true;
      } else {
        $this->form_validation->set_message('checkFileValidationv2', 'Mohon memilih file yang sesuai dengan format.');
        return false;
      }
    } else {
      $this->form_validation->set_message('checkFileValidationv2', 'Please choose a file.');
      return false;
    }
  }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */