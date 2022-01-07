@extends('layout.template')

@section('title','dashboard')

@section('breadcrumbs')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Transaksi</h1>
      </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
            <li class="breadcrumb-item active">Bin</li>
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
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Detail Korban Terhapus</h3>
                        <div class="float-sm-right"> 
                          <a href="{{ url('dashboard/detail/restore') }}"  class="btn btn-info btn-sm">
                            <i class="fa fa-plus fa-fw"></i>Restore All
                          </a>
                          <a href="{{ url('dashboard/detail/delete') }}"  class="btn btn-danger btn-sm">
                            <i class="fa fa-trash fa-fw"></i>Delete All
                          </a>                                                                  
                          <a href="{{ url('dashboard/detail') }}"  class="btn btn-secondary btn-sm">
                            <i class="fa fa-chevron-left fa-fw"></i>Back
                          </a>                          
                        </div>
                    </div>                
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <th> ID Detail Korban </th>
                        <th> ID Pelaporan </th>
                        <th> NIK </th>    
                        <th> Nama </th>
                        <th> Umur </th>
                        <th> Kondisi </th>
                        <th> Tanggal Dihapus </th>
                        <th> Opsi </th>                 
                        </thead>
                        <tbody>      
                          @if($detail->count() > 0)                    
                          @foreach($detail as $p)
                            <tr>                            
                              <td>{{ $p->id_detailkorban }}</td>
                              <td>{{ $p->id_pelaporan }}</td>
                              <td>{{ $p->nik }}</td>
                              <td>{{ $p->nama }}</td>
                              <td>{{ $p->umur }}</td>         
                              <td>{{ $p->kondisi }}</td>                                   
                              <td>{{ $p->deleted_at }}</td>
                              <td class="text-center">                                      
                                <a href="{{ url('dashboard/detail/restore/'.$p->id_detailkorban) }}" class="btn btn-info btn-sm" title="Edit Data">                                      
                                  Restore
                                </a>                                                                                          
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteperm{{ $p->id_detailkorban }} ">
                                  Delete Permanent
                                </button>  
                              </td>
                            </tr>
                          @endforeach  
                          @else
                          <tr>
                            <td colspan="8" class="text-center"> Tidak ada data</td>
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
<!-- /.TABEL DETAIL KORBAN -->

<!-- MODAL HAPUS DETAIL KORBAN -->
@foreach ($detail as $p)
<div class="modal fade" id="deleteperm{{ $p->id_detailkorban }}">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">{{ $p->nama }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data ini secara permanen?</p>
        <p>(data akan dihapus secara permanen)</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
        <a href="{{ url('dashboard/detail/deleteperm/'.$p->id_detailkorban) }}" class="btn btn-outline-light">Yes</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
<!-- /.MODAL HAPUS DETAIL KORBAN -->
@endsection