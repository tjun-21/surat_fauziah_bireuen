@extends('dashboard.layout.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col">

        @if ($pegawais->count())

            <div class="container mt-3">
                <h3 class="mb-3 text-center">DATA KARYAWAN | PNS</h3>
                <div class="row ">
                  @if(session()->has('success'))

                  <div class="alert alert-success" role="alert">
                      {{ session('success') }}
                  </div>
              
                  @endif
                  <a href="/pns/create" class="btn btn-primary m-3 mr-2 col-lg-3 "> Tambah Tenaga PNS</a>

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-success m-3 col-lg-2 " data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Import Excel
                  </button>
       
                  

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="post" action="/pns/import_excel" enctype="multipart/form-data">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                            </div>
                            <div class="modal-body">
                 
                              {{ csrf_field() }}
                 
                              <label>Pilih file excel</label>
                              <div class="form-group">
                                <input type="file" name="file" required="required">
                              </div>
                 
                            </div>
                            
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NIP</th>
                        <th class="text-center">NAMA PEGAWAI</th>
                        <th class="text-center">JABATAN</th>
                        <th class="text-center">BIDANG</th>
                        {{-- <th>Opsi Lainnya</th> --}}
                        <th class="text-center">AKSI</th>
                        {{-- <th>Surat Cuti</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no = 1
                      
                        ?>
                      @foreach ($pegawais as $pegawai)
                      <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $pegawai->nip }}</td>
                        <td>{{ $pegawai->nama }}</td>
                        <td>{{ $pegawai->jabatan->nama ?? 'none'}}</td>
                        {{-- <td>
                          <a href="{{ route ('pns.update',$pegawai->id )}}/edit" class="badge bg-warning"><span data-feather="edit"></span> </a>
                        </td> --}}
                        <td>{{ $pegawai->bidang->nama }}</td>
                        <td class="">
                          
                       
                          <a href="{{ route ('pns.update',$pegawai->id )}}/edit" class="badge bg-warning"><span data-feather="edit"></span> </a>
                
                          <form action="{{ route ('pns.destroy',$pegawai->id) }} " method="post" class="d-inline ">
                
                            @method("delete")
                            @csrf
                            <button class="badge bg-danger" onclick="return confirm('apakah anda yakin ingin menghapus?')"><span data-feather="x-circle"></span></button>
                          </form>
                          <a href="/karyawan/pns/{{ $pegawai->id }}" class="badge btn-success" ><span data-feather="file-text"></span> </a> 

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
            <h3 class="mb-3">Data Karyawan | {{ $sub_title }}</h3>
            <div class="row">
              <table class="table table-bordered">
                <a href="/{{ $sub_title }}/create" class="btn btn-primary mb-3 col-lg-3 "> Tambah Tenaga {{ $sub_title }}</a>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nip</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Jenis</th>
                    <th>Surat Rekom</th>
                    <th>Surat Cuti</th>
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