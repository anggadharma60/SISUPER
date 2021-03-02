<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISUPER | Belum Pernah</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'dist/css/skins/_all-skins.min.css' ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'bower_components/morris.js/morris.css' ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'bower_components/jvectormap/jquery-jvectormap.css' ?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'bower_components/bootstrap-daterangepicker/daterangepicker.css' ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'bower_components/bootstrap/dist/css/bootstrap.min.css' ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'bower_components/font-awesome/css/font-awesome.min.css' ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'bower_components/Ionicons/css/ionicons.min.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'dist/css/AdminLTE.min.css' ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'plugins/iCheck/square/blue.css' ?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets_adminlte/') . 'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>SISUPER</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Silakan Masukkan Data</p>
      <?php $this->view('messages') ?>
      <form action="#" method="post">
        <div class="form-group has-feedback <?= form_error('nomor') ? 'has-error' : null ?>">
        <label>Nomor Surat *</label>
          <input id="nomor" name="nomor" value="<?= $nomorSurat ?>" class="form-control" readonly>
          <span class="form-control-feedback"></span>
          <small id="notif" style="color:red">*Harap Ingat Nomor Surat Karena Untuk Pengecekkan<a href="<?= site_url('Home/cekSurat')?>"> Cek Surat</a></small>
          <?= form_error('nomor') ?>
        </div>
        <div class="form-group has-feedback <?= form_error('nama') ? 'has-error' : null ?>">
          <label>Nama *</label>
          <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control" placeholder="Nama">
          <?= form_error('nama') ?>
        </div>
        <div class="form-group has-feedback <?= form_error('NIK') ? 'has-error' : null ?>">
          <label>NIK *</label>
          <input type="text" placeholder="Nomor Induk Kependudukan" name="NIK" value="<?= set_value('NIK') ?>" class="form-control" minlength="16" maxlength="16" pattern=".{16}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
          <?= form_error('NIK') ?>
        </div>
        <div class="form-group has-feedback  <?= form_error('jenisKelamin') ? 'has-error' : null ?>">
          <label>Jenis Kelamin *</label>
          <select name="jenisKelamin" class="form-control">
            <option value="">- Pilih -</option>
            <option value="L" <?= set_value('jenisKelamin') == "L" ? "selected" : null ?>>Laki-Laki</option>
            <option value="P" <?= set_value('jenisKelamin') == "P" ? "selected" : null ?>>Perempuan</option>
          </select>
          <?= form_error('jenisKelamin') ?>
        </div>
        <div class="form-group has-feedback  <?= form_error('tempatLahir') ? 'has-error' : null ?>">
          <label>Tempat Lahir *</label>
          <input type="text" name="tempatLahir" value="<?= set_value('tempatLahir') ?>" class="form-control" placeholder="Nama Kota">
          <?= form_error('tempatLahir') ?>
        </div>
        <div class="form-group has-feedback <?= form_error('tanggalLahir') ? 'has-error' : null ?>">
          <label>Tanggal Lahir *</label>
          <div class="input-group input-daterange">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="tanggalLahir" id="tanggalLahir" class="form-control pull-right" value="<?= set_value('tanggalLahir') ?>" readonly="" />
          </div>
          <?= form_error('tanggalLahir') ?>
        </div>
        <div class="form-group has-feedback <?= form_error('kewarganegaraan') ? 'has-error' : null ?>">
          <label>Kewarganegaraan *</label>
          <select name="kewarganegaraan" class="form-control">
            <option value="">- Pilih -</option>
            <option value="WNI" <?= set_value('kewarganegaraan') == "WNI" ? "selected" : null ?>>WNI</option>
            <option value="WNA" <?= set_value('kewarganegaraan') == "WNA" ? "selected" : null ?>>WNA</option>
          </select>
          <?= form_error('kewarganegaraan') ?>
        </div>
        <div class="form-group has-feedback <?= form_error('agama') ? 'has-error' : null ?>">
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
        <div class="form-group has-feedback <?= form_error('status') ? 'has-error' : null ?>">
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
        <div class="form-group has-feedback <?= form_error('pendidikan') ? 'has-error' : null ?>">
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
        <div class="form-group has-feedback <?= form_error('pekerjaan') ? 'has-error' : null ?>">
          <label>Pekerjaan *</label>
          <input type="text" name="pekerjaan" value="<?= set_value('pekerjaan') ?>" class="form-control" placeholder="Pekerjaan">
          <?= form_error('pekerjaan') ?>
        </div>
        <div class="form-group has-feedback <?= form_error('alamat') ? 'has-error' : null ?>">
          <label>Alamat *</label>
          <textarea style="resize:none" name="alamat" class="form-control" rows="3" placeholder="Alamat"><?= set_value('alamat') ?></textarea>
          <?= form_error('alamat') ?>
        </div>
        <div class="form-group has-feedback <?= form_error('namaRW') ? 'has-error' : null ?>">
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
        <div class="form-group has-feedback <?= form_error('namaRT') ? 'has-error' : null ?>">
          <label>Nama RT *</label>
          <select id="namaRT" name="namaRT" class="form-control">
            <option value="" selected="selected">- Pilih Nama RT -</option>
          </select>
          <?= form_error('namaRT') ?>
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
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/jquery/dist/jquery.min.js' ?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/jquery-ui/jquery-ui.min.js' ?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/bootstrap/dist/js/bootstrap.min.js' ?>"></script>
  <!-- Morris.js charts -->
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/raphael/raphael.min.js' ?>"></script>
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/morris.js/morris.min.js' ?>"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js' ?>"></script>
  <!-- jvectormap -->
  <script src="<?php echo base_url('assets_adminlte/') . 'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js' ?>"></script>
  <script src="<?php echo base_url('assets_adminlte/') . 'plugins/jvectormap/jquery-jvectormap-world-mill-en.js' ?>"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/jquery-knob/dist/jquery.knob.min.js' ?>"></script>

  <!-- daterangepicker -->
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/moment/min/moment.min.js' ?>"></script>
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/bootstrap-daterangepicker/daterangepicker.js' ?>"></script>
  <!-- datepicker -->
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' ?>"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo base_url('assets_adminlte/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?php echo base_url('assets_adminlte/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('assets_adminlte/') ?>bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets_adminlte/') ?>dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo base_url('assets_adminlte/') ?>dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url('assets_adminlte/') ?>dist/js/demo.js"></script>
  <!-- Datatables -->
  <script src="<?= base_url() ?>assets_adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets_adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_adminlte/datatables/lib/css/dataTables.bootstrap.min.css') ?>">
  <!-- jQuery 3 -->
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/jquery/dist/jquery.min.js' ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/bootstrap/dist/js/bootstrap.min.js' ?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('assets_adminlte/') . 'plugins/iCheck/icheck.min.js' ?>"></script>
  <!-- daterangepicker -->
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/moment/min/moment.min.js' ?>"></script>
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/bootstrap-daterangepicker/daterangepicker.js' ?>"></script>
  <!-- datepicker -->
  <script src="<?php echo base_url('assets_adminlte/') . 'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' ?>"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
  <script>
    function goBack() {
      window.location.href = '<?php echo base_url() ?>';
    }
  </script>
  <script>
    $(document).ready(function() {

      $('.input-daterange').datepicker({
        todayBtn: 'linked',
        format: "dd-mm-yyyy",
        autoclose: true
      });
    });
  </script>
  <script>
    $('#namaRW').change(function() {
      var id = $('#namaRW').val();
      console.log(id);
      $.ajax({
        type: "get",
        url: '<?= base_url() ?>index.php/Home/getRTByRW/' + id,
        data: {
          id: id
        },
        dataType: "json",
        success: function(data) {
          var html = '<option value="" selected="selected">- Pilih Nama RT -</option>';
          var i;
          console.log(data);
          for (i = 0; i < data.length; i++) {
            html += '<option value=' + data[i].idRT + '>' + data[i].namaRT + '</option>';
          }
          $('#namaRT').html(html);
        }
      });
    });
  </script>
</body>

</html>