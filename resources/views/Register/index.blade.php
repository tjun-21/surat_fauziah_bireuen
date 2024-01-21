@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-4">

        <main class="form-registration w-100 m-auto">
            
            <h1 class="h3 mb-3 fw-normal text-center">FORM REGISTRASI AKUN SIMPEG</h1>

            <form action="/register" method="post">
              @csrf

              <div class="form-floating mt-3">
                <input type="text" name="nik" class="form-control rounded-top @error('nik') is-invalid @enderror" id="nik" placeholder="11111989767876545" required value="{{ old('nik') }}">
                <label for="nik">NIK</label>
              </div>

              <div class="form-floating">
                <input type="text" name="name" class="form-control" id="nama" placeholder="Nama" value="{{ old('name') }}">
                <label for="name">Nama Lengkap</label>
              </div>

              <div class="form-floating">
                <input type="text" name="email" class="form-control" id="email" placeholder="example@gmail.com" value="{{ old('email') }}">
                <label for="email">Email</label>
              </div>

              <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom" id="floatingPassword" placeholder="Password"  > 
                <label for="floatingPassword">Password</label>
              </div>

              
          
              <button class="btn pink tulisan-putih w-100 py-2 mt-3 " type="submit">REGISTER</button>
             
            </form>
  
            <small class="d-block text-center mt-3" >Sudah Punya Akun? <a href="/login"> Login </a></small> <br>
       

            <p class="mt-5 mb-3 text-body-secondary right">&copy; nmuf-2023</p>
          </main> 
    </div>
</div>


    
@endsection