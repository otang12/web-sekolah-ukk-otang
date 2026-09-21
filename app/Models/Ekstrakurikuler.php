<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    protected $guarded = [];

    public function fotos()
    {
        return $this->hasMany(EkstrakurikulerFoto::class)->orderBy('urutan');
    }
}