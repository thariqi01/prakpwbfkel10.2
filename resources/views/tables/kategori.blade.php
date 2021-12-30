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
            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
            <li class="breadcrumb-item active">Kategori</li>
          </ol>
        </div>
    </div>
  </div>
</section>
@endsection

@section('content')
<!-- TABEL KATEGORI -->
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
                <!-- /.MESSAGE CENTER -->
                <div class="card">
                    <div class="card-header">
                      <h5 class="card-title">Data Kategori</h5>
                      <div class="float-sm-right"> 
                        <a href="{{ url('kategori/bin') }}"  class="btn btn-danger btn-sm">
                          <i class="fa fa-trash fa-fw "></i>Bin
                        </a>                                           
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah-kat">
                          <i class="fa fa-plus fa-fw"></i>Tambah Kategori
                        </button>                          
                      </div>
                    </div>                
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <th> ID Kategori </th>
                        <th> Nama Kategori Bencana</th>                 
                        <th> Opsi </th>
                        </thead>
                        <tbody>                          
                          @foreach($kategori as $p)
                            <tr>                            
                              <td>{{ $p->id_kategoribencana}}</td>
                              <td>{{ $p->kategori_bencana }}</td>                           
                              <td class="text-center">                                      
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $p->id_kategoribencana }}">
                                  Edit
                                </button>                                                                                        
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $p->id_kategoribencana }}">
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

<!-- MODAL TAMBAH KATEGORI -->
<div class="modal fade" id="tambah-kat">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title">TAMBAH DATA KATEGORI BENCANA</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="kategori/store" method="post">
          @csrf                    
          <div class="form-group">
            <label for="kategori_bencana">Nama Kategori</label>
              <input type="text" name="kategori_bencana" class="form-control @error('kategori_bencana') is-invalid @enderror" value="{{ old('kategori_bencana') }}" placeholder="Masukkan nama kategori"/>                                              
              @error ('kategori_bencana')
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

<!-- MODAL EDIT KATEGORI -->
@foreach ($kategori as $p)
<div class="modal fade" id="edit{{ $p->id_kategoribencana }}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">{{ $p->kategori_bencana }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('kategori/edit/'.$p->id_kategoribencana) }}" method="post">
          @csrf                  

          <div class="form-group">
            <label for="kategori_bencana">Nama Kategori</label>
            <input type="text" name="kategori_bencana" id="kategori_bencana" class="form-control @error('kategori_bencana') is-invalid @enderror" value="{{ $p->kategori_bencana }}"/>                                              
            @error ('kategori_bencana')
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

<!-- MODAL HAPUS KATEGORI -->
@foreach ($kategori as $p)
<div class="modal fade" id="delete{{ $p->id_kategoribencana }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title">{{ $p->kategori_bencana }}</h4>
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
        <a href="{{ url('kategori/delete/'.$p->id_kategoribencana) }}" class="btn btn-primary">Yes</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@endsection