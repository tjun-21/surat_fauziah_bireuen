<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Surat;

class JSurat extends Model
{
    use HasFactory;

    public function surat()
    {
        return $this->hasMany(Surat::class);
    }
}
