<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    {{--Boostrap Icon CSS  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- my style --}}
    <link rel="stylesheet" href="css/style.css">


    {{-- <title>SIMPEG Fauziah | {{ $title }}</title> --}}
  </head> 
  <body>

    {{-- mengambil bagian dari halaman lain  --}}
   @include('partials.navreg')

    <div class="container mt-4">
        {{-- template yang di ubah di halaman lain  --}}
        <div class="row">
          <div class="col-md-8">
              @yield('left-column')
          </div>
          <div class="col-md-8">
              @yield('right-column')
          </div>
      </div>
        @yield('container')

    </div>

    <div class="containera mt-4">
      {{-- template yang di ubah di halaman lain  --}}
    
      @yield('containera')

  </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>