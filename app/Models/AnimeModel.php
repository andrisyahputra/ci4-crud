<?php

namespace App\Models;

use CodeIgniter\Model;

class AnimeModel extends Model
{
    protected $table = 'anime';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'penulis', 'penerbit', 'sampul','slug'];

    public function getAnime($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
