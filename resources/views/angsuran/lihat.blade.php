@extends('layouts.app')

@section('content')



<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_document_alt"></i>{{$lihat->anggota->nama}}</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="">Home</a></li>
              <li><i class="icon_document_alt"></i><a href="{{route('angsuran.index')}}">Angsuran</a></li>  
              <li>Lihat</li>                
            </ol>
        </div>
      </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Data Angsuran
                          </header>
                          <div class="panel-body">
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Kategori Pinjaman</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->kategoripinjaman->kategori}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Tanggal Pembayaran</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->tgl_pembayaran}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Angsuran Ke</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->angsuran_ke}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Besar Angsuran</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->besar_angsuran}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Keterangan</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->ket}}</p>
                                      </div>
                                </div>
                                <form action="{{route('angsuran.edit', $lihat->id)}}">
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