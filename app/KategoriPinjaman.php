<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriPinjaman extends Model
{
    public function angsuran() {

        return $this->hasMany('App\Angsuran');  

    }
    protected $table = 'kategoripinjaman';
    protected $fillable = 
    ['kategori'];

    public $timestamps = false;
}
