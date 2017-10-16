<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';
    protected $fillable = 
    ['nama',
    'alamat',
    'tgl_lahir',
    'tmp_lahir',
    'no_telp',
    'ket'];

    public $timestamps = false;
}
