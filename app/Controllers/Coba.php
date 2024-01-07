<?php

namespace App\Controllers;

class Coba extends BaseController
{

    public function index()
    {
        echo "Hello ini controler coba $this->nama";
    }
    public function tes($nama = '', $umur = '')
    {
        echo "Hello ini controler coba $nama, umur saya adalah $umur";
    }
    public function profil($nama = '', $umur = 25)
    {
        echo "Hello ini controler coba $nama, umur saya adalah $umur";
    }
}
