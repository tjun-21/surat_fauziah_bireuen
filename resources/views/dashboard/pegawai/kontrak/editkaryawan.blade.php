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
    height: 300px; /* Hanya untuk contoh */
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
  .button1 {width: 100px;}
  </style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <div class="container text-center">
    <h1 class="h2">EDIT DATA PEGAWAI  </h1>
  </div>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div> 
  </div>

  <div class="col-lg-13 " >

    <form method="post" action="{{ route('kontrak.update',$pegawai->id) }}">
      @method('put')
        @csrf
        <div class="column">
        <div class="form-group">
          <label for="nik">NIK</label>
          <input type="text" class="form-control @error('nik') is-invalid  @enderror " id="nik" name="nik" placeholder="Ex: 111119898272" value="{{ old('nik',$pegawai->nik) }}">
            @error('nik')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
          <label for="nama">Nama karyawan</label>
          <input type="text" class="form-control @error('nik') is-invalid  @enderror " id="nama" name="nama" placeholder="Ex: Ruhma Zuhra" value="{{ old('nama',$pegawai->nama) }}">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
          <label for="tmp_lahir">Tempat Lahir</label>
          <input type="text" class="form-control @error('tmp_lahir') is-invalid  @enderror " id="tmp_lahir" name="tmp_lahir" placeholder="Ex: Bireuen" value="{{ old('tmp_lahir',$pegawai->tmp_lahir) }}">
            @error('tmp_lahir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
          <label for="pendidikan">Pendididkan</label>
          <input type="text" class="form-control @error('pendidikan') is-invalid  @enderror " id="pendidikan" name="pendidikan" placeholder="Ex: D-III Kebidanan" value="{{ old('pendidikan',$pegawai->pendidikan) }}">
            @error('pendidikan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
          <label for="kategori_id">Kategori</label>
          <input type="text" class="form-control @error('kategori_id') is-invalid  @enderror " id="kategori_id" name="kategori_id" placeholder="PNS" value="3" readonly>
            @error('kategori_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        </div>
        <div class="column">

          <div class="form-group">
            <label for="j_kelamin">jenis kelamin</label>
            <select class="form-select" name="j_kelamin">
              <option value="{{ old('j_kelamin',$pegawai->j_kelamin) }}">Laki-Laki</option>
              <option value="{{ old('j_kelamin',$pegawai->j_kelamin) }}">Perempuan</option>
              </select>
          </div>

          <div class="form-group">
            <label for="unit_id">Unit Keja</label>
            <select class="form-select" name="unit_id">
                @foreach($unit as $unit)
                   @if(old('unit_id',$unit->unit_id)== $unit->id)
                   <option value="{{ $unit->id }}" selected> {{ $unit->nama }}</option>
                   @else
                    <option value="{{ $unit->id }}"> {{ $unit->nama }}</option>
                    @endif
                @endforeach
  
              </select>
          </div>
          
          <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir:</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{ old('tgl_lahir',$pegawai->tgl_lahir) }}">
        </div>

        <div class="form-group">
          <label for="tmt">TMT</label>
          <input type="date" name="tmt" id="tmt" class="form-control" value="{{ old('tmt',$pegawai->tmt) }}">
      </div>

      <div class="form-group">
        <label for="fungsional_id">Bidang</label>
        <select class="form-select" name="bidang_id">
          <option value="" disabled selected>-- Pilih Bidang Karyawan --</option>
          @foreach($bidangs as $bidang)
          @if(old('bidang_id',$pegawai->bidang_id)== $bidang->id)
          <option value="{{ $bidang->id }}" selected> {{ $bidang->nama }}</option>
          @else
            <option value="{{ $bidang->id }}"> {{ $bidang->nama }}</option>
          @endif
        @endforeach
          </select>
      </div>
</div>
<div class="text-center">  <button type="submit" class="btn btn-primary mt-4 col-lg-7">Edit Data Karyawan</button></div>





</form>
</div>

</div>

  <script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change',function(){
        fetch('/jabatan/checkSlug?jabatan='+ nama.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
  </script>
 
@endsection