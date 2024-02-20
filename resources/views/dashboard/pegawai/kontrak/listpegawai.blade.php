@extends('dashboard.layout.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col">

        @if ($pegawais->count())

            <div class="container mt-3">
                <h3 class="mb-3">DATA KARYAWAN | KONTRAK</h3>
                <div class="row">
                  @if(session()->has('success'))

                  <div class="alert alert-success" role="alert">
                      {{ session('success') }}
                  </div>

              
                  @endif
                  <a href="/kontrak/create" class="btn btn-primary mb-3 col-lg-3 "> Tambah Tenaga {{ $sub_title }}</a>
                  
                  <button type="button" class="btn btn-success mb-3  col-lg-2 " data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Import Excel
                  </button>
                  
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>NIK</th>
                        <th>NAMA</th>
                        <th>BIDANG</th>
                        <th>RUANGAN</th>
                        <th>AKSI</th>
                        {{-- <th>Surat Cuti</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no = 1
                      
                        ?>
                      @foreach ($pegawais as $pegawai)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $pegawai->nik }}</td>
                        <td>{{ $pegawai->nama }}</td>
                        <td>{{ $pegawai->bidang->nama ?? 'none'}}</td>
                        <td>{{ $pegawai->unit->nama }}</td>
                        <td>
                          
                       
                          <a href="{{ route ('kontrak.update',$pegawai->id )}}/edit" class="badge bg-warning"><span data-feather="edit"></span> </a>
                
                          <form action="{{ route ('kontrak.destroy',$pegawai->id) }} " method="post" class="d-inline ">
                          
                            @method("delete")
                            @csrf
                            <button class="badge bg-danger" onclick="return confirm('apakah anda yakin ingin menghapus?')"><span data-feather="x-circle"></span></button>
                          </form>
                          
                          {{-- <a href="/detailkontrak/{{ $pegawai->id }}" class="badge btn-primary" ><span data-feather="info"></span> </a>  --}}
                          <a href="/karyawan/kontrak/{{ $pegawai->id }}" class="badge btn-success" ><span data-feather="file-text"></span> </a> 


                    
                        </td>
                      



                        {{-- <td>
                          <a href="/karyawan/p3k/{{ $pegawai->nik }}" style="text-decoration: none" >Buat</a>
                        </td> --}}
                      </tr>
                     
                      @endforeach
                    </tbody>
                    
                  </table>
                    
                </div>
            </div>
        @else
        <div class="container mt-3">
            <h3 class="mb-3">DATA KARYAWAN | KONTRAK</h3>
            <div class="row">
              <table class="table table-bordered">
                <a href="/kontrak/create" class="btn btn-primary mb-3 col-lg-3 "> Tambah Tenaga {{ $sub_title }}</a>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Jenis</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                    <td colspan="7" class="text-center">Data Karyawan {{ $title }} Tidak di Temukan</td>
                </tbody>
                  
                </table>
        @endif
        </div>
    </div>
  </div>
@endsection