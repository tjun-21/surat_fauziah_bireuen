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
      <td>NIK</td>
      <td>:</td>
      <td>{{ $pegawai->nik }}</td>
    </tr>

    <tr>
      <th scope="row">3</th>
      <td>NAMA LENGKAP</td>
      <td>:</td>
      <td>{{ $pegawai->nama }}</td>
    </tr>

    <tr>
      <th scope="row">6</th>
      <td>TEMPAT / TANGGAL LAHIR</td>
      <td>:</td>
      <td>{{ $pegawai->tmp_lahir }} / {{ $pegawai->tgl_lahir }}</td>
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
      <th scope="row">7</th>
      <td>RUANGAN</td>
      <td>:</td>
      <td>{{ $pegawai->unit->nama }}</td>
    </tr>

    <tr>
      <th scope="row">8</th>
      <td>TMT</td>
      <td>:</td>
      <td>{{ $pegawai->tmt }}</td>
    </tr>

   
  
  </tbody>
</table>
</div>
        
    @include('partials.cuti_history')

   @endsection

