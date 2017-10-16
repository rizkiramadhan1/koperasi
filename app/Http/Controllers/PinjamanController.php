<?php

namespace App\Http\Controllers;

use App\Angsuran;
use App\Anggota;
use App\Pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Pinjaman();
        $tambah->anggota_id = $request['nama_anggota'];
        $tambah->angsuran_id = $tambah->anggota_id;
        $tambah->nama_pinjaman = $request['nama_pinjaman'];
        $tambah->besar_pinjaman = $request['besar_pinjaman'];
        $tambah->tgl_pengajuan_pinjaman = $request['tgl_pengajuan_pinjaman'];
        $tambah->tgl_acc_peminjam = $request['tgl_acc_peminjam'];
        $tambah->tgl_pinjaman = $request['tgl_pinjaman'];
        $tambah->tgl_pelunasan = $request['tgl_pelunasan'];
        $tambah->ket = $request['ket'];
        $tambah->save();

        return redirect()->to('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lihat = Pinjaman::where('id', $id)->first();
        return view('pinjaman.lihat', compact('lihat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nama_anggota = Anggota::orderBy('nama', 'ASC')->get();
        $nama_angsuran = Angsuran::orderBy('id', 'DESC')->get();
        $edit = Pinjaman::where('id', $id)->first();
        return view('pinjaman.edit', compact('edit', 'nama_anggota', 'nama_angsuran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Pinjaman::where('id', $id)->first();
        $update->anggota_id = $request['nama_anggota'];
        $update->angsuran_id = $update->$anggota_id;
        $update->nama_pinjaman = $request['nama_pinjaman'];
        $update->besar_pinjaman = $request['besar_pinjaman'];
        $update->tgl_pengajuan_pinjaman = $request['tgl_pengajuan_pinjaman'];
        $update->tgl_acc_peminjam = $request['tgl_acc_peminjam'];
        $update->tgl_pinjaman = $request['tgl_pinjaman'];
        $update->tgl_pelunasan = $request['tgl_pelunasan'];
        $update->ket = $request['ket'];
        $update->update();

        return redirect()->to('/home');
    }

    public function angsuran_anggota($id)
    {
        $angsuran_anggota = Angsuran::where('anggota_id' ,$id)->orderBy('id', 'DESC')->paginate(10);
        return view('pinjaman.angsuran', compact('angsuran_anggota'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Pinjaman::findOrFail($id);
        $hapus->delete();

        return redirect()->to('/home');
    }
}
