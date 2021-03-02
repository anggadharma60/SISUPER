<section class="content-header">
  <h1>
    Dashboard
    <!-- <small>Control Panel</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="col-lg-12">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-primary">
        <h3 class="widget-user-username"><center>Selamat Datang <strong><?= $this->fungsi->user_login()->nama ?></strong></center></h3>
        <h5 class="widget-user-desc"><center>Sistem Informasi Surat Pengantar</center></h5>
      </div>
      <!-- <div class="widget-user-image">
        < <img class="" src="<?php echo base_url() . 'assets/dist/img/siadampng.png' ?>" alt="User Avatar" style="border: 0px ">
      </div> -->
      <div class="card-footer">
        <br>
        <div class="">
          <div class="box-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header"></h5>
                  <span class="description-text"></span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">KELURAHAN SEKARAN</h5>
                  <span class="description-text">SEMARANG</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header"></h5>
                  <span class="description-text"></span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->
      </div>

    </div>
  </div>
</section>