@extends('dashboard.layout.main')
    

@section('container')
    <div class="row">
        <h4>Form Detail data Karyawan</h4>
        <hr>

        <div class="row" align="left">
          <div class="col-md-3 col">

            
            <p>Nik       : {{ $pegawai->nik }}</p>
            <p>Nama      : {{ $pegawai->nama }}</p>
            <p>Kategori  :   {{ $pegawai->kategori->nama }}</p>
            
          </div>
          <div class="col-md-3 col">
            <p>Jenis Kelamin : {{ $pegawai->j_kelamin }}</p>
            <p>Pendidikan : {{ $pegawai->pendidikan }}</p>
            <p>Unit :   {{ $pegawai->unit->nama }}</p>
          </div>
          <div class="col-md-3 col">
            
            <p>Tempat Lahir  :   {{ $pegawai->tmp_lahir }}</p>
            <p>Tanggal Lahir :   {{ $pegawai->tgl_lahir}}</p>
            <p>TMT  :   {{ $pegawai->tmt }}</p>
          </div>
      </div>

       

    </div>

    <div class="row mt-5">
        <h5>Tabel History Pengambilan Cuti</h5>
        <hr>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Jenis Surat</th>
                <th>Lamanya Cuti</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Berakhir</th>
                <th width="20%">Alasan</th>
                <th>Aksi</th>
                {{-- <th>Surat Cuti</th> --}}
              </tr>
            </thead>
            <tbody>
              @if ($cuti->count())
                  <?php 
                    $no = 1
                    ?>
                  @foreach ($cuti as $s)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $s->jcuti->nama  }}</td>
                        <?php 
                                $akhir = strtotime($s->tgl_akhir);
                                $awal = strtotime($s->tgl_mulai);
                                $jarak = $akhir-$awal;
                                $selisih = ($jarak / 60 / 60 / 24)+1;
                            ?>
                        <td>{{ $selisih }}</td>
                        <td>{{ $s->tgl_mulai }}</td>
                        <td>{{ $s->tgl_akhir }}</td>
                        <td>
                          {{ $s->alasan }}
                        </td>
                        <td>
                            <a href="">Edit | </a><a href="">Hapus | </a><a href="/karyawan/print/{{ $s->id }}">Print</a>
                        </td>
                    </tr>
                  @endforeach
              @else
                <tr>
                  <td colspan="6" class="text-center m-3 text-primary"><i>Belum Ada Data Cuti</i></td>
                </tr>
              @endif
             
            
            </tbody>
            
          </table>
    </div>
    

    <div class="row mt-5">
      <h5>Tabel History Pembuatan Surat Lainnya</h5>
      <hr>
      <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Jenis Surat</th>
              <th>Tanggal Pembuatan</th>
              <th>Aksi</th>
              {{-- <th>Surat Cuti</th> --}}
            </tr>
          </thead>
          <tbody>
            @if ($surat->count())
                <?php 
                  $no = 1
                  ?>
                @foreach ($surat as $s)
                  <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $s->jsurat->nama  }}</td>
                      <td>{{ $s->tgl }}</td>
                      
                      <td>
                          <a href="">Edit | </a><a href="">Hapus | </a><a href="/karyawan/print/{{ $s->id }}">Print</a>
                      </td>
                  </tr>
                @endforeach
            @else
              <tr>
                <td colspan="6" class="text-center m-3 text-primary"><i>Belum Ada Data Surat </i></td>
              </tr>
            @endif
          
          
          </tbody>
          
        </table>
    </div>
@endsection

