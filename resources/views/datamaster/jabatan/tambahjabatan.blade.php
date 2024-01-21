@extends('dashboard.layout.main')   

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Jabatan  </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div> 
  </div>

  <div class="col-lg-8 " >
    <form method="post" action="{{ route('jabatan.store') }}">
        @csrf

        <div class="form-group">
          <label for="nama">Nama Jabatan</label>
          <input type="text" class="form-control @error('jabatan') is-invalid  @enderror " id="nama" name="nama" placeholder="Ex: Kepala Bidang" value="{{ old('nama') }}">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>


            @enderror
        </div>
       
        <div class="form-group">
            <label for="slug">Slug </label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{ old('slug') }}" readonly>
           
          </div>
  
  <div class="form-group">
    <label for="kategori">Kategori</label>
    <select class="form-select" name="kategori_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}"> {{ $category->nama }}</option>
        @endforeach
      </select>
   
  </div>

<button type="submit" class="btn btn-primary mt-3">Tambah Jabatan</button>
</form>

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