<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('anggota_id')->unsigned();
            $table->integer('angsuran_id')->unsigned();
            $table->string('nama_pinjaman');
            $table->string('besar_pinjaman');
            $table->date('tgl_pengajuan_pinjaman');
            $table->date('tgl_acc_peminjam');
            $table->date('tgl_pinjaman');
            $table->date('tgl_pelunasan');
            $table->string('ket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjaman');
    }
}
