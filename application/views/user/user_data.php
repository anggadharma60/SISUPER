<section class="content-header">
  <h1>
    Kelola Data Pengguna
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-user"></i></a></li>
    <li class="active">Pengguna</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- buat ALERT ke messages.php -->
  <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Pengguna</h3>
      <div class="pull-right">
        <a href="<?= site_url('Admin/addUser') ?>" class="btn btn-primary btn-flat">
          <i class="fa fa-user-plus"></i> Tambah
        </a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <!-- id="table1" buat searching pagination dan row -->
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Level</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($user->result() as $key => $data) { ?>
            <tr>
              <td style="width: 11%" ;><?= $data->idUser ?></td>
              <td><?= $data->nama ?></td>
              <td><?= $data->username ?></td>
              <?php if($data->level == 1) {?>
                <td style="width: 15%" ;>Admin</td>
              <?php }?>
              <?php if($data->level == 2) {?>
                <td style="width: 15%" ;>Ketua RW</td>
              <?php }?>
              <?php if($data->level == 3) {?>
                <td style="width: 15%" ;>Ketua RT</td>
              <?php }?>
              
              <td class="text-center" width="10%">
                <form action="<?= site_url('Admin/deleteUser') ?>" method="post">
                  <!-- <a href="<?= site_url('Admin/detailUser/' . $data->idUser) ?>" class="btn btn-default btn-xs">
                   <i class="fa fa-eye"></i>
                    </a> -->
                  <a href="<?= site_url('Admin/editUser/' . $data->idUser) ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <input type="hidden" name="idUser" value="<?= $data->idUser ?>">
                  <?php
                    if($data->idUser != $this->session->userdata['idUser']) { ?>
                        <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
                          <i class="fa fa-trash"></i>
                        </button>
                    <?php }?>
                  
                </form>
              </td>
            </tr>
          <?php
          } ?>
        </tbody>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Nama Pegawai</th>
            <th>Username</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</section>