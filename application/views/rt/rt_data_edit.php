<section class="content-header">
    <h1>
        Data Collection
        <small>Data RT</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('Admin/getRT') ?>"><i class="fa fa-home"></i></a></li>
        <li class="active">RT</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- <?php print_r($ketuart) ?> -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit RT</h3>
            <div class="pull-right">
                <a href="<?= site_url('Admin/getRT') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php //echo validation_errors() 
                    ?>
                    <form action="" method="post" enctype="multipart/form-data" id="uploadImage" name="uploadImage">
                        <div class="form-group <?= form_error('nama') ? 'has-error' : null ?>">
                            <label>Nama RT *</label>
                            <input type="hidden" name="idRT" value="<?= $ketuart->idRT ?>">
                            <input readonly id="nama" type="number" name="nama" min="001" max="999" value="<?= $this->input->post('nama') ?? $ketuart->namaRT ?>" class="form-control">
                            <?= form_error('nama') ?>
                        </div>
                        <div class="form-group <?= form_error('namaRW') ? 'has-error' : null ?>">
                            <label>Nama RW *</label>
                            <select readonly name="namaRW" class="form-control">
                                <option value="<?= $this->input->post('namaRW') ?? $ketuart->idRW ?>" selected="selected"><?= $ketuart->namaRW ?></option>
                            </select>
                            <?= form_error('namaRW') ?>
                        </div>
                        <div class="form-group <?= form_error('ketuart') ? 'has-error' : null ?>">
                            <label>Nama Ketua RT *</label>
                            <select readonly name="ketuart" class="form-control">
                                <option value="<?= $this->input->post('ketuart') ?? $ketuart->idUser ?>" selected="selected"><?= $ketuart->nama ?></option>
                            </select>
                            <?= form_error('ketuart') ?>
                        </div>
                        <div class="form-group <?= form_error('keterangan') ? 'has-error' : null ?>">
                            <label>Keterangan</label>
                            <textarea style="resize:none" name="keterangan" class="form-control" rows="3"><?= $this->input->post('keterangan') ?? $ketuart->keteranganRT ?></textarea>
                            <?= form_error('keterangan') ?>
                        </div>
                        <div class="form-group <?= form_error('ttdRT') ? 'has-error' : null ?>">
                            <label>Tanda Tangan RT *</label>
                            <div>
                                <img src="<?= base_url('assets_sisuper/ttd/' . $ketuart->ttdRT) ?>" style="width:60%">
                            </div>
                            <input type="file" name="ttdRT" value="<?= set_value('ttdRT') ?>" class="form-control"  accept=".png">
                            <small>(Biarkan kosong jika tidak diganti)</small>
                            <?= form_error('ttdRT') ?>
                        </div>
                        <div class="form-group <?= form_error('capRT') ? 'has-error' : null ?>">
                            <label>Cap RT *</label>
                            <div>
                                <img src="<?= base_url('assets_sisuper/cap/' . $ketuart->capRT) ?>" style="width:60%">
                            </div>
                            <input type="file" name="capRT" value="<?= set_value('capRT') ?>" class="form-control"  accept=".png">
                            <small>(Biarkan kosong jika tidak diganti)</small>
                            <?= form_error('capRT') ?>
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