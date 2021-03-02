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
        <h3 class="box-title">Tambah Pengguna</h3>
        <div class="pull-right">
            <a href="<?=site_url('Admin/getUser')?>" class="btn btn-primary btn-flat">
                <i class="fa fa-undo"></i> Back 
            </a>
        </div>
      </div>
      <div class="box-body">
         <div class="row">
             <div class="col-md-4 col-md-offset-4">
                <?php //echo validation_errors() ?>
                <form action="" method="post"> 
                    <div class="form-group <?=form_error('nama') ? 'has-error' : null ?>">
                        <label>Nama *</label>
                        <input type="text" name="nama" value="<?=set_value('nama')?>" class="form-control"> 
                        <?=form_error('nama')?>
                    </div>
                    <div class="form-group <?=form_error('username') ? 'has-error' : null ?>">
                        <label>Username *</label>
                        <input type="text" name="username" value="<?=set_value('username')?>" class="form-control">
                        <?=form_error('username')?>
                    </div>
                    <div class="form-group <?=form_error('password') ? 'has-error' : null ?>">
                        <label>Password *</label>
                        <input type="password" name="password" value="<?=set_value('password')?>" class="form-control">
                        <?=form_error('password')?>
                    </div>
                    <div class="form-group <?=form_error('passconf') ? 'has-error' : null ?>">
                        <label>Password Confirmation *</label>
                        <input type="password" name="passconf" value="<?=set_value('passconf')?>" class="form-control">
                        <?=form_error('passconf')?>
                    </div>
                    <!-- <div class="form-group <?=form_error('nomor') ? 'has-error' : null ?>">
                        <label>Nomor Telepon *</label>
                        <input type="nomor" name="nomor" value="<?=set_value('nomor')?>" class="form-control">
                        <?=form_error('nomor')?>
                    </div> -->
                    <div class="form-group <?=form_error('level') ? 'has-error' : null ?>">
                        <label>Level *</label>
                        <select name="level" class="form-control">
                            <option value="">- Pilih -</option>
                            <option value="1" <?=set_value('level') == "1" ? "selected" : null?>>Admin</option>
                            <option value="2" <?=set_value('level') == "2" ? "selected" : null?>>Ketua RW</option>
                            <option value="3" <?=set_value('level') == "3" ? "selected" : null?>>Ketua RT</option> 
                        </select>
                        <?=form_error('level')?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-flat">
                            <i class=""></i> Tambah
                        </button>
                        <!-- reset error ketika sudah submit -->
                        <button type="reset" class="btn btn-flat">Reset</button>
                    </div>
                </form>
             </div>
         </div>
      </div>
  </div>

</section>