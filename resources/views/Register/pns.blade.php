@extends('layouts.registerlay')




@section('left-column')

<div class="row justify-content-center">
    <div class="col-md-8">
        <main class="form-signin w-100 m-auto">
            
          
            <form>

              <div class="form-floating">
                <input type="text" class="form-control" id="nik" placeholder="11111989767876545">
                <label for="nik">NIP</label>
              </div>

              <div class="form-floating">
                <input type="text" class="form-control" id="nama" placeholder="Nama">
                <label for="nama">Nama Lengkap</label>
              </div>

              <div class="form-floating">
                <input type="text" class="form-control" id="nama" placeholder="Nama">
                <label for="nama">Golongan</label>
              </div>

              <div class="form-floating">
                <input type="text" class="form-control" id="nama" placeholder="Nama">
                <label for="nama">fungsional</label>
              </div>

              <div class="form-floating">
                <input type="text" class="form-control" id="nama" placeholder="Nama">
                <label for="nama"> Unit Keja </label>
              </div>

              <div class="form-floating">
                <input type="text" class="form-control" id="nama" placeholder="Nama">
                <label for="nama">Golongan</label>
              </div>

@endsection

@section('right-column')

              <div class="form-floating">
                <input type="text" class="form-control" id="nama" placeholder="Nama">
                <label for="nama">Jabatan</label>
              </div>

              <div class="form-floating">
                <input type="text" class="form-control" id="nama" placeholder="Nama">
                <label for="nama">Pendidikan</label>
              </div>

              <div class="form-floating">
                <input type="text" class="form-control" id="nama" placeholder="Nama">
                <label for="nama">Jenis Kelamin</label>
              </div>


              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
              
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Konfirmasi Password</label>
              </div>

              <button class="btn btn-primary w-100 py-2" type="submit">LOGIN</button>
             
            </form>
            
          </main> 
    </div>
</div>


    
@endsection