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
            <li class="breadcrumb-item active">Role</li>
          </ol>
        </div>
    </div>
  </div>
</section>
@endsection

@section('content')
<!-- TABEL ROLE -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">                  
                <div class="card">
                    <div class="card-header">
                      <h5 class="card-title">Data Role</h5>
                      <div class="float-sm-right"> 
                        <a href="{{ url('dashboard/role/bin') }}"  class="btn btn-danger btn-sm">
                          <i class="fa fa-trash fa-fw "></i>Bin
                        </a>                                           
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah-role">
                          <i class="fa fa-plus fa-fw"></i>Add Role
                        </button>                          
                      </div>
                    </div>                
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <th> ID Role </th>
                        <th> Nama Role </th>
                        <th> Opsi </th>
                        </thead>
                        <tbody>          
                          @if($role->count() > 0)                
                          @foreach($role as $p)
                            <tr>                            
                              <td>{{ $p->id_role }}</td>
                              <td>{{ $p->role }}</td>
                              <td class="text-center">                                      
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $p->id_role }}">
                                  Edit
                                </button>                                                                                        
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $p->id_role }}">
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

<!-- MODAL TAMBAH ROLE -->
<div class="modal fade" id="tambah-role">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title">TAMBAH DATA ROLE</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="role/store" method="post">
            @csrf                    
            <div class="form-group">
              <label for="role">Nama Role</label>
                <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role') }}" placeholder="Masukkan nama role"/>                                              
                @error ('role')
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

<!-- MODAL EDIT ROLE -->
@foreach ($role as $p)
<div class="modal fade" id="edit{{ $p->id_role }}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">{{ $p->role }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('dashboard/role/edit/'.$p->id_role) }}" method="post">
          @csrf                  

          <div class="form-group">
            <label for="role">Nama Role</label>
            <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ $p->role }}"/>                                              
            @error ('role')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>     

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Role</button>
          </div>  

        </form>   
      </div>      
    </div>
  </div>
</div>
@endforeach

<!-- MODAL HAPUS ROLE -->
@foreach ($role as $p)
<div class="modal fade" id="delete{{ $p->id_role }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title">{{ $p->role }}</h4>
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
        <a href="{{ url('dashboard/role/delete/'.$p->id_role) }}" class="btn btn-primary">Yes</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@endsection