@extends('layouts.app')

@section('content')



<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_table"></i>Pinjaman <a href="#myModal" data-toggle="modal"><i class="icon_plus_alt2"></i></a></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{url('home')}}">Home</a></li>
              <li><i class="icon_table"></i>Pinjaman</li>                
            </ol>
        </div>
      </div>
              <!-- page start-->
              <div class="row">

                  <div class="col-lg-12">

                      <section class="panel">
                          <header class="panel-heading">
                            <form class="navbar-form" action="{{ url('home')}}" style="padding-top: 10px;padding-bottom: 10px">
                                <input class="form-control" name="search" placeholder="Search" type="text">
                            </form>
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                <th>No</th>
                                <th><i class="icon_profile"></i> Nama Anggota</th>
                                <th><i class="fa fa-dot-circle-o"></i> Nama Pinjaman</th>
                                <th><i class="icon_calendar"></i> Tanggal Pinjaman</th>
                                <th><i class="fa fa-money"></i> Besar Pinjaman</th>
                                <th><i class="fa fa-file"></i> Keterangan</th>
                                <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              @foreach($pinjaman as $data)
                              <tr>
                                <td>{{ (( $pinjaman->currentPage() - 1) * $pinjaman->perPage() + $loop->iteration )}}</td>
                                <td>{{$data->anggota->nama}}</td>
                                <td>
                                    {{$data->nama_pinjaman}}
                                </td>
                                <td>{{$data->tgl_pinjaman}}</td>
                                <td>{{$data->besar_pinjaman}}</td>
                                <td>{{$data->ket}}</td>
                                <td>
                                <div class="btn-group">
                                  <a class="btn btn-primary" href="{{route('pinjaman.edit', $data->id)}}"><i class="icon_plus_alt2"></i></a>
                                  <a class="btn btn-success" href="{{route('pinjaman.lihat', $data->id)}}"><i class="icon_check_alt2"></i></a>
                                  <a class="btn btn-warning" href="{{route('pinjaman.angsuran_anggota', $data->anggota_id)}}"><i class="icon_check_alt2"></i></a>
                                  <a class="btn btn-danger" href="{{route('pinjaman.delete', $data->id)}}"><i class="icon_close_alt2"></i></a>
                                </div>
                                </td>
                              </tr> 
                              @endforeach                   
                           </tbody>
                        </table>
                        {!! $pinjaman->appends(['search' => $keyword])->render() !!}
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>

      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Tambah Data</h4>
                </div>
                <div class="modal-body">

                    <form role="form" method="POST" action="{{route('pinjaman.prosestambah')}}">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nama_anggota">Nama Anggota</label>
                            <select name="nama_anggota" class="form-control m-bot15">
                            @foreach($nama_anggota as $data)
                                <option value="{{$data->id}}">{{$data->nama}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_pinjaman">Nama Pinjaman</label>
                            <input type="text" name="nama_pinjaman" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="besar_pinjaman">Besar Pinjaman</label>
                            <input type="text" name="besar_pinjaman" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tgl_pengajuan_pinjaman">Tanggal Pengajuan Pinjaman</label>
                            <input type="date" name="tgl_pengajuan_pinjaman" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tgl_acc_peminjam">Tanggal Acc Peminjam</label>
                            <input type="date" name="tgl_acc_peminjam" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tgl_pinjaman">Tanggal Pinjaman</label>
                            <input type="date" name="tgl_pinjaman" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tgl_pelunasan">Tanggal Pelunasan</label>
                            <input type="date" name="tgl_pelunasan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <input type="text" name="ket"class="form-control" name="ket">
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection