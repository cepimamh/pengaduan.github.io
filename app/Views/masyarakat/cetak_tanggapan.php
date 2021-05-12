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
            <div><p class="h1 text-center">Bukti Tanggapan Pengaduan <?=$tanggapan['subjek_pengaduan'] ?></p></div>
            <hr>
            
        
        <div class="row my-3">
            <label class="card-title mb-2">Balasan</label> <br>
            <div class="col-md-12">
                <table>
                    <tr>
                        <td><label >Tanggal Balasan</td>
                        <td> : </td>
                        <td><?=$tanggapan['tgl_tanggapan'] ?></td>
                    </tr>
                    <tr>
                        <td width="200px"><label >Petugas</label></td>
                        <td width="50px"> : </td>
                        <td><?=$tanggapan['pengirim'] ?></td>
                    </tr>
                    <tr>
                        <td><label >Status</label></td>
                        <td> : </td>
                        <td><?=$tanggapan['statuss'] ?></td>
                    </tr>
                </table>
                <hr>
                <label >
                    Tanggapan
                </label>
                <textarea class="form-control form-control-lg" rows="10" readonly style="background: transparent; border: 0px;text-align: justify;"><?=$tanggapan['tanggapan'] ?></textarea>
            </div>
        </div>
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