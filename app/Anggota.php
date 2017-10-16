<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    public function simpanan() {

        return $this->hasMany('App\Simpanan');  

    }

    public function angsuran() {

        return $this->hasMany('App\Angsuran');  

    }

    protected $table = 'anggota';
    protected $fillable = 
    ['nama',
    'alamat',
    'tgl_lahir',
    'tmp_lahir',
    'j_kel',
    'status',
    'no_telp',
    'ket'];

    public $timestamps = false;
}
