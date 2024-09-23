<?php

namespace App\Models;

use App\Models\Pegawai;
use App\Models\Kategori;
use app\models\bidang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Jabatan extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function bidang(){
        return $this->belongsTo(bidang::class);
    }


    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
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
