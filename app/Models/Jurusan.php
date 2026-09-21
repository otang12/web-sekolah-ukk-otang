<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $guarded = [];

    protected $casts = [
        'mata_pelajaran' => 'array',
    ];

    public function guru()
    {
        return $this->hasMany(JurusanGuru::class)->orderBy('urutan');
    }

    public function fotos()
    {
        return $this->hasMany(JurusanFoto::class)->orderBy('urutan');
    }
}