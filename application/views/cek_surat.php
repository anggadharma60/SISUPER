<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISUPER | Cek Surat</title>
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
<!-- <?php print_r($status) ?> -->

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>SISUPER</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Silakan Masukkan Data</p>

      <a href="<?= site_url('Home/belumPernah') ?>"></a>
     
      <form action="#" method="post">
        <div class="form-group has-feedback <?= form_error('nomor') ? 'has-error' : null ?>">
          <label>Nomor Surat *</label>
          <input id="nomor" name="nomor" value="" class="form-control">
          <span class="form-control-feedback"></span>
          <span id="true" class="form-control-feedback glyphicon glyphicon-ok hide" style="color:green"></span>
          <span id="false" class="form-control-feedback glyphicon glyphicon-remove hide" style="color:red"></span>
          <small id="notif" class="hide" style="color:red">Silakan mengajukan permohonan surat pengantar terlebih dahulu <a href="<?= site_url('Home/sudahPernah') ?>">Sudah Pernah</a> atau <a href="<?= site_url('Home/belumPernah') ?>">Belum Pernah</a></small>
          <?= form_error('nomor') ?>
        </div>
        <div class="form-group has-feedback <?= form_error('validasiRT') ? 'has-error' : null ?>">
          <label>Validasi RT *</label>
          <input id="validasiRT" type="text" name="validasiRT" readonly value="" class="form-control">
          <?= form_error('validasiRT') ?>
        </div>
        <div class="form-group has-feedback <?= form_error('validasiRW') ? 'has-error' : null ?>">
          <label>Validasi RW *</label>
          <input id="validasiRW" type="text" name="validasiRW" readonly value="" class="form-control">
          <?= form_error('validasiRW') ?>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <button type="button" class="btn btn-primary btn-block btn-flat" onclick="goBack()">Back</button>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">

          </div>
          <div class="col-xs-4">
            <button name="btnlogin" type="submit" class="btn btn-primary btn-block btn-flat">Cek</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/jquery/dist/jquery.min.js' ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/bootstrap/dist/js/bootstrap.min.js' ?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('assets_adminlte/') . 'plugins/iCheck/icheck.min.js' ?>"></script>
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

      $('#nomor').keyup(function() {
        var nomor = $('#nomor').val().trim().toString();
        var temp = nomor.split('/');
        var res = temp[0] + '-' + temp[1] + '-' + temp[2];
        // var res = nomor.replace("/", " ");
        console.log(temp);
        console.log(res);
        if (nomor != '') {
          $.ajax({
            url: "<?php echo base_url(); ?>Home/checkNomorSurat/" + res,
            method: "POST",
            data: {
              nomor: res
            },
            success: function(data) {
              var test = JSON.parse(data);

              if (data == 'true') {
                $('#nomor').css('border', '2px green solid');
                $('#true').removeClass("hide");
                $('#false').addClass("hide");

                $('#notif').addClass('hide');


              } else {
                $('#nomor').css('border', '2px red solid');
                $('#true').addClass("hide");
                $('#false').removeClass("hide");
                $('#notif').removeClass('hide');




              }

            }
          });
        }
      });
    });
  </script>

  <script>
    $(document).ready(function() {

      $('#nomor').keyup(function() {
        var nomor = $('#nomor').val().trim().toString();
        var temp = nomor.split('/');
        var res = temp[0] + '-' + temp[1] + '-' + temp[2];


        if (nomor != '') {
          $.ajax({
            url: "<?php echo base_url(); ?>Home/checkStatusSurat/" + res,
            method: "POST",
            data: {
              nomor: res
            },
            success: function(data) {
              if (data != 'false') {
                var test = JSON.parse(data);
                $('#validasiRT').val(test.validasiRT);
                $('#validasiRW').val(test.validasiRW);
                console.log(test.validasiRT);
              }else{
                $('#validasiRT').val("");
                $('#validasiRW').val("");
              }

            }
          });
        }
      });
    });
  </script>
</body>

</html>