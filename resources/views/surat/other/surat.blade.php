@extends('dashboard.layout.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col">

        @if ($surat->count())

            <div class="container mt-3">
                <h3 class="mb-3">{{ $title }}  </h3>
                <div class="row">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nip</th>
                        <th>Nama</th>
                        <th>Jenis Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Aksi</th>
                        
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no = 1
                      
                        ?>
                      @foreach ($surat as $s)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $s->pegawai->nik }}</td>
                        <td>{{ $s->pegawai->nama }}</td>
                        <td>{{ $s->jsurat->nama }}</td>
                        <td>{{ $s->tgl }}</td>
                        <td>
                          <a href="/karyawan/{{ $s->pegawai->kategori->slug }}/{{ $s->id }}" style="text-decoration: none" >Detail</a>
                        </td>
                        
                      </tr>
                     
                      @endforeach
                    </tbody>
                    
                  </table>
                    
                </div>
            </div>
        @else
        <div class="container mt-3">
            <h3 class="mb-3">Data Karyawan | {{ $title }}</h3>
            <div class="row">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nip</th>
                    <th>Nama</th>
                    <th>Jenis Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <td colspan="6" class="text-center">Data Karyawan {{ $title }} Tidak di Temukan</td>
                </tbody>
                  
                </table>
        @endif
        </div>
    </div>
  </div>
@endsection