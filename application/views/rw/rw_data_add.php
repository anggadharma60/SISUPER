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
    <!-- <?php ?> -->
  <div class="box">
      <div class="box-header">
        <h3 class="box-title">Tambah RW</h3>
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
                        <input id="nama" type="number" name="nama" min="001" max="999" value="<?=set_value('nama')?>" class="form-control"> 
                        <?=form_error('nama')?>
                    </div>
                    <div class="form-group <?=form_error('ketuarw') ? 'has-error' : null ?>">
                        <label>Nama Ketua RW *</label>
                        <select name="ketuarw" class="form-control">
                            <option value="" selected="selected">- Pilih Ketua RW -</option>
                            <?php foreach($ketuarw->result() as $key => $rw) {?>
                              <option value="<?=$rw->idUser?>" <?=set_value('ketuarw') == $rw->idUser ? "selected" : null?>><?=$rw->nama?>
                              </option>
                            <?php }?>
                        </select>
                        <?=form_error('ketuarw')?>
                    </div>
                    <div class="form-group <?=form_error('keterangan') ? 'has-error' : null ?>">
                        <label>Keterangan</label>
                        <textarea style="resize:none" name="keterangan" class="form-control" rows="3" ><?=set_value('keterangan')?></textarea>
                        <?=form_error('keterangan')?>
                    </div>
                    <div class="form-group <?=form_error('ttdRW') ? 'has-error' : null ?>">
                        <label>Tanda Tangan RW *</label>
                        <input type="file" name="ttdRW" value="<?=set_value('ttdRW')?>" class="form-control"  required accept=".png">
                        <?=form_error('ttdRW')?>
                    </div>
                    <div class="form-group <?=form_error('capRW') ? 'has-error' : null ?>">
                        <label>Cap RW *</label>
                        <input type="file" name="capRW" value="<?=set_value('capRW')?>" class="form-control"  required accept=".png">
                        <?=form_error('capRW')?>
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