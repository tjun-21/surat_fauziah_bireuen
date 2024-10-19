<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Http\Requests\StoreCutiRequest;
use App\Http\Requests\UpdateCutiRequest;
use App\Models\Kategori;
use App\Models\JCuti;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('surat.cuti.cuti', [
            "title" => 'List Surat Cuti',
            "cuti" => Cuti::all(),
            "pegawai" => $pegawai->kategori->nama,
            // "jabatan" => Jabatan :: all(),
            'active' => "list-surat"
        ]);
    }

    public function karyawan(Kategori $kategori)
    {
        return view('surat.cuti.formcuti', [
            "title" => 'Form Cuti',
            "sub_title" => $kategori->nama,
            "pegawai" => $kategori->pegawai,
            "j_cuti" => JCuti::all(),
            // "jabatan" => Jabatan :: all(),
            'active' => "surat_cuti"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([

            'pegawai_id' => 'required|max:255',
            'jcuti_id'    => 'required',
            'alasan' => 'required',
            'tgl_mulai' => 'required',
            'alamat_cuti' => 'required',
            'pt_1' => 'required',
            'pt_1' => 'required',
            'alasan' => 'required',
            'tgl_akhir' => 'required',


        ]);
        // dd($validatedData);
        // $validatedData['id'] = auth()->user()->id; 

        Cuti::create($validatedData);
        return redirect('/surat/{kategori:nama}/{pegawai:id}')->with('success', 'data cuti berhasil ditambahkan');
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
    public function update(UpdateCutiRequest $request, Cuti $cuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuti $cuti)
    {
        //
    }
}
