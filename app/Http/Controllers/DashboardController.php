<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'active' => 'dashboard'
        ]);
        // $p =  Pegawai::all();
        // dd($p);
    }

    // public function kategori(Kategori $kategori)
    // {
    //     return view('dashboard.karyawan', [
    //         "title" => $kategori->nama,
    //         "pegawais" => $kategori->pegawai,
    //         'active' => "karyawan"
    //     ]);
    // }

    // public function detail()
    // {
    //     return view('dashboard.detail', [
    //         'title' => "detail data Pegawai",


    //     ]);
    // }

    public function print(Pegawai $pegawai)
    {

        return view('dashboard.detail', [
            "active" => "karyawan",
            'title' => "data pegawai",
            "pegawai" => $pegawai,

        ]);
    }

    public function cuti(Pegawai $pegawai)
    {

        return view('surat.cuti', [
            'title' => "data pegawai",
            "pegawai" => $pegawai,

        ]);
    }
}
