<section class="content-header">
  <h1>
    Data Collection
    <small>Data RW</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= site_url('Admin/getRW')?>"><i class="fa fa-bank"></i></a></li>
    <li class="active">RW</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- <?php print_r($rw)?> -->
  <div class="box">
      <div class="box-header">
        <h3 class="box-title">Edit RW</h3>
        <div class="pull-right">
            <a href="<?=site_url('Admin/getRW')?>" class="btn btn-primary btn-flat">
                <i class="fa fa-undo"></i> Back 
            </a>
        </div>
      </div>
      <div class="box-body">
         <div class="row">
             <div class="col-md-4 col-md-offset-4">
                <?php //echo validation_errors() ?>
                <form action="" method="post" enctype="multipart/form-data" id="uploadImage" name="uploadImage"> 
                    <div class="form-group <?=form_error('nama') ? 'has-error' : null ?>">
                        <label>Nama RW *</label>
                        <input type="hidden" name="idRW" value="<?= $ketuarw->idRW ?>">
                        <input readonly id="nama" type="number" name="nama" min="001" max="999" value="<?= $this->input->post('nama') ?? $ketuarw->namaRW ?>" class="form-control"> 
                        <?=form_error('nama')?>
                    </div>
                    <div class="form-group <?=form_error('ketuarw') ? 'has-error' : null ?>">
                        <label>Nama Ketua RW *</label>
                        <select readonly name="ketuarw" class="form-control">
                            <option  value="<?= $this->input->post('ketuarw') ?? $ketuarw->idUser ?>" selected="selected"><?=$ketuarw->nama?></option>
                            
                        </select>
                        <?=form_error('ketuarw')?>
                    </div>
                    <div class="form-group <?=form_error('keterangan') ? 'has-error' : null ?>">
                        <label>Keterangan</label>
                        <textarea style="resize:none" name="keterangan" class="form-control" rows="3" ><?= $this->input->post('keterangan') ?? $ketuarw->keteranganRW ?></textarea>
                        <?=form_error('keterangan')?>
                    </div>
                    <div class="form-group <?=form_error('ttdRW') ? 'has-error' : null ?>">
                        <label>Tanda Tangan RW *</label>
                        <div>
                        <img src="<?= base_url('assets_sisuper/ttd/' . $ketuarw->ttdRW) ?>" style="width:60%">
                        </div>
                        <input type="file" name="ttdRW" value="" class="form-control"  accept=".png">
                        <small>(Biarkan kosong jika tidak diganti)</small>
                        <?=form_error('ttdRW')?>
                    </div>
                    <div class="form-group <?=form_error('capRW') ? 'has-error' : null ?>">
                        <label>Cap RW *</label>
                        <div>
                        <img src="<?= base_url('assets_sisuper/cap/' . $ketuarw->capRW) ?>" style="width:60%">
                        </div>
                        <input type="file" name="capRW" value="<" class="form-control"  accept=".png">
                        <small>(Biarkan kosong jika tidak diganti)</small>
                        <?=form_error('capRW')?>
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