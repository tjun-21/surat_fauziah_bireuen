@extends('dashboard.layout.main')   

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Golongan </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div> 
  </div>

  <div class="col-lg-8 " >
    <form method="post" action="{{ route('golongan.update',$golongan->id) }}">
        @method('put')
        @csrf

        <div class="form-group">
          <label for="nama">Nama golongan</label>
          <input type="text" class="form-control @error('golongan') is-invalid  @enderror " id="nama" name="nama" placeholder="Ex: Kepala Bidang" value="{{ old('nama', $golongan->nama)}}">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>


            @enderror
        </div>
       
        <div class="form-group">
            <label for="slug">Slug </label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{ old('slug',$golongan->slug) }}" readonly>
           
          </div>
  
  <div class="form-group">
    <label for="kategori">Kategori</label>
    <select class="form-select" name="kategori_id">
        @foreach($categories as $category)
          @if(old('kategori_id',$golongan->kategori_id)== $category->id)
            <option value="{{ $category->id }}" selected> {{ $category->nama }}</option>
          @else
          <option value="{{ $category->id }}"> {{ $category->nama }}</option>
          @endif
        @endforeach
      </select>
   
  </div>

<button type="submit" class="btn btn-primary mt-3">Edit golongan</button>
</form>

</div>

  <script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change',function(){
        fetch('/golongan/checkSlug?golongan='+ nama.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
  </script>
 
@endsection