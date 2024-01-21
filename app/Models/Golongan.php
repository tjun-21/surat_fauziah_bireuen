<?php

namespace App\Models;

use App\Models\Pegawai;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Golongan extends Model
{
    use HasFactory;
    use Sluggable;
    
    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function pegawais()
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
