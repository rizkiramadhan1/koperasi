<?php

namespace App\Http\Controllers;

use App\KategoriPinjaman;
use Illuminate\Http\Request;

class KategoriPinjamanController extends Controller
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
            $kategoripinjaman = KategoriPinjaman::where('kategori', 'LIKE', "%$keyword%")->paginate(10);
            
        }else{
            $kategoripinjaman = KategoriPinjaman::orderBy('id', 'DESC')->paginate(10);
        }  

        return view('kategoripinjaman.index', compact('kategoripinjaman'));
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
        $tambah = new KategoriPinjaman();
        $tambah->kategori = $request['kategori'];
        $tambah->save();

        return redirect()->to('/kategoripinjaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lihat = KategoriPinjaman::where('id', $id)->first();
        return view('kategoripinjaman.lihat', compact('lihat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = KategoriPinjaman::where('id', $id)->first();
        return view('kategoripinjaman.edit', compact('edit')); 
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
        $update = KategoriPinjaman::where('id', $id)->first();
        $update->kategori = $request['kategori'];
        $update->update();    

        return redirect()->to('/kategoripinjaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = KategoriPinjaman::findOrFail($id);
        $hapus->delete();

        return redirect()->to('/kategoripinjaman');
    }
}
