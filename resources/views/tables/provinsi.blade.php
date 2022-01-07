@extends('layout.template')

@section('title','dashboard')

@section('breadcrumbs')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tabel Master</h1>
      </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Provinsi</li>
          </ol>
        </div>
    </div>
  </div>
</section>
@endsection

@section('content')
<!-- TABEL PROVINSI -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">            
                <div class="card">
                    <div class="card-header">
                      <h5 class="card-title">Data Provinsi</h5>
                      <div class="float-sm-right"> 
                        <a href="{{ url('dashboard/provinsi/bin') }}"  class="btn btn-danger btn-sm">
                          <i class="fa fa-trash fa-fw "></i>Bin
                        </a>                                           
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah-prov">
                          <i class="fa fa-plus fa-fw"></i>Tambah Provinsi
                        </button>                          
                      </div>
                    </div>                
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <th> ID Provinsi </th>
                        <th> Nama Provinsi</th>                 
                        <th> Opsi </th>
                        </thead>
                        <tbody>  
                          @if($provinsi->count() > 0)                        
                          @foreach($provinsi as $p)
                            <tr>                            
                              <td>{{ $p->id_provinsi }}</td>
                              <td>{{ $p->nama_provinsi }}</td>                           
                              <td class="text-center">                                      
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $p->id_provinsi }}">
                                  Edit
                                </button>                                                                                        
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $p->id_provinsi }}">
                                  Delete
                                </button>
                              </td>
                            </tr>
                          @endforeach 
                          @else
                          <tr>
                            <td colspan="5" class="text-center"> Tidak ada data</td>
                          </tr>    
                          @endif           
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

<!-- MODAL TAMBAH PROVINSI -->
<div class="modal fade" id="tambah-prov">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title">TAMBAH DATA PROVINSI</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="provinsi/store" method="post">
          @csrf                    
          <div class="form-group">
            <label for="nama_provinsi">Nama Provinsi</label>
              <input type="text" name="nama_provinsi" class="form-control @error('nama_provinsi') is-invalid @enderror" value="{{ old('nama_provinsi') }}" placeholder="Masukkan nama provinsi"/>                                              
              @error ('nama_provinsi')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>          
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </div>                        
        </form>   
      </div>      
    </div>
  </div>
</div>

<!-- MODAL EDIT PROVINSI -->
@foreach ($provinsi as $p)
<div class="modal fade" id="edit{{ $p->id_provinsi }}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">{{ $p->nama_provinsi }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('dashboard/provinsi/edit/'.$p->id_provinsi) }}" method="post">
          @csrf                  

          <div class="form-group">
            <label for="nama_provinsi">Nama Provinsi</label>
            <input type="text" name="nama_provinsi" id="nama_provinsi" class="form-control @error('nama_provinsi') is-invalid @enderror" value="{{ $p->nama_provinsi }}"/>                                              
            @error ('nama_provinsi')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>     

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Provinsi</button>
          </div>  

        </form>   
      </div>      
    </div>
  </div>
</div>
@endforeach

<!-- MODAL HAPUS PROVINSI -->
@foreach ($provinsi as $p)
<div class="modal fade" id="delete{{ $p->id_provinsi }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title">{{ $p->nama_provinsi }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data ini?</p>
        <p>(data akan dipindahkan ke bin)</p>         
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <a href="{{ url('dashboard/provinsi/delete/'.$p->id_provinsi) }}" class="btn btn-primary">Yes</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@endsection