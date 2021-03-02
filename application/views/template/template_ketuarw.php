<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISUPER | Dashboard</title>
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
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets_adminlte/bower_components/select2/dist/css/select2.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url('Admin') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>SISP</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SISUPER</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- Notifications: style can be found in dropdown.less -->

            <!-- Tasks: style can be found in dropdown.less -->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <span class="hidden-xs"><?= $this->fungsi->user_login()->username ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url('assets_sisuper/test.png') ?>" class="img-circle" alt="User Image">

                  <p>
                    <?= $this->fungsi->user_login()->nama ?>
                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                      <small>Status: Admin</small>
                    <?php } ?>
                    <?php if ($this->fungsi->user_login()->level == 2) { ?>
                      <small>Status: Ketua RW</small>
                    <?php } ?>
                    <?php if ($this->fungsi->user_login()->level == 3) { ?>
                      <small>Status: Ketua RT</small>
                    <?php } ?>
                  </p>
                </li>


                <!-- Menu Footer-->
                <li class="user-footer">
                  <!-- <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div> -->
                  <div class="pull-right">
                    <a href="<?= site_url('Autentikasi/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">


          <li>
            <a href="<?php site_url('Admin') ?>">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              <span class="pull-right-container">

              </span>
            </a>
          </li>
          <?php if($this->fungsi->user_login()->level == 1) {?>
          <li class="treeview">
            <a href="<?php site_url('Admin/getUser') ?>">
              <i class="fa fa-database"></i>
              <span>Data Collection</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= site_url('Admin/getUser') ?>"><i class="fa fa-user"></i> Data Pengguna</a></li>
              <li><a href="<?= site_url('Admin/getRW') ?>"><i class="fa fa-bank"></i> Data RW</a></li>
              <li><a href="<?= site_url('Admin/getRT') ?>"><i class="fa fa-home"></i> Data RT</a></li>
              <li><a href="<?= site_url('Admin/getPenduduk') ?>"><i class="fa fa-users"></i> Data Penduduk</a></li>
            </ul>
          </li>
          <?php }?>
          <li>
            <a href="<?= site_url('Admin/getSurat') ?>">
              <i class="fa fa-envelope"></i> <span>Surat Pengantar</span>
              <span class="pull-right-container">

              </span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php echo $contents ?>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.18
      </div>
      <strong> 2021 <a href="https://sekaran.semarangkota.go.id/">SISUPER</a></strong>
    </footer>

    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg">

    </div>
  </div>
  <!-- ./wrapper -->

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
  <!-- Select2 -->
  <script src="<?= base_url() ?>assets_adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>


  <script>
    var tabel = null;

    $(document).ready(function() {

      tabel = $('#table1').DataTable({});

    });
  </script>

  <script>
    var tabel = null;

    $(document).ready(function() {

      tabel = $('#tablePenduduk').DataTable({
        "sScrollY": "35em", //scroll tambahan y
        "sScrollX": "100%", //scroll tambahan x
        "bScrollCollapse": true
      });

    });
  </script>

  <script>
    var ed = document.getElementById('nama');
    var updatetext = function() {
      ed.value = ('00' + ed.value).slice(-3);
    }

    ed.addEventListener("click", updatetext, false);
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
        url: '<?= base_url() ?>index.php/Admin/getRTByRW/' + id,
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