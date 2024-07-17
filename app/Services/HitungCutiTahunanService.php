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

    public function kuotaCuti($param)
    {
        $kuotaCuti = DB::table('cuti_settings')
            ->where('pegawai_id', $param)
            ->get();

        foreach ($kuotaCuti as $k) {
            $kuotaCuti = $k->kuota_cuti;
            $n_2 = $k->cutiN_2;
            $n_1 = $k->cutiN_1;
            $n = $k->kuota_cuti_tahunan;
            $id_set = $k->id;
        }
        // dd($sisaCuti);
        return [
            'kuotaCuti' => $kuotaCuti,
            'n2' => $n_2,
            'n1' => $n_1,
            'n' => $n,
            'id_set' => $id_set
        ];
    }

    // function addDataAfterAktivasi($params)
    // {
    //     $data = CutiSetting::where('pegawai_id', $param)->first();
    //     if ($data) {
    //         $data->kuota$data->kuota_cuti_tahunan
    //         $data->cuti_diambil = $totalHariCuti;
    //         $data->save();
    //     }
    // }

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
