<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?= $title; ?></title>
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <!-- summernote -->
        <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/summernote/summernote-bs4.css">
        <!-- SweetAllert2 -->
        <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="container">
            <div><p class="h1 text-center">Bukti Tanggapan</p></div>
            <hr>
            <div class="row my-3">
                <div class="col-md-12">
                    <table>
                        <tr>
                            <td width="200px"><label >Pengirim</label></td>
                            <td width="50px"> : </td>
                            <td><?=$detail['nama'] ?></td>
                        </tr>
                        <tr>
                            <td><label >Tanggal Pengaduan</label></td>
                            <td> : </td>
                            <td><?=$detail['tgl_pengaduan'] ?></td>
                        </tr>
                        <tr>
                            <td><label >Subject Pengaduan</label></td>
                            <td> : </td>
                            <td><?=$detail['subjek_pengaduan'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr>
            <div class="row">
                <label class="card-title mb-2">Pengaduan</label>
                <div class="col-md-12">
                <label >Isi Pengaduan &nbsp; :</label >
                <textarea class="form-control form-control-lg" rows="6" readonly style="background: transparent; border: 0px"><?=$detail['isi_laporan'] ?></textarea>
            </div>
        </div>
        <div class="row my-3">
            <label class="card-title mb-2">Balasan</label> <br>
            <div class="col-md-12">
                <table>
                    <tr>
                        <td><label >Tanggal Balasan</label></td>
                        <td> : </td>
                        <td><?=$detail['tgl_tanggapan'] ?></td>
                    </tr>
                    <tr>
                        <td width="200px"><label >Petugas</label></td>
                        <td width="50px"> : </td>
                        <td><?=$detail['pengirim'] ?></td>
                    </tr>
                    <tr>
                        <td><label >Status</label></td>
                        <td> : </td>
                        <td><?=$detail['statuss'] ?></td>
                    </tr>
                </table>
                <hr>
                <label >
                    Tanggapan &nbsp; :
                </label>
                <textarea class="form-control form-control-lg" rows="6" readonly style="background: transparent; border: 0px"><?=$detail['tanggapan'] ?></textarea>
            </div>
        </div>
    </div>
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?= base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url() ?>/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="<?= base_url() ?>/template/dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url() ?>/template/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="<?= base_url() ?>/template/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="<?= base_url() ?>/template/plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url() ?>/template/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() ?>/template/plugins/chart.js/Chart.min.js"></script>
    <!-- PAGE SCRIPTS -->
    <script src="<?= base_url() ?>/template/dist/js/pages/dashboard2.js"></script>
    <!-- SweetAllert2 -->
    <script src="<?= base_url() ?>/template/plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>
</body>
</html>