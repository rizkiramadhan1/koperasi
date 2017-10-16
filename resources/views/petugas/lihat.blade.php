@extends('layouts.app')

@section('content')



<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_desktop"></i>{{$lihat->nama}}</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="">Home</a></li>
              <li><i class="icon_desktop"></i><a href="{{route('anggota.index')}}">Petugas Koperasi</a></li>  
              <li>Lihat</li>                
            </ol>
        </div>
      </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Data Anggota
                          </header>
                          <div class="panel-body">
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Nama</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->nama}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Alamat</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->alamat}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Tanggal Lahir</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->tgl_lahir}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Tempat Lahir</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->tmp_lahir}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Nomor Telepon</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->no_telp}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Keterangan</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->ket}}</p>
                                      </div>
                                </div>
                                <form action="{{route('petugas.edit', $lihat->id)}}">
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