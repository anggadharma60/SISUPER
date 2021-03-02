<section class="content-header">
    <h1>
        Data Collection
        <small>Data Penduduk</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('Admin/getPenduduk') ?>"><i class="fa fa-users"></i></a></li>
        <li class="active">Penduduk</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<!-- <?= print_r($test)?> -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Penduduk</h3>
            <div class="pull-right">
                <a href="<?= site_url('Admin/getPenduduk') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php //echo validation_errors() 
                    ?>
                    <form action="" method="post">
                        <div class="form-group <?= form_error('nama') ? 'has-error' : null ?>">
                            <label>Nama *</label>
                            <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control">
                            <?= form_error('nama') ?>
                        </div>
                        <div class="form-group <?= form_error('NIK') ? 'has-error' : null ?>">
                            <label>NIK *</label>
                            <input type="text" name="NIK" value="<?= set_value('NIK') ?>" class="form-control" minlength="16" maxlength="16" pattern=".{16}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <?= form_error('NIK') ?>
                        </div>
                        <div class="form-group <?= form_error('jenisKelamin') ? 'has-error' : null ?>">
                            <label>Jenis Kelamin *</label>
                            <select name="jenisKelamin" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="L" <?= set_value('jenisKelamin') == "L" ? "selected" : null ?>>Laki-Laki</option>
                                <option value="P" <?= set_value('jenisKelamin') == "P" ? "selected" : null ?>>Perempuan</option>
                            </select>
                            <?= form_error('jenisKelamin') ?>
                        </div>
                        <div class="form-group <?= form_error('tempatLahir') ? 'has-error' : null ?>">
                            <label>Tempat Lahir *</label>
                            <input type="text" name="tempatLahir" value="<?= set_value('tempatLahir') ?>" class="form-control">
                            <?= form_error('tempatLahir') ?>
                        </div>
                        <div class="form-group <?= form_error('tanggalLahir') ? 'has-error' : null ?>">
                            <label>Tanggal Lahir *</label>
                            <div class="input-group input-daterange">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="tanggalLahir" id="tanggalLahir" class="form-control pull-right" value="<?= set_value('tanggalLahir') ?>" readonly="" />
                            </div>
                            <?= form_error('tanggalLahir') ?>
                        </div>
                        <div class="form-group <?= form_error('kewarganegaraan') ? 'has-error' : null ?>">
                            <label>Kewarganegaraan *</label>
                            <select name="kewarganegaraan" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="WNI" <?= set_value('kewarganegaraan') == "WNI" ? "selected" : null ?>>WNI</option>
                                <option value="WNA" <?= set_value('kewarganegaraan') == "WNA" ? "selected" : null ?>>WNA</option>
                            </select>
                            <?= form_error('kewarganegaraan') ?>
                        </div>
                        <div class="form-group <?= form_error('agama') ? 'has-error' : null ?>">
                            <label>Agama *</label>
                            <select name="agama" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="Islam" <?= set_value('agama') == "Islam" ? "selected" : null ?>>Islam</option>
                                <option value="Protestan" <?= set_value('agama') == "Protestan" ? "selected" : null ?>>Protestan</option>
                                <option value="Katolik" <?= set_value('agama') == "Katolik" ? "selected" : null ?>>Katolik</option>
                                <option value="Hindu" <?= set_value('agama') == "Hindu" ? "selected" : null ?>>Hindu</option>
                                <option value="Buddha" <?= set_value('agama') == "Buddha" ? "selected" : null ?>>Buddha</option>
                                <option value="Khonghucu" <?= set_value('agama') == "Khonghucu" ? "selected" : null ?>>Khonghucu</option>
                            </select>
                            <?= form_error('agama') ?>
                        </div>
                        <div class="form-group <?= form_error('status') ? 'has-error' : null ?>">
                            <label>Status *</label>
                            <select name="status" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="Belum Kawin" <?= set_value('status') == "Belum Kawin" ? "selected" : null ?>>Belum Kawin</option>
                                <option value="Kawin" <?= set_value('status') == "Kawin" ? "selected" : null ?>>Kawin</option>
                                <option value="Janda" <?= set_value('status') == "Janda" ? "selected" : null ?>>Janda</option>
                                <option value="Duda" <?= set_value('status') == "Duda" ? "selected" : null ?>>Duda</option>
                            </select>
                            <?= form_error('status') ?>
                        </div>
                        <div class="form-group <?= form_error('pendidikan') ? 'has-error' : null ?>">
                            <label>Pendidikan Terakhir*</label>
                            <select name="pendidikan" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="Tidak / Belum Sekolah" <?= set_value('pendidikan') == "Tidak / Belum Sekolah" ? "selected" : null ?>>Tidak / Belum Sekolah</option>
                                <option value="SD / MI / Sederajat" <?= set_value('pendidikan') == "SD / MI / Sederajat" ? "selected" : null ?>>SD / MI / Sederajat</option>
                                <option value="SMP / MTS / Sederajat" <?= set_value('pendidikan') == "SMP / MTS / Sederajat" ? "selected" : null ?>>SMP / MTS / Sederajat</option>
                                <option value="SMA / SMK / MA / Sederajat" <?= set_value('pendidikan') == "SMA / SMK / MA / Sederajat" ? "selected" : null ?>>SMA / SMK / MA / Sederajat</option>
                                <option value="Diploma I" <?= set_value('pendidikan') == "Diploma I" ? "selected" : null ?>>Diploma I</option>
                                <option value="Diploma II" <?= set_value('pendidikan') == "Diploma II" ? "selected" : null ?>>Diploma II</option>
                                <option value="Diploma III" <?= set_value('pendidikan') == "Diploma III" ? "selected" : null ?>>Diploma III</option>
                                <option value="Diploma IV" <?= set_value('pendidikan') == "Diploma IV" ? "selected" : null ?>>Diploma IV</option>
                                <option value="Strata I" <?= set_value('pendidikan') == "Strata I" ? "selected" : null ?>>Strata I</option>
                                <option value="Strata II" <?= set_value('pendidikan') == "Strata II" ? "selected" : null ?>>Strata II</option>
                                <option value="Strata III" <?= set_value('pendidikan') == "Strata III" ? "selected" : null ?>>Strata III</option>
                            </select>
                            <?= form_error('pendidikan') ?>
                        </div>
                        <div class="form-group <?= form_error('pekerjaan') ? 'has-error' : null ?>">
                            <label>Pekerjaan *</label>
                            <input type="text" name="pekerjaan" value="<?= set_value('pekerjaan') ?>" class="form-control">
                            <?= form_error('pekerjaan') ?>
                        </div>
                        <div class="form-group <?= form_error('alamat') ? 'has-error' : null ?>">
                            <label>Alamat *</label>
                            <textarea style="resize:none" name="alamat" class="form-control" rows="3"><?= set_value('alamat') ?></textarea>
                            <?= form_error('alamat') ?>
                        </div>
                        <div class="form-group <?= form_error('namaRW') ? 'has-error' : null ?>">
                            <label>Nama RW *</label>
                            <select id="namaRW" name="namaRW" class="form-control">
                                <option value="" selected="selected">- Pilih Nama RW -</option>
                                <?php foreach ($daftarrw->result() as $key => $rw) { ?>
                                    <option value="<?= $rw->idRW ?>" <?= set_value('namaRW') == $rw->idRW ? "selected" : null ?>><?= $rw->namaRW ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <?= form_error('namaRW') ?>
                        </div>
                        <div class="form-group <?= form_error('namaRT') ? 'has-error' : null ?>">
                            <label>Nama RT *</label>
                            <select id="namaRT" name="namaRT" class="form-control">
                                <option value="" selected="selected">- Pilih Nama RT -</option>
                            </select>
                            <?= form_error('namaRT') ?>
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