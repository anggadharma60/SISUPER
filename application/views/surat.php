<!DOCTYPE html>
<html>

<head>
    <title>SISUPER</title>
    <!-- Custom fonts for this template-->
    <!-- <link href="<?= base_url() ?>assets/font-awesome/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <!-- Page level plugin CSS-->
    <!-- <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->
    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin.css" rel="stylesheet">

</head>

<body style="margin: 3em 3em 3em 3em;">
    <!-- <?= print_r($detail) ?> -->
    <!-- <?= print_r($detailRT) ?>
    <?= print_r($detailRW) ?> -->
    <table cellpadding="0" cellspacing="0" style="width:466.1pt; border-collapse:collapse;">
        <tbody>
            <tr>
                <td style="width:92.2pt; border-bottom-style:double; border-bottom-width:4.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><img src="<?= base_url('assets_sisuper/') . 'ori.png' ?>" alt="" width="98" height="95"></p>
                </td>
                <td style="width:352.3pt; border-bottom-style:double; border-bottom-width:4.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:115%; font-size:28pt;"><strong><span style="font-family:'Arial Black';">KOTA SEMARANG</span></strong></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><strong><span style="font-family:'Arial Black';">KECAMATAN : GUNUNG PATI</span><strong></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><strong><span style="font-family:'Arial Black';">KELURAHAN : SEKARAN</span></strong></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Arial Black';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span<strong><span style="font-family:'Arial Black';">RT.<?= $detailRT->namaRT ?> / RW.<?= $detailRW->namaRW ?></span></strong></p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
    <table cellpadding="0" cellspacing="0" style="width:465.3pt; border-collapse:collapse;">
        <tbody>
            <tr style="height:111.75pt;">
                <td style="width:51.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">Nomor&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">Lampiran&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">Hal&nbsp;</span></p>
                </td>
                <td style="width:223.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">: <?= $detail->nomorSurat ?></span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">: -</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">: -</span></p>
                </td>
                <td style="width:158.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">Semarang, <?= $tanggalNow ?></span></p>
                    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">Kepada Yth.</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">Kepala Kelurahan Sekaran</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">Kecamatan Gunung Pati</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">di</span></p>
                    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><u><span style="font-family:'Times New Roman';">SEMARANG</span></u></p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="margin-top:0pt; margin-left:72pt; margin-bottom:10pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">Bersama ini menerangkan bahwa :</span></p>
    <table cellpadding="0" cellspacing="0" style="width:466.1pt; border-collapse:collapse;">
        <tbody>
            <tr>
                <td style="width:171.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <ol style="margin:0pt; padding-left:0pt;" type="1">
                        <li style="margin-left:32pt; line-height:115%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Nama</li>
                    </ol>
                </td>
                <td style="width:230.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">: <?= $detail->nama ?></span></p>
                </td>
                <td style="width:31.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;">
                        <?php if ($detail->jenisKelamin == 'L') { ?>
                            <span style="font-family:'Times New Roman';">L</span>
                            <span style="font-family:'Times New Roman';">/</span>
                            <span style="font-family:'Times New Roman';text-decoration:line-through;"> P</span>
                            <!-- <span style="font-family:'Times New Roman';"> ) </span> -->
                        <?php } ?>
                        <?php if ($detail->jenisKelamin == 'P') { ?>
                            <span style="font-family:'Times New Roman';text-decoration:line-through;">L</span>
                            <span style="font-family:'Times New Roman';">/</span>
                            <span style="font-family:'Times New Roman';">P</span>
                            <!-- <span style="font-family:'Times New Roman';"> ) </span> -->
                        <?php } ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:171.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <ol start="2" style="margin:0pt; padding-left:0pt;" type="1">
                        <li style="margin-left:32pt; line-height:115%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Tempat / Tgl.Lahir</li>
                    </ol>
                </td>
                <td colspan="2" style="width:272.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">: <?= $detail->tempatLahir ?> / <?= $tanggalLahir ?></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:171.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <ol start="3" style="margin:0pt; padding-left:0pt;" type="1">
                        <li style="margin-left:32pt; line-height:115%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Kewarganegaraan / Agama</li>
                    </ol>
                </td>
                <td colspan="2" style="width:272.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">: <?= $detail->kewarganegaraan ?> / <?= $detail->agama ?></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:171.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <ol start="4" style="margin:0pt; padding-left:0pt;" type="1">
                        <li style="margin-left:32pt; line-height:115%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Status</li>
                    </ol>
                </td>
                <td colspan="2" style="width:272.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;">
                        <span style="font-family:'Times New Roman';">:</span>
                        <?php if ($detail->status == "Belum Kawin") { ?>
                            <span style="font-family:'Times New Roman'; ">Belum Kawin</span>
                            <span style="font-family:'Times New Roman';"> / </span>
                            <span style="font-family:'Times New Roman'; text-decoration:line-through;">Kawin</span>
                            <span style="font-family:'Times New Roman';"> / </span>
                            <span style="font-family:'Times New Roman'; text-decoration:line-through;">Janda</span>
                            <span style="font-family:'Times New Roman';"> / </span>
                            <span style="font-family:'Times New Roman'; text-decoration:line-through;">Duda</span>
                        <?php } ?>
                        <?php if ($detail->status == "Kawin") { ?>
                            <span style="font-family:'Times New Roman'; text-decoration:line-through;">Belum Kawin</span>
                            <span style="font-family:'Times New Roman';"> / </span>
                            <span style="font-family:'Times New Roman'; ">Kawin</span>
                            <span style="font-family:'Times New Roman';"> / </span>
                            <span style="font-family:'Times New Roman'; text-decoration:line-through;">Janda</span>
                            <span style="font-family:'Times New Roman';"> / </span>
                            <span style="font-family:'Times New Roman'; text-decoration:line-through;">Duda</span>
                        <?php } ?>
                        <?php if ($detail->status == "Janda") { ?>
                            <span style="font-family:'Times New Roman'; text-decoration:line-through;">Belum Kawin</span>
                            <span style="font-family:'Times New Roman';"> / </span>
                            <span style="font-family:'Times New Roman'; text-decoration:line-through;">Kawin</span>
                            <span style="font-family:'Times New Roman';"> / </span>
                            <span style="font-family:'Times New Roman'; ">Janda</span>
                            <span style="font-family:'Times New Roman';"> / </span>
                            <span style="font-family:'Times New Roman'; text-decoration:line-through;">Duda</span>
                        <?php } ?>
                        <?php if ($detail->status == "Duda") { ?>
                            <span style="font-family:'Times New Roman'; text-decoration:line-through;">Belum Kawin</span>
                            <span style="font-family:'Times New Roman';"> / </span>
                            <span style="font-family:'Times New Roman'; text-decoration:line-through;">Kawin</span>
                            <span style="font-family:'Times New Roman';"> / </span>
                            <span style="font-family:'Times New Roman'; text-decoration:line-through;">Janda</span>
                            <span style="font-family:'Times New Roman';"> / </span>
                            <span style="font-family:'Times New Roman'; ">Duda</span>
                        <?php } ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:171.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <ol start="5" style="margin:0pt; padding-left:0pt;" type="1">
                        <li style="margin-left:32pt; line-height:115%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Pendidikan Terakhir</li>
                    </ol>
                </td>
                <td colspan="2" style="width:272.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">: <?= $detail->pendidikan ?> </span></p>
                </td>
            </tr>
            <tr>
                <td style="width:171.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <ol start="6" style="margin:0pt; padding-left:0pt;" type="1">
                        <li style="margin-left:32pt; line-height:115%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Pekerjaan</li>
                    </ol>
                </td>
                <td colspan="2" style="width:272.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">: <?= $detail->pekerjaan ?></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:171.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <ol start="7" style="margin:0pt; padding-left:0pt;" type="1">
                        <li style="margin-left:32pt; line-height:115%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Alamat</li>
                    </ol>
                </td>
                <td colspan="2" style="width:272.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">: <?= $detail->alamat ?></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:171.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <ol start="8" style="margin:0pt; padding-left:0pt;" type="1">
                        <li style="margin-left:32pt; line-height:115%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">No. NIK</li>
                    </ol>
                </td>
                <td colspan="2" style="width:272.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">: <?= $detail->NIK ?></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:171.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <ol start="9" style="margin:0pt; padding-left:0pt;" type="1">
                        <li style="margin-left:32pt; line-height:115%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Keperluan</li>
                    </ol>
                </td>
                <td colspan="2" style="width:272.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">: <?= $detail->keperluan ?></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:171.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <ol start="10" style="margin:0pt; padding-left:0pt;" type="1">
                        <li style="margin-left:36pt; line-height:115%; font-family:'Times New Roman'; font-size:12pt;">Keterangan lain-lain</li>
                    </ol>
                </td>
                <td colspan="2" style="width:272.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">: <?= $detail->keterangan ?></span></p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="margin-top:12pt; margin-left:72pt; margin-bottom:10pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">Demikian untuk menjadikan periksa dan guna seperlunya.</span></p>
    <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
        <tbody>
            <tr>
                <td style="width:228.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">Mengetahui</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">Ketua RW.<?= $detailRW->namaRW ?></span></p>
                    <div style="position: absolute; width: 50%; left: 340px;">
                        <div style="position: absolute; width:125px; height: 125px;left: -250px;top:0px;z-index:1;filter:contrast(150%)">
                            <img src="<?= base_url('assets_sisuper/ttd/') . $detailRW->ttdRW ?>" alt="ttdRW" width="100%" height="100%">
                        </div>
                        <div style="position: absolute; width: 100px; height: 100px;left: -290px;top:0px;z-index:2; filter:contrast(150%);">
                            <img src="<?= base_url('assets_sisuper/cap/') . $detailRW->capRW ?>" alt="stempelRW" width="230%" height="100%">
                        </div>
                    </div>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;"><u><span style="font-family:'Times New Roman';"><?= $detailRW->nama ?></span></u></p>
                </td>
                <td style="width:228.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">Ketua RT.<?= $detailRT->namaRT ?> / RW.<?= $detailRW->namaRW ?></span></p>
                    <div style="position: absolute; width: 50%; left: 340px;">
                        <div style="position: absolute;width:125px; height: 125px;left: 70px;top:0px;z-index:1;filter:contrast(200%)">
                            <img src="<?= base_url('assets_sisuper/ttd/') . $detailRT->ttdRT ?>" alt="ttdRT" width="100%" height="100%">
                        </div>
                        <div style="position: absolute; width: 100px; height: 100px;left: 20px;top:0px;z-index:2; filter:contrast(200%)">
                            <img src="<?= base_url('assets_sisuper/cap/') . $detailRT->capRT ?>" alt="stempelRT" width="230%" height="100%">
                        </div>
                    </div>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;">
                        <span style="font-family:'Times New Roman';">&nbsp;</span>
                    </p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;">
                        <span style="font-family:'Times New Roman';">&nbsp;</span>
                    </p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;">
                        <span style="font-family:'Times New Roman';">&nbsp;
                    </p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;">
                        <span style="font-family:'Times New Roman';">&nbsp;</span>
                    </p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;">
                        <span style="font-family:'Times New Roman';">&nbsp;</span>
                    </p>

                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;"><u>
                            <span style="font-family:'Times New Roman';"><?= $detailRT->nama ?></span></u>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:11pt;"><span style="font-family:Calibri;">&nbsp;</span></p>

</body>

</html>