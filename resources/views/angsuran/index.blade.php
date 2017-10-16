@extends('layouts.app')

@section('content')



<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_document_alt"></i>Angsuran <a href="#myModal" data-toggle="modal"><i class="icon_plus_alt2"></i></a></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{url('home')}}">Home</a></li>
              <li><i class="icon_document_alt"></i>Angsuran</li>                
            </ol>
        </div>
      </div>
              <!-- page start-->
              <div class="row">

                  <div class="col-lg-12">

                      <section class="panel">
                          <header class="panel-heading">
                            <form class="navbar-form" action="{{ url('angsuran')}}" style="padding-top: 10px;padding-bottom: 10px">
                                <input class="form-control" name="search" placeholder="Search" type="text">
                            </form>
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                <th>No</th>
                                <th><i class="icon_profile"></i> Nama Anggota</th>
                                <th><i class="icon_table"></i> Kategori</th>
                                <th><i class="icon_calendar"></i> Tanggal Pembayaran</th>
                                <th><i class="icon_document_alt"></i> Angsuran Ke</th>
                                <th><i class="fa fa-file"></i> Keterangan</th>
                                <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              @foreach($angsuran as $data)
                              <tr>
                                <td>{{ (( $angsuran->currentPage() - 1) * $angsuran->perPage() + $loop->iteration )}}</td>
                                <td>{{$data->anggota->nama}}</td>
                                <td>{{$data->kategoripinjaman->kategori}}</td>
                                <td>{{$data->tgl_pembayaran}}</td>
                                <td>{{$data->angsuran_ke}}</td>
                                <td>{{$data->ket}}</td>
                                <td>
                                <div class="btn-group">
                                  <a class="btn btn-primary" href="{{route('angsuran.edit', $data->id)}}"><i class="icon_plus_alt2"></i></a>
                                  <a class="btn btn-success" href="{{route('angsuran.lihat', $data->id)}}"><i class="icon_check_alt2"></i></a>
                                  <a class="btn btn-danger" href="{{route('angsuran.delete', $data->id)}}"><i class="icon_close_alt2"></i></a>
                                </div>
                                </td>
                              </tr> 
                              @endforeach                   
                           </tbody>
                        </table>
                        {!! $angsuran->appends(['search' => $keyword])->render() !!}
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

                    <form role="form" method="POST" action="{{route('angsuran.prosestambah')}}">
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
                            <label for="nama_kategori">Kategori</label>
                            <select name="nama_kategori" class="form-control m-bot15">
                              @foreach($nama_kategori as $data)
                                <option value="{{$data->id}}">{{$data->kategori}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pembayaran">Tanggal Pembayaran</label>
                            <input type="date" name="tgl_pembayaran" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="angsuran_ke">Angsuran Ke</label>
                            <input type="number" name="angsuran_ke" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="besar_angsuran">Besar Angsuran</label>
                            <input type="text" name="besar_angsuran" class="form-control">
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