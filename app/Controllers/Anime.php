<?php

namespace App\Controllers;

use App\Models\AnimeModel;
use CodeIgniter\Exceptions\PageNotFoundException;

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
        $data['animes'] = $this->animeModel->getAnime();
        // dd($data['animes']);
        return view('anime/home', $data);
        // echo "Hello world";
    }
    public function detail($slug)
    {
        // echo $slug;
        $data['judul'] = 'Ini Detail Anime';
        $data['anime'] = $this->animeModel->getAnime($slug);


        // jika tidak ditemukan
        if (empty($data['anime'])) {
            throw new PageNotFoundException('Judul Anime ' . $slug . ' Tidak Ditemukan.');
        }

        return view('anime/detail', $data);
        // dd($data['anime']);
        // echo "Hello world";
    }
    public function create()
    {
        $data['judul'] = 'Ini Tambah Anime';
        return view('anime/create', $data);
    }
    public function save()
    {
        // dd($this->request->getVar());
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->animeModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul'),
        ]);

        session()->setFlashdata('success', 'Data berhasil di tambahkan');
        return redirect()->to('anime');
    }
}
