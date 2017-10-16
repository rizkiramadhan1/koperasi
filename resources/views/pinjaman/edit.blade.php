@extends('layouts.app')

@section('content')



<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_table"></i>Ubah Data Pinjaman</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{url('home')}}">Home</a></li>
              <li><i class="icon_table"></i><a href="{{route('home')}}">Pinjaman</a></li>  
              <li>Ubah</li>                
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
                              <form class="form-horizontal " method="POST" action="{{route('pinjaman.prosesedit', $edit->id)}}">
                              {{ csrf_field() }}
                              	<div class="form-group">
                                      <label class="col-sm-2 control-label">Nama Pinjaman</label>
                                      <div class="col-sm-4">
                                          <input type="text" name="nama_pinjaman" value="{{$edit->nama_pinjaman}}" class="form-control round-input">
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
                                      <label class="col-sm-2 control-label">Angsuran atas Nama</label>
                                      <div class="col-sm-4">
                                          <select name="nama_angsuran" class="form-control m-bot15 round-input">
                                          @foreach($nama_angsuran as $data1)
                                            <option value="{{$data1->id}}"
                                            @if($edit->anggota_id == $data1->id)
                                            selected = "selected"
                                            @endif
                                            >{{$data1->anggota->nama}}</option>
                                          @endforeach
                                          </select>
                                      </div>
                                </div>

                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Besar Pinjaman</label>
                                      <div class="col-sm-4">
                                          <input type="text" name="besar_pinjaman" value="{{$edit->besar_pinjaman}}" class="form-control round-input">
                                      </div>
                                </div>

                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Tanggal Pengajuan Pinjaman</label>
                                      <div class="col-sm-4">
                                          <input type="date" name="tgl_pengajuan_pinjaman" value="{{$edit->tgl_pengajuan_pinjaman}}" class="form-control round-input">
                                      </div>
                                </div>

                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Tanggal Acc Peminjam</label>
                                      <div class="col-sm-4">
                                          <input type="date" name="tgl_acc_peminjam" value="{{$edit->tgl_acc_peminjam}}" class="form-control round-input">
                                      </div>
                                </div>

                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Tanggal Pinjaman</label>
                                      <div class="col-sm-4">
                                          <input type="date" name="tgl_pinjaman" value="{{$edit->tgl_pinjaman}}" class="form-control round-input">
                                      </div>
                                </div>

                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Tanggal Pelunasan</label>
                                      <div class="col-sm-4">
                                          <input type="date" name="tgl_pelunasan" value="{{$edit->tgl_pelunasan}}" class="form-control round-input">
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