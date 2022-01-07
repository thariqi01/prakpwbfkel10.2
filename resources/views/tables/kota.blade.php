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
            <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Kota</li>
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
                <div class="card">
                    <div class="card-header">
                      <h5 class="card-title">Data Kota</h5>
                      <div class="float-sm-right"> 
                        <a href="{{ url('dashboard/kota/bin') }}"  class="btn btn-danger btn-sm">
                          <i class="fa fa-trash fa-fw "></i>Bin
                        </a>                                           
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah-kota">
                          <i class="fa fa-plus fa-fw"></i>Tambah Kota
                        </button>                          
                      </div>
                    </div>                
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <th> ID Kota </th>
                            <th> ID Provinsi </th>
                            <th> Nama Kota </th>                 
                            <th> Opsi </th>
                            </thead>
                            <tbody>             
                            @if($kota->count() > 0)             
                            @foreach($kota as $p)
                                <tr>                            
                                <td>{{ $p->id_kota }}</td>
                                <td>{{ $p->id_provinsi }}</td>
                                <td>{{ $p->nama_kota }}</td>                           
                                <td class="text-center">                                      
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $p->id_kota }}">
                                    Edit
                                    </button>                                                                                        
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $p->id_kota }}">
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

<!-- MODAL TAMBAH KOTA -->
<div class="modal fade" id="tambah-kota">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title">TAMBAH DATA KOTA</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="kota/store" method="post">
            @csrf                    
            <div class="form-group">
                <label for="id_provinsi">ID provinsi</label>
                <select name="id_provinsi" class="form-control @error('id_provinsi') is-invalid @enderror" name="id_provinsi" class="form-control">
                    <option value="">-Silahkan Pilih Provinsi-</option>
                    @foreach ($provinsi as $data)
                    <option value="{{ $data->id_provinsi }}">{{ $data->nama_provinsi }}</option>                  
                    @endforeach
                    @error ('id_provinsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </select>
            </div>
            <div class="form-group">
              <label for="nama_kota">Nama Kota</label>
                <input type="text" name="nama_kota" class="form-control @error('nama_kota') is-invalid @enderror" value="{{ old('nama_kota') }}" placeholder="Masukkan nama kota"/>                                              
                @error ('nama_kota')
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

<!-- MODAL EDIT KOTA -->
@foreach ($kota as $p)
<div class="modal fade" id="edit{{ $p->id_kota }}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">{{ $p->nama_kota }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('dashboard/kota/edit/'.$p->id_kota) }}" method="post">
          @csrf                  

          <div class="form-group">
            <label for="id_provinsi">ID Kota</label>
            <select name="id_provinsi" class="form-control @error('id_provinsi') is-invalid @enderror" name="id_provinsi" class="form-control">
                <option value="">-Silahkan Pilih Provinsi-</option>
                @foreach ($provinsi as $data)
                <option value="{{ $data->id_provinsi }}">{{ $data->nama_provinsi }}</option>                  
                @endforeach
                @error ('id_provinsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </select>
          </div> 

          <div class="form-group">
            <label for="nama_kota">Nama Kota</label>
            <input type="text" name="nama_kota" id="nama_kota" class="form-control @error('nama_kota') is-invalid @enderror" value="{{ $p->nama_kota }}"/>                                              
            @error ('nama_kota')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>     

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Kota</button>
          </div>  

        </form>   
      </div>      
    </div>
  </div>
</div>
@endforeach

<!-- MODAL HAPUS KOTA -->
@foreach ($kota as $p)
<div class="modal fade" id="delete{{ $p->id_kota }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title">{{ $p->nama_kota }}</h4>
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
        <a href="{{ url('dashboard/kota/delete/'.$p->id_kota) }}" class="btn btn-primary">Yes</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@endsection