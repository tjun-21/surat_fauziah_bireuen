<?php

namespace App\Models;
use app\models\Jabatan;
use app\models\Pegawai;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Bidang extends Model
{
    use HasFactory;
    use Sluggable;


    protected $guarded =['id'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
    public function pegawai()
    {
        return $this->Hasmany(Pegawai::class);
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
