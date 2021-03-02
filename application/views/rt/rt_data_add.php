<section class="content-header">
  <h1>
    Data Collection
    <small>Data RT</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= site_url('Admin/getRT')?>"><i class="fa fa-home"></i></a></li>
    <li class="active">RT</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $daftarrw ?>
  <div class="box">
      <div class="box-header">
        <h3 class="box-title">Tambah RT</h3>
        <div class="pull-right">
            <a href="<?=site_url('Admin/getRT')?>" class="btn btn-primary btn-flat">
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
                        <label>Nama RT *</label>
                        <input id="nama" type="number" name="nama" min="001" max="999" value="<?=set_value('nama')?>" class="form-control"> 
                        <?=form_error('nama')?>
                    </div>
                    <div class="form-group <?=form_error('namaRW') ? 'has-error' : null ?>">
                        <label>Nama RW *</label>
                        <select name="namaRW" class="form-control">
                            <option value="" selected="selected">- Pilih Nama RW -</option>
                            <?php foreach($daftarrw->result() as $key => $rw) {?>
                              <option value="<?=$rw->idRW?>" <?=set_value('namaRW') == $rw->idRW ? "selected" : null?>><?=$rw->namaRW?>
                              </option>
                            <?php }?>
                        </select>
                        <?=form_error('namaRW')?>
                    </div>
                    <div class="form-group <?=form_error('ketuart') ? 'has-error' : null ?>">
                        <label>Nama Ketua RT *</label>
                        <select name="ketuart" class="form-control">
                            <option value="" selected="selected">- Pilih Ketua RT -</option>
                            <?php foreach($ketuart->result() as $key => $rt) {?>
                              <option value="<?=$rt->idUser?>" <?=set_value('ketuart') == $rt->idUser ? "selected" : null?>><?=$rt->nama?>
                              </option>
                            <?php }?>
                        </select>
                        <?=form_error('ketuart')?>
                    </div>
                    <div class="form-group <?=form_error('keterangan') ? 'has-error' : null ?>">
                        <label>Keterangan</label>
                        <textarea style="resize:none" name="keterangan" class="form-control" rows="3" ><?=set_value('keterangan')?></textarea>
                        <?=form_error('keterangan')?>
                    </div>
                    <div class="form-group <?=form_error('ttdRT') ? 'has-error' : null ?>">
                        <label>Tanda Tangan RT *</label>
                        <input type="file" name="ttdRT" value="<?=set_value('ttdRT')?>" class="form-control"  required accept=".png">
                        <?=form_error('ttdRT')?>
                    </div>
                    <div class="form-group <?=form_error('capRT') ? 'has-error' : null ?>">
                        <label>Cap RT *</label>
                        <input type="file" name="capRT" value="<?=set_value('capRT')?>" class="form-control"  required accept=".png">
                        <?=form_error('capRT')?>
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