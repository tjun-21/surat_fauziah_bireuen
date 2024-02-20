<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Kategori;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Fungsional;
use App\Models\Unit;
use App\Models\Bidang;

use App\Models\Cuti;
use App\Models\Surat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class Crudp3kController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pegawai.p3k.tambahkaryawan',[
            'active' => 'karyawan',
            "title" => 'Karyawan',
            "sub_title" => $kategori->nama,
            "pegawais" => $kategori->pegawai,
            'categories' => kategori::all(),
            'golongan' => golongan::all(),
            'jabatan' => jabatan::all(),
            'fungsional' => fungsional::all(),
            'unit' => unit::all(),
            'bidangs'=>bidang::all()
            
       
            ]);
    }

    public function kategori(Kategori $kategori)
    {
        return view('dashboard.pegawai.p3k.listpegawai', [
            "title" => 'Karyawan',
            "sub_title" => $kategori->nama,
            "pegawais" => $kategori->pegawai,
            // "jabatan" => Jabatan :: all(),
            'active' => "karyawan"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('dashboard.pegawai.p3k.tambahkaryawan',[
            'active' => 'karyawan',
            'categories' => kategori::all(),
            'golongan' => golongan::all(),
            'jabatan' => jabatan::all(),
            'fungsional' => fungsional::all(),
            'unit' => unit::all(),
            'bidangs'=>bidang::all()

       
            ]);    
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
           
            'nik' => 'required|max:255',
            'nama' => 'required|max:255',
            'nip' => 'required|max:255',
            'pendidikan' => 'required|max:255',
            
            'tmp_lahir'=>'required|max:255',
            'email'=>'required|max:255',
            'no_hp'=>'required|max:255',

            'tgl_lahir'=>'required|max:255',
            'tmt'=>'required|max:255',
            'tmt_sk'=>'required|max:255',
            'tmt_masuk'=>'required|max:255',

            'j_kelamin' => 'required',
            'kategori_id' => 'required',
            'golongan_id' => 'required',
            
            'jabatan_id' => 'required',
            'fungsional_id' => 'required',
            'unit_id' => 'required',
            'bidang_id' => 'required'

        ]);

        // $validatedData['id'] = auth()->user()->id; 

        pegawai :: create ($validatedData);
        return redirect('/P3K/p3k')->with('success','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrfail($id);
        return view('dashboard.pegawai.p3k.editkaryawan',[
            'active' => 'karyawan',
            'pegawai' => $pegawai,
            'categories' => kategori::all(),
            'golongan' => golongan::all(),
            'jabatan' => jabatan::all(),
            'fungsional' => fungsional::all(),
            'unit' => unit::all(),
            'bidangs' => bidang::all()
            
            
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $pegawai = Pegawai::findOrfail($id);

        $rules =[
           
            'nik' => 'required|max:255',
            'nama' => 'required|max:255',
            'nip' => 'required|max:255',
            'pendidikan' => 'required|max:255',
            
            'tmp_lahir'=>'required|max:255',
            'email'=>'required|email',
            'no_hp'=>'required|max:255',

            'tgl_lahir'=>'required|max:255',
            'tmt'=>'required|max:255',
            'tmt_sk'=>'required|max:255',
            'tmt_masuk'=>'required|max:255',

            'j_kelamin' => 'required',
            'kategori_id' => 'required',
            'golongan_id' => 'required',
            
            'jabatan_id' => 'required',
            'fungsional_id' => 'required',
            'unit_id' => 'required',
            'bidang_id' => 'required'

        ];
        $validatedData = $request -> validate($rules);

        pegawai :: where ('id', $pegawai ->id)
                ->update($validatedData);

        return redirect('/P3K/p3k')->with('success','data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $pegawai = Pegawai::findOrfail($id);
        $pegawai->delete();
        return redirect('/P3K/p3k')->with('success','data berhasil dihapus');
    }

    public function detail(Pegawai $pegawai)
    {
        return view('dashboard.pegawai.p3k.detail', [
            "active" => "karyawan",
            'title' => "data pegawai",
            "pegawai" => $pegawai,
            "surat" => $pegawai->surat,
            "cuti" => $pegawai->cuti
        ]);
    }
}
