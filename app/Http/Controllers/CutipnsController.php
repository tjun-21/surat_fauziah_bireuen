<?php

namespace App\Http\Controllers;


use App\Models\Cuti;
use App\Models\Pegawai;
use App\Models\JCuti;
use App\Models\CutiSetting;
use Illuminate\Http\Request;

// load services 
use App\Services\HitungCutiTahunanService;

class CutipnsController extends Controller

{
    public $hitungCutiTahunanService;
    public function __construct()
    {
        $this->hitungCutiTahunanService = new HitungCutiTahunanService;
    }
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
        // dd($data);
        $tgl_mulai = strtotime($data['tgl_mulai']);
        $tgl_akhir = strtotime($data['tgl_akhir']);
        if ($tgl_mulai > $tgl_akhir) {
            $messages = 'Tanggal Akhir harus lebih besar dari tanggal mulai cuti';
            return redirect()->back()->with('cuti_fail', $messages);
        }

        $selisih_detik = $tgl_akhir - $tgl_mulai;
        $jumlah = intval($selisih_detik / (60 * 60 * 24)) + 1;
        $jumlah_hari = $jumlah;
        dd($jumlah);

        if ($data['jcuti_id'] == '1') {
            $paramater = $data['pegawai_id'];
            $result = $this->hitungCutiTahunanService->kuotaCuti($paramater);
            // dd($result);
            $kuotaCuti = $result['kuotaCuti'];
            $n2 = $result['n2'];
            $n1 = $result['n1'];
            $n0 = $result['n'];
            $idSett = $result['id_set'];
            $jumlahCuti = $this->hitungCutiTahunanService->HitungPengambilanCuti($paramater);
            // dd($kuotaCuti);
            $jumlahCuti = $jumlahCuti + $jumlah_hari;
            // $jumlah_hari = $jumlahCuti + $jumlah_hari;
            // dd($n0);
        }
        if ($jumlahCuti > $kuotaCuti) {
            $messages = 'Jumlah cuti melewati batas';
        } else {
            $kuotaN2 = $kuotaN1 = $kuotaN0 = null;
            $i = 2;
            while ($jumlah_hari > 0) {
                if (${'n' . $i} > 0) {
                    // dd(${'n' . $i});
                    ${'kuotaN' . $i} = ${'n' . $i} - $jumlah_hari;
                    // dd($kuotaN2);
                    if (${'kuotaN' . $i} < 1) {
                        ${'kuotaN' . $i} = 0;
                    }
                    $jumlah_hari = $jumlah_hari - ${'n' . $i};
                    // dd($jumlah_hari);
                } else {
                    ${'kuotaN' . $i} = 0;
                }
                $i--;
            }
            if (!$kuotaN2) {
                $kuotaN2 = $n2;
            }
            if (!$kuotaN1) {
                $kuotaN1 = $n1;
            }
            if (!$kuotaN0) {
                $kuotaN0 = $n0;
            }
            // dd($kuotaN0);
            // dd($kuotaN1);
            //    mengubah nilai negatif menjadi absolut
            // $kuotaN0 = abs($kuotaN0);

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
                'j_hari' => $jumlah

            ];

            $updateCutiSett = [
                // 'id' => $idSett,
                'kuota_cuti_tahunan' => $kuotaN0,
                'cutiN_1' => $kuotaN1,
                'cutiN_2' => $kuotaN2
            ];

            Cuti::create($data_save);

            $cutiSett = CutiSetting::find($idSett);

            if ($cutiSett) {
                // Update data
                $cutiSett->update($updateCutiSett);
            }
            $messages = 'Data cuti berhasil ditambahkan';
        }
        return redirect()->back()->with('cuti_success', $messages);
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
    public function destroy(Cuti $s)
    {
        $s->delete();
        return redirect()->back()->with('success', 'data berhasil dihapus');
    }
}
