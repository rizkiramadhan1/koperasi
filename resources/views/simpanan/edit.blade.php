@extends('layouts.app')

@section('content')



<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_documents_alt"></i>Ubah Data Simpanan</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{url('home')}}">Home</a></li>
              <li><i class="icon_documents_alt"></i><a href="{{route('simpanan.index')}}">Simpanan</a></li>  
              <li>Ubah</li>                
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
                              <form class="form-horizontal " method="POST" action="{{route('simpanan.prosesedit', $edit->id)}}">
                              {{ csrf_field() }}
                              	<div class="form-group">
                                      <label class="col-sm-2 control-label">Nama Simpanan</label>
                                      <div class="col-sm-4">
                                          <input type="text" name="nama_simpanan" value="{{$edit->nama_simpanan}}" class="form-control round-input">
                                      </div>
                                </div>

                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Nama Anggota</label>
                                      <div class="col-sm-4">
                                          <select name="nama_anggota" class="form-control m-bot15 round-input">
                                          @foreach($nama_anggota as $data1)
                                            <option value="{{$data1->id}}"
                                            @if($edit->anggota_id == $data1->id)
                                            selected = "selected"
                                            @endif
                                            >{{$data1->nama}}</option>
                                          @endforeach
                                          </select>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Tanggal Simpanan</label>
                                      <div class="col-sm-3">
                                          <input type="date" name="tgl_simpanan" value="{{$edit->tgl_simpanan}}" class="form-control round-input">
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Besar Simpanan</label>
                                      <div class="col-sm-4">
                                          <input type="text" name="besar_simpanan" value="{{$edit->besar_simpanan}}" class="form-control round-input">
                                      </div>
                                </div>   
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Keterangan</label>
                                      <div class="col-sm-6">
                                          <input type="text" name="ket" value="{{$edit->ket}}" class="form-control round-input">
                                      </div>
                                </div>
                                <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" class="btn btn-primary">Kirim</button>
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