<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    protected $with = ['lowongan'];
    protected $guarded = ['id'];

    public function lowongan()
    {
        return $this->hasOne(Lowongan::class, 'id', 'posisi');
    }
}
