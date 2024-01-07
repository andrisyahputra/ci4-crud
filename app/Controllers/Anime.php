<?php

namespace App\Controllers;

use App\Models\AnimeModel;

class Anime extends BaseController
{
    protected $animeModel;
    public function __construct()
    {
        $this->animeModel = new AnimeModel();
    }
    public function index()
    {
        $data['judul'] = 'Ini Anime';
        $data['animes'] = $this->animeModel->findAll();
        // dd($data['animes']);
        return view('anime/home', $data);
        // echo "Hello world";
    }
}
