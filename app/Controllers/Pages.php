<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Ini Home';
        $data['angka'] = ['satu', 'dua', 'tiga'];
        echo view('layout/header', $data);
        echo view('pages/home');
        echo view('layout/footer');
        // echo "Hello world";
    }
    public function about()
    {
        $data['judul'] = 'Ini About';
        echo view('layout/header', $data);
        echo view('pages/about');
        echo view('layout/footer');
    }
}
