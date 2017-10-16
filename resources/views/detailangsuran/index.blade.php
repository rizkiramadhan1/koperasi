@extends('layouts.app')

@section('content')



<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_document_alt"></i>Detail Angsuran <a href="#myModal" data-toggle="modal"><i class="icon_plus_alt2"></i></a></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{url('home')}}">Home</a></li>
              <li><i class="icon_document_alt"></i>Detail Angsuran</li>                
            </ol>
        </div>
      </div>
              <!-- page start-->
              <div class="row">

                  <div class="col-lg-12">

                      <section class="panel">
                          <header class="panel-heading">
                            <form class="navbar-form" action="{{ url('detailangsuran')}}" style="padding-top: 10px;padding-bottom: 10px">
                                <input class="form-control" name="search" placeholder="Search" type="text">
                            </form>
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                <th>No</th>
                                <th><i class="icon_calendar"></i> Tanggal Jatuh Tempo</th>
                                <th><i class="fa fa-money"></i> Besar Angsuran</th>
                                <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              @foreach($detailangsuran as $data)
                              <tr>
                                <td>{{ (( $detailangsuran->currentPage() - 1) * $detailangsuran->perPage() + $loop->iteration )}}</td>
                                <td>{{$data->tgl_jatuh_tempo}}</td>
                                <td>
                                    {{$data->besar_angsuran}}
                                </td>
                                <td>
                                <div class="btn-group">
                                  <a class="btn btn-success" href="{{route('detailangsuran.lihat', $data->angsuran_id)}}"><i class="icon_check_alt2"></i></a>
                                  <a class="btn btn-danger" href="{{route('detailangsuran.delete', $data->angsuran_id)}}"><i class="icon_close_alt2"></i></a>
                                </div>
                                </td>
                              </tr> 
                              @endforeach                   
                           </tbody>
                        </table>
                        {!! $detailangsuran->appends(['search' => $keyword])->render() !!}
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

                    <form role="form" method="POST" action="{{route('detailangsuran.prosestambah')}}">
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
                            <label for="nama">Tanggal Jatuh Tempo</label>
                            <input type="date" name="tgl_jatuh_tempo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama">Besar Angsuran</label>
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