@extends('dashboard.layout.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col">
            @if ($pegawais->count())

            <div class="container mt-3">
                <h3 class="mb-3">Buat  {{ $title }}  | {{ $sub_title }}</h3>
                <div class="row">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nip</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Bidang</th>
                        <th>Surat Cuti</th>
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
                        <td>{{ $pegawai->jabatan->nama ?? 'none'}}</td>
                        <td>-</td>
                        <td>
                          <a href="/karyawan/pns/{{ $pegawai->id }}/cuti" style="text-decoration: none" >Buat Surat</a>
                        </td>
                        <td>
                            <a href="/karyawan/pns/{{ $pegawai->id }}/cuti" style="text-decoration: none" >Buat Surat</a>
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
            <h3 class="mb-3">Data Karyawan | {{ $title }}</h3>
            <div class="row">
              <table class="table table-bordered">
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



            {{-- <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Buat Surat Baru</h5>
                    <p class="card-text">List surat yang mau di buat</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">-
                        <a href="" style="text-decoration: none">SURAT CUTI</a> <small class="m-5"><i>(Surat Cuti Tahunan, Melahirkan, Sakit, Dll)</i></small>
                    </li>
                    <li class="list-group-item">-
                        <a href="" style="text-decoration: none">SURAT LAINNYA</a> <small class="m-3"><i>(Surat Rekomendasi, Kenaikan Pangkat, Kenaikan Gaji, Dll)</i></small>
                    </li>
                  
                </ul>
              </div> --}}
        </div>       
    </div>
</div>
@endsection