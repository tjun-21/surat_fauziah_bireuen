<?php

namespace App\Models;

use App\Models\Pegawai;
use App\Models\Kategori;
use App\Models\Cuti;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class JCuti extends Model
{
    use HasFactory;
    // use Sluggable;

    protected $guarded = ['id'];


    public function cuti()
    {
        return $this->hasMany(Cuti::class);
    }

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'nama'
    //         ]
    //     ];
    // }
}
