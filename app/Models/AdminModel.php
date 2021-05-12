<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    // Dashboard
    function pesan_belum_dibaca()
    {
        return $this->db->table('admin_pesan_belum_dibaca')
            ->get()->getResultArray();
    }
    function total_pengaduan()
    {
        return $this->db->table('pengaduan')
            ->select('COUNT(*) as pengaduan')
            ->get()->getResultArray();
    }
    public function total_user()
    {
        return $this->db->table('masyarakat')
            ->select('COUNT(*) as masyarakat')
            ->get()->getResultArray();
    }
    // end Dashboard



    // Balas Pesan
    public function insert_balasan($data)
    {
        return $this->db->table('tanggapan')->insert($data);
    }



    //  Pengaduan
    public function daftar_pengaduan()
    {
          return $this->db->query("call daftar_pengaduan")->getResultArray();
        // return $this->db->table('admin_daftar_pengaduan')->get()->getResultArray();
    }
    function delete_pengaduan($id)
    {
        return $this->db->table('tanggapan')
            ->delete(array('id_tanggapan' => $id));
    }



    // Akhir Pengaduan


    // Petugas
     public function update_akun($data, $id)
    {
        return $this->db->table('users')->update($data, array('id' => $id));
    }
    public function daftar_petugas()
    {
        return $this->db->table('admin_daftar_petugas')->get()->getResultArray();
    }
    function delete_akun($id)
    {
        return $this->db->table('users')
            ->delete(array('id' => $id));
    }
     function delete_masyarakat($id)
    {
        return $this->db->table('users')
            ->delete(array('id' => $id));
    }
}
