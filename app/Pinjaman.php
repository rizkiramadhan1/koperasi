<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    public function anggota() {

        return $this->belongsTo('App\Anggota');  

    }

    public function angsuran() {

        return $this->belongsTo('App\Angsuran');  

    }

    protected $table = 'pinjaman';
    protected $fillable = 
    ['anggota_id',
    'angsuran_id',
    'nama_pinjaman',
    'besar_pinjaman',
    'tgl_pengajuan_pinjaman',
    'tgl_acc_peminjam',
    'tgl_pinjaman',
    'tgl_pelunasan',
    'ket'];

    public $timestamps = false;
}
