<?php

namespace App\Http\Controllers;

use App\Imports\PNSImport;
use App\Models\Pegawai;
use App\Models\Kategori;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Fungsional;
use App\Models\Unit;
use App\Models\bidang;

use App\Models\Cuti;
use App\Models\Surat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


use Maatwebsite\Excel\Facades\Excel;
// use App\Http\Controllers\Controller;


class CrudpnsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pegawai.pns.tambahkaryawan',[
            'active' => 'karyawan',
            "title" => 'Karyawan',
            // "pegawais" => $kategori->pegawai,
            'categories' => kategori::all(),
            'golongan' => golongan::all(),
            'jabatan' => jabatan::all(),
            'fungsional' => fungsional::all(),
            'unit' => unit::all(),
            'bidangs'=>bidang::all()
            ]);
    }

    public function create()
    {
        return view('dashboard.pegawai.pns.tambahkaryawan',[
            'active' => 'karyawan',
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
        
        return view('dashboard.pegawai.pns.listpegawai', [
            "title" => 'Karyawan',
            "sub_title" => $kategori->nama,
            "pegawais" => $kategori->pegawai,
            // "jabatan" => Jabatan :: all(),
            'active' => "karyawan"
        ]);
    }

    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('excel_file',$nama_file);
 
		// import data
		Excel::import(new PNSImport, public_path('/excel_file/'.$nama_file));
 
		// notifikasi dengan session
		// ession::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/PNS/pns');
	}

    
    

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $validatedData = $request->validate([
           
            'nama' => 'required|max:255',
            'nip' => 'required|max:255',
            'pendidikan' => 'required|max:255',

            'j_kelamin' => 'required',
            'kategori_id' => 'required',
            'golongan_id' => 'required',
            
            'jabatan_id' => 'required',
            'fungsional_id' => 'required',
            'unit_id' => 'required',
            'bidang_id'=>'required'

        ]);

        // $validatedData['id'] = auth()->user()->id; 

        pegawai :: create ($validatedData);
        return redirect('/PNS/pns')->with('success','data berhasil ditambahkan');
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
        return view('dashboard.pegawai.pns.editkaryawan',[
            'active' => 'karyawan',
            'pegawai' => $pegawai,
            'categories' => kategori::all(),
            'golongan' => golongan::all(),
            'jabatan' => jabatan::all(),
            'fungsional' => fungsional::all(),
            'unit' => unit::all(),
            'bidangs'=>bidang::all()
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
            'nip' => 'required|max:255',
            'pendidikan' => 'required|max:255',

            'j_kelamin' => 'required',
            'kategori_id' => 'required',
            'golongan_id' => 'required',
            
            'jabatan_id' => 'required',
            'fungsional_id' => 'required',
            'unit_id' => 'required',
            'bidang_id'=>'required'


        ];
        $validatedData = $request -> validate($rules);

        pegawai :: where ('id', $pegawai ->id)
                ->update($validatedData);

        return redirect('/PNS/pns')->with('success','data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $pegawai = Pegawai::findOrfail($id);
        $pegawai->delete();
        return redirect('/PNS/pns')->with('success','data berhasil dihapus');
    }

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
}
