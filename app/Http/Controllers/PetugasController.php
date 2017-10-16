<?php

namespace App\Http\Controllers;

use App\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
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
            $petugas = Petugas::where('nama', 'LIKE', "%$keyword%")->orWhere('alamat', 'LIKE', "%$keyword%")
            ->orWhere('tgl_lahir', 'LIKE', "%$keyword%")
            ->orWhere('tmp_lahir', 'LIKE', "%$keyword%")
            ->orWhere('no_telp', 'LIKE', "%$keyword%")
            ->orWhere('ket', 'LIKE', "%$keyword%")->paginate(10);
            
        }else{
            $petugas = Petugas::orderBy('id', 'DESC')->paginate(10);
        }  

        return view('petugas.index', compact('petugas'));
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
        $tambah = new Petugas();
        $tambah->nama = $request['nama'];
        $tambah->alamat = $request['alamat'];
        $tambah->tgl_lahir = $request['tgl_lahir'];
        $tambah->tmp_lahir = $request['tmp_lahir'];
        $tambah->no_telp = $request['no_telp'];
        $tambah->ket = $request['ket'];
        $tambah->save();

        return redirect()->to('/petugas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lihat = Petugas::where('id', $id)->first();
        return view('petugas.lihat', compact('lihat')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Petugas::where('id', $id)->first();
        return view('petugas.edit', compact('edit'));   
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
        $update = Petugas::where('id', $id)->first();
        $update->nama = $request['nama'];
        $update->alamat = $request['alamat'];
        $update->tgl_lahir = $request['tgl_lahir'];
        $update->tmp_lahir = $request['tmp_lahir'];
        $update->no_telp = $request['no_telp'];
        $update->ket = $request['ket'];
        $update->update();

        return redirect()->to('/petugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Petugas::findOrFail($id);
        $hapus->delete();

        return redirect()->to('/petugas');       
    }
}
