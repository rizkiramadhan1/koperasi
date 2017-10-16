<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Angsuran;
use App\Pinjaman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        
        if (!empty($keyword)) {
            $pinjaman = Pinjaman::where('nama_pinjaman', 'LIKE', "%$keyword%")
            ->orWhere('besar_pinjaman', 'LIKE', "%$keyword%")
            ->orWhere('tgl_pengajuan_pinjaman', 'LIKE', "%$keyword%")
            ->orWhere('tgl_acc_peminjam', 'LIKE', "%$keyword%")
            ->orWhere('tgl_pinjaman', 'LIKE', "%$keyword%")
            ->orWhere('tgl_pelunasan', 'LIKE', "%$keyword%")
            ->orWhere('ket', 'LIKE', "%$keyword%")
            ->orWhereHas('anggota', function ($query) use ($keyword) {
                 $query->where('nama', 'like', '%'.$keyword.'%');
                })->paginate(10);
            
        }else{
            $pinjaman = Pinjaman::orderBy('id', 'DESC')->paginate(10);
        }

        $nama_anggota = Anggota::orderBy('nama', 'ASC')->get();
        $nama_angsuran = Angsuran::orderBy('id', 'DESC')->get();

        return view('home', compact('pinjaman', 'keyword', 'nama_anggota', 'nama_angsuran'));
    }
}
