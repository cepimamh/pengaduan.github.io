<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Dashboard


// DEFAULT DASHBOARD
$routes->get('/', 'Dashboard::index',);
// END


// ADMIN
// $routes->get('/', 'Admin::index', ['filter' => 'role:admin']);
// $routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/pesan_pengaduan_baru', 'Admin::pesan_pengaduan_baru', ['filter' => 'role:admin']);
$routes->get('/admin/balas_pengaduan', 'Admin::balas_pengaduan', ['filter' => 'role:admin']);
$routes->get('/admin/simpan_balasan', 'Admin::simpan_balasan', ['filter' => 'role:admin']);
$routes->get('/admin/cetak_pengaduan', 'Admin::cetak_pengaduan', ['filter' => 'role:admin']);
$routes->get('/admin/daftar_pengaduan', 'Admin::daftar_pengaduan', ['filter' => 'role:admin']);
$routes->get('/admin/cetak_bukti_tanggapan', 'Admin::cetak_bukti_tanggapan', ['filter' => 'role:admin']);
$routes->get('/admin/detail_pengaduan', 'Admin::detail_pengaduan', ['filter' => 'role:admin']);
$routes->get('/admin/hapus_pengaduan', 'Admin::hapus_pengaduan', ['filter' => 'role:admin']);

$routes->get('/admin/daftar_petugas', 'Admin::daftar_petugas', ['filter' => 'role:admin']);
$routes->get('/admin/akun_petugas', 'Admin::akun_petugas', ['filter' => 'role:admin']);
$routes->get('/admin/add_petugas', 'Admin::add_petugas', ['filter' => 'role:admin']);
$routes->get('/admin/save_akun', 'Admin::save_akun', ['filter' => 'role:admin']);
$routes->get('/admin/ubah_petugas', 'Admin::ubah_petugas', ['filter' => 'role:admin']);
$routes->get('/admin/ubah_akun', 'Admin::ubah_akun', ['filter' => 'role:admin']);
$routes->get('/admin/detail_petugas', 'Admin::detail_petugas', ['filter' => 'role:admin']);
$routes->get('/admin/delete_akun_petugas', 'Admin::delete_akun_petugas', ['filter' => 'role:admin']);

$routes->get('/admin/daftar_masyarakat', 'Admin::daftar_masyarakat', ['filter' => 'role:admin']);
$routes->get('/admin/cetak_masyarakat', 'Admin::cetak_masyarakat', ['filter' => 'role:admin']);
$routes->get('/admin/detail_masyarakat', 'Admin::detail_masyarakat', ['filter' => 'role:admin']);
$routes->get('/admin/delete_masyarakat', 'Admin::delete_masyarakat', ['filter' => 'role:admin']);
// END ADMIN
// ADMIN
// $routes->get('/', 'Admin::index', ['filter' => 'role:admin']);
// $routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/Admin/pesan_pengaduan_baru', 'Admin::pesan_pengaduan_baru', ['filter' => 'role:admin']);
$routes->get('/Admin/balas_pengaduan', 'Admin::balas_pengaduan', ['filter' => 'role:admin']);
$routes->get('/Admin/simpan_balasan', 'Admin::simpan_balasan', ['filter' => 'role:admin']);
$routes->get('/Admin/cetak_pengaduan', 'Admin::cetak_pengaduan', ['filter' => 'role:admin']);
$routes->get('/Admin/daftar_pengaduan', 'Admin::daftar_pengaduan', ['filter' => 'role:admin']);
$routes->get('/Admin/cetak_bukti_tanggapan', 'Admin::cetak_bukti_tanggapan', ['filter' => 'role:admin']);
$routes->get('/Admin/detail_pengaduan', 'Admin::detail_pengaduan', ['filter' => 'role:admin']);
$routes->get('/Admin/hapus_pengaduan', 'Admin::hapus_pengaduan', ['filter' => 'role:admin']);

