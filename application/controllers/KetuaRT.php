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

class KetuaRT extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    check_ketuaRT();

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

  function getPenduduk()
  {
    $data['penduduk'] = $this->Penduduk_model->getDataPenduduk();
    $this->template->load('template', 'penduduk/penduduk_data', $data);
  }

  public function getSurat()
  {

    $temp = $this->RT_model->getIdRTByUser($this->fungsi->user_login()->idUser);
    if ($temp != null) {
      $data['surat'] = $this->Surat_model->getDataSuratByRTRW($temp->idRT, $temp->idRW);
      $this->template->load('template', 'surat/surat_data', $data);
    } else {
      $data['surat'] = $this->Surat_model->getDataSurat();
      $this->template->load('template', 'surat/surat_data', $data);
    };
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
    redirect('KetuaRT/getSurat');
  }

  public function validasiRT($id)
  {
    // $id = $this->input->post('idSurat');
    $this->Surat_model->validateRT($id);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('info', 'Data berhasil dihapus');
    }
    redirect('KetuaRT/getSurat');
  }

  public function unvalidasiRT($id)
  {
    // $id = $this->input->post('idSurat');
    $this->Surat_model->unvalidateRT($id);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('info', 'Data berhasil dihapus');
    }
    redirect('KetuaRT/getSurat');
  }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */