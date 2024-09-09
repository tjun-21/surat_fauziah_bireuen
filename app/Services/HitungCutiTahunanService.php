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
        $cutiSetting = DB::table('cuti_settings')
            ->where('pegawai_id', $param)
            ->first(); // Mengambil satu baris data

        // Jika data tidak ditemukan
        if (!$cutiSetting) {
            return [
                'kuotaCuti' => 0,
                'n2' => 0,
                'n1' => 0,
                'n' => 0,
                'id_set' => null,
                'cuti_diambil' => 0,
            ];
        }

        // Jika data ditemukan
        return [
            'kuotaCuti' => $cutiSetting->kuota_cuti,
            'n2' => $cutiSetting->cutiN_2,
            'n1' => $cutiSetting->cutiN_1,
            'n' => $cutiSetting->kuota_cuti_tahunan,
            'id_set' => $cutiSetting->id,
            'cuti_diambil' => $cutiSetting->cuti_diambil
        ];
    }

    public function sisaCuti($param)
    {
        $data = $this->kuotaCuti($param);
        // dd($data);
        $cuti_diambil = $data['cuti_diambil'];
        $n2 = $data['n2'];
        $n1 = $data['n1'];
        $n = $data['n'];

        $sn1 = $sn2 = $sn = 0;

        if ($cuti_diambil > 0) {
            if ($n2 > 0) {
                if ($n2 > $cuti_diambil) {
                    $sn2 = $n2 - $cuti_diambil;
                    $cuti_diambil = 0;
                } else {
                    $cuti_diambil = $cuti_diambil - $n2;
                }
            }

            if ($n1 > 0) {
                if ($n1 > $cuti_diambil) {
                    $sn1 = $n1 - $cuti_diambil;
                    $cuti_diambil = 0;
                } else {
                    $cuti_diambil = $cuti_diambil - $n1;
                }
            }

            if ($n > 0) {
                if ($n > $cuti_diambil) {
                    $sn = $n - $cuti_diambil;
                    $cuti_diambil = 0;
                } else {
                    $cuti_diambil = $cuti_diambil - $n;
                }
            }
            // dd($cuti_diambil);
        }
        return [
            'n2' => $n2,
            'n1' => $n1,
            'n' => $n,
            'sn2' => $sn2,
            'sn1' => $sn1,
            'sn' => $sn,
            // 'cuti_diambil' => $cuti_diambil

        ];
    }

    public function HitungPengambilanCuti($param)
    {
        dd($param);
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
        // dd($totalHariCuti);
        return $totalHariCuti;
    }
}
