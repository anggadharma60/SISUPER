<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISUPER | Sudah Pernah</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'bower_components/bootstrap/dist/css/bootstrap.min.css' ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'bower_components/font-awesome/css/font-awesome.min.css' ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'bower_components/Ionicons/css/ionicons.min.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'dist/css/AdminLTE.min.css' ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'plugins/iCheck/square/blue.css' ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- <?php print_r($test) ?> -->

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>SISUPER</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Silakan Masukkan Data</p>
      
      <a href="<?= site_url('Home/belumPernah')?>"></a>
      <?php $this->view('messages') ?>
      <form action="#" method="post">
        <div class="form-group has-feedback <?= form_error('nomor') ? 'has-error' : null ?>">
        <label>Nomor Surat *</label>
          <input id="nomor" name="nomor" value="<?= $nomorSurat ?>" class="form-control" readonly>
          <span class="form-control-feedback"></span>
          <small id="notif2" style="color:red">*Harap Ingat Nomor Surat Karena Untuk Pengecekkan<a href="<?= site_url('Home/cekSurat')?>"> Cek Surat</a></small>
          <?= form_error('nomor') ?>
        </div>
        <div class="form-group has-feedback <?= form_error('NIK') ? 'has-error' : null ?>">
        <label>Nomor Induk Kependudukan *</label>
          <input id="NIK" name="NIK" value="" class="form-control" placeholder="Nomor Induk Kependudukan" minlength="16" maxlength="16" pattern=".{16}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
          <span id="true" class="form-control-feedback glyphicon glyphicon-ok hide" style="color:green"></span>
          <span id="false" class="form-control-feedback glyphicon glyphicon-remove hide" style="color:red"></span>
          <small id="notif" class="hide" style="color:red">Apabila NIK belum terdaftar kunjungi halaman  <a href="<?= site_url('Home/belumPernah')?>">Belum Pernah</a></small>
          <?= form_error('NIK') ?>
        </div>
        <div class="form-group has-feedback <?= form_error('keperluan') ? 'has-error' : null ?>">
        <label>Keperluan *</label>
          <textarea id="keperluan" name="keperluan" class="form-control" rows="3" placeholder="Keperluan" style="resize:none"><?= set_value('keperluan') ?></textarea>
          <span class="form-control-feedback"></span>
          <?= form_error('keperluan') ?>
        </div>
        <div class="form-group has-feedback <?= form_error('keperluan') ? 'has-error' : null ?>">
        <label>Keterangan *</label>
          <textarea id="keterangan" name="keterangan" class="form-control" rows="3" placeholder="Keterangan" style="resize:none"></textarea>
          <span class="form-control-feedback"></span>
          <?= form_error('keterangan') ?>
        </div>
        <!-- <div class="form-group has-feedback">
        <input id="password" name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div> -->
        <div class="row">
          <div class="col-xs-4">
            <button type="button" class="btn btn-primary btn-block btn-flat" onclick="goBack()">Back</button>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">

          </div>
          <div class="col-xs-4">
            <button name="btnlogin" type="submit" class="btn btn-primary btn-block btn-flat">Mohon</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('assets_adminlte/').'bower_components/jquery/dist/jquery.min.js'?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('assets_adminlte/').'bower_components/bootstrap/dist/js/bootstrap.min.js'?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('assets_adminlte/').'plugins/iCheck/icheck.min.js'?>"></script>
  <!-- <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script> -->
  <script>
    function goBack() {
      window.location.href = '<?php echo base_url() ?>';
    }
  </script>
  <script>
    $(document).ready(function() {
      
      $('#NIK').keyup(function() {
        var nik = $('#NIK').val().trim();
        // console.log(nik)
        if (nik != '' && nik.length == 16) {
          $.ajax({
            url: "<?php echo base_url(); ?>Home/checkNIKterdaftar/"+nik,
            method: "POST",
            data: {
              nik: nik
            },
            success: function(data) {
              // console.log(data);
              if (data== 'true'){
                $('#NIK').css('border', '2px green solid');
                $('#false').addClass("hide");
                $('#notif').addClass('hide');
                $('#true').removeClass("hide");
               
              }else{
                $('#NIK').css('border', '2px red solid');
                $('#true').addClass("hide");
                $('#notif').removeClass('hide');
                $('#false').removeClass("hide");

              }
              
            }
          });
        }
      });
    });
  </script>
</body>

</html>