$routes->get('/Admin/daftar_petugas', 'Admin::daftar_petugas', ['filter' => 'role:admin']);
$routes->get('/Admin/akun_petugas', 'Admin::akun_petugas', ['filter' => 'role:admin']);
$routes->get('/Admin/add_petugas', 'Admin::add_petugas', ['filter' => 'role:admin']);
$routes->get('/Admin/save_akun', 'Admin::save_akun', ['filter' => 'role:admin']);
$routes->get('/Admin/ubah_petugas', 'Admin::ubah_petugas', ['filter' => 'role:admin']);
$routes->get('/Admin/ubah_akun', 'Admin::ubah_akun', ['filter' => 'role:admin']);
$routes->get('/Admin/detail_petugas', 'Admin::detail_petugas', ['filter' => 'role:admin']);
$routes->get('/Admin/delete_akun_petugas', 'Admin::delete_akun_petugas', ['filter' => 'role:admin']);

$routes->get('/Admin/daftar_masyarakat', 'Admin::daftar_masyarakat', ['filter' => 'role:admin']);
$routes->get('/Admin/cetak_masyarakat', 'Admin::cetak_masyarakat', ['filter' => 'role:admin']);
$routes->get('/Admin/detail_masyarakat', 'Admin::detail_masyarakat', ['filter' => 'role:admin']);
$routes->get('/Admin/delete_masyarakat', 'Admin::delete_masyarakat', ['filter' => 'role:admin']);
// END ADMIN


// PETUGAS

// AKHIR PETUGAS



// USER
// $routes->get('/masyarakat', 'Masyarakat::index', ['filter' => 'role:user']);
$routes->get('/masyarakat/add_pengaduan', 'Masyarakat::add_pengaduan', ['filter' => 'role:user']);
$routes->get('/masyarakat/create_pengaduan', 'Masyarakat::create_pengaduan', ['filter' => 'role:user']);
$routes->get('/masyarakat/ubah', 'Masyarakat::ubah', ['filter' => 'role:user']);
$routes->get('/masyarakat/update', 'Masyarakat::update', ['filter' => 'role:user']);
$routes->get('/masyarakat/delete', 'Masyarakat::delete', ['filter' => 'role:user']);
$routes->get('/masyarakat/daftar_pengaduan', 'Masyarakat::daftar_pengaduan', ['filter' => 'role:user']);
$routes->get('/masyarakat/lihat_tanggapan', 'Masyarakat::lihat_tanggapan', ['filter' => 'role:user']);
$routes->get('/masyarakat/akun', 'Masyarakat::akun', ['filter' => 'role:user']);
$routes->get('/masyarakat/ubah_akun', 'Masyarakat::ubah_akun', ['filter' => 'role:user']);
$routes->get('/masyarakat/update_akun', 'Masyarakat::update_akun', ['filter' => 'role:user']);
$routes->get('/masyarakat/print_daftar', 'Masyarakat::print_daftar', ['filter' => 'role:user']);

// END USER
// // USER
// $routes->get('/masyarakat', 'Masyarakat::index', ['filter' => 'role:user']);
$routes->get('/Masyarakat/add_pengaduan', 'Masyarakat::add_pengaduan', ['filter' => 'role:user']);
$routes->get('/Masyarakat/create_pengaduan', 'Masyarakat::create_pengaduan', ['filter' => 'role:user']);
$routes->get('/Masyarakat/ubah', 'Masyarakat::ubah', ['filter' => 'role:user']);
$routes->get('/Masyarakat/update', 'Masyarakat::update', ['filter' => 'role:user']);
$routes->get('/Masyarakat/delete', 'Masyarakat::delete', ['filter' => 'role:user']);
$routes->get('/Masyarakat/daftar_pengaduan', 'Masyarakat::daftar_pengaduan', ['filter' => 'role:user']);
$routes->get('/Masyarakat/lihat_tanggapan', 'Masyarakat::lihat_tanggapan', ['filter' => 'role:user']);
$routes->get('/Masyarakat/akun', 'Masyarakat::akun', ['filter' => 'role:user']);
$routes->get('/Masyarakat/ubah_akun', 'Masyarakat::ubah_akun', ['filter' => 'role:user']);
$routes->get('/Masyarakat/update_akun', 'Masyarakat::update_akun', ['filter' => 'role:user']);
$routes->get('/Masyarakat/print_daftar', 'Masyarakat::print_daftar', ['filter' => 'role:user']);

// END USER


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
