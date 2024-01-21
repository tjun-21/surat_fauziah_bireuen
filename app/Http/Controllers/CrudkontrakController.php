<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Kategori;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Fungsional;
use App\Models\Unit;

use App\Models\Cuti;
use App\Models\Surat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CrudkontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pegawai.kontrak.tambahkaryawan',[
            'active' => 'karyawan',
            "title" => 'Karyawan',
            "sub_title" => $kategori->nama,
            "pegawais" => $kategori->pegawai,
            'categories' => kategori::all(),
            'golongan' => golongan::all(),
            'jabatan' => jabatan::all(),
            'fungsional' => fungsional::all(),
            'unit' => unit::all()
            
       
            ]);
    }

    public function kategori(Kategori $kategori)
    {
        return view('dashboard.pegawai.kontrak.listpegawai', [
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
        return view('dashboard.pegawai.kontrak.tambahkaryawan',[
            'active' => 'karyawan',
            'categories' => kategori::all(),
            'golongan' => golongan::all(),
            'jabatan' => jabatan::all(),
            'fungsional' => fungsional::all(),
            'unit' => unit::all()
       
            ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
           
            'nama' => 'required|max:255',
            'nik' => 'required|max:255',
            'pendidikan' => 'required|max:255',

            'j_kelamin' => 'required',
            'kategori_id' => 'required',
            'tmp_lahir' => 'required',
            
            'tgl_lahir' => 'required',
            'tmt' => 'required',
            'unit_id' => 'required'

        ]);

        // $validatedData['id'] = auth()->user()->id; 

        pegawai :: create ($validatedData);
        return redirect('/Kontrak/kontrak')->with('success','data berhasil ditambahkan');
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
    public function edit( $id)
    {
        $pegawai = Pegawai::findOrfail($id);
        return view('dashboard.pegawai.kontrak.editkaryawan',[
            'active' => 'karyawan',
            'pegawai' => $pegawai,
            'categories' => kategori::all(),
            'golongan' => golongan::all(),
            'jabatan' => jabatan::all(),
            'fungsional' => fungsional::all(),
            'unit' => unit::all()
            
       
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrfail($id);

        $rules =[
           
            'nama' => 'required|max:255',
            'nik' => 'required|max:255',
            'pendidikan' => 'required|max:255',

            'j_kelamin' => 'required',
            'kategori_id' => 'required',
            'tmp_lahir' => 'required',
            
            'tgl_lahir' => 'required',
            'tmt' => 'required',
            'unit_id' => 'required'


        ];
        $validatedData = $request -> validate($rules);

        pegawai :: where ('id', $pegawai ->id)
                ->update($validatedData);

        return redirect('/Kontrak/kontrak')->with('success','data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrfail($id);
        $pegawai->delete();
        return redirect('/Kontrak/kontrak')->with('success','data berhasil dihapus');
    }

    public function detail(Pegawai $pegawai)
    {
        return view('dashboard.pegawai.kontrak.detail', [
            "active" => "karyawan",
            'title' => "data pegawai",
            "pegawai" => $pegawai,
            "surat" => $pegawai->surat,
            "cuti" => $pegawai->cuti


        ]);
    }
}
