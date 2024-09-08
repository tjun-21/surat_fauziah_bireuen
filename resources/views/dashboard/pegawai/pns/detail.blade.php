@extends('dashboard.layout.main')


@section('container')
<div class="row">
  @include('partials.bread')
</div>
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
      <th scope="col">DATA</th>
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
      <td>NIP</td>
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
      <td>JENIS KELAMIN</td>
      <td>:</td>
      <td>{{ $pegawai->j_kelamin }}</td>
    </tr>

    <tr>
      <th scope="row">5</th>
      <td>PENDIDIKAN</td>
      <td>:</td>
      <td>{{ $pegawai->pendidikan }}</td>
    </tr>

    <tr>
      <th scope="row">6</th>
      <td>BIDANG</td>
      <td>:</td>
      <td>{{ $pegawai->bidang->nama }}</td>
    </tr>

    <tr>
      <th scope="row">7</th>
      <td>UNIT</td>
      <td>:</td>
      <td>{{ $pegawai->unit->nama }}</td>
    </tr>

    <tr>
      <th scope="row">8</th>
      <td>JABATAN</td>
      <td>:</td>
      <td>{{ $pegawai->jabatan->nama }}</td>
    </tr>

    <tr>
      <th scope="row">9</th>
      <td>GOLONGAN</td>
      <td>:</td>
      <td>{{ $pegawai->golongan->nama }}</td>
    </tr>

    <tr>
      <th scope="row">10</th>
      <td>FUNGSIONAL</td>
      <td>:</td>
      <td>{{ $pegawai->fungsional->nama }}</td>
    </tr>
    <tr>
      <th scope="row">11</th>
      <td>HAK CUTI</td>
      <td>:</td>
      <?php
      if ($pegawai->hak_cuti == 0) {
      ?>
        <td>Belum DIberikan</td>
      <?php } else { ?>
        <td>Sudah DIberikan</td>
      <?php } ?>
    </tr>
    <tr>
      <th scope="row">12</th>
      <td>Kuota Cuti</td>
      <td>:</td>
      <td>{{ isset($pegawai->cutiSetting->kuota_cuti) ? $pegawai->cutiSetting->kuota_cuti : '-' }}
      </td>
    </tr>
    <tr>
      <th scope="row">12</th>
      <td>Cuti Diambil</td>
      <td>:</td>
      <td>{{ isset($pegawai->cutiSetting->cuti_diambil) ? $pegawai->cutiSetting->cuti_diambil : '-' }}
      </td>
    </tr>
    <tr>
      <th scope="row">13</th>
      <td>Sisa Cuti</td>
      <td>:</td>
      <td>{{ isset($pegawai->cutiSetting->kuota_cuti) ? $pegawai->cutiSetting->kuota_cuti - $pegawai->cutiSetting->cuti_diambil : '-' }}</td>
    </tr>

  </tbody>
</table>
</div>



@include('partials.cuti_history')

@endsection