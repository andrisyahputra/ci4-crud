<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
        // echo "Hello world";
    }
    public function coba()
    {
        echo "Hello $this->nama";
    }
}
