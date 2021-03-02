<section class="content-header">
    <h1>
        Data Collection
        <small>Data Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('Admin/getUser')?>"><i class="fa fa-user"></i></a></li>
        <li class="active">Pengguna</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Pengguna</h3>
            <div class="pull-right">
                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                    <a href="<?= site_url('Admin/getUser') ?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post">
                        <div class="form-group <?= form_error('nama') ? 'has-error' : null ?>">
                            <label>Nama *</label>
                            <input type="hidden" name="idUser" value="<?= $row->idUser ?>">
                            <input type="text" name="nama" value="<?= $this->input->post('nama') ?? $row->nama ?>" class="form-control">
                            <?= form_error('nama') ?>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                            <label>Username *</label>
                            <input type="text" name="username" value="<?= $this->input->post('username') ?? $row->username ?>" class="form-control">
                            <?= form_error('username') ?>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <label>Password</label> <small>(Biarkan kosong jika tidak diganti)</small>
                            <input type="password" name="password" value="<?= $this->input->post('password') ?>" class="form-control">
                            <?= form_error('password') ?>
                        </div>
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                            <label>Password Confirmation</label>
                            <input type="password" name="passconf" value="<?= $this->input->post('passconf') ?>" class="form-control">
                            <?= form_error('passconf') ?>
                        </div>
                        <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                            <label>Level *</label>
                            <select name="level" class="form-control">
                                <?php $status = $this->input->post('level') ?? $row->level ?>
                                <option value="1" <?= $status == 1 ? 'selected' : null ?>>Admin</option>
                                <option value="2" <?= $status == 2 ? 'selected' : null ?>>Ketua RW</option>
                                <option value="3" <?= $status == 3 ? 'selected' : null ?>>Ketua RT</option>
                            </select>
                            <?= form_error('level') ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>