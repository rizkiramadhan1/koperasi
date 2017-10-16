<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    public function anggota() {

        return $this->belongsTo('App\Anggota');  

    }

    public function kategoripinjaman() {

        return $this->belongsTo('App\KategoriPinjaman');  

    }

    public function detailangsuran() {

        return $this->hasMany('App\DetailAnsuran');  

    }

    protected $table = 'angsuran';
    protected $fillable = 
    ['kategoripinjaman_id',
    'anggota_id',
    'tgl_pembayaran',
    'angsuran_ke',
    'besar_angsuran',
    'ket'];

    public $timestamps = false;
}
