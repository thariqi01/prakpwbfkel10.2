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
            <li class="breadcrumb-item active">Detail Korban</li>
          </ol>
        </div>
    </div>
  </div>
</section>
@endsection

@section('content')
<!-- TABEL DETAIL KORBAN -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">Data Detail Korban</h5>
                    <div class="float-sm-right"> 
                      <a href="{{ url('dashboard/detailkorban/bin') }}"  class="btn btn-danger btn-sm">
                        <i class="fa fa-trash fa-fw "></i>Bin
                      </a>                                           
                      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah-detail">
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

<!-- MODAL TAMBAH DETAIL KORBAN -->
<div class="modal fade" id="tambah-detail">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title">TAMBAH DETAIL KORBAN</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="detail/store" method="post">
          @csrf     

          <div class="form-group">
              <label for="id_pelaporan">ID Laporan</label>
              <select name="id_pelaporan" class="form-control @error('id_pelaporan') is-invalid @enderror" name="id_pelaporan" class="form-control">
                  <option value="">-Silahkan Pilih Pelaporan-</option>
                  @foreach ($pelaporan as $data)
                  <option value="{{ $data->id_pelaporan }}">{{ $data->id_pelaporan }}</option>                  
                  @endforeach
                  @error ('id_pelaporan')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </select>
          </div>

          <div class="form-group">
            <label for="nik">NIK Korban</label>
              <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" placeholder="Masukkan NIK korban"/>                                              
              @error ('nik')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>     

          <div class="form-group">
            <label for="nama">Nama Korban</label>
              <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Masukkan nama korban"/>                                            
              @error ('nama')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>     

          <div class="form-group">
            <label for="umur">Umur Korban</label>
              <input type="text" name="umur" class="form-control @error('umur') is-invalid @enderror" value="{{ old('umur') }}" placeholder="Masukkan umur korban"/>                                            
              @error ('umur')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>  

          <div class="form-group">
            <label for="kondisi">Kondisi Korban</label>
            <select name="kondisi" class="form-control @error('kondisi') is-invalid @enderror" name="kondisi" class="form-control">
                <option value="">-Silahkan Pilih Kondisi Korban-</option>
                <option value="Tidak Terluka">Tidak Terluka</option>
                <option value="Luka Ringan">Luka Ringan</option>     
                <option value="Luka Berat">Luka Berat</option>                  
                <option value="Meninggal Dunia">Meninggal Dunia</option>                          
                @error ('kondisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </select>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Detail Korban</button>
          </div>                        
        </form>   
      </div>      
    </div>
  </div>
</div>

<!-- MODAL EDIT DETAIL KORBAN -->
@foreach ($detailkorban as $p)
<div class="modal fade" id="edit{{ $p->id_detailkorban }}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">{{ $p->nama }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('dashboard/detail/edit/'.$p->id_detailkorban) }}" method="post">
          @csrf                    

          <div class="form-group">
            <label for="id_pelaporan">ID Pelaporan</label>
            <select name="id_pelaporan" class="form-control @error('id_pelaporan') is-invalid @enderror" name="id_pelaporan" class="form-control">
                <option value="{{ $data->id_pelaporan }}">-Silahkan pilih ID Pelaporan-</option>
                @foreach ($pelaporan as $data)
                <option value="{{ $data->id_pelaporan }}">{{ $data->id_pelaporan }}</option>                  
                @endforeach
                @error ('id_pelaporan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </select>
          </div>                 

          <div class="form-group">
            <label for="nik">NIK Korban</label>
              <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"  value="{{ $p->nik }}"/>                                              
              @error ('nik')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>     

          <div class="form-group">
            <label for="nama">Nama Korban</label>
              <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $p->nama }}"/>                                            
              @error ('nama')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>     

          <div class="form-group">
            <label for="umur">Umur Korban</label>
              <input type="text" name="umur" class="form-control @error('umur') is-invalid @enderror" value="{{ $p->umur }}"/>                                            
              @error ('umur')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>  

          <div class="form-group">
            <label for="kondisi">Kondisi Korban</label>
            <select name="kondisi" class="form-control @error('kondisi') is-invalid @enderror" name="kondisi" class="form-control">
                <option value="">-Silahkan Pilih Kondisi Korban-</option>
                <option value="Tidak Terluka">Tidak Terluka</option>
                <option value="Luka Ringan">Luka Ringan</option>     
                <option value="Luka Berat">Luka Berat</option>                  
                <option value="Meninggal Dunia">Meninggal Dunia</option>                          
                @error ('kondisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </select>
          </div>        

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Detail Korban</button>
          </div>  

        </form>   
      </div>      
    </div>
  </div>
</div>
@endforeach

<!-- MODAL HAPUS DETAIL KORBAN -->
@foreach ($detailkorban as $p)
<div class="modal fade" id="delete{{ $p->id_detailkorban }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title">{{ $p->nama }}</h4>
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
        <a href="{{ url('dashboard/detail/delete/'.$p->id_detailkorban) }}" class="btn btn-primary">Yes</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@endsection