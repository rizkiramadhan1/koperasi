@extends('layouts.app')

@section('content')



<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_profile"></i>Ubah Data Anggota</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="">Home</a></li>
              <li><i class="icon_profile"></i><a href="{{route('anggota.index')}}">Anggota</a></li>  
              <li>Ubah</li>                
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
                              <form class="form-horizontal " method="POST" action="{{route('anggota.prosesedit', $edit->id)}}">
                              {{ csrf_field() }}
                              	<div class="form-group">
                                      <label class="col-sm-2 control-label">Nama</label>
                                      <div class="col-sm-4">
                                          <input type="text" name="nama" value="{{$edit->nama}}" class="form-control round-input">
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Alamat</label>
                                      <div class="col-sm-6">
                                          <input type="text" name="alamat" value="{{$edit->alamat}}" class="form-control round-input">
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                      <div class="col-sm-3">
                                          <input type="date" name="tgl_lahir" value="{{$edit->tgl_lahir}}" class="form-control round-input">
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Tempat Lahir</label>
                                      <div class="col-sm-4">
                                          <input type="text" name="tmp_lahir" value="{{$edit->tmp_lahir}}" class="form-control round-input">
                                      </div>
                                </div>	
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Jenis Kelamin</label>
                                      <div class="col-sm-4">
                                          <select name="j_kel" class="form-control m-bot15 round-input">
                                              <option value="p"
                                              @if($edit->j_kel == 'p')
                                              selected="selected"
                                              @endif
                                              >Pria</option>
                                              <option value="w"
                                              @if($edit->j_kel == 'w')
                                              selected="selected"
                                              @endif
                                              >Wanita</option>
                                          </select>
                                      </div>
                                </div> 
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Status</label>
                                      <div class="col-sm-4">
                                          <input type="text" name="status" value="{{$edit->status}}" class="form-control round-input">
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Nomor Telepon</label>
                                      <div class="col-sm-4">
                                          <input type="text" name="no_telp" value="{{$edit->no_telp}}" class="form-control round-input">
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