<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Ini Home';
        $data['angka'] = ['satu', 'dua', 'tiga'];
        return view('pages/home', $data);
        // echo "Hello world";
    }
    public function about()
    {
        $data['judul'] = 'Ini About';
        return view('pages/about', $data);
    }
    public function contact()
    {
        $data['judul'] = 'Ini Contact';
        $data['alamats'] = [
            [
                'tipe' => 'Rumah',
                'alamat' => 'Jl binjai',
                'kota' => 'Binjai',
            ],
            [
                'tipe' => 'Kantor',
                'alamat' => 'Jl Medan',
                'kota' => 'medan',
            ]
        ];

        return view('pages/contact', $data);
    }
}
