<?php

namespace App\Http\Controllers;

use App\Simpanan;
use App\Anggota;
use Illuminate\Http\Request;

class SimpananController extends Controller
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

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        
        if (!empty($keyword)) {
            $simpanan = Simpanan::where('nama_simpanan', 'LIKE', "%$keyword%")
            ->orWhere('tgl_simpanan', 'LIKE', "%$keyword%")
            ->orWhere('besar_simpanan', 'LIKE', "%$keyword%")
            ->orWhere('ket', 'LIKE', "%$keyword%")
            ->orWhereHas('anggota', function ($query) use ($keyword) {
                 $query->where('nama', 'like', '%'.$keyword.'%');
                })->paginate(1);
            
        }else{
            $simpanan = Simpanan::orderBy('id', 'DESC')->paginate(1);
        }

        $nama_anggota = Anggota::orderBy('nama', 'ASC')->get();

        return view('simpanan.index', compact('simpanan', 'nama_anggota', 'keyword'));
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
        $tambah = new Simpanan();
        $tambah->anggota_id = $request['nama_anggota'];
        $tambah->nama_simpanan = $request['nama_simpanan'];
        $tambah->tgl_simpanan = $request['tgl_simpanan'];
        $tambah->besar_simpanan = $request['besar_simpanan'];
        $tambah->ket = $request['ket'];
        $tambah->save();

        return redirect()->to('/simpanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lihat = Simpanan::where('id', $id)->first();
        return view('simpanan.lihat', compact('lihat'));
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
        $edit = Simpanan::where('id', $id)->first();
        return view('simpanan.edit', compact('edit', 'nama_anggota'));
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
        $update = Simpanan::where('id', $id)->first();
        $update->anggota_id = $request['nama_anggota'];
        $update->nama_simpanan = $request['nama_simpanan'];
        $update->tgl_simpanan = $request['tgl_simpanan'];
        $update->besar_simpanan = $request['besar_simpanan'];
        $update->ket = $request['ket'];
        $update->update();

        return redirect()->to('/simpanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Simpanan::findOrFail($id);
        $hapus->delete();

        return redirect()->to('/simpanan');
    }
}
