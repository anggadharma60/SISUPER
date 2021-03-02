<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
require_once 'vendor/dompdf/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

/**
 *
 * Controller Home
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

class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Penduduk_model');
    $this->load->model('RT_model');
    $this->load->model('RW_model');
    $this->load->model('Surat_model');
  }

  public function index()
  {
    $this->load->view('home');
  }

  public function checkNIKterdaftar($NIK)
  {
    $valid = $this->Penduduk_model->checkNIK($NIK);
    if ($valid == TRUE) {
      echo json_encode($valid);
    } else {
      echo json_encode(FALSE);
    }
  }

  public function sudahPernah()
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

    $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
    $this->form_validation->set_rules('NIK', 'NIK', 'required|regex_match[/^[0-9]+$/]|min_length[16]|max_length[16]|trim');

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
      $this->load->view('sudah_pernah', $data);
    } else {
      $post = $this->input->post(null, TRUE);

      $this->Surat_model->addDataSurat($post);

      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('info', 'Permohonan Surat Pengantar Berhasil');
      } else {
        redirect('Home/sudahPernah');
      }
      redirect('Home/sudahPernah');
    }
  }


  function getRTByRW($idRW)
  {
    $RT = $this->RT_model->getRTByRW($idRW)->result();
    header('Content-Type: application/json');
    echo json_encode($RT);
  }

  public function belumPernah()
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
    $data['daftarrw'] = $this->RW_model->getDaftarRW();
    $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
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
      $this->load->view('belum_pernah', $data);
    } else {
      $post = $this->input->post(null, TRUE);
      $this->Penduduk_model->addDataPenduduk($post);
      $this->Surat_model->addDataSurat($post);

      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('info', 'Permohonan Surat Pengantar Berhasil');
      } else {
        $this->session->set_flashdata('info', 'Permohonan Surat Pengantar Gagal');
        redirect('Home/belumPernah');
      }
      redirect('Home/belumPernah');
    }
  }

  function nik_check()
  {
    $post = $this->input->post(null, TRUE);
    $query = $this->db->query("SELECT * FROM penduduk WHERE NIK = '$post[NIK]'");
    if ($query->num_rows() > 0) {
      $this->form_validation->set_message('nik_check', '{field} ini sudah dipakai, silahkan ganti');
      return FALSE;
    } else {
      return TRUE;
    }
  }

  public function checkStatusSurat($nomor)
  {
    $temp = str_replace('-', '/', $nomor);
    $status = $this->Surat_model->checkStatus($temp);
    if ($status != null) {
      echo json_encode($status);
    } else {
      echo json_encode(FALSE);
    }
  }

  public function checkNomorSurat($nomor)
  {

    $temp = str_replace('-', '/', $nomor);
    $valid = $this->Surat_model->checkSurat($temp);

    // echo json_encode($valid);
    if ($valid == TRUE) {
      echo json_encode(TRUE);
    } else {
      echo json_encode(FALSE);
    }
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

  public function cekSurat()
  {
    $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
    $this->form_validation->set_message('min_length', '%s minimal %s karakter');
    $this->form_validation->set_message('max_length', '%s maksimal %s karakter');
    $this->form_validation->set_message('regex_match', '{field} berisi karakter');
    $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
    $this->form_validation->set_message('alpha_numeric_spaces', '{field} berisi karakter');
    $this->form_validation->set_message('alpha_numeric', '{field} berisi karakter dan numerik');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('cek_surat');
    } else {
      $post = $this->input->post(null, TRUE);

      $data['detail'] = $this->Surat_model->getDetailSuratByNomor($post['nomor'])->row();
      if ($data['detail'] == null) {
        $this->session->set_flashdata('info', 'Surat tidak ditemukan');
        // $this->load->view('cek_surat');
      } else {
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
      }
      $this->load->view('cek_surat');
    }
  }
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */