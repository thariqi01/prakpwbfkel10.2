@extends('layout.template')

@section('title','bencana')

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
            <li class="breadcrumb-item active">Bencana</li>
          </ol>
        </div>
    </div>
  </div>
</section>
@endsection

@section('content')
<!-- TABEL BENCANA -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">              
              <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">Data Bencana</h5>
                    <div class="float-sm-right"> 
                      <a href="{{ url('dashboard/bencana/bin') }}"  class="btn btn-danger btn-sm">
                        <i class="fa fa-trash fa-fw "></i>Bin
                      </a>                                           
                      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah-bencana">
                        <i class="fa fa-plus fa-fw"></i>Tambah Kategori
                      </button>                          
                    </div>
                  </div>                
                  <!-- /.card-header -->
                  <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <th> ID Bencana </th>
                      <th> ID Kategori Bencana </th>
                      <th> Nama Bencana</th>                 
                      <th> Opsi </th>
                      </thead>
                      <tbody>                          
                        @foreach($bencana as $p)
                          <tr>                            
                            <td>{{ $p->id_bencana}}</td>
                            <td>{{ $p->id_kategoribencana}}</td>
                            <td>{{ $p->nama_bencana }}</td>                           
                            <td class="text-center">                                      
                              <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $p->id_bencana }}">
                                Edit
                              </button>                                                                                        
                              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $p->id_bencana }}">
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

<!-- MODAL TAMBAH BENCANA -->
<div class="modal fade" id="tambah-bencana">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title">TAMBAH DATA BENCANA</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="bencana/store" method="post">
          @csrf              
          <div class="form-group">
            <label for="id_kategoribencana">ID Kategori Bencana</label>
            <select name="id_kategoribencana" class="form-control @error('id_kategoribencana') is-invalid @enderror" name="id_kategoribencana" class="form-control">
                <option value="">-Silahkan Pilih Kategori Bencana-</option>
                @foreach ($kategori as $data)
                <option value="{{ $data->id_kategoribencana }}">{{ $data->kategori_bencana }}</option>                  
                @endforeach
                @error ('id_kategoribencana')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </select>
          </div>      
          <div class="form-group">
            <label for="nama_bencana">Nama Bencana</label>
              <input type="text" name="nama_bencana" class="form-control @error('nama_bencana') is-invalid @enderror" value="{{ old('nama_bencana') }}" placeholder="Masukkan nama bencana"/>                                              
              @error ('nama_bencana')
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

<!-- MODAL EDIT BENCANA -->
@foreach ($bencana as $p)
<div class="modal fade" id="edit{{ $p->id_bencana }}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">{{ $p->nama_bencana }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('dashboard/bencana/edit/'.$p->id_bencana) }}" method="post">
          @csrf                  

          <div class="form-group">
            <label for="id_kategoribencana">ID Kategori Bencana</label>
            <select name="id_kategoribencana" class="form-control @error('id_kategoribencana') is-invalid @enderror" name="id_kategoribencana" class="form-control">
                <option value="">-Silahkan Pilih Kategori Bencana-</option>
                @foreach ($kategori as $data)
                <option value="{{ $data->id_kategoribencana }}">{{ $data->kategori_bencana }}</option>                  
                @endforeach
                @error ('id_kategoribencana')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </select>
          </div> 

          <div class="form-group">
            <label for="nama_bencana">Nama Bencana</label>
            <input type="text" name="nama_bencana" id="nama_bencana" class="form-control @error('nama_bencana') is-invalid @enderror" value="{{ $p->nama_bencana }}"/>                                              
            @error ('nama_bencana')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>     

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Kategori</button>
          </div>  

        </form>   
      </div>      
    </div>
  </div>
</div>
@endforeach

<!-- MODAL HAPUS BENCANA -->
@foreach ($bencana as $p)
<div class="modal fade" id="delete{{ $p->id_bencana }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title">{{ $p->nama_bencana }}</h4>
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
        <a href="{{ url('dashboard/bencana/delete/'.$p->id_bencana) }}" class="btn btn-primary">Yes</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@endsection