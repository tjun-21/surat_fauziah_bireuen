<?php

namespace App\Models;
use app\models\jabatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class bidang extends Model
{
    use HasFactory;
    use Sluggable;


    protected $guarded =['id'];

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class);
    }
    public function pegawai()
    {
        return $this->Hasmany(pegawai::class);
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
