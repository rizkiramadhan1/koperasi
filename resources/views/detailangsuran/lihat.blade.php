@extends('layouts.app')

@section('content')



<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_calendar"></i>{{$lihat->tgl_jatuh_tempo}}</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{url('home')}}">Home</a></li>
              <li><i class="fa fa-money"></i>{{$lihat->besar_angsuran}}</li>                
            </ol>
        </div>
      </div>
              <!-- page start-->
              <div class="row">

                  <div class="col-lg-12">

                      <section class="panel">
                          <header class="panel-heading">
                            
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                <th>No</th>
                                <th><i class="icon_profile"></i> Nama Anggota</th>
                                <th><i class="fa fa-dot-circle-o"></i>  Kategori Pinjaman</th>
                                <th><i class="icon_calendar"></i> Tanggal Pembayaran</th>
                                <th><i class="fa fa-dot-circle-o"></i> Angsuran ke</th>
                                <th><i class="fa fa-money"></i> Besar Angsuran</th>
                                <th><i class="fa fa-file"></i> Keterangan</th>
                              </tr>
                              @foreach($tampilkan as $data)
                              <tr>
                                <td>{{ (( $tampilkan->currentPage() - 1) * $tampilkan->perPage() + $loop->iteration )}}</td>
                                <td>{{$data->anggota->nama}}</td>
                                <td>
                                    {{$data->kategoripinjaman->kategori}}
                                </td>
                                <td>{{$data->tgl_pembayaran}}</td>
                                <td>{{$data->angsuran_ke}}</td>
                                <td>{{$data->besar_angsuran}}</td>
                                <td>{{$data->ket}}</td>
                              </tr> 
                              @endforeach                   
                           </tbody>
                        </table>
                        {{$tampilkan->render()}}
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>

@endsection