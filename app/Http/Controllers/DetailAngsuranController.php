<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Angsuran;
use App\DetailAngsuran;
use DB;
use Illuminate\Http\Request;

class DetailAngsuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        
        if (!empty($keyword)) {
            $detailangsuran = DetailAngsuran::where('tgl_jatuh_tempo', 'LIKE', "%$keyword%")
            ->orWhere('besar_angsuran', 'LIKE', "%$keyword%")
            ->orWhere('ket', 'LIKE', "%$keyword%")
            ->orWhereHas('anggota', function ($query) use ($keyword) {
                 $query->where('nama', 'like', '%'.$keyword.'%');
                })->paginate(1);
            
        }else{
            $detailangsuran = DetailAngsuran::orderBy('angsuran_id', 'DESC')->paginate(1);
        }

        $nama_anggota = Anggota::orderBy('nama', 'ASC')->get();

        return view('detailangsuran.index', compact('detailangsuran','keyword','nama_anggota'));    
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
        $tambah = new DetailAngsuran();
        $tambah->angsuran_id = $request['nama_anggota'];
        $tambah->tgl_jatuh_tempo = $request['tgl_jatuh_tempo'];
        $tambah->besar_angsuran = $request['besar_angsuran'];
        $tambah->ket = $request['ket'];
        $tambah->save();

        return redirect()->to('/detailangsuran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lihat = DetailAngsuran::where('angsuran_id', $id)->first();
        $lihat2 = DetailAngsuran::pluck('angsuran_id')
                     ->all();
        $tampilkan = Angsuran::where('anggota_id', $lihat2)->paginate(10);
        return view('detailangsuran.lihat', compact('lihat', 'tampilkan'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = DetailAngsuran::where('angsuran_id', $id);
        $hapus->delete();

        return redirect()->to('/detailangsuran');
    }
}
