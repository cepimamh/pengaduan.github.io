<?php

namespace App\Models;

use CodeIgniter\Model;

class MasyarakatModel extends Model
{
    // PENGADUAN
    // READ DATA PENGADUAN
    function get_pengaduan()
    {

        $session = \Config\Services::session();
        $builder = $this->db->table('users');
        $builder->select('pengaduan.subjek_pengaduan', 'pengaduan.tgl_pengaduan', 'pengaduan.statuss');
        $builder->join('pengaduan', 'pengaduan.nik = users.nik');
        $builder->where('users.nik= pengaduan.nik');
        $query = $builder->get();
        return $query->getResultArray();
    }
    // CREATE DATA PENGADUAN
    public function insert_pengaduan($data)
    {
        return $this->db->table('pengaduan')->insert($data);
    }
    // UPDATE DATA PENGADUAN
    public function ubah_pengaduan($id)
    {
        return $this->db->table('pengaduan')->where('id_pengaduan', $id)
            ->get()->getRowArray();
    }
    public function update_pengaduan($data, $id)
    {
        return $this->db->table('pengaduan')->update($data, array('id_pengaduan' => $id));
    }
    // DELETE DATA PENGADUAN
    function delete_pengaduan($id)
    {
        return $this->db->table('pengaduan')->delete(array('id_pengaduan' => $id));
    }
    // AKHIR PENGADUAN



    // DASHBOARD
    public function total_pengaduan()
    {
        $session = \Config\Services::session();
        $builder = $this->db->table('users');
        $builder->select('COUNT(*) as totalpengaduan');
        $builder->join('pengaduan', 'pengaduan.nik = users.nik');
        $builder->where('users.nik',user()->nik);
        $query = $builder->get();
        return $query->getResultArray();
    }
    // AKHIR DASHBOARD
    


    // AKUN 
    // UPDATE AKUN
    public function update_akun($data, $id)
    {
        return $this->db->table('users')->update($data, array('id' => $id));
    }
    // AKHIR AKUN
}
