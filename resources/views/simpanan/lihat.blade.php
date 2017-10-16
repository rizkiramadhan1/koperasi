@extends('layouts.app')

@section('content')



<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_documents_alt"></i>{{$lihat->anggota->nama}}</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{url('home')}}">Home</a></li>
              <li><i class="icon_documents_alt"></i><a href="{{route('simpanan.index')}}">Simpanan</a></li>  
              <li>Lihat</li>                
            </ol>
        </div>
      </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Data Simpanan
                          </header>
                          <div class="panel-body">
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Nama Simpanan</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->nama_simpanan}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Tanggal Simpanan</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->tgl_simpanan}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Besar Simpanan</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->besar_simpanan}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Keterangan</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->ket}}</p>
                                      </div>
                                </div>
                                <form action="{{route('simpanan.edit', $lihat->id)}}">
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