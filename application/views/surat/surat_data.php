<section class="content-header">
  <h1>
    Kelola Data Surat
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
    <li class="active">Surat</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- buat ALERT ke messages.php -->
  <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Surat</h3>
      <div class="pull-right">
        <?php if ($this->fungsi->user_login()->level == 1) { ?>
          <a href="<?= site_url('Admin/addSurat') ?>" class="btn btn-primary btn-flat">
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
            <th>Nomor Surat</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Keperluan</th>
            <th>Keterangan</th>
            <th>RT</th>
            <th>Validasi RT</th>
            <th>RW</th>
            <th>Validasi RW</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($surat->result() as $key => $data) { ?>
            <tr>
              <td style="" ;><?= $data->idSurat ?></td>
              <td><?= $data->nomorSurat ?></td>
              <td><?= $data->NIK ?></td>
              <td><?= $data->nama ?></td>
              <td><?= $data->keperluan ?></td>
              <td><?= $data->keterangan ?></td>
              <td><?= $data->namaRT ?></td>
              <td><?= $data->validasiRT ?></td>
              <td><?= $data->namaRW ?></td>
              <td><?= $data->validasiRW ?></td>
              <td><?= $data->status ?></td>

              <td class="text-center" width="10%">
                <form action="<?= site_url('Admin/deleteSurat') ?>" method="post">
                  <!-- Bagian RT -->
                  <?php if ($data->validasiRT == 'Belum Validasi') { ?>
                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                      <a href="<?= site_url('Admin/validasiRT/' . $data->idSurat) ?>" class="btn btn-warning btn-xs">
                        <i class="fa  fa-close"></i>
                      </a>
                    <?php } ?>
                    <?php if ($this->fungsi->user_login()->level == 3) { ?>
                      <a href="<?= site_url('KetuaRT/validasiRT/' . $data->idSurat) ?>" class="btn btn-warning btn-xs">
                        <i class="fa  fa-close"></i>
                      </a>
                    <?php } ?>
                  <?php } ?>
                  <?php if ($data->validasiRT == 'Sudah Validasi') { ?>
                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                      <a href="<?= site_url('Admin/unvalidasiRT/' . $data->idSurat) ?>" class="btn btn-success btn-xs">
                        <i class="fa  fa-check-square-o"></i>
                      </a>
                    <?php } ?>
                    <?php if ($this->fungsi->user_login()->level == 3) { ?>
                      <a href="<?= site_url('KetuaRT/unvalidasiRT/' . $data->idSurat) ?>" class="btn btn-success btn-xs">
                        <i class="fa  fa-check-square-o"></i>
                      </a>
                    <?php } ?>

                  <?php } ?>
                  <!-- Bagian RW -->
                  <?php if ($data->validasiRT == 'Sudah Validasi') { ?>
                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                      <?php if ($data->validasiRW == 'Belum Validasi') { ?>
                        <a href="<?= site_url('Admin/validasiRW/' . $data->idSurat) ?>" class="btn btn-warning btn-xs">
                          <i class="fa  fa-close"></i>
                        </a>
                      <?php } ?>
                      <?php if ($data->validasiRW == 'Sudah Validasi') { ?>
                        <a href="<?= site_url('Admin/unvalidasiRW/' . $data->idSurat) ?>" class="btn btn-success btn-xs">
                          <i class="fa  fa-check-square-o"></i>
                        </a>
                      <?php } ?>
                    <?php } ?>
                    <?php if ($this->fungsi->user_login()->level == 2) { ?>
                      <?php if ($data->validasiRW == 'Belum Validasi') { ?>
                        <a href="<?= site_url('KetuaRW/validasiRW/' . $data->idSurat) ?>" class="btn btn-warning btn-xs">
                          <i class="fa  fa-close"></i>
                        </a>
                      <?php } ?>
                      <?php if ($data->validasiRW == 'Sudah Validasi') { ?>
                        <a href="<?= site_url('KetuaRW/unvalidasiRW/' . $data->idSurat) ?>" class="btn btn-success btn-xs">
                          <i class="fa  fa-check-square-o"></i>
                        </a>
                      <?php } ?>
                    <?php } ?>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->level == 1) { ?>
                    <a href="<?= site_url('Admin/cetakPDF/' . $data->idSurat) ?>" class="btn btn-info btn-xs">
                      <i class="fa fa-print"></i>
                    </a>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->level == 2) { ?>
                    <a href="<?= site_url('KetuaRW/cetakPDF/' . $data->idSurat) ?>" class="btn btn-info btn-xs">
                      <i class="fa fa-print"></i>
                    </a>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->level == 3) { ?>
                    <a href="<?= site_url('KetuaRT/cetakPDF/' . $data->idSurat) ?>" class="btn btn-info btn-xs">
                      <i class="fa fa-print"></i>
                    </a>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->level == 1) { ?>
                    <input type="hidden" name="idSurat" value="<?= $data->idSurat ?>">
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
            <th>Nomor Surat</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Keperluan</th>
            <th>Keterangan</th>
            <th>RT</th>
            <th>Validasi RT</th>
            <th>RW</th>
            <th>Validasi RW</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</section>