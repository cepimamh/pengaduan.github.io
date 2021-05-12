<?php

namespace App\Controllers;

class Menu extends BaseController
{
    public function menu_admin()
    {
        if (session()->get('level') <> 1) {
            return redirect()->to(base_url('home'));
        }
        $data = [
            'title' => 'Dashboard admin',
            'isi' => 'v_menu',
        ];
        echo view('Layout/v_wrapper', $data);
    }
    public function menu_petugas()

    {
        if (session()->get('level') <> 2) {
            return redirect()->to(base_url('home'));
        }
        $data = [
            'title' => 'Dashboard p',
            'isi' => 'v_menu',
        ];
        echo view('Layout/v_wrapper', $data);
    }
    public function menu_masyarakat()
    {
        if (session()->get('level') <> 3) {
            return redirect()->to(base_url('home'));
        }
        $data = [
            'title' => 'Dashboard m',
            'isi' => 'v_menu ',
        ];
        echo view('Layout/v_wrapper', $data);
    }
    //--------------------------------------------------------------------

}
