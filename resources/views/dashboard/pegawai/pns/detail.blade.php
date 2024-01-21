@extends('dashboard.layout.main')
    

@section('container')
    <div class="row">
      @include('partials.bread')
    </div>
    <div class="row">
        <h4>Form Detail data Karyawan</h4>
        <hr>

        
        <div class="row" align="left">
          <div class="col-md-3 col">

            
            <p>NIP       : {{ $pegawai->nip }}</p>
            <p>Nama      : {{ $pegawai->nama }}</p>
            <p>Kategori  :   {{ $pegawai->kategori->nama }}</p>
            
          </div>
          <div class="col-md-3 col">
            <p>Jenis Kelamin : {{ $pegawai->j_kelamin }}</p>
            <p>Pendidikan : {{ $pegawai->pendidikan }}</p>
            <p>Unit :   {{ $pegawai->unit->nama }}</p>
          </div>
          <div class="col-md-3 col">
            
            <p>Jabatan  :   {{ $pegawai->jabatan->nama }}</p>
            <p>Golongan :   {{ $pegawai->golongan->nama }}</p>
            <p>Fungsional  :   {{ $pegawai->fungsional->nama }}</p>
          </div>
      </div>

    </div>

    
    
    @include('partials.cuti_history')
    
@endsection

