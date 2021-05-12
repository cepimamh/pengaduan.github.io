<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MasyarakatModel;
use TCPDF;

class Masyarakat extends BaseController
{
    protected $MasyarakatModel;

    public function __construct()
    {

        helper('form');
        helper('date');

        $this->MasyarakatModel = new MasyarakatModel();
    }
    // Buat Pengaduan
    public function add_pengaduan()
    {
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('nik');
        $builder->where('nik',user()->nik);
        $query = $builder->get();

        $data = [
            'title' => 'Buat Pengaduan',
            'isi' => 'masyarakat/add_pengaduan',
            'nik' => $query->getResultArray(),

        ];
        echo view('Layout/v_wrapper', $data);
    }
    public function create_pengaduan()
    {
        $validated = $this->validate([
            'foto' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,4096]'
        ]);
  
        if ($validated == FALSE) {
             
            // Kembali ke function index supaya membawa data uploads dan validasi
            return $this->add_pengaduan();
 
        } else {
 
            $avatar = $this->request->getFile('foto');
            $avatar->move(ROOTPATH . 'public/img');
 
            $data = [
                'foto' => $avatar->getName(),   
            'nik' => $this->request->getPost('nik'),
            'tgl_pengaduan' => $this->request->getPost('tgl_pengaduan'),
            'subjek_pengaduan' => $this->request->getPost('subjek_pengaduan'),
            'isi_laporan' => $this->request->getPost('isi_laporan'),
            ];
     
            $this->MasyarakatModel->insert_pengaduan($data);
            session()->setFlashdata('success', 'Pengaduan Berhasil Dikirim');
             return redirect()->to(base_url('masyarakat/daftar_pengaduan')); 
        }
    }


        // $idsimpan=$this->MasyarakatModel->insert_pengaduan($data);
        // session()->setFlashdata('success', 'Pengaduan Berhasil Dikirim');
        // return redirect()->to(base_url('masyarakat/konfirmasi_pengaduan/'.$idsimpan));
        // $this->MasyarakatModel->insert_pengaduan($data);
        // session()->setFlashdata('success', 'Pengaduan Berhasil Dikirim');
        // return redirect()->to(base_url('masyarakat/daftar_pengaduan'));
    
    // Akhir Buat Pengaduan


    ///Konfirmasi Pengaduan
    // public function konfirmasi_pengaduan()
    // {
    //     $data = [
    //         'title' => 'Konfirmasi Pengaduan',
    //         'isi' => 'masyarakat/konfirmasi_pengaduan',
    //     ];
    //     echo view('Layout/v_wrapper', $data);
    // }
    ///




    //  Ubah Pengaduan
    public function ubah($id)
    {
        $data = [
            'title' => 'Ubah Pengaduan',
            'pengaduan' => $this->MasyarakatModel->ubah_pengaduan($id),
            'isi' => 'masyarakat/ubah_pengaduan',
        ];
        echo view('Layout/v_wrapper', $data);
    }
    public function update($id)
    {
         $validated = $this->validate([
            'foto' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,4096]'
        ]);
  
        if ($validated == FALSE) {
             
            // Kembali ke function index supaya membawa data uploads dan validasi
            return $this->add_pengaduan();
 
        } else {
 
            $avatar = $this->request->getFile('foto');
            $avatar->move(ROOTPATH . 'public/img');
 
           $data = [

            'nik' => $this->request->getPost('nik'),
            'tgl_pengaduan' => $this->request->getPost('tgl_pengaduan'),
            'subjek_pengaduan' => $this->request->getPost('subjek_pengaduan'),
            'isi_laporan' => $this->request->getPost('isi_laporan'),
              'foto' => $avatar->getName(),   
        ];
            $this->MasyarakatModel->update_pengaduan($data, $id);
            session()->setFlashdata('success', 'Pengaduan Berhasil Diubah');
            return redirect()->to(base_url('masyarakat/daftar_pengaduan')); 
        }
        // $data = [

        //     'nik' => $this->request->getPost('nik'),
        //     'tgl_pengaduan' => $this->request->getPost('tgl_pengaduan'),
        //     'subjek_pengaduan' => $this->request->getPost('subjek_pengaduan'),
        //     'isi_laporan' => $this->request->getPost('isi_laporan'),
        //     'foto' => $this->request->getPost('foto'),
        // ];
        // $this->MasyarakatModel->update_pengaduan($data, $id);
        // session()->setFlashdata('success', 'Pengaduan Berhasil Diubah');
        // return redirect()->to(base_url('masyarakat/daftar_pengaduan'));
    }
    // Akhir Ubah Pengaduan


    // Hapus Pengaduan
    public function delete($id)
    {
        $this->MasyarakatModel->delete_pengaduan($id);
        session()->setFlashdata('success', 'Data Pengaduan Berhasil Di Hapus');
        return redirect()->to(base_url('masyarakat/daftar_pengaduan'));
    }
    // Akhir Hapus Pengadua

    // Daftar Pengaduan
    public function daftar_pengaduan()
    {
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('pengaduan.id_pengaduan, pengaduan.subjek_pengaduan, pengaduan.tgl_pengaduan, pengaduan.statuss');
        $builder->join('pengaduan', 'pengaduan.nik =' .user()->nik.'' );
        $builder->where('users.nik', user()->nik);
        $query = $builder->get();
        $data = [
            'title' => 'Daftar Pengaduan',
            'isi' => 'masyarakat/index',
            'masyarakat' => $query->getResultArray(),
        ];
        echo view('Layout/v_wrapper', $data);
    }
    public function lihat_tanggapan($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('pengaduan.id_pengaduan, pengaduan.subjek_pengaduan, pengaduan.tgl_pengaduan, pengaduan.statuss, pengaduan.isi_laporan, users.nama, users.nik, tanggapan.pengirim,  tanggapan.id_tanggapan, tanggapan.tgl_tanggapan, tanggapan.tanggapan,tanggapan.foto');
        $builder->join('pengaduan', 'pengaduan.nik = users.nik');
        $builder->join('tanggapan', 'tanggapan.id_pengaduan = pengaduan.id_pengaduan');
        // $builder->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas');
        $builder->where('pengaduan.id_pengaduan', $id);
        $query = $builder->get();

        $data = [
            'title' => 'Tanggapan Pengaduan',
            'isi' => 'masyarakat/tanggapan',
            'tanggapan' => $query->getRowArray(),
        ];
        echo view('Layout/v_wrapper', $data);
    }
    // Akhir Daftar Pengaduan

    // Akun
    public function akun()
    {
 
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('*');
        $builder->where('nik',user()->nik);
        $query = $builder->get();
        $data = [
            'title' => 'Akun',
            'akun' => $query->getRowArray(),
            'isi' => 'masyarakat/akun',
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
            'title' => 'Ubah Akun',
            'akun' =>$query->getRowArray() ,
            'isi' => 'masyarakat/ubah_akun',
        ];
        echo view('Layout/v_wrapper', $data);
    }
    public function update_akun($id)
    {

        $data = [

            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'telp' => $this->request->getPost('telp'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),

        ];
        $this->MasyarakatModel->update_akun($data, $id);
        session()->setFlashdata('success', 'Akun Berhasil Diubah ,');
        return redirect()->to(base_url('masyarakat/akun'));
    }




    // Print
    public function print_daftar()
    {
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('pengaduan.id_pengaduan, pengaduan.subjek_pengaduan, pengaduan.tgl_pengaduan, pengaduan.statuss');
        $builder->join('pengaduan', 'pengaduan.nik =' .user()->nik.'' );
        $builder->where('users.nik', user()->nik);
        $query = $builder->get();
        $data = [
            'title' => 'Daftar Pengaduan',
            'masyarakat' => $query->getResultArray(),
        ];
        echo view('masyarakat/cetak_daftar_pengaduan', $data);
        // $html = view('masyarakat/cetak_daftar_pengaduan', $data);

        // $pdf  = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter(false);
        // $pdf->AddPage();
        // $pdf->SetFont('times', 'B', 16);
        // // mencetak string 
        // $pdf->Cell(190, 7, 'DAFTAR LAPORAN PENGADUAN', 0, 1, 'C');
        // $pdf->SetFont('times', 'B', 12);
        // $pdf->writeHTML($html);
        // $this->response->setContentType('application/pdf');
        // $pdf->Output('daftarbuktipengaduan.pdf', 'I');
    }
    public function cetak_pengaduan($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('pengaduan.id_pengaduan, pengaduan.subjek_pengaduan, pengaduan.tgl_pengaduan, pengaduan.statuss, pengaduan.isi_laporan, users.nama, users.nik,  users.id, ');
        $builder->join('pengaduan', 'pengaduan.nik = users.nik');
        // $builder->join('tanggapan', 'tanggapan.id_pengaduan = pengaduan.id_pengaduan');
        $builder->where('pengaduan.id_pengaduan', $id);
         $query = $builder->get();
         
        $data = [
            'title' => 'Tanggapan Pengaduan',
            'detail' =>$query->getRowArray(),   
                ];
        echo view('masyarakat/cetak_bukti_pengaduan', $data);
    }
    public function cetak_tanggapan($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('pengaduan.id_pengaduan, pengaduan.subjek_pengaduan, pengaduan.tgl_pengaduan, pengaduan.statuss, pengaduan.isi_laporan, users.nama, users.nik, tanggapan.pengirim,  tanggapan.id_tanggapan, tanggapan.tgl_tanggapan, tanggapan.tanggapan');
        $builder->join('pengaduan', 'pengaduan.nik = users.nik');
        $builder->join('tanggapan', 'tanggapan.id_pengaduan = pengaduan.id_pengaduan');
        // $builder->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas');
        $builder->where('pengaduan.id_pengaduan', $id);
        $query = $builder->get();
         $data = [
            'title' => 'Bukti Tanggapan',
            'tanggapan' =>$query->getRowArray(),   
                ];
        echo view('masyarakat/cetak_tanggapan', $data);
    }

    //Akhir Print
}
