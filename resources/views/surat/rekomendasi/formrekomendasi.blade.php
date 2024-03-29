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

    .button-container {
    margin-top: 20px; /* Atur jarak ke atas */
  }
    </style>
@include('partials.bread')
<div class="container">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="container mt-3">
                    <h3 class="mb-3 text-center"> Isi Data {{ $title }} Untuk Membuat Surat {{ $sub_title }} </h3>
                    <div class="row">
                        <form method="POST" action="{{ route('rekom.store') }}" class="mb-4">
                            @csrf
                            <div class="mb-3">
                                {{-- <label for="nama" class="form-label">Id Pegawai</label> --}}
                                <input type="hidden" name="pegawai_id" class="form-control" value="{{ $pegawai->id }}" >
                              </div>


                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pegawai</label>
                                <input type="text" name="nama" class="form-control" value="{{ $pegawai->nama }}" readonly>
                              </div>

                              <div class="mb-3">
                                <label for="alamat_praktek" class="form-label">Alamat Tempat Melakukan Praktek</label>
                                <input type="text" name="alamatrekom" class="form-control">
                            </div>
    
                           
                         
                 

                        
                         
                            {{-- <div class="mb-3">
                                <label for="no" class="form-label">No Hp</label>
                                <input type="number" name="no" class="form-control">
                            </div> --}}
                         

                        


                            <div class="text-center "> <button type="submit" class="btn btn-primary  col-lg-10 ">Buat Surat Rekomendasi</button></div>
                      
                            
    
                        </form>
                        
                    </div>
                </div>
            
            </div>
    </div>
  </div>
 

  @include('partials.rekom_history')
@endsection