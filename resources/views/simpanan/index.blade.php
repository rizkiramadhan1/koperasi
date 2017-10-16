@extends('layouts.app')

@section('content')



<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_documents_alt"></i>Simpanan <a href="#myModal" data-toggle="modal"><i class="icon_plus_alt2"></i></a></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{url('home')}}">Home</a></li>
              <li><i class="icon_documents_alt"></i>Simpanan</li>                
            </ol>
        </div>
      </div>
              <!-- page start-->
              <div class="row">

                  <div class="col-lg-12">

                      <section class="panel">
                          <header class="panel-heading">
                            <form class="navbar-form" action="{{ url('simpanan')}}" style="padding-top: 10px;padding-bottom: 10px">
                                <input class="form-control" name="search" placeholder="Search" type="text">
                            </form>
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                <th>No</th>
                                <th><i class="fa fa-dot-circle-o"></i> Nama Simpanan</th>
                                <th><i class="icon_profile"></i> Nama Anggota</th>
                                <th><i class="icon_calendar"></i> Tanggal Simpanan</th>
                                <th><i class="fa fa-money"></i> Besar Simpanan</th>
                                <th><i class="fa fa-file"></i> Keterangan</th>
                                <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              @foreach($simpanan as $data)
                              <tr>
                                <td>{{ (( $simpanan->currentPage() - 1) * $simpanan->perPage() + $loop->iteration )}}</td>
                                <td>{{$data->nama_simpanan}}</td>
                                <td>
                                    {{$data->anggota->nama}}
                                </td>
                                <td>{{$data->tgl_simpanan}}</td>
                                <td>{{$data->besar_simpanan}}</td>
                                <td>{{$data->ket}}</td>
                                <td>
                                <div class="btn-group">
                                  <a class="btn btn-primary" href="{{route('simpanan.edit', $data->id)}}"><i class="icon_plus_alt2"></i></a>
                                  <a class="btn btn-success" href="{{route('simpanan.lihat', $data->id)}}"><i class="icon_check_alt2"></i></a>
                                  <a class="btn btn-danger" href="{{route('simpanan.delete', $data->id)}}"><i class="icon_close_alt2"></i></a>
                                </div>
                                </td>
                              </tr> 
                              @endforeach                   
                           </tbody>
                        </table>
                        {!! $simpanan->appends(['search' => $keyword])->render() !!}
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

                    <form role="form" method="POST" action="{{route('simpanan.prosestambah')}}">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nama">Nama Simpanan</label>
                            <input type="text" name="nama_simpanan" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="nama_anggota">Nama Anggota</label>
                            <select name="nama_anggota" class="form-control m-bot15">
                            @foreach($nama_anggota as $data)
                                <option value="{{$data->id}}">{{$data->nama}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Simpanan</label>
                            <input type="date" name="tgl_simpanan" class="form-control" name="tgl_lahir">
                        </div>
                        <div class="form-group">
                            <label for="nama">Besar Simpanan</label>
                            <input type="text" name="besar_simpanan" class="form-control" name="nama">
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