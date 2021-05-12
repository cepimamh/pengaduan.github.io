
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
    <div><p class="h1 text-center">Daftar Pengaduan</p></div>
    <hr class="mt-0">
    <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Subjek Pengaduan</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Pengirim</th>
                    <th>Tanggal Balas</th>
                    <th>Status</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($data as $key => $value) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['subjek_pengaduan'] ?></td>
                        <td><?= $value['tgl_pengaduan'] ?></td>
                        <td><?= $value['nama'] ?></td>
                        <td><?= $value['tgl_tanggapan'] ?></td>
                        <td ><?= $value['statuss'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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