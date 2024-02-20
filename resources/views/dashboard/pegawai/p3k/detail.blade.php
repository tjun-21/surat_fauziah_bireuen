@extends('dashboard.layout.main')
    

@section('container')
    <div class="row">
       @include('partials.bread')

       <div class="container text-center">
        <h1 class="h4">DETAIL DATA PEGAWAI </h1>
      </div>
      <hr>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">PARAMETER</th>
            <th scope="col"></th>
            <th scope="col text">DATA</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>KATEGORI</td>
            <td>:</td>
            <td>{{ $pegawai->kategori->nama }}</td>
          </tr>
  
          <tr>
            <th scope="row">2</th>
            <td>NOMOR INDUK P3K</td>
            <td>:</td>
            <td>{{ $pegawai->nip }}</td>
          </tr>
  
          <tr>
            <th scope="row">3</th>
            <td>NAMA LENGKAP</td>
            <td>:</td>
            <td>{{ $pegawai->nama }}</td>
          </tr>

          <tr>
            <th scope="row">4</th>
            <td>EMAIL</td>
            <td>:</td>
            <td>{{ $pegawai->email }}</td>
          </tr>

          <tr>
            <th scope="row">5</th>
            <td>NO HP</td>
            <td>:</td>
            <td>{{ $pegawai->no_hp }}</td>
          </tr>
  
          <tr>
            <th scope="row">6</th>
            <td>JENIS KELAMIN</td>
            <td>:</td>
            <td>{{ $pegawai->j_kelamin }}</td>
          </tr>

          <tr>
            <th scope="row">7</th>
            <td>TEMPAT / TANGGAL LAHIR</td>
            <td>:</td>
            <td>{{ $pegawai->tmp_lahir }} / {{ $pegawai->tgl_lahir }}</td>
          </tr>
  
          <tr>
            <th scope="row">8</th>
            <td>PENDIDIKAN</td>
            <td>:</td>
            <td>{{ $pegawai->pendidikan }}</td>
          </tr>
  
          <tr>
            <th scope="row">9</th>
            <td>BIDANG</td>
            <td>:</td>
            <td>{{ $pegawai->bidang->nama }}</td>
          </tr>
  
          <tr>
            <th scope="row">10</th>
            <td>UNIT</td>
            <td>:</td>
            <td>{{ $pegawai->unit->nama }}</td>
          </tr>
  
          <tr>
            <th scope="row">11</th>
            <td>JABATAN</td>
            <td>:</td>
            <td>{{ $pegawai->jabatan->nama }}</td>
          </tr>
  
          <tr>
            <th scope="row">12</th>
            <td>GOLONGAN</td>
            <td>:</td>
            <td>{{ $pegawai->golongan->nama }}</td>
          </tr>
  
          <tr>
            <th scope="row">13</th>
            <td>FUNGSIONAL</td>
            <td>:</td>
            <td>{{ $pegawai->fungsional->nama }}</td>
          </tr>

          <tr>
            <th scope="row">14</th>
            <td>TERHITUNG MULAI TANGGAL (TMT)</td>
            <td>:</td>
            <td>{{ $pegawai->tmt }}</td>
          </tr>

          <tr>
            <th scope="row">10</th>
            <td>TERHITUNG MULAI TANGGAL SK (TMT SK)</td>
            <td>:</td>
            <td>{{ $pegawai->tmt_sk }}</td>
          </tr>

          <tr>
            <th scope="row">15</th>
            <td>TERHITUNG MULAI TANGGAL MASUK (TMT MASUK)</td>
            <td>:</td>
            <td>{{ $pegawai->tmt_masuk }}</td>
          </tr>
        
        </tbody>
      </table>
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
                            <a href="">Edit | </a>
                            <a href="">Hapus | </a>
                            <a href="/karyawan/print/{{ $s->id }}">Print</a>
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

