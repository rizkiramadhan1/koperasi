<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailAngsuran extends Model
{
	public function angsuran() {

        return $this->belongsTo('App\Angsuran');  

    }

    protected $table = 'detailangsuran';
    protected $fillable = 
    ['angsuran_id',
    'tgl_jatuh_tempo',
    'besar_angsuran',
    'ket'];

    public $timestamps = false;
}