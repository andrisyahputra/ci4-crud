<?php

namespace App\Controllers;

use App\Models\orangModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class orang extends BaseController
{
    protected $orangModel;
    public function __construct()
    {
        $this->orangModel = new orangModel();
    }
    public function index()
    {
        $data['judul'] = 'Ini orang';
        $data['orangs'] = $this->orangModel->finaAll();
        // dd($data['orangs']);
        return view('orang/home', $data);
        // echo "Hello world";
    }
}
