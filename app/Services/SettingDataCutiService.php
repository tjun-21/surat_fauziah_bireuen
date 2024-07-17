<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Pegawai;
use App\Models\Cuti;
use App\Models\CutiSetting;

class SettingDataCutiService
{
    public $cuti, $cutiSetting;

    public function __construct()
    {
        $this->cuti = new Cuti();
        $this->cutiSetting = new CutiSetting();
    }

    public function getData($param)
    {
        // Pastikan model Cuti telah diimpor
        $dataSettingCuti = DB::table('cuti_settings')
            ->where('pegawai_id', $param)
            ->get();

        return $dataSettingCuti;
    }
}
