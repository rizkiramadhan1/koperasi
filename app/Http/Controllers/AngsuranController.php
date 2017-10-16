<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Angsuran;
use App\KategoriPinjaman;
use Illuminate\Http\Request;

class AngsuranController extends Controller
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
            $angsuran = Angsuran::where('tgl_pembayaran', 'LIKE', "%$keyword%")
            ->orWhere('angsuran_ke', 'LIKE', "%$keyword%")
            ->orWhere('besar_angsuran', 'LIKE', "%$keyword%")
            ->orWhere('ket', 'LIKE', "%$keyword%")
            ->orWhereHas('kategoripinjaman', function ($query) use ($keyword) {
                 $query->where('kategori', 'like', '%'.$keyword.'%');
                })
            ->orWhereHas('anggota', function ($query) use ($keyword) {
                 $query->where('nama', 'like', '%'.$keyword.'%');
                })->paginate(10);
            
        }else{
            $angsuran = Angsuran::orderBy('id', 'DESC')->paginate(10);
        }  

        $nama_anggota = Anggota::orderBy('nama', 'ASC')->get();
        $nama_kategori = KategoriPinjaman::orderBy('kategori', 'ASC')->get();

        return view('angsuran.index', compact('angsuran', 'nama_anggota', 'nama_kategori' , 'keyword'));
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
        $tambah = new Angsuran();
        $tambah->kategoripinjaman_id = $request['nama_kategori'];
        $tambah->anggota_id = $request['nama_anggota'];
        $tambah->tgl_pembayaran = $request['tgl_pembayaran'];
        $tambah->angsuran_ke = $request['angsuran_ke'];
        $tambah->besar_angsuran = $request['besar_angsuran'];
        $tambah->ket = $request['ket'];
        $tambah->save();

        return redirect()->to('/angsuran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lihat = Angsuran::where('id', $id)->first();
        return view('angsuran.lihat', compact('lihat')); 
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
        $nama_kategori = KategoriPinjaman::orderBy('kategori', 'ASC')->get();
        $edit = Angsuran::where('id', $id)->first();
        return view('angsuran.edit', compact('edit', 'nama_anggota', 'nama_kategori'));
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
        $update = Angsuran::where('id', $id)->first();
        $update->kategoripinjaman_id = $request['nama_kategori'];
        $update->anggota_id = $request['nama_anggota'];
        $update->tgl_pembayaran = $request['tgl_pembayaran'];
        $update->angsuran_ke = $request['angsuran_ke'];
        $update->besar_angsuran = $request['besar_angsuran'];
        $update->ket = $request['ket'];
        $update->update();

        return redirect()->to('/angsuran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
