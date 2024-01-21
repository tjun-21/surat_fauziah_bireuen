<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\Jabatan;
use App\Models\Golongan;
use App\Models\Kategori;
use App\Models\Cuti;
use App\Models\Fungsional;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    public function fungsional()
    {
        return $this->belongsTo(Fungsional::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function cuti()
    {
        return $this->hasMany(Cuti::class);
    }
    public function surat()
    {
        return $this->hasMany(Surat::class);
    }
}
