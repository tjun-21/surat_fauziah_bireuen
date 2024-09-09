<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

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
                // "jabatan" => cuti::all(),
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

        if ($data['jcuti_id'] == '1') {
            $paramater = $data['pegawai_id'];
            $kuota = $this->hitungCutiTahunanService->kuotaCuti($paramater);
            $kuotaCuti = $kuota['kuotaCuti'];
            $idSett = $kuota['id_set'];

            // cek jumlah cuti yang sudah diambil + cuti yang mau di ambil 
            $jumlahCuti = $this->hitungCutiTahunanService->HitungPengambilanCuti($paramater);
            $jumlahCuti = $jumlahCuti + $jumlah_hari;

            if ($jumlahCuti > $kuotaCuti) {
                $messages = 'Jumlah cuti tahunan melewati kuota cuti';
            } else {
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

                $updateCutiSett = [
                    // 'id' => $idSett,
                    'cuti_diambil' => $jumlahCuti
                ];

                Cuti::create($data_save);

                $cutiSett = CutiSetting::find($idSett);

                if ($cutiSett) {
                    // Update data
                    $cutiSett->update($updateCutiSett);
                }
                $messages = 'Data cuti Tahunan berhasil ditambahkan';
            }
        } else {
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
    public function destroy(Cuti $cuti, Request $request)
    {
        $reason = $request->input('reason');
        // dd($cuti['id']);
        $data = $cuti;
        // dd($data);
        $cutiSett = CutiSetting::where('pegawai_id', $data['pegawai_id'])->first();
        // kembalikan data cuti 
        $updateCutiSett = [
            // 'id' => $idSett,
            'cuti_diambil' => $cutiSett['cuti_diambil'] - $data['j_hari']
        ];
        // dd($updateCutiSett);

        // Simpan alasan penghapusan ke dalam database (opsional)
        DB::table('cuti_delete')->insert([
            'id' => $data->id,
            'alasan_batal' => $reason,
            'created_at' => now()
        ]);

        // Hapus data cuti
        $dataCuti = Cuti::find($data->id);
        if ($dataCuti) {
            $dataCuti->status = '0';
            $dataCuti->save();
            $cutiSett->update($updateCutiSett);
        } else {
            // Menangani kasus jika model tidak ditemukan
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return redirect()->back()->with('success', 'Data cuti berhasil dihapus.');
    }
}
