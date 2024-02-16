<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Cuti;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Kategori;
use App\Models\Surat;
use App\Models\Bidang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;



class KaryawanController extends Controller
{
    public function kategori(Kategori $kategori)
    {
        return view('dashboard.pegawai.listpegawai', [
            "title" => 'Karyawan',
            "sub_title" => $kategori->nama,
            "pegawais" => $kategori->pegawai,
            // "jabatan" => Jabatan :: all(),
            'active' => "karyawan"
        ]);
    }

    // public function jabatan(Jabatan $jabatan)
    // {
    //     return view('dashboard.karyawan', [
    //         "title" => $jabatan->nama,
    //         "pegawais" => $jabatan->pegawai,
    //         'active' => "karyawan"
    //     ]);
    // }

    public function detail(Pegawai $pegawai)
    {
        return view('dashboard.pegawai.pns.detail', [
            "active" => "karyawan",
            'title' => "data pegawai",
            "pegawai" => $pegawai,
            "surat" => $pegawai->surat,
            "cuti" => $pegawai->cuti


        ]);
    }

    public function print(Cuti $cuti)
    {
        $j=$cuti->pegawai->jabatan->id;
        
        $kepala = DB::table('pegawais')
        ->join('bidangs', 'pegawais.bidang_id', '=', 'bidangs.id')
        ->join('jabatans', 'pegawais.jabatan_id', '=', 'jabatans.id')
        ->select('pegawais.*', 'bidangs.nama as bidang_nama', 'jabatans.nama as jabatan_nama')
        ->where('pegawais.bidang_id', '=', $j)
        ->where('jabatans.nama', '=', 'kepala')
        ->get();
        $data = [
            'cuti' => $cuti,
            'pegawais'=>$cuti->pegawai::all(),
            'bidang'=>$cuti->pegawai->bidang,
            'kabid'=> $kepala
 

        ];


    
  

 
        $pdf = Pdf::loadView('surat.template.cuti', $data)->setPaper('a4', 'potrait');
        return $pdf->download('surat.pdf');

        // $mpdf = new \Mpdf\Mpdf();
        // $data = $cuti;
        // $mpdf->WriteHTML(view("surat.template.cuti"));
        // $mpdf->Output();
    }

    // public function cuti(Pegawai $pegawai)
    // {

    //     return view('surat.cuti', [
    //         'title' => "data pegawai",
    //         "pegawai" => $pegawai,

    //     ]);
    // }
}
