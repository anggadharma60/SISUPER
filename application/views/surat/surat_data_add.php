<section class="content-header">
    <h1>
        Data Collection
        <small>Data Surat</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('Admin/getSurat') ?>"><i class="fa fa-envelope"></i></a></li>
        <li class="active">Surat</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- <?= print_r($NIK->result()) ?> -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Surat</h3>
            <div class="pull-right">
                <a href="<?= site_url('Admin/getSurat') ?>" class="btn btn-primary btn-flat">
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
                        <div class="form-group <?= form_error('nomor') ? 'has-error' : null ?>">
                            <label>Nomor *</label>
                            <input type="text" name="nomor" value="<?= $nomorSurat ?>" class="form-control" readonly>
                            <?= form_error('nomor') ?>
                        </div>
                        <div class="form-group <?= form_error('NIK') ? 'has-error' : null ?>">
                            <label>NIK *</label>
                            <input list="NIK" name="NIK" class="form-control" minlength="16" maxlength="16" pattern=".{16}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <datalist id="NIK">
                                <?php foreach ($NIK->result() as $key => $nik) { ?>
                                    <option value="<?= $nik->NIK ?>" <?= set_value('NIK')?>><?= $nik->idPenduduk ?>
                                    <?php } ?>
                            </datalist>
                            <!-- <select id="NIK" name="NIK" class="form-control select2" data-placeholder="Select NIK" style="width: 100%;color:black;">
                                <option value="<?= set_value('NIK') ?>"><?= set_value('NIK') ?></option>
                            </select> -->
                            <?= form_error('NIK') ?>
                        </div>
                        <div class="form-group <?= form_error('keperluan') ? 'has-error' : null ?>">
                            <label>Keperluan *</label>
                            <textarea style="resize:none" name="keperluan" class="form-control" rows="3"><?= set_value('keperluan') ?></textarea>
                            <?= form_error('keperluan') ?>
                        </div>
                        <div class="form-group <?= form_error('keterangan') ? 'has-error' : null ?>">
                            <label>Keterangan *</label>
                            <textarea style="resize:none" name="keterangan" class="form-control" rows="3"><?= set_value('keterangan') ?></textarea>
                            <?= form_error('keterangan') ?>
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