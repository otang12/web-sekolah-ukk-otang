<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JurusanFoto extends Model
{
    protected $guarded = [];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}