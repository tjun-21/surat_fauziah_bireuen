<?php

namespace App\Models;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Golongan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Kategori extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];

    public function jabatan()
    {
        return $this->hasMany(Jabatan::class);
    }

    public function golongan()
    {
        return $this->hasMany(Golongan::class);
    }
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
    
}
