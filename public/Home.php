<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function __construct()
	{
		// helper('form');
	}
	public function index()
	{
		$data = [
			'title' => 'Dashboard ',
			'isi' => 'dashboard',
		];
		echo view('Layout/v_wrapper', $data);
	}

	// admin & Petugas
	// Admin - Pengaduan
	public function balas_pengaduan()
	{
		$data = [
			'title' => 'Balas Pengaduan ',
			'isi' => 'admin/pengaduan/balas_pengaduan',
		];
		echo view('Layout/v_wrapper', $data);
	}
	public function cetak_pengaduan()
	{
		$data = [
			'title' => 'Detail Pengaduan ',
			'isi' => 'admin/pengaduan/cetak_pengaduan',
		];
		echo view('Layout/v_wrapper', $data);
	}
	public function daftar_pengaduan()
	{
		$data = [
			'title' => 'Daftar Pengaduan ',
			'isi' => 'admin/pengaduan/daftar_pengaduan',
		];
		echo view('Layout/v_wrapper', $data);
	}
	public function detail_pengaduan()
	{
		$data = [
			'title' => 'Detail Pengaduan ',
			'isi' => 'admin/pengaduan/detail_pengaduan',
		];
		echo view('Layout/v_wrapper', $data);
	}
	public function pesan_pengaduan_baru()
	{
		$data = [
			'title' => 'Daftar Pesan Pengaduan Baru ',
			'isi' => 'admin/pengaduan/pesan_pengaduan_baru',
		];
		echo view('Layout/v_wrapper', $data);
	}
	// Admin - masyarakat
	public function daftar_masyarakat()
	{
		$data = [
			'title' => 'Daftar Masyarakat ',
			'isi' => 'admin/masyarakat/index',
		];
		echo view('Layout/v_wrapper', $data);
	}
	public function cetak_masyarakat()
	{
		$data = [
			'title' => 'Cetak Daftar Masyarakat ',
			'isi' => 'admin/masyarakat/cetak',
		];
		echo view('Layout/v_wrapper', $data);
	}
	// Admin - Petugas
	public function daftar_petugas()
	{
		$data = [
			'title' => 'Daftar Petugas ',
			'isi' => 'admin/petugas/index',
		];
		echo view('Layout/v_wrapper', $data);
	}
	public function akun_petugas()
	{
		$data = [
			'title' => 'Akun Petugas ',
			'isi' => 'admin/petugas/index',
		];
		echo view('Layout/v_wrapper', $data);
	}
	public function add_petugas()
	{
		$data = [
			'title' => 'Tambah Akun Petugas ',
			'isi' => 'admin/petugas/add_petugas',
		];
		echo view('Layout/v_wrapper', $data);
	}
	public function ubah_petugas()
	{
		$data = [
			'title' => 'Ubah Petugas ',
			'isi' => 'admin/petugas/ubah_akun_petugas',
		];
		echo view('Layout/v_wrapper', $data);
	}
	public function detail_petugas()
	{
		$data = [
			'title' => 'Detail Petugas ',
			'isi' => 'admin/petugas/detail_petugas',
		];
		echo view('Layout/v_wrapper', $data);
	}





	//User 
}
