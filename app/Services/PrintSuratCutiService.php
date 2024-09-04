<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Pegawai;
use App\Models\Cuti;
use App\Models\CutiSetting;

class PrintSuratCutiService
{
    public $cuti, $cutiSetting;

    public function __construct()
    {
        $this->cuti = new Cuti();
        $this->cutiSetting = new CutiSetting();
    }

    public function getKabid($param)
    {
        // dd($param);
        // Pastikan model Cuti telah diimpor
        $kepala = DB::table('pegawais')
            ->join('bidangs', 'pegawais.bidang_id', '=', 'bidangs.id')
            ->join('jabatans', 'pegawais.jabatan_id', '=', 'jabatans.id')
            ->select('pegawais.*', 'bidangs.nama as bidang_nama', 'jabatans.nama as jabatan_nama')
            ->where('pegawais.bidang_id', '=', $param)
            ->where('jabatans.nama', '=', 'kepala')
            ->get();

        return $kepala;
    }
}
