<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JSurat;
use App\Models\Pegawai;

class Surat extends Model
{
    use HasFactory;

    public function jsurat()
    {
        return $this->belongsTo(JSurat::class);
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
