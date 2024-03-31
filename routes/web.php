<?php

use App\Http\Controllers\CutiController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;

use App\Http\Controllers\CrudpnsController;
use App\Http\Controllers\CrudkontrakController;
use App\Http\Controllers\Crudp3kController;

use App\Http\Controllers\CutipnsController;
use App\Http\Controllers\RekomendasiController;

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\FungsionalController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SuratController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your appmaillication. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home', function () {
//     return view('home', [
//         'title' => 'Home'
//     ]);
// });

// Route::get('/about', function () {
//     return view('about', [
//         'title' => 'About'
//     ]);
// });

Route::get('/', [LoginController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// route list surat 
Route::get('/surat', [SuratController::class, 'index']);
Route::get('/cuti', [CutiController::class, 'index']);

// route make surat Cuti
// Route::get('/cuti/karyawan/{kategori:slug}', [CutiController::class, 'karyawan']);
Route::get('/surat/pns/{pegawai:id}', [SuratController::class, 'cuti']);
Route::get('/surat/p3k/{pegawai:id}', [SuratController::class, 'cuti']);
Route::get('/surat/kontrak/{pegawai:id}', [SuratController::class, 'cuti']);

//route form surat rekomendasi
Route::get('/formrekom/pns/{pegawai:id}', [SuratController::class, 'rekom']);
Route::get('/lihatsurat/surat/{rekomendasi:id}', [SuratController::class, 'lihat']);
Route::get('/karyawan/printrekomendasi/{rekomendasi:id}', [KaryawanController::class, 'printrekomendasi']);


// Route::get('/surat/pns/{pegawai:nik}/cuti', [SuratController::class, 'cuti']);
// Route::get('/surat/pns/{pegawai:nik}/rekomendasi', [SuratController::class, 'rekom']);
// Route::get('/surat/p3k/{pegawai:nik}/rekomendasi', [SuratController::class, 'rekom']);

//buat detail data pegawai
Route::get('/karyawan/pns/{pegawai:id}', [KaryawanController::class, 'detail']);
Route::get('/karyawan/p3k/{pegawai:id}', [Crudp3kController::class, 'detail']);
Route::get('/karyawan/kontrak/{pegawai:id}', [CrudkontrakController::class, 'detail']);
// aktivasi cuti 
Route::get('/karyawan/pns/status_cuti/{pegawai:id}', [KaryawanController::class, 'aktivasiCuti']);


//print cuti
Route::get('/karyawan/print/{cuti:id}', [KaryawanController::class, 'print']);

Route::get('/karyawan/printkontrak/{cuti:id}', [KaryawanController::class, 'printcutikontrak']);

// print surat lain 

// Route::get('/print', [KaryawanController::class, 'print']);


Route::get('/jabatan/checkSlug', [JabatanController::class, 'checkSlug']);
Route::get('/golongan/checkSlug', [GolonganController::class, 'checkSlug']);
Route::get('/fungsional/checkSlug', [FungsionalController::class, 'checkSlug']);
Route::get('/unit/checkSlug', [UnitController::class, 'checkSlug']);
Route::get('/kategori/checkSlug', [KategoriController::class, 'checkSlug']);
Route::get('/bidang/checkSlug', [BidangController::class, 'checkSlug']);

//route menampilkan list pegawai
Route::get('/PNS/{kategori:slug}', [CrudpnsController::class, 'kategori']);
Route::get('/P3K/{kategori:slug}', [Crudp3kController::class, 'kategori']);
Route::get('/KONTRAK/{kategori:slug}', [CrudkontrakController::class, 'kategori']);

Route::get('/detailpns/{pegawai:id}', [CrudpnsController::class, 'detail']);
Route::get('/detailkontrak/{pegawai:id}', [CrudkontrakController::class, 'detail']);
Route::get('/detailp3k/{pegawai:id}', [Crudp3kController::class, 'detail']);



//crud pegawais
Route::resource('/pns', CrudpnsController::class);
Route::resource('/kontrak', CrudkontrakController::class);
Route::resource('/p3k', Crudp3kController::class);

//crud cuti 
Route::resource('/cuti', CutipnsController::class);

//crud surat rekomendasi 
Route::resource('/rekom', RekomendasiController::class);




//import excel
Route::post('/pns/import_excel', [CrudpnsController::class, 'import_excel']);


//crud data master
Route::resource('/jabatan', JabatanController::class);
Route::resource('/bidang', BidangController::class);
Route::resource('/golongan', GolonganController::class);
Route::resource('/fungsional', FungsionalController::class);
Route::resource('/unit', UnitController::class);
Route::resource('/kategori', KategoriController::class);









// Route::get('/pns', [RegisterController::class, 'pns']);
// Route::get('/kontrak', [RegisterController::class, 'kontrak']);
// Route::get('/p3k', [RegisterController::class, 'p3k']);
