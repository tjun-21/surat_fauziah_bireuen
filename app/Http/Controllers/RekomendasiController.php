<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreRekomendasiRequest;
use App\Http\Requests\UpdateRekomendasiRequest;
use App\Models\Rekomendasi;
use App\Models\Cuti;

use App\Models\Surat;
use App\Models\Pegawai;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('surat.template.rekomendasi', [

            "title" => 'List Surat Cuti',
            "cuti" => Cuti::all(),

            // "jabatan" => Jabatan :: all(),
            'active' => "list-surat"
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
            'alamatrekom' => 'required'
        ]);

        // $validatedData['id'] = auth()->user()->id; 

        rekomendasi::create($validatedData);
        return redirect()->back()->with('success', 'data cuti berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'alamat_cuti' => 'required|string|max:255',
        ]);
        // Mencari data yang akan diupdate
        $rekomendasi = Rekomendasi::findOrFail($id);
        $rekomendasi->alamatrekom = $request->input('alamat_cuti');

        // Menyimpan perubahan
        $rekomendasi->save();
        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Alamat Rekomendasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $rekomendasi = Rekomendasi::findOrFail($id);
        $rekomendasi->delete();
        return redirect()->back()->with('success', 'data berhasil dihapus');
    }
}
