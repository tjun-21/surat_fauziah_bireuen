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

    <form method="post" action="{{ route('p3k.update',$pegawai->id) }}">
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
            <label for="nip">Nomor Induk P3K</label>
            <input type="text" class="form-control @error('nik') is-invalid  @enderror " id="nip" name="nip" placeholder="Ex: 111119898272" value="{{ old('nip',$pegawai->nip) }}">
              @error('nip')
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
            <label for="pendidikan">Pendidikan</label>
            <input type="text" class="form-control @error('pendidikan') is-invalid  @enderror " id="pendidikan" name="pendidikan" placeholder="Ex: D-III Kebidanan" value="{{ old('pendidikan',$pegawai->pendidikan) }}">
              @error('pendidikan')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>

          <div class="form-group">
            <label for="email">Email </label>
            <input type="text" class="form-control @error('email') is-invalid  @enderror " id="email" name="email" placeholder="Ex: Ruhma Zuhra" value="{{ old('email',$pegawai->email) }}">
              @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>

          <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" class="form-control @error('no_hp') is-invalid  @enderror " id="no_hp" name="no_hp" placeholder="Ex: Ruhma Zuhra" value="{{ old('no_hp',$pegawai->no_hp ) }}">
              @error('no_hp')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
          <button type="submit" class="btn btn-primary mt-4 ">Tambah Karyawan</button>
        </div>
     <div class="column">
        <div class="form-group">
          <label for="tgl_lahir">Tanggal Lahir:</label>
          <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{ old('tgl_lahir',$pegawai->tgl_lahir) }}">
        </div>

        <div class="form-group">
          <label for="tmt">TMT</label>
          <input type="date" name="tmt" id="tmt" class="form-control" value="{{ old('tmt',$pegawai->tmt) }}">
        </div>
        
        <div class="form-group">
          <label for="tmt_sk">TMT SK</label>
          <input type="date" name="tmt_sk" id="tmt_sk" class="form-control" value="{{ old('tmt_sk',$pegawai->tmt_sk) }}">
      </div>
    
    <div class="form-group">
      <label for="tmt_masuk">TMT Masuk</label>
      <input type="date" name="tmt_masuk" id="tmt_masuk" class="form-control" value="{{ old('tmt_masuk',$pegawai->tmt_masuk) }}">
    </div>


  
  <div class="column">

    <div class="form-group">
      <label for="j_kelamin">jenis kelamin</label>
      <select class="form-select" name="j_kelamin">
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
        </select>
    </div>


    <div class="form-group">
      <label for="kategori">Kategori</label>
      <select class="form-select" name="kategori_id">
          @foreach($categories as $category)
            @if(old('kategori_id',$pegawai->kategori_id)== $category->id)
              <option value="{{ $category->id }}" selected> {{ $category->nama }}</option>
            @else
            <option value="{{ $category->id }}"> {{ $category->nama }}</option>
            @endif
          @endforeach
        </select>
     
    </div>
  <div class="form-group">
    <label for="golongan_id">Golongan</label>
    <select class="form-select" name="golongan_id">
        @foreach($golongan as $golongan)
          @if(old('golongan_id',$pegawai->golongan_id)== $golongan->id)
          <option value="{{ $golongan->id }}" selected> {{ $golongan->nama }}</option>
          @else
            <option value="{{ $golongan->id }}"> {{ $golongan->nama }}</option>
            @endif
        @endforeach
      </select>
  </div>
</div>

<div class="column">

  <div class="form-group">
    <label for="jabatan_id">Jabatan</label>
    <select class="form-select" name="jabatan_id">
        @foreach($jabatan as $jabatan)
          @if(old('jabatan_id',$pegawai->jabatan_id)== $jabatan->id)
          <option value="{{ $jabatan->id }}" selected> {{ $jabatan->nama }}</option>
           @else
            <option value="{{ $jabatan->id }}"> {{ $jabatan->nama }}</option>
            @endif
        @endforeach
      </select>
  </div>


  <div class="form-group">
    <label for="fungsional_id">Fungsional</label>
    <select class="form-select" name="fungsional_id">
        @foreach($fungsional as $fungsional)
          @if(old('fungsional_id',$pegawai->fungsional_id)== $fungsional->id)
          <option value="{{ $fungsional->id }}" selected> {{ $fungsional->nama }}</option>
          @else
            <option value="{{ $fungsional->id }}"> {{ $fungsional->nama }}</option>
          @endif
        @endforeach
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