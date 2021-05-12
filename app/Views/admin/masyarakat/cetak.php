<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $title; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div><p class="h1 text-center">Daftar Masyarakat</p></div>
        <hr>
        <div>
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($data as $key => $value) {?>
                    <tr>
                        
                        <td><?=$no++ ?></td>
                        <td><?=$value['nama'] ?></td>
                        <td><?=$value['nik'] ?></td>
                        <td><?=$value['email'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
        <!-- jQuery -->
        <script src="<?= base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
    </body>
</html>