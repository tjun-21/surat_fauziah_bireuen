@extends('dashboard.layout.main')


@section('container')
@include('partials.bread')
<div class="container">
    <div class="row">
        <div class="col">

            <div class="container mt-3">
                <h3 class="mb-3">{{ $title }} {{ $sub_title }} </h3>
                <div class="row">
                    <form method="POST" action="{{ route('cuti.store') }}">
                        @csrf
                        <div class="mb-3">
                          {{-- <label for="nama" class="form-label">Id Pegawai</label> --}}
                          <input type="hidden" name="pegawai_id" class="form-control" value="{{ $pegawai->id }}" >
                        </div>
                        <div class="mb-3">
                            {{-- <label for="nama" class="form-label">Id Pegawai</label> --}}
                            <input type="text" name="nama" class="form-control" value="{{ $pegawai->nama }}" readonly>
                          </div>

                        <div class="mb-3">
                            <label for="jeniscuti" class="form-label">Jenis Cuti</label>
                            <select class="form-select" name="jcuti_id">
                                <option> -- Pilih Cuti --</option>
                              @foreach($j_cuti as $j)
                                  <option value="{{ $j->id }}"> {{ $j->nama }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alasancuti">Alasan Cuti</label>
                            <label for="alasan" class="form-label">Alasan Melaksanakan Cuti</label>
                            <input type="text" name="alasan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="alamat_cuti" class="form-label">Alamat Saat Melaksanakan Cuti</label>
                            <input type="text" name="alamat_cuti" class="form-control">
                        </div>
                        {{-- <div class="mb-3">
                            <label for="no" class="form-label">No Hp</label>
                            <input type="number" name="no" class="form-control">
                        </div> --}}

                        <div class="mb-3">
                            <label for="nama" class="form-label">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Tanggal Akhir</label>
                            <input type="date" name="tgl_akhir" class="form-control">
                        </div>
                       
                    
                    
                  
                        <button type="submit" class="btn btn-primary mt-3">Buat Cuti</button>

                    </form>
                    
                </div>
            </div>
    </div>
  </div>
@endsection