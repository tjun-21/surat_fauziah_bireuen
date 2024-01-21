@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-6">

      @if(session()->has('sukses'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

        <main class="form-signin w-100 m-auto">
            
            <h1 class="h3 mb-3 fw-normal text-center judul">LOGIN SIMPEG FAUZIAH</h1>

            <form action="/login" method="post">
              @csrf

              <img class="mb-4" id="logo" src="image/logo_fauziah.png" alt="" width="100" height="100">
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value>
                <label for="email">Email address</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>

                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required >
                <label for="password">Password</label>
              </div>
          
              <button class="btn pink tulisan-putih w-100 py-2" type="submit" >LOGIN</button>
             
            </form>
            <small class="d-block text-center mt-3" >Belum Punya Akun? <a href="/register"> Registrasi Akun Staff </a></small> <br>

            <p class="mt-5 mb-3 text-body-secondary right">&copy; nmuf-2023</p>
          </main> 
    </div>
</div>


    
@endsection