@extends('dashboard.layout.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col">

        @if ($cuti->count())

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
                        <th>Jumlah Hari</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Tanggal Surat</th>
                        <th>Aksi</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no = 1
                      
                        ?>
                      @foreach ($cuti as $s)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $s->pegawai->nik }}</td>
                        <td>{{ $s->pegawai->nama }}</td>
                        <td>{{ $s->jcuti->nama }}</td>
                        <?php 
                            $akhir = strtotime($s->tgl_akhir);
                            $awal = strtotime($s->tgl_mulai);
                            $jarak = $akhir-$awal;
                            $selisih = ($jarak / 60 / 60 / 24)+1;
                        ?>
                        <td>{{ $selisih }} Hari </td>
                        <td>{{ $s->tgl_mulai }}</td>
                        <td>{{ $s->tgl_akhir }}</td>
                        <td>{{ $s->created_at->format('d-m-Y') }}</td>
                        <td>
                          <a href="/karyawan/{{ $s->pegawai->kategori->slug }}/{{ $s->pegawai->id }}" style="text-decoration: none" >Detail</a>
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
                      <th>Tanggal</th>
                     
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