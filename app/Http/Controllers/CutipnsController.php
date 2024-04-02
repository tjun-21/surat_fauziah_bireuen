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
        return view(
            'surat.cuti.cuti',
            [
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
        return view('surat.cuti.cuti', [
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
        $data = $request->all();
        $validatedData = $request->validate([

            'pegawai_id' => 'required|max:255',
            'jcuti_id'    => 'required',
            'alasan' => 'required',
            'tgl_mulai' => 'required',
            'alamat_cuti' => 'required',
            'pt_1' => 'required',
            'pt_2' => 'required',
            'alasan' => 'required',
            'tgl_akhir' => 'required',

        ]);
        $tgl_mulai = strtotime($data['tgl_mulai']);
        $tgl_akhir = strtotime($data['tgl_akhir']);

        $selisih_detik = $tgl_akhir - $tgl_mulai;
        $jumlah_hari = intval($selisih_detik / (60 * 60 * 24)) + 1;
        // dd($jumlah_hari);
        $data_save = [
            'pegawai_id' => $data['pegawai_id'],
            'jcuti_id' => $data['jcuti_id'],
            'alasan' => $data['alasan'],
            'tgl_mulai' => $data['tgl_mulai'],
            'alamat_cuti' => $data['alamat_cuti'],
            'pt_1' => $data['pt_1'],
            'pt_2' => $data['pt_2'],
            'alasan' => $data['alasan'],
            'tgl_akhir' => $data['tgl_akhir'],
            'j_hari' => $jumlah_hari

        ];

        Cuti::create($data_save);

        return redirect()->back()->with('success', 'data cuti berhasil ditambahkan');
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
        return redirect('/golongan')->with('success', 'data berhasil dihapus');
    }
}
