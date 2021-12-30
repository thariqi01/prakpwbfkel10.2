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
            <li class="breadcrumb-item active">Data User</li>
          </ol>
        </div>
    </div>
  </div>
</section>
@endsection

@section('content')
<!-- TABEL USER -->
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
                      <h5 class="card-title">Data User</h5>
                      <div class="float-sm-right"> 
                        <a href="{{ url('user/bin') }}"  class="btn btn-danger btn-sm">
                          <i class="fa fa-trash fa-fw "></i>Bin
                        </a>                                           
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah-user">
                          <i class="fa fa-plus fa-fw"></i>Add User
                        </button>                          
                      </div>
                    </div>                
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <th> ID User </th>
                        <th> Nama </th>
                        <th> Email </th>
                        <th> Tanggal Lahir </th>
                        <th> Opsi </th>
                        </thead>
                        <tbody>                          
                          @foreach($users as $p)
                            <tr>                            
                              <td>{{ $p->id }}</td>
                              <td>{{ $p->name }}</td>
                              <td>{{ $p->email }}</td>
                              <td>{{ $p->tgl_lahir }}</td>
                              <td class="text-center">                                      
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $p->id }}">
                                  Edit
                                </button>                                                                                        
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $p->id }}">
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

<!-- MODAL TAMBAH USER -->
<div class="modal fade" id="tambah-user">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title">TAMBAH DATA USER</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="user/store" method="post">
          @csrf                    
          <div class="form-group">
            <label for="name">Nama User</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama"/>                                              
              @error ('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
              <input type="text"  name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Masukkan Email"/>                                              
              @error ('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
              <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir') }}" placeholder="Masukkan Tanggal Lahir"/>                                              
              @error ('tgl_lahir')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror      
          </div>
          <div class="form-group">
            <label for="password">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password"/>                                                         
              @error ('password')
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

<!-- MODAL EDIT USER -->
@foreach ($users as $p)
<div class="modal fade" id="edit{{ $p->id }}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">{{ $p->name }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('user/edit/'.$p->id) }}" method="post">
          @csrf                  

          <div class="form-group">
            <label for="name">Nama User</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $p->name }}"/>                                              
            @error ('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>     

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text"  name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $p->email }}"/>                                              
            @error ('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ $p->tgl_lahir }}"/>                                              
            @error ('tgl_lahir')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror      
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update User</button>
          </div>  

        </form>   
      </div>      
    </div>
  </div>
</div>
@endforeach

<!-- MODAL HAPUS USER -->
@foreach ($users as $p)
<div class="modal fade" id="delete{{ $p->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title">{{ $p->name }}</h4>
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
        <a href="{{ url('user/delete/'.$p->id) }}" class="btn btn-primary">Yes</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@endsection

