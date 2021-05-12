<?php

namespace App\Controllers;

use App\Models\AdminModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Entities\User;
use TCPDF;

class Admin extends BaseController
{
    protected $auth;
    protected $config;
    protected $session;

    public function __construct()
    {

        helper('form');
        helper('date');

        $this->AdminModel = new AdminModel();

        $this->session = service('session');
        $this->config = config('Auth');
        $this->auth = service('authentication');
    }

    // PENGADUAN
    // READ PESAN PENGADUAN
    public function pesan_pengaduan_baru()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('pengaduan.id_pengaduan, pengaduan.subjek_pengaduan, pengaduan.tgl_pengaduan,  pengaduan.statuss, users.nama, users.nik');
        $builder->join('pengaduan', 'pengaduan.nik = users.nik');
        $query = $builder->get();  
        $data = [
            'title' => 'Daftar Pesan Pengaduan  ',
            'isi' => 'admin/pengaduan/pesan_pengaduan_baru',
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
            'isi' => 'admin/pengaduan/balas_pengaduan',
            'data' => $query->getRowArray(),
        ];
        echo view('Layout/v_wrapper', $data);
    // SAVE BALAS PENGADUAN
    }
    public function simpan_balasan()
    {
         $validated = $this->validate([
            'foto' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,4096]'
        ]);
  
        if ($validated == FALSE) {
             
            // Kembali ke function index supaya membawa data uploads dan validasi
            return $this->pesan_pengaduan_baru();
 
        } else {
 
            $avatar = $this->request->getFile('foto');
            $avatar->move(ROOTPATH . 'public/img');
 
            $data = [
            'foto' => $avatar->getName(),
            'pengirim' => user()->nama,
            'tgl_tanggapan' => $this->request->getPost('tgl_tanggapan'),
            'tanggapan' => $this->request->getPost('tanggapan'),
            'id_pengaduan' => $this->request->getPost('id_pengaduan'),
            ];
            $this->AdminModel->insert_balasan($data);
            session()->setFlashdata('pesan', 'Balasan Berhasil Dikirim');
            return redirect()->to(base_url('admin/pesan_pengaduan_baru'));
        }
    }

    
    // CETAK PENGADUAN
    public function cetak_pengaduan()
    {
        $data = [
            'title' => 'Cetak Daftar Pengaduan ',
            'data'=>$this->AdminModel->daftar_pengaduan(),
        ];
        echo view('admin/pengaduan/cetak_pengaduan', $data);
       
    }
    // READ DATA DAFTAR PENGADUAN
    public function daftar_pengaduan()
    {
        $data = [
            'title' => 'Daftar Pengaduan ',
            'isi' => 'admin/pengaduan/daftar_pengaduan',
            'data' =>  $this->AdminModel->daftar_pengaduan(),
        ];
        echo view('Layout/v_wrapper', $data);
    }
    // CETAK BUKTI TANGGAPAN
    public function cetak_bukti_tanggapan($id)
    {
         $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('pengaduan.id_pengaduan, pengaduan.subjek_pengaduan, pengaduan.tgl_pengaduan, pengaduan.statuss, pengaduan.isi_laporan, users.nama, users.nik,  users.id, tanggapan.pengirim,  tanggapan.id_tanggapan, tanggapan.tgl_tanggapan, tanggapan.tanggapan');
        $builder->join('pengaduan', 'pengaduan.nik = users.nik');
        $builder->join('tanggapan', 'tanggapan.id_pengaduan = pengaduan.id_pengaduan');
        $builder->where('pengaduan.id_pengaduan', $id);
        $query = $builder->get();
        $data = [
            'title' => 'Bukti Tanggapan ',
            'detail' =>  $query->getRowArray(),
        ];
        echo view('admin/pengaduan/cetak_bukti_tanggapan', $data);
        
    }
    // DETAIL PENGADUAN
    public function detail_pengaduan($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('pengaduan.id_pengaduan, pengaduan.subjek_pengaduan, pengaduan.tgl_pengaduan, pengaduan.statuss, pengaduan.isi_laporan, users.nama, users.nik,  users.id, tanggapan.pengirim,  tanggapan.id_tanggapan, tanggapan.tgl_tanggapan, tanggapan.tanggapan, tanggapan.foto');
        $builder->join('pengaduan', 'pengaduan.nik = users.nik');
        $builder->join('tanggapan', 'tanggapan.id_pengaduan = pengaduan.id_pengaduan');
        $builder->where('pengaduan.id_pengaduan', $id);
        $query = $builder->get();
        $data = [
            'title' => 'Detail Pengaduan ',
            'isi' => 'admin/pengaduan/detail_pengaduan',
            'detail' => $query->getRowArray(),
        ];
        echo view('Layout/v_wrapper', $data);
    }
    // DELETE PENGADUAN
    public function hapus_pengaduan($id)
    {
        $this->AdminModel->delete_pengaduan($id);
        session()->setFlashdata('success', 'Data  Berhasil Di Hapus');
        return redirect()->to(base_url('admin/daftar_pengaduan'));
    }
    // AKHIR PENGADUAN
    
    // PETUGAS 
    public function daftar_petugas()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, users.nama,  users.nik,  users.email,  users.username,  users.telp, auth_groups.name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('auth_groups_users.group_id', '2');
        $query = $builder->get();
        $data = [
            'title' => 'Daftar Petugas ',
            'isi' => 'admin/petugas/index',
            'petugas' => $query->getResultArray(),
        ];
        echo view('Layout/v_wrapper', $data);
    }
    // AKUN PETUGAS
    public function akun_petugas()
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
            'title' => 'Profile ',
            'isi' => 'admin/petugas/profile',
            'akun'=>$query->getRowArray(),
        ];
        echo view('Layout/v_wrapper', $data);
    }
    // CREATE AKUN PETUGAS
    public function add_petugas()
    {
        $data = [
            'title' => 'Tambah Akun Petugas ',
            'isi' => 'admin/petugas/add_petugas',
        ];
        echo view('Layout/v_wrapper', $data);
    }
    // SAVE AKUN PETUGAS
    public function save_akun()
    {
        $users = model('UserModel');
        // $rules = [
        //     'username'      => 'required|alpha_numeric_space|min_length[3]|is_unique[users.username]',
        //     'email'         => 'required|valid_email|is_unique[users.email]',
        //     'nama'      => 'required',
        //     'telp'      => 'required',
        //     'password'      => 'required|strong_password',
        //     'pass_confirm'  => 'required|matches[password]',
        // ];

        // if (! $this->validate($rules))
        // {
        //     return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
        // }

        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user = new User($this->request->getPost($allowedPostFields));

        $this->config->requireActivation !== false ? $user->generateActivateHash() : $user->activate();

        if (! $users->withGroup('petugas')->save($user))
        {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        if ($this->config->requireActivation !== false)
        {
            $activator = service('activator');
            $sent = $activator->send($user);

            if (! $sent)
            {
                return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
            }

            // Success!
            return redirect()->to('daftar_petugas')->with('message', lang('Auth.activationSuccess'));
        }

        // Success!
        return redirect()->to('daftar_petugas')->with('message', lang('Auth.registerSuccess'));

    }
    // UPDATE AKUN PETUGAS
    public function ubah_petugas($id)
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
            'isi' => 'admin/petugas/ubah_akun_petugas',
            'akun'=>$query->getRowArray(),
        ];
        echo view('Layout/v_wrapper', $data);
    }
    public function ubah_akun($id)
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
        return redirect()->to(base_url('admin/daftar_petugas'));
    }
    // DETAIL AKUN PETUGAS
    public function detail_petugas($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, users.nama,  users.nik,  users.email,  users.username,  users.telp, auth_groups.name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', $id);
        $query = $builder->get();
        $data = [
            'title' => 'Detail Petugas ',
            'isi' => 'admin/petugas/detail_petugas',
            'detail'=>$query->getRowArray(),
        ];
        echo view('Layout/v_wrapper', $data);
    }
    // DELETE AKUN PETUGAS
    public function delete_akun_petugas($id)
    {
       $this->AdminModel->delete_akun($id);
        session()->setFlashdata('success', 'Data  Berhasil Di Hapus');
        return redirect()->to(base_url('admin/daftar_petugas'));
    }
    // AKHIR PETUGAS 
    


    // MASYARAKAT
    // READ DAFTAR MASYARAKAT
    public function daftar_masyarakat()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, users.nama,  users.nik,  users.email,  users.username,  users.telp, ');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('auth_groups_users.group_id', '3');
        $query = $builder->get();
        $data = [
            'title' => 'Daftar Masyarakat ',
            'isi' => 'admin/masyarakat/index',
            'data'=>$query->getResultArray(),
        ];
        echo view('Layout/v_wrapper', $data);
    }
    // CETAK MASYARAKAT
    public function cetak_masyarakat()
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, users.nama,  users.nik,  users.email,  users.username,  users.telp, ');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('auth_groups_users.group_id', '3');
        $query = $builder->get();
        $data = [
            'title' => 'Cetak Daftar Masyarakat ',
            'data'=>$query->getResultArray(),
        ];
        echo view('admin/masyarakat/cetak', $data);
    }
    // DETAIL MASYARAKAT
    public function detail_masyarakat($id)
    {   
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, users.nama,  users.nik,  users.email,  users.username,  users.telp, ');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', $id);
        $query = $builder->get();
          $data = [
            'title' => 'Detail Daftar Masyarakat ',
            'isi' => 'admin/masyarakat/detail_masyarakat',
            'detail'=>$query->getRowArray(),
        ];
        echo view('Layout/v_wrapper', $data);
    }
    // DELETE DATA MASYARAKAT
    public function delete_masyarakat($id)
    {
       $this->AdminModel->delete_masyarakat($id);
        session()->setFlashdata('success', 'Data  Berhasil Di Hapus');
        return redirect()->to(base_url('admin/daftar_masyarakat'));
    }
    // AKHIR MASYARAKAT
}
