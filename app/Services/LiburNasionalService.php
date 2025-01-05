<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\LiburNasional;
// use App\Models\Cuti;
// use App\Models\CutiSetting;

class LiburNasionalService
{
    public $libur;

    public function __construct()
    {
        $this->libur = new LiburNasional();
    }

    public function getData()
    {
        $query = $this->libur
            ->select('libur_nasional.*')
            ->get();

        // dd($query);
        return $query;
    }

    public function getTanggalLiburNasional(): array
    {
        $query = $this->libur
            ->select('tanggal')
            ->get();

        // Ambil kolom tanggal sebagai array
        return $query->pluck('tanggal')->toArray();
    }
}
