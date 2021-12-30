@extends('layout.template')

@section('title','dashboard')

@section('breadcrumbs')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tabel Transaksi</h1>
      </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
            <li class="breadcrumb-item active">Detail Korban</li>
          </ol>
        </div>
    </div>
  </div>
</section>
@endsection

@section('content')
<!-- TABEL KOTA -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <!-- MESSAGE CENTER -->
                @if (session('tambah'))
                <div class="alert alert-success">
                    {{ session('tambah') }}
                </div>
                @endif
                @if (session('edit'))
                <div class="alert alert-success">
                    {{ session('edit') }}
                </div>
                @endif                 
                @if (session('hapus'))
                <div class="alert alert-success">
                    {{ session('hapus') }}
                </div>
                @endif        
                <!-- /.MESSAGE CENTER -->
                <div class="card">
                    <div class="card-header">
                      <h5 class="card-title">Data Detail Korban</h5>
                      <div class="float-sm-right"> 
                        <a href="{{ url('detailkorban/bin') }}"  class="btn btn-danger btn-sm">
                          <i class="fa fa-trash fa-fw "></i>Bin
                        </a>                                           
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah-pelaporan">
                          <i class="fa fa-plus fa-fw"></i>Tambah Detail Korban
                        </button>                          
                      </div>
                    </div>                
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <th> ID Detail Korban </th>
                            <th> ID Pelaporan </th>
                            <th> NIK </th>
                            <th> Nama </th>
                            <th> Umur </th>
                            <th> Kondisi </th>                 
                            <th> Opsi </th>
                            </thead>
                            <tbody>                          
                            @foreach($detailkorban as $p)
                                <tr>                            
                                <td>{{ $p->id_detailkorban }}</td>
                                <td>{{ $p->id_pelaporan }}</td>
                                <td>{{ $p->nik }}</td> 
                                <td>{{ $p->nama }}</td>                          
                                <td>{{ $p->umur }}</td>
                                <td>{{ $p->kondisi }}</td>
                                <td class="text-center">                                      
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $p->id_detailkorban }}">
                                    Edit
                                    </button>                                                                                        
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $p->id_detailkorban }}">
                                    Delete
                                    </button>
                                </td>
                                </tr>
                            @endforeach            
                            </tbody>                      
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->          
            </div>
            <!-- /.col -->
        </div>
      <!-- /.row -->
    </div>
</section>




@endsection