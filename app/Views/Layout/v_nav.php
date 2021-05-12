<!-- Navbar Admin -->
<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?= base_url() ?>/template/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><?= user()->username ?></a>
        </div>
    </div>
    <!-- Admin -->
    <?php if (in_groups('admin')) : ?>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="<?= base_url('/'); ?>" class="nav-link active">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Admin/pesan_pengaduan_baru'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Pesan Pengaduan

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?= base_url('Admin/daftar_pengaduan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Daftar Pengaduan

                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="<?= base_url('Admin/daftar_masyarakat'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Daftar Masyarakat

                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="<?= base_url('Admin/daftar_petugas'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Daftar Petugas

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?= base_url('Admin/akun_petugas'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Akun Saya

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?= base_url('logout') ?>" class="nav-link nav-keluar">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Keluar

                        </p>
                    </a>

                </li>
            </ul>
        </nav>
    <?php endif; ?>
    <!-- Navbar Petugas -->
<?php if (in_groups('petugas')) : ?>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview  ">
                    <a href="<?= base_url('/'); ?>" class="nav-link active">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?= base_url('Petugas/daftar_pengaduan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Daftar Pengaduan

                        </p>
                    </a>

                </li>
          

                <li class="nav-item has-treeview">
                    <a href="<?= base_url('Petugas/akun'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Akun Saya

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?= base_url('logout') ?>" class="nav-link nav-keluar">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Keluar

                        </p>
                    </a>

                </li>
            </ul>
        </nav>
    <?php endif; ?>
    <!-- Sidebar Menu -->
    <?php if (in_groups('user')) : ?>

        <!--Navbar Masyarakat/Pengguna  -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview ">
                    <a href="<?= base_url('/'); ?>" class="nav-link active">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('masyarakat/add_pengaduan'); ?>" class="nav-link ">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Buat Pengaduan

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?= base_url('masyarakat/daftar_pengaduan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Daftar Pengaduan

                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview">
                    <a href="<?= base_url('masyarakat/akun'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Akun Saya

                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="<?= base_url('logout') ?>" class="nav-link nav-keluar">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Keluar

                        </p>
                    </a>

                </li>
            </ul>
        </nav>
    <?php endif; ?>
</div>
<!-- Akhir Navbar Masyarakat/pengguna -->
<!-- /.sidebar-menu -->

<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- <div class="row"> -->




            <!-- Akhir Navbar Admin -->