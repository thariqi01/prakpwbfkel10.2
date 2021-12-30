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
            <li class="breadcrumb-item active">Pelaporan</li>
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
                      <h5 class="card-title">Data Pelaporan</h5>
                      <div class="float-sm-right"> 
                        <a href="{{ url('pelaporan/bin') }}"  class="btn btn-danger btn-sm">
                          <i class="fa fa-trash fa-fw "></i>Bin
                        </a>                                           
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah-pelaporan">
                          <i class="fa fa-plus fa-fw"></i>Tambah Pelaporan
                        </button>                          
                      </div>
                    </div>                
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <th> ID Pelaporan </th>
                            <th> ID Pelapor </th>
                            <th> ID Bencana </th>
                            <th> ID Kecamatan </th>
                            <th> Waktu Bencana </th>
                            <th> Status </th>                 
                            <th> Opsi </th>
                            </thead>
                            <tbody>                          
                            @foreach($pelaporan as $p)
                                <tr>                            
                                <td>{{ $p->id_pelaporan }}</td>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->id_bencana }}</td> 
                                <td>{{ $p->id_kecamatan }}</td>                          
                                <td>{{ $p->waktu_bencana }}</td>
                                <td>{{ $p->status }}</td>
                                <td class="text-center">                                      
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $p->id_pelaporan }}">
                                    Edit
                                    </button>                                                                                        
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $p->id_pelaporan }}">
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

<!-- MODAL TAMBAH PELAPORAN -->
<div class="modal fade" id="tambah-pelaporan">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title">TAMBAH PELAPORAN</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="pelaporan/store" method="post">
          @csrf     

          <div class="form-group">
              <label for="id">ID Pelapor</label>
              <select name="id" class="form-control @error('id') is-invalid @enderror" name="id" class="form-control">
                  <option value="">-Silahkan Pilih Pelapor-</option>
                  @foreach ($users as $data)
                  <option value="{{ $data->id }}">{{ $data->id }} - {{ $data->name }}</option>                  
                  @endforeach
                  @error ('id')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </select>
          </div>

          <div class="form-group">
            <label for="id_bencana">ID Bencana</label>
            <select name="id_bencana" class="form-control @error('id_bencana') is-invalid @enderror" name="id_bencana" class="form-control">
                <option value="">-Silahkan Pilih Bencana-</option>
                @foreach ($bencana as $data)
                <option value="{{ $data->id_bencana }}">{{ $data->id_bencana }} - {{ $data->nama_bencana }}</option>                  
                @endforeach
                @error ('id_bencana')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </select>
          </div>

          <div class="form-group">
            <label for="id_kecamatan">ID Kecamatan</label>
            <select name="id_kecamatan" class="form-control @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" class="form-control">
                <option value="">-Silahkan Pilih Kecamatan-</option>
                @foreach ($kecamatan as $data)
                <option value="{{ $data->id_kecamatan }}">{{ $data->id_kecamatan }} - {{ $data->nama_kecamatan }}</option>                  
                @endforeach
                @error ('id_kecamatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </select>
          </div>

          <div class="form-group">
            <label for="waktu_bencana">Waktu Bencana</label>
              <input type="datetime-local" name="waktu_bencana" class="form-control @error('waktu_bencana') is-invalid @enderror" value="{{ old('waktu_bencana') }}" placeholder="Masukkan waktu bencana"/>                                              
              @error ('waktu_bencana')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>     

          <div class="form-group">
            <label for="status">Status Bencana</label>
              <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}" placeholder="Masukkan status bencana"/>                                            
              @error ('status')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>     

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Laporan</button>
          </div>                        
        </form>   
      </div>      
    </div>
  </div>
</div>

<!-- MODAL EDIT PELAPORAN -->
@foreach ($pelaporan as $p)
<div class="modal fade" id="edit{{ $p->id_pelaporan }}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">{{ $p->id_pelaporan }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('pelaporan/edit/'.$p->id_pelaporan) }}" method="post">
          @csrf                    

          <div class="form-group">
            <label for="id">ID Pelapor</label>
            <select name="id" class="form-control @error('id') is-invalid @enderror" name="id" class="form-control">
                <option value="{{ $data->id }}">-Silahkan Pilih Pelapor-</option>
                @foreach ($users as $data)
                <option value="{{ $data->id }}">{{ $data->id }} - {{ $data->name }}</option>                  
                @endforeach
                @error ('id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </select>
          </div>

          <div class="form-group">
            <label for="id_bencana">ID Bencana</label>
            <select name="id_bencana" class="form-control @error('id_bencana') is-invalid @enderror" name="id_bencana" class="form-control">
                <option value="">-Silahkan Pilih Bencana-</option>
                @foreach ($bencana as $data)
                <option value="{{ $data->id_bencana }}">{{ $data->id_bencana }} - {{ $data->nama_bencana }}</option>                  
                @endforeach
                @error ('id_bencana')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </select>
          </div>

          <div class="form-group">
            <label for="id_kecamatan">ID Kecamatan</label>
            <select name="id_kecamatan" class="form-control @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" class="form-control">
                <option value="">-Silahkan Pilih Kecamatan-</option>
                @foreach ($kecamatan as $data)
                <option value="{{ $data->id_kecamatan }}">{{ $data->id_kecamatan }} - {{ $data->nama_kecamatan }}</option>                  
                @endforeach
                @error ('id_kecamatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </select>
          </div>

          <div class="form-group">
            <label for="waktu_bencana">Waktu Bencana</label>
              <input type="datetime-local" name="waktu_bencana" class="form-control @error('waktu_bencana') is-invalid @enderror" value="{{ $p->waktu_bencana }}"/>                                              
              @error ('waktu_bencana')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>     

          <div class="form-group">
            <label for="status">Status Bencana</label>
              <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ $p->status }}"/>                                           
              @error ('status')
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

<!-- MODAL HAPUS PELAPORAN -->
@foreach ($pelaporan as $p)
<div class="modal fade" id="delete{{ $p->id_pelaporan }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title">{{ $p->id_pelaporan }}</h4>
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
        <a href="{{ url('pelaporan/delete/'.$p->id_pelaporan) }}" class="btn btn-primary">Yes</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach


@endsection