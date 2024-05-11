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
        $data = [
            'judul' => 'Ini Tambah Anime',
        ];
        return view('anime/create', $data);
    }
    public function save()
    {
        // validasi input
        $validation = \Config\Services::validation();


        $rules = [
            'judul' => 'required|is_unique[anime.judul]',
            'sampul' => 'max_size[sampul,1024]|mime_in[sampul,image/png,image/jpeg]',
            // 'sampul' => 'uploaded[sampul]|max_size[sampul,1024]|mime_in[sampul,image/png,image/jpeg]',

        ];

        $messages = [
            'judul' => [
                'required' => 'judul harus diisi.',
                'is_unique' => 'Unik harus berupa angka.',
            ],
        ];

        $validation->setRules($rules, $messages);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/anime/create')->withInput()->with('errors', $validation->getErrors());
        }

        $sampulFile = $this->request->getFile('sampul');
        if ($sampulFile->getError() == 4) {
            $namarandom = 'pp.jpg';
        } else {
            $namarandom = $sampulFile->getRandomName();
            $sampulFile->move('img', $namarandom);
            // $namaSampul = $sampulFile->getName();
        }

        // dd($this->request->getVar());
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->animeModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namarandom,
        ]);

        session()->setFlashdata('success', 'Data berhasil di tambahkan');
        return redirect()->to('anime');
    }
    public function hapus($id)
    {
        // $id = $this->request->getGet('id');
        // dd($id);
        $anime = $this->animeModel->find($id);
        if ($anime['sampul'] != 'pp.jpg') {
            unlink('img/' . $anime['sampul']);
        }
        $this->animeModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil di Hapus');
        return redirect()->to('anime');
    }
    public function edit($slug)
    {
        // $id = $this->request->getGet('id');
        // dd($id);
        $data = [
            'judul' => 'Ini Ubah Anime',
            'anime' => $this->animeModel->getAnime($slug)
        ];
        return view('anime/edit', $data);
    }
    public function update($id)
    {
        // dd($id);
        // dd($this->request->getvar());
        // validasi input
        $validation = \Config\Services::validation();


        $rules = [
            'judul' => 'required',
            'sampul' => 'max_size[sampul,1024]|mime_in[sampul,image/png,image/jpeg]',

        ];

        $messages = [
            'judul' => [
                'required' => 'judul harus diisi.',
            ],
        ];

        $validation->setRules($rules, $messages);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        // dd($this->request->getVar());
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $data = [
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
        ];
        $sampulFile = $this->request->getFile('sampul');

        // Cek apakah file sampul telah diunggah
        if ($sampulFile->isValid()) {
            // Cek apakah tidak ada file yang diunggah (error code 4)
            if ($sampulFile->getError() == UPLOAD_ERR_NO_FILE) {
                $namarandom = 'pp.jpg'; // Nama default jika tidak ada file yang diunggah
            } else {
                // Generate nama acak untuk file sampul dan pindahkan file ke folder 'img'
                $namarandom = $sampulFile->getRandomName();
                $sampulFile->move('img', $namarandom);

                if ($this->request->getVar('gambarLama') != 'pp.jpg') {
                    unlink('img/' . $this->request->getVar('gambarLama'));
                }


            }
            $data['sampul'] = $namarandom;
        }

        if ($this->animeModel->update($id, $data)) {
            // session()->setFlashdata('success', 'Data berhasil di tambahkan');
            return redirect()->to('/anime')->with('success', 'Data berhasil diubah.');
        } else {
            return redirect()->back()->with('errors', 'Gagal menambah data.');
        }


    }
}
