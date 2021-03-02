<section class="content-header">
    <h1>
        Kelola Data RW
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('Admin/getRW') ?>"><i class="fa fa-bank"></i></a></li>
        <li class="active">RW</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data RW</h3>
            <?php if (
                $this->fungsi->user_login()->level == 1 ||
                $this->fungsi->user_login()->level == 2 ||
                $this->fungsi->user_login()->level == 3
            ) { ?>
                <div class="pull-right">
                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                        <a href="<?= site_url('Admin/addRW') ?>" class="btn btn-primary btn-flat">
                            <i class="fa fa-user-plus"></i> Create
                        </a>
                    <?php  } ?>
                </div>
            <?php  } ?>
        </div>
        <div class="box-body table-responsive">
            <!-- id="table1" buat searching pagination dan row -->
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RW</th>
                        <th>TTD RW</th>
                        <th>Cap RW</th>
                        <th>Nama RW</th>
                        <th>Keterangan RW</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($rw->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $data->idRW ?></td>
                            <td><?= $data->namaRW ?></td>
                            <td><?php if ($data->ttdRW != null) { ?>
                                    <img src="<?= base_url('assets_sisuper/ttd/' . $data->ttdRW) ?>" style="width:100px">
                                <?php }else{ ?>
                                    <?=$data->ttdRW?>
                                <?php } ?>
                            </td>
                            <td><?php if ($data->capRW != null) { ?>
                                    <img src="<?= base_url('assets_sisuper/cap/' . $data->capRW) ?>" style="width:100px">
                                <?php }else{ ?>
                                    <?=$data->capRW?>
                                <?php } ?>
                            </td>
                            <td><?= $data->nama ?></td>
                            <td><?= $data->keteranganRW ?></td>
                            <td class="text-center" width="10%">
                                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                    <form action="<?= site_url('Admin/deleteRW') ?>" method="post">
                                        <a href="<?= site_url('Admin/editRW/' . $data->idRW) ?>" class="btn btn-primary btn-xs">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <input type="hidden" name="idRW" value="<?= $data->idRW ?>">
                                        <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                <?php } ?>
                                <?php if ($this->fungsi->user_login()->level == 2) { ?>
                                    <form action="<?= site_url('RW/deleteRW') ?>" method="post">
                                        <a href="<?= site_url('Ondesk/editWitel/' . $data->idRW) ?>" class="btn btn-primary btn-xs disabled" disabled>
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <input type="hidden" name="idRW" value="<?= $data->idRW ?>">
                                        <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>RW</th>
                        <th>TTD RW</th>
                        <th>Cap RW</th>
                        <th>Nama RW</th>
                        <th>Keterangan RW</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</section>