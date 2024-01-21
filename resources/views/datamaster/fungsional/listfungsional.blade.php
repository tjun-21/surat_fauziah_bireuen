@extends('dashboard.layout.main')
    

@section('container')
    
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data  fungsional</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          {{-- <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button> --}}
        </div>
      </div>

      @if(session()->has('success'))

    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>

    @endif
      
      
      <div class="row">
        <a href="/fungsional/create" class="btn btn-primary mb-3 col-lg-2 "> Tambah fungsional</a>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Action</th>
   
            </tr>
          </thead>
          <tbody>
            <?php 
              $no = 1
              ?>
            @foreach ($fungsional as $fungsional)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $fungsional->nama }}</td>
              <td>
                <a href="{{ route ('fungsional.update',$fungsional->id )}}/edit" class="badge bg-warning"><span data-feather="edit"></span> </a>
                
                <form action="{{ route ('fungsional.destroy',$fungsional->id) }} " method="post" class="d-inline ">
                
                  @method("delete")
                  @csrf
                  <button class="badge bg-danger" onclick="return confirm('apakah anda yakin ingin menghapus?')"><span data-feather="x-circle"></span></button>
                </form>
                
              </td>

              {{-- <td>
                <a href="/karyawan/pns/{{ $id->id}}" style="text-decoration: none" >Detail</a>
              </td> --}}
              {{-- <td>
                <a href="/karyawan/p3k/{{ $pegawai->nik }}" style="text-decoration: none" >Buat</a>
              </td> --}}
            </tr>
           
            @endforeach
          </tbody>
          
        </table>
          
      </div>

    @endsection
  
