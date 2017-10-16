<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
	public function anggota() {

        return $this->belongsTo('App\Anggota');  

    }

    protected $table = 'simpanan';
    protected $fillable = 
    ['anggota_id',
    'nama_simpanan',
    'tgl_simpanan',
    'besar_simpanan',
    'ket'];

    public $timestamps = false;

}
