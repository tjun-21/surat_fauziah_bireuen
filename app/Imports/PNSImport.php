<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;

class PNSImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pegawai([
            
            'nik' => $row[1],
            'nip' => $row[2], 
            'nama' => $row[3], 
            'tmp_lahir' => $row[4],
            'tgl_lahir' => $row[5], 
            'pendidikan' => $row[6],
            'no_hp' => $row[7],
            'email' => $row[8], 
            'tmt' => $row[9], 
            'tmt_sk' => $row[10],
            'tmt_masuk' => $row[11], 
            'j_kelamin' => $row[12],
            'kategori_id' => $row[13],
            'golongan_id' => $row[14], 
            'jabatan_id' => $row[15],
            'fungsional_id' => $row[16],
            'unit_id' => $row[17]
            
             
           
        ]);
    }
}
