<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Pangkat extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];
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
