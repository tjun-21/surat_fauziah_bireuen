@extends('dashboard.layout.main')


@section('container')


<style>
  * {
    box-sizing: border-box;
  }

  /* Buat dua kolom yang sama yang mengapung di samping satu sama lain */
  .column {
    float: left;
    width: 50%;
    padding: 10px;
    height: 300px;
    /* Hanya untuk contoh */
  }

  /* Hapus floats setelah columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  /* Responsive layout - membuat dua kolom bertumpuk satu sama lain, bukan di samping satu sama lain */
  @media screen and (max-width: 600px) {
    .column {
      width: 100%;
    }

  }

  .button1 {
    width: 100px;
  }

  .button-container {
    margin-top: 20px;
    /* Atur jarak ke atas */
  }
</style>
@include('partials.bread')

@if(session()->has('cuti_success'))

<div class="alert alert-success" role="alert">
  {{ session('cuti_success') }}
</div>

@endif

@if($pegawai->hak_cuti == 0)
<div class="container">
  <div class="row">
    <div class="col">

      <div class="card">
        <div class="container mt-3">
          <h3 class="mb-3 text-center"> Cuti Belum di aktifasi </h3>
          <!-- <div class="text-center "> <button type="submit" class="btn btn-primary  col-lg-7 ">Buat Surat Cuti</button></div> -->
          <div class="text-center">
            <a class="btn btn-primary text-white col-lg-12 mb-2" href="/karyawan/{{ $pegawai->kategori->slug }}/status_cuti/{{ $pegawai->id }}">Aktivasi Cuti</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@elseif($pegawai->cutiSetting->cuti_diambil >= 12)
<div class="container">
  <div class="row">
    <div class="col">

      <div class="card">
        <div class="container mt-3">
          <h3 class="mb-3 text-center"> Sudah Mencapai Batas pengambilan cuti</h3>
          <!-- <div class="text-center "> <button type="submit" class="btn btn-primary  col-lg-7 ">Buat Surat Cuti</button></div> -->
          <div class="text-center">
            <!-- <a class="btn btn-primary text-white col-lg-12 mb-2" href="/karyawan/{{ $pegawai->kategori->slug }}/status_cuti/{{ $pegawai->id }}">Aktivasi Cuti</a> -->
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@include('partials.cuti_history')

@else
<div class="container">
  <div class="row">
    <div class="col">

      <div class="card">
        <div class="container mt-3">
          <h3 class="mb-3 text-center"> Isi Data {{ $title }} Berikut Untuk Membuat Surat {{ $sub_title }} </h3><br>
          <div class="bg-danger text-white col-lg-4 text-center">SISA KUOTA CUTI TAHUNAN ANDA : {{ $pegawai->cutiSetting->kuota_cuti}}  HARI</div>
          <div class="row">
            <form method="POST" action="{{ route('cuti.store') }}" class="mb-4">
              @csrf
              <div class="mb-3">
                {{-- <label for="nama" class="form-label">Id Pegawai</label> --}}
                <input type="hidden" name="pegawai_id" class="form-control" value="{{ $pegawai->id }}">
              </div>

              <div class="column">

                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Pegawai</label>
                  <input type="text" name="nama" class="form-control" value="{{ $pegawai->nama }}" readonly>
                </div>

                <div class="mb-3">
                  <label for="alamat_cuti" class="form-label">Alamat Saat Melaksanakan Cuti</label>
                  <input type="text" name="alamat_cuti" class="form-control">
                </div>


                <div class="">
                  <label for="alasancuti">Alasan Cuti</label>
                  <label for="alasan" class="form-label">Alasan Melaksanakan Cuti</label>
                  <input type="text" name="alasan" class="form-control">
                </div>
              </div>
              <div class="column">

                <div class="mb-3">
                  <label for="jeniscuti" class="form-label">Jenis Cuti</label>
                  <select class="form-select" name="jcuti_id">
                    <option> -- Pilih Cuti --</option>
                    @foreach($j_cuti as $j)
                    <option value="{{ $j->id }}"> {{ $j->nama }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label for="nama" class="form-label">Tanggal Mulai</label>
                  <input type="date" name="tgl_mulai" class="form-control">
                </div>

                <div class="">
                  <label for="nama" class="form-label">Tanggal Akhir</label>
                  <input type="date" name="tgl_akhir" class="form-control">
                </div>
              </div>

              <div class="mb-3 mt-0">
                <label for="jeniscuti" class="form-label">Pilih Penanda Tangan</label>
                <select class="form-select" name="pt_1">
                  <option> -- Pilih Jabatan Penanda Tangan --</option>
                  @foreach($pegawais as $j)
                  @if(in_array($j->jabatan->nama, ['Direktur RSUD dr.Fauziah Bireuen', 'WADIR PELAYANAN','BUPATI']))
                  <option value="{{ $j->nip }}"> {{ $j->nama }} ({{ $j->jabatan->nama }})</option>
                  @endif
                  @endforeach
                </select>
              </div>

              <div class="mb-3 mt-2">
                <label for="jeniscuti" class="form-label">Pilih Penanda Tangan 2</label>
                <select class="form-select" name="pt_2">
                  <option> -- Pilih Jabatan Penanda Tangan --</option>
                  @foreach($pegawais as $j)
                  @if(in_array($j->jabatan->nama, ['Direktur RSUD dr.Fauziah Bireuen', 'WADIR PELAYANAN','BUPATI']))
                  <option value="{{ $j->nip }}"> {{ $j->nama }} ({{ $j->jabatan->nama }})</option>
                  @endif
                  @endforeach
                </select>
              </div>


              <div class="text-center "> <button type="submit" class="btn btn-primary  col-lg-7 ">Buat Surat Cuti</button></div>



            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
  @include('partials.cuti_history')
  @endif



  @endsection