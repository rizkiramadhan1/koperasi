@extends('layouts.app')

@section('content')



<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_table"></i>{{$lihat->anggota->nama}}</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{url('home')}}">Home</a></li>
              <li><i class="icon_table"></i><a href="{{route('home')}}">Pinjaman</a></li>  
              <li>Lihat</li>                
            </ol>
        </div>
      </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Data Pinjaman
                          </header>
                          <div class="panel-body">
                                <div class="form-group">
                                      <label class="col-lg-3 control-label">Nama Pinjaman</label>
                                      <div class="col-lg-9">
                                          <p class="form-control-static">{{$lihat->nama_pinjaman}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-3 control-label">Besar Pinjaman</label>
                                      <div class="col-lg-9">
                                          <p class="form-control-static">{{$lihat->besar_pinjaman}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-3 control-label">Tanggal Pengajuan Pinjaman</label>
                                      <div class="col-lg-9">
                                          <p class="form-control-static">{{$lihat->tgl_pengajuan_pinjaman}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-3 control-label">Tanggal Acc Peminjam</label>
                                      <div class="col-lg-9">
                                          <p class="form-control-static">{{$lihat->tgl_acc_peminjam}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-3 control-label">Tanggal Pinjaman</label>
                                      <div class="col-lg-9">
                                          <p class="form-control-static">{{$lihat->tgl_pinjaman}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-3 control-label">Tanggal Pelunasan</label>
                                      <div class="col-lg-9">
                                          <p class="form-control-static">{{$lihat->tgl_pelunasan}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-3 control-label">Keterangan</label>
                                      <div class="col-lg-8">
                                          <p class="form-control-static">{{$lihat->ket}}</p>
                                      </div>
                                </div>
                                <form action="{{route('pinjaman.edit', $lihat->id)}}">
                                <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" class="btn btn-primary">Ubah</button>
                                      </div>
                                </div>
                                </form>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>

@endsection