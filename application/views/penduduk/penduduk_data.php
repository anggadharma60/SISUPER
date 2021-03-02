<section class="content-header">
  <h1>
    Kelola Data Penduduk
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i></a></li>
    <li class="active">Penduduk</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- buat ALERT ke messages.php -->
  <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Penduduk</h3>
      <div class="pull-right">
        <?php if ($this->fungsi->user_login()->level == 1) { ?>
          <a href="<?= site_url('Admin/addPenduduk') ?>" class="btn btn-primary btn-flat">
            <i class="fa fa-user-plus"></i> Tambah
          </a>
        <?php } ?>
      </div>
    </div>
    <div class="box-body table-responsive">
      <!-- id="table1" buat searching pagination dan row -->
      <table class="table table-bordered table-striped dt-responsive nowrap" cellpadding="8" id="tablePenduduk">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Kewarganegaraan</th>
            <th>Agama</th>
            <th>Status</th>
            <th>Pendidikan</th>
            <th>Pekerjaan</th>
            <th>Alamat</th>
            <th>RT</th>
            <th>RW</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($penduduk->result() as $key => $data) { ?>
            <tr>
              <td style="" ;><?= $data->idPenduduk ?></td>
              <td><?= $data->nama ?></td>
              <td><?= $data->NIK ?></td>
              <?php if ($data->jenisKelamin == 'L') { ?>
                <td>Laki-Laki</td>
              <?php } ?>
              <?php if ($data->jenisKelamin == 'P') { ?>
                <td>Laki-Laki</td>
              <?php } ?>
              <td><?= $data->tempatLahir ?></td>
              <td><?= date('d/m/Y', strtotime($data->tanggalLahir)) ?></td>
              <td><?= $data->kewarganegaraan ?></td>
              <td><?= $data->agama ?></td>
              <td><?= $data->status ?></td>
              <td><?= $data->pendidikan ?></td>
              <td><?= $data->pekerjaan ?></td>
              <td><?= $data->alamat ?></td>
              <td><?= $data->namaRT ?></td>
              <td><?= $data->namaRW ?></td>


              <td class="text-center" width="10%">
                <form action="<?= site_url('Admin/deletePenduduk') ?>" method="post">
                  <?php if ($this->fungsi->user_login()->level == 1) { ?>
                    <a href="<?= site_url('Admin/editPenduduk/' . $data->idPenduduk) ?>" class="btn btn-primary btn-xs">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <input type="hidden" name="idPenduduk" value="<?= $data->idPenduduk ?>">
                    <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
                      <i class="fa fa-trash"></i>
                    </button>
                  <?php } ?>

                </form>
              </td>
            </tr>
          <?php
          } ?>
        </tbody>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Kewarganegaraan</th>
            <th>Agama</th>
            <th>Status</th>
            <th>Pendidikan</th>
            <th>Pekerjaan</th>
            <th>Alamat</th>
            <th>RT</th>
            <th>RW</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</section>