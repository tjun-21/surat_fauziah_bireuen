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

  .center{
    text-align: center;
  }

  </style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
  <div class="container mt-0 mb-3 ">
    <h3 class=" text-center  ">TAMBAH DATA KARYAWAN P3K</h3>
  </div>
  </div>

  <div class="col-lg-13 " >

    <form method="post" action="{{ route('p3k.store') }}">
        @csrf
        <div class="column">
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control @error('nik') is-invalid  @enderror " id="nik" name="nik" placeholder="Ex: 111119898272" value="{{ old('nik') }}">
              @error('nik')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>

          <div class="form-group">
            <label for="nip">Nomor Induk P3K</label>
            <input type="text" class="form-control @error('nik') is-invalid  @enderror " id="nip" name="nip" placeholder="Ex: 111119898272" value="{{ old('nip') }}">
              @error('nip')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>

          <div class="form-group">
            <label for="nama">Nama karyawan</label>
            <input type="text" class="form-control @error('nik') is-invalid  @enderror " id="nama" name="nama" placeholder="Ex: Ruhma Zuhra" value="{{ old('nama') }}">
              @error('nama')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>

          <div class="form-group">
            <label for="tmp_lahir">Tempat Lahir</label>
            <input type="text" class="form-control @error('tmp_lahir') is-invalid  @enderror " id="tmp_lahir" name="tmp_lahir" placeholder="Ex: Bireuen" value="{{ old('tmp_lahir') }}">
              @error('tmp_lahir')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>

          <div class="form-group">
            <label for="pendidikan">Pendididkan</label>
            <input type="text" class="form-control @error('pendidikan') is-invalid  @enderror " id="pendidikan" name="pendidikan" placeholder="Ex: D-III Kebidanan" value="{{ old('pendidikan') }}">
              @error('pendidikan')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>

          <div class="form-group">
            <label for="email">Email </label>
            <input type="text" class="form-control @error('email') is-invalid  @enderror " id="email" name="email" placeholder="Ex: Ruhma Zuhra" value="{{ old('email') }}">
              @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>

          <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" class="form-control @error('no_hp') is-invalid  @enderror " id="no_hp" name="no_hp" placeholder="Ex: Ruhma Zuhra" value="{{ old('no_hp') }}">
              @error('no_hp')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
          <div class="text-center">
          <button type="submit" class="btn btn-primary mt-4 col-lg-7">Tambah Karyawan</button>
        </div>
        </div>
     <div class="column">
        <div class="form-group">
          <label for="tgl_lahir">Tanggal Lahir:</label>
          <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
        </div>

        <div class="form-group">
          <label for="tmt">TMT</label>
          <input type="date" name="tmt" id="tmt" class="form-control">
        </div>
        
        <div class="form-group">
          <label for="tmt_sk">TMT SK</label>
          <input type="date" name="tmt_sk" id="tmt_sk" class="form-control">
      </div>
    
    <div class="form-group">
      <label for="tmt_masuk">TMT Masuk</label>
      <input type="date" name="tmt_masuk" id="tmt_masuk" class="form-control">
    </div>
    <div class="form-group">
      <label for="fungsional_id">Bidang</label>
      <select class="form-select" name="bidang_id">
        <option value="" disabled selected>-- Pilih Bidang Karyawan --</option>
          @foreach($bidangs as $bidang)
              <option value="{{ $bidang->id }}"> {{ $bidang->nama }}</option>
          @endforeach
        </select>
    </div>


  
  <div class="column">

    

    <div class="form-group">
      <label for="j_kelamin">jenis kelamin</label>
      <select class="form-select" name="j_kelamin">
        <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
        </select>
    </div>

<div class="form-group">
    <label for="kategori_id">Kategori</label>
    <select class="form-select" name="kategori_id">
      <option value="" disabled selected>-- Pilih Kategori Karyawan --</option>
        @foreach($categories as $category)
            
            <option value="{{ $category->id }}"> {{ $category->nama }}</option>
        @endforeach
      </select>
  </div>

  <div class="form-group">
    <label for="golongan_id">Golongan</label>
    <select class="form-select" name="golongan_id">
      <option value="" disabled selected>-- Pilih Golongan Karyawan --</option>
        @foreach($golongan as $golongan)
            <option value="{{ $golongan->id }}"> {{ $golongan->nama }}</option>
        @endforeach
      </select>
  </div>


  
</div>

<div class="column">

  <div class="form-group">
    <label for="jabatan_id">Jabatan</label>
    <select class="form-select" name="jabatan_id">
      <option value="" disabled selected>-- Pilih Jabatan Karyawan --</option>
        @foreach($jabatan as $jabatan)
            <option value="{{ $jabatan->id }}"> {{ $jabatan->nama }}</option>
        @endforeach
      </select>
   
  </div>

  <div class="form-group">
    <label for="fungsional_id">Fungsional</label>
    <select class="form-select" name="fungsional_id">
      <option value="" disabled selected>-- Pilih Fungsional Karyawan --</option>
        @foreach($fungsional as $fungsional)
            <option value="{{ $fungsional->id }}"> {{ $fungsional->nama }}</option>
        @endforeach
      </select>
   
  </div>

  <div class="form-group">
    <label for="unit_id">Unit</label>
    <select class="form-select" name="unit_id">
      <option value="" disabled selected>-- Pilih Unit Karyawan --</option>
        @foreach($unit as $unit)
            <option value="{{ $unit->id }}"> {{ $unit->nama }}</option>
        @endforeach
      </select>
  </div>

</div>
</div>
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