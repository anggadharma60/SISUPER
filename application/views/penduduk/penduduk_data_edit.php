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
    <!-- <?= print_r($test) ?> -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Penduduk</h3>
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
                            <input type="hidden" name="idPenduduk" value="<?= $penduduk->idPenduduk ?>">
                            <input type="text" name="nama" value="<?= $this->input->post('nama') ?? $penduduk->nama ?>" class="form-control">
                            <?= form_error('nama') ?>
                        </div>
                        <div class="form-group <?= form_error('NIK') ? 'has-error' : null ?>">
                            <label>NIK *</label>
                            <input type="text" name="NIK" value="<?= $this->input->post('NIK') ?? $penduduk->NIK ?>" class="form-control" minlength="16" maxlength="16" pattern=".{16}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <?= form_error('NIK') ?>
                        </div>
                        <div class="form-group <?= form_error('jenisKelamin') ? 'has-error' : null ?>">
                            <label>Jenis Kelamin *</label>
                            <select name="jenisKelamin" class="form-control">
                                <?php $jenisKelamin = $this->input->post('jenisKelamin') ?? $penduduk->jenisKelamin ?>
                                <option value="L" <?= $jenisKelamin == 'L' ? 'selected' : null ?>>Laki-Laki</option>
                                <option value="P" <?= $jenisKelamin == 'P' ? 'selected' : null ?>>Perempuan</option>
                            </select>
                            <?= form_error('jenisKelamin') ?>
                        </div>
                        <div class="form-group <?= form_error('tempatLahir') ? 'has-error' : null ?>">
                            <label>Tempat Lahir *</label>
                            <input type="text" name="tempatLahir" value="<?= $this->input->post('tempatLahir') ?? $penduduk->tempatLahir ?>" class="form-control">
                            <?= form_error('tempatLahir') ?>
                        </div>
                        <div class="form-group <?= form_error('tanggalLahir') ? 'has-error' : null ?>">
                            <label>Tanggal Lahir *</label>
                            <div class="input-group input-daterange">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?php $tanggal = date('d-m-Y', strtotime($penduduk->tanggalLahir)) ?>
                                <input type="text" name="tanggalLahir" id="tanggalLahir" class="form-control pull-right" value="<?= $this->input->post('tanggalLahir') ?? $tanggal ?>" readonly="" />
                            </div>
                            <?= form_error('tanggalLahir') ?>
                        </div>
                        <div class="form-group <?= form_error('kewarganegaraan') ? 'has-error' : null ?>">
                            <label>Kewarganegaraan *</label>
                            <select name="kewarganegaraan" class="form-control">
                                <?php $kewarganegaraan = $this->input->post('kewarganegaraan') ?? $penduduk->kewarganegaraan ?>
                                <option value="WNI" <?= $kewarganegaraan == "WNI" ? "selected" : null ?>>WNI</option>
                                <option value="WNA" <?= $kewarganegaraan == "WNA" ? "selected" : null ?>>WNA</option>
                            </select>
                            <?= form_error('kewarganegaraan') ?>
                        </div>
                        <div class="form-group <?= form_error('agama') ? 'has-error' : null ?>">
                            <label>Agama *</label>
                            <select name="agama" class="form-control">
                                <?php $agama = $this->input->post('agama') ?? $penduduk->agama ?>
                                <option value="Islam" <?= $agama == "Islam" ? "selected" : null ?>>Islam</option>
                                <option value="Protestan" <?= $agama == "Protestan" ? "selected" : null ?>>Protestan</option>
                                <option value="Katolik" <?= $agama == "Katolik" ? "selected" : null ?>>Katolik</option>
                                <option value="Hindu" <?= $agama == "Hindu" ? "selected" : null ?>>Hindu</option>
                                <option value="Buddha" <?= $agama == "Buddha" ? "selected" : null ?>>Buddha</option>
                                <option value="Khonghucu" <?= $agama == "Khonghucu" ? "selected" : null ?>>Khonghucu</option>
                            </select>
                            <?= form_error('agama') ?>
                        </div>
                        <div class="form-group <?= form_error('status') ? 'has-error' : null ?>">
                            <label>Status *</label>
                            <select name="status" class="form-control">
                                <?php $status = $this->input->post('status') ?? $penduduk->status ?>
                                <option value="Belum Kawin" <?= $status == "Belum Kawin" ? "selected" : null ?>>Belum Kawin</option>
                                <option value="Kawin" <?= $status == "Kawin" ? "selected" : null ?>>Kawin</option>
                                <option value="Janda" <?= $status == "Janda" ? "selected" : null ?>>Janda</option>
                                <option value="Duda" <?= $status == "Duda" ? "selected" : null ?>>Duda</option>
                            </select>
                            <?= form_error('status') ?>
                        </div>
                        <div class="form-group <?= form_error('pendidikan') ? 'has-error' : null ?>">
                            <label>Pendidikan Terakhir*</label>
                            <select name="pendidikan" class="form-control">
                                <?php $pendidikan = $this->input->post('pendidikan') ?? $penduduk->pendidikan ?>
                                <option value="Tidak / Belum Sekolah" <?= $pendidikan == "Tidak / Belum Sekolah" ? "selected" : null ?>>Tidak / Belum Sekolah</option>
                                <option value="SD / MI / Sederajat" <?= $pendidikan == "SD / MI / Sederajat" ? "selected" : null ?>>SD / MI / Sederajat</option>
                                <option value="SMP / MTS / Sederajat" <?= $pendidikan == "SMP / MTS / Sederajat" ? "selected" : null ?>>SMP / MTS / Sederajat</option>
                                <option value="SMA / SMK / MA / Sederajat" <?= $pendidikan == "SMA / SMK / MA / Sederajat" ? "selected" : null ?>>SMA / SMK / MA / Sederajat</option>
                                <option value="Diploma I" <?= $pendidikan == "Diploma I" ? "selected" : null ?>>Diploma I</option>
                                <option value="Diploma II" <?= $pendidikan == "Diploma II" ? "selected" : null ?>>Diploma II</option>
                                <option value="Diploma III" <?= $pendidikan == "Diploma III" ? "selected" : null ?>>Diploma III</option>
                                <option value="Diploma IV" <?= $pendidikan == "Diploma IV" ? "selected" : null ?>>Diploma IV</option>
                                <option value="Strata I" <?= $pendidikan == "Strata I" ? "selected" : null ?>>Strata I</option>
                                <option value="Strata II" <?= $pendidikan == "Strata II" ? "selected" : null ?>>Strata II</option>
                                <option value="Strata III" <?= $pendidikan == "Strata III" ? "selected" : null ?>>Strata III</option>
                            </select>
                            <?= form_error('pendidikan') ?>
                        </div>
                        <div class="form-group <?= form_error('pekerjaan') ? 'has-error' : null ?>">
                            <label>Pekerjaan *</label>
                            <input type="text" name="pekerjaan" value="<?= $this->input->post('pekerjaan') ?? $penduduk->pekerjaan ?>" class="form-control">
                            <?= form_error('pekerjaan') ?>
                        </div>
                        <div class="form-group <?= form_error('alamat') ? 'has-error' : null ?>">
                            <label>Alamat *</label>
                            <textarea style="resize:none" name="alamat" class="form-control" rows="3"><?= $this->input->post('alamat') ?? $penduduk->alamat ?></textarea>
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
                            <small>(Biarkan kosong jika tidak diganti)</small>
                            <?= form_error('namaRW') ?>
                        </div>
                        <div class="form-group <?= form_error('namaRT') ? 'has-error' : null ?>">
                            <label>Nama RT *</label>
                            <select id="namaRT" name="namaRT" class="form-control">
                                <option value="" selected="selected">- Pilih Nama RT -</option>
                            </select>
                            <small>(Biarkan kosong jika tidak diganti)</small>
                            <?= form_error('namaRT') ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
                                <i class=""></i> Simpan
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