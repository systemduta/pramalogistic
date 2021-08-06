<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $guarded = ['id'];

    public function pelamar()
    {
        return $this->belongsToMany(Pelamar::class, 'id');
    }
}
