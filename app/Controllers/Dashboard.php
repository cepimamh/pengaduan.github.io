<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\MasyarakatModel;

class Dashboard extends BaseController
{
    public function __construct()
    {

        helper('form');
        helper('date');

        $this->AdminModel = new AdminModel();
        $this->MasyarakatModel = new MasyarakatModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Beranda ',
            'isi' => 'dashboard',
            'pesan' => $this->AdminModel->pesan_belum_dibaca(),
            'pengaduan' => $this->AdminModel->total_pengaduan(),
            'masyarakat' => $this->AdminModel->total_user(),
            'totalpengaduan' => $this->MasyarakatModel->total_pengaduan(),
        ];
        echo view('Layout/v_wrapper', $data);
    }
}
