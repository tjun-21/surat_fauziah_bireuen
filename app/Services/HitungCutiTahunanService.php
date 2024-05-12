<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Pegawai;
use App\Models\Cuti;
use App\Models\CutiSetting;

class HitungCutiTahunanService
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
        $dataCuti = DB::table('cutis')
            ->where('pegawai_id', $param)
            ->where('jcuti_id', 1)
            ->get();


        // Menghitung total hari cuti
        // dd($dataCuti);
        $totalHariCuti = 0;
        foreach ($dataCuti as $c) {
            $totalHariCuti += $c->j_hari;
        }

        // Menyimpan total hari cuti ke dalam database
        $data = CutiSetting::where('pegawai_id', $param)->first();
       
   
        if ($data) {
          
            $data->cuti_diambil = $totalHariCuti;
            $data->save();
            
        }
      

        // Mengembalikan total hari cuti
        return $totalHariCuti;
    }
}
