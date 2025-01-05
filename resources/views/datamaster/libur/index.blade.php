@extends('dashboard.layout.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3 class="">Data Tanggal Libur </h3>
</div>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="collapse mb-2" id="bagan-form-tambah-collapse">
    <div class="card card-body border-0 shadow" style="background: #f2f2f2;">
        @include('datamaster.libur.form')
    </div>
</div>

<div class="d-flex justify-content-end">
    <a class="btn btn-info d-flex align-items-center gap-2 text-white collapse-cus"
        data-bs-toggle="collapse"
        href="#bagan-form-tambah-collapse"
        role="button"
        aria-expanded="false"
        aria-controls="bagan-form-tambah-collapse">
        <span id="collapse-open">
            <i class="fa-solid fa-angles-down"></i> Buka Form Input
        </span>
        <span id="collapse-closed" class="d-none">
            <i class="fa-solid fa-angles-up"></i> Tutup Form Input
        </span>
    </a>
</div>
<hr>
<div class="card p-3">
    <div class="card-header">
        Data Tanggal Libur
    </div>
    <div class="card-body">
        @include('datamaster.libur.column')
    </div>
</div>


<script>
    // Menggunakan event dari Bootstrap untuk memantau status collapse
    var collapseElement = document.getElementById('bagan-form-tambah-collapse');
    var openText = document.getElementById('collapse-open');
    var closedText = document.getElementById('collapse-closed');

    // Ketika form mulai terbuka
    collapseElement.addEventListener('show.bs.collapse', function() {
        openText.classList.add('d-none');
        closedText.classList.remove('d-none');
    });

    // Ketika form tertutup
    collapseElement.addEventListener('hidden.bs.collapse', function() {
        openText.classList.remove('d-none');
        closedText.classList.add('d-none');
    });
</script>


@endsection