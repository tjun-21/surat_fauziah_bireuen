<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Pegawai;
use App\Models\Kategori;
use App\Models\Jabatan;
use App\Models\Rekomendasi;
use App\Models\JCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
    public function index()
    {
        return view('surat.other.surat', [
            "title" => 'List Surat Lainnya',
            "surat" => Surat::all(),
            // "jabatan" => Jabatan :: all(),
            'active' => "list-surat"
        ]);
    }



    public function kategori(Kategori $kategori)
    {
        return view('surat.listsurat', [
            "title" => 'Surat',
            "sub_title" => $kategori->nama,
            "pegawais" => $kategori->pegawai,
            // "jabatan" => Jabatan :: all(),
            'active' => "surat"


        ]);
    }

    public function cuti( Pegawai $pegawai)
    {
        return view('surat.cuti.formcuti', [
            "title" => 'Form Cuti',
            "sub_title" => "PNS",
            "surat" => $pegawai->surat,
            "cuti" => $pegawai->cuti,
            "pegawai" => $pegawai,
            "pegawais" => Pegawai::all(),
           


            // "direktur" => DB::table('pegawais')
            // ->join('jabatans', 'pegawais.jabatan_id', '=', 'jabatans.id')
            // ->select('pegawais.*',  'jabatans.nama as jabatan_nama')
            // ->where('jabatans.id', 'LIKE', '%direktur%')
            // ->get(),

            "j_cuti" => JCuti::all(),
            // "jabatan" => Jabatan :: all(),
            'active' => "surat_cuti"

            
        ]);
    }
    

    // public function cuti( Pegawai $pegawai)
    // {
    //     return view('surat.cuti.formcuti', [
    //         "title" => 'Form Cuti',
    //         "sub_title" => "PNS",
    //         "pegawai" => $pegawai,
    //         "j_cuti" => JCuti::all(),
    //         // "jabatan" => Jabatan :: all(),
    //         'active' => "surat_cuti"
    //     ]);
    // }

    public function rekom(Pegawai $pegawai)
    {
        return view('surat.rekomendasi.formrekomendasi', [
            "title" => 'Form Surat Rekomendasi',
            "sub_title" => "PNS",
            "surat" => $pegawai->surat,
            "rekom" =>$pegawai->rekomendasi,
            "pegawai" => $pegawai,
            'active' => "surat"
        ]);
    }

    // public function detail(Pegawai $pegawai)
    // {
    //     return view('dashboard.detail', [
    //         "active" => "Surat Cuti",
    //         'title' => "data pegawai",
    //         "pegawai" => $pegawai,


    //     ]);
    // }
        

    public function lihat(Rekomendasi $rekomendasi)
    {

      
        return view('surat.template.rekomendasi', [
                "rekom" =>$rekomendasi,
                "pegawai" => $rekomendasi->pegawai,

            
            
        ]);

        
    }

    // public function cuti(Pegawai $pegawai)
    // {

    //     return view('surat.cuti', [
    //         'title' => "data pegawai",
    //         "pegawai" => $pegawai,

    //     ]);
    // }
}
