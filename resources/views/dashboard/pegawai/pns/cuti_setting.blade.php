@extends('dashboard.layout.main')

@section('container')
<div class="row">
    @include('partials.bread')
</div>
<hr>
<div class="col-md-12">
    <div class="text-center">
        <h1 class="mb-3">{{ $title }} </h1>
    </div>
    @if($data->isNotEmpty())
    @php
    $dataSetting = $data->first();

    @endphp
    <form action="{{ route('updateSettingCuti', ['id' => $dataSetting->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="hidden" name="id_pegawai" value="{{ $params }}">
        </div>
        <div class="form-group">
            <label for="kuota_cuti_tahunan">Kuota Cuti Tahunan:</label>
            <input type="number" id="kuota_cuti_tahunan" name="kuota_cuti_tahunan" class="form-control my-2" value="{{ $dataSetting->kuota_cuti_tahunan }}" required>
        </div>
        <div class="form-group">
            <label for="cutiN_1">Cuti N-1:</label>
            <input type="number" id="cutiN_1" name="cutiN_1" class="form-control my-2" value="{{ $dataSetting->cutiN_1 }}" required>
        </div>
        <div class="form-group">
            <label for="cutiN_2">Cuti N-2:</label>
            <input type="number" id="cutiN_2" name="cutiN_2" class="form-control my-2" value="{{ $dataSetting->cutiN_2 }}" required>
        </div>
        <div class="form-group">
            <label for="kuota_cuti">Total Kuota Cuti:</label>
            <input type="number" id="kuota_cuti" name="kuota_cuti" class="form-control my-2" value="{{ $dataSetting->kuota_cuti }}" readonly>
        </div>
        @if($dataSetting->cuti_set == 0)
        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
        @endif
    </form>
    @else
    <p>Data cuti tidak ditemukan.</p>
    @endif
</div>



<script src="{{ asset('js/settingCuti/calculate_quota.js') }}"></script>
@endsection