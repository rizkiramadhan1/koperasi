<?php

namespace App\Http\Controllers;

use App\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
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
            $anggota = Anggota::where('nama', 'LIKE', "%$keyword%")->orWhere('alamat', 'LIKE', "%$keyword%")
            ->orWhere('status', 'LIKE', "%$keyword%")
            ->orWhere('tgl_lahir', 'LIKE', "%$keyword%")
            ->orWhere('tmp_lahir', 'LIKE', "%$keyword%")
            ->orWhere('j_kel', 'LIKE', "%$keyword%")
            ->orWhere('no_telp', 'LIKE', "%$keyword%")
            ->orWhere('alamat', 'LIKE', "%$keyword%")
            ->orWhere('ket', 'LIKE', "%$keyword%")->paginate(10);
            
        }else{
            $anggota = Anggota::orderBy('id', 'DESC')->paginate(10);
        }  

        return view('anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Anggota();
        $tambah->nama = $request['nama'];
        $tambah->alamat = $request['alamat'];
        $tambah->tgl_lahir = $request['tgl_lahir'];
        $tambah->tmp_lahir = $request['tmp_lahir'];
        $tambah->j_kel = $request['j_kel'];
        $tambah->status = $request['status'];
        $tambah->no_telp = $request['no_telp'];
        $tambah->ket = $request['ket'];
        $tambah->save();

        return redirect()->to('/anggota');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lihat = Anggota::where('id', $id)->first();
        return view('anggota.lihat', compact('lihat'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Anggota::where('id', $id)->first();
        return view('anggota.edit', compact('edit'));    
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
        $update = Anggota::where('id', $id)->first();
        $update->nama = $request['nama'];
        $update->alamat = $request['alamat'];
        $update->tgl_lahir = $request['tgl_lahir'];
        $update->tmp_lahir = $request['tmp_lahir'];
        $update->j_kel = $request['j_kel'];
        $update->status = $request['status'];
        $update->no_telp = $request['no_telp'];
        $update->ket = $request['ket'];
        $update->update();    

        return redirect()->to('/anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Anggota::findOrFail($id);
        $hapus->delete();

        return redirect()->to('/anggota');
    }
}
