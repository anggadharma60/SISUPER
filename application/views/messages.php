<!-- penggunaan if jika ada yg gunain -->
<?php if ($this->session->has_userdata('danger')) { ?>

<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-check"></i> <?=$this->session->flashdata('danger');?>
</div>
<?php } ?>

<?php if ($this->session->has_userdata('success')) { ?>
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-check"></i> <?=$this->session->flashdata('success');?>
</div>
<?php } ?>

<?php if ($this->session->has_userdata('info')) { ?>
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-check"></i> <?=$this->session->flashdata('info');?>
</div>
<?php } ?>

<?php if ($this->session->has_userdata('primary')) { ?>
<div class="alert alert-primary alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-check"></i> <?=$this->session->flashdata('primary');?>
</div>
<?php } ?>

<?php if ($this->session->has_userdata('error')) { ?>
    <div class="alert alert-error alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-ban"></i> <?=strip_tags(str_replace('</P>', '', $this->session->flashdata('error')));?>
    </div>

<?php } ?>
