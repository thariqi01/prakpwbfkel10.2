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
            <li class="breadcrumb-item active">Kecamatan</li>
          </ol>
        </div>
    </div>
  </div>
</section>
@endsection

@section('content')
<!-- TABEL KECAMATAN -->
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
                      <h5 class="card-title">Data Kecamatan</h5>
                      <div class="float-sm-right"> 
                        <a href="{{ url('kecamatan/bin') }}"  class="btn btn-danger btn-sm">
                          <i class="fa fa-trash fa-fw "></i>Bin
                        </a>                                           
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah-kec">
                          <i class="fa fa-plus fa-fw"></i>Tambah Kecamatan
                        </button>                          
                      </div>
                    </div>                
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <th> ID Kecamatan </th>
                            <th> ID Kota </th>
                            <th> Nama Kecamatan </th>                 
                            <th> Opsi </th>
                            </thead>
                            <tbody>                          
                            @foreach($kecamatan as $p)
                                <tr>                            
                                <td>{{ $p->id_kecamatan }}</td>
                                <td>{{ $p->id_kota }}</td>
                                <td>{{ $p->nama_kecamatan }}</td>                           
                                <td class="text-center">                                      
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $p->id_kecamatan }}">
                                    Edit
                                    </button>                                                                                        
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $p->id_kecamatan }}">
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

<!-- MODAL TAMBAH KECAMATAN -->
<div class="modal fade" id="tambah-kec">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title">TAMBAH DATA KECAMATAN</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="kecamatan/store" method="post">
            @csrf                    
            <div class="form-group">
                <label for="id_kota">ID Kota</label>
                <select name="id_kota" class="form-control @error('id_kota') is-invalid @enderror" name="id_kota" class="form-control">
                    <option value="">-Silahkan Pilih Kota-</option>
                    @foreach ($kota as $data)
                    <option value="{{ $data->id_kota }}">{{ $data->nama_kota }}</option>                  
                    @endforeach
                    @error ('id_kota')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </select>
            </div>
            <div class="form-group">
              <label for="nama_kecamatan">Nama Kecamatan</label>
                <input type="text" name="nama_kecamatan" class="form-control @error('nama_kecamatan') is-invalid @enderror" value="{{ old('nama_kecamatan') }}" placeholder="Masukkan nama kecamatan"/>                                              
                @error ('nama_kecamatan')
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

<!-- MODAL EDIT KECAMATAN -->
@foreach ($kecamatan as $p)
<div class="modal fade" id="edit{{ $p->id_kecamatan }}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">{{ $p->nama_kecamatan }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('kecamatan/edit/'.$p->id_kecamatan) }}" method="post">
          @csrf                  

          <div class="form-group">
            <label for="id_kota">ID Kota</label>
            <select name="id_kota" class="form-control @error('id_kota') is-invalid @enderror" name="id_kota" class="form-control">
                <option value="">-Silahkan Pilih Kota-</option>
                @foreach ($kota as $data)
                <option value="{{ $data->id_kota }}">{{ $data->nama_kota }}</option>                  
                @endforeach
                @error ('id_kota')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </select>
          </div> 

          <div class="form-group">
            <label for="nama_kecamatan">Nama Kecamatan</label>
            <input type="text" name="nama_kecamatan" id="nama_kecamatan" class="form-control @error('nama_kecamatan') is-invalid @enderror" value="{{ $p->nama_kecamatan }}"/>                                              
            @error ('nama_kecamatan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>     

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Kecamatan</button>
          </div>  

        </form>   
      </div>      
    </div>
  </div>
</div>
@endforeach

<!-- MODAL HAPUS KECAMATAN -->
@foreach ($kecamatan as $p)
<div class="modal fade" id="delete{{ $p->id_kecamatan }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title">{{ $p->nama_kecamatan }}</h4>
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
        <a href="{{ url('kecamatan/delete/'.$p->id_kecamatan) }}" class="btn btn-primary">Yes</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@endsection