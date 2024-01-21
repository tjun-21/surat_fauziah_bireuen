<?php

namespace App\Http\Controllers;


use App\Models\Cuti;
use App\Models\Pegawai;
use App\Models\JCuti;
use Illuminate\Http\Request;

class CutipnsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('surat.cuti.cuti',[
            "title" => 'List Surat Cuti',
            'active' => 'datamaster',
            "jabatan" => cuti::all(),
            "cuti" => Cuti::all()
            ]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat.cuti.cuti',[
            'active' => 'surat',
            'categories' => kategori::all(),
            'pegawai' => pegawai::all(),
            'jcutis' => jcuti::all()
           
       
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);        
        $validatedData = $request->validate([
           
            'pegawai_id' => 'required|max:255',
            'jcuti_id' => 'required|max:255',
            'tgl_mulai' => 'required|max:255',
            'tgl_akhir' => 'required|max:255',
            'alasan' => 'required|max:255',
            'alamat_cuti' => 'required|max:255'
            

        ]);

        // $validatedData['id'] = auth()->user()->id; 

        cuti :: create ($validatedData);
        return redirect('/cuti')->with('success','data cuti berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuti $cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuti $cuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuti $cuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuti $cuti)
    {
        $golongan->delete();
        return redirect('/golongan')->with('success','data berhasil dihapus');
    }
}
