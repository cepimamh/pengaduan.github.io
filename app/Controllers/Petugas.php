<?php

namespace App\Controllers;
use App\Models\AdminModel;
class Petugas extends BaseController
{
    public function __construct()
    {

        helper('form');
        helper('date');

        $this->AdminModel = new AdminModel();
    }
    public function daftar_pengaduan()
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('pengaduan.id_pengaduan, pengaduan.subjek_pengaduan, pengaduan.tgl_pengaduan,  pengaduan.statuss, users.nama, users.nik');
        $builder->join('pengaduan', 'pengaduan.nik = users.nik');
        $query = $builder->get();
        
        $data = [
            'title' => 'Daftar Pengaduan',
            'isi' => 'petugas/daftar_pengaduan',
            'pesan' => $query->getResultArray(),
        ];
        echo view('Layout/v_wrapper', $data);    
    }
     // BALAS PESAN PENGADUAN
    public function balas_pengaduan($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('pengaduan.id_pengaduan, pengaduan.subjek_pengaduan, pengaduan.tgl_pengaduan,pengaduan.isi_laporan, users.nama, users.nik');
        $builder->join('pengaduan', 'pengaduan.nik = users.nik');
        $builder->where('pengaduan.id_pengaduan', $id);
        $query = $builder->get();
        $data = [
            'title' => 'Balas Pengaduan ',
            'isi' => 'petugas/balas_pengaduan',
            'data' => $query->getRowArray(),
        ];
        echo view('Layout/v_wrapper', $data);
    // SAVE BALAS PENGADUAN
    }
    public function simpan_balasan()
    {
        $data = [
            'pengirim' => user()->nama,
            'tgl_tanggapan' => $this->request->getPost('tgl_tanggapan'),
            'tanggapan' => $this->request->getPost('tanggapan'),
            'id_pengaduan' => $this->request->getPost('id_pengaduan'),
        ];
        $this->AdminModel->insert_balasan($data);
        session()->setFlashdata('pesan', 'Balasan Berhasil Dikirim');
        return redirect()->to(base_url('petugas/daftar_pengaduan'));
    }
     public function akun()
    {
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, users.nama,  users.nik,  users.email,  users.username,  users.telp, auth_groups.name,');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('nik',user()->nik);
        $query = $builder->get();
    	$data = [
            'title' => 'Akun Saya',
            'isi' => 'petugas/akun_saya',
            'akun'=>$query->getRowArray(),
        ];
        echo view('Layout/v_wrapper', $data);
    
    }
    public function ubah_akun($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, users.nama,  users.nik,  users.email,  users.username,  users.telp, auth_groups.name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', $id);
        $query = $builder->get();
        $data = [
            'title' => 'Ubah Petugas ',
            'isi' => 'petugas/ubah_akun',
            'akun'=>$query->getRowArray(),
        ];
        echo view('Layout/v_wrapper', $data);
    }
     public function save_ubah_akun($id)
    {
      $data = [

            'nama' =>$this->request->getPost('nama') ,
            'nik' => $this->request->getPost('nik'),
            'telp' => $this->request->getPost('telp'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
        ];
        $this->AdminModel->update_akun($data, $id);
        session()->setFlashdata('success', 'Akun Berhasil Diubah');
        return redirect()->to(base_url('petugas/akun'));
    }
}
