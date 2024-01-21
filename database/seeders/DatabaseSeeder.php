<?php

namespace Database\Seeders;

use App\Models\Fungsional;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Kategori;
use App\Models\Pegawai;
use App\Models\Unit;
use App\Models\JCuti;
use App\Models\Cuti;
use App\Models\Surat;
use App\Models\JSurat;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Kategori::create([
            'nama' => 'PNS',
            'slug' => 'pns'
        ]);

        Kategori::create([
            'nama' => 'P3K',
            'slug' => 'p3k'
        ]);


        Jabatan::create([
            'nama' => 'Manager',
            'slug' => 'manager',
            'kategori_id' => 1
        ]);
        Jabatan::create([
            'nama' => 'Staff',
            'slug' => 'staf',
            'kategori_id' => 1
        ]);


        Golongan::create([
            'nama' => 'VI',
            'slug' => 'vi',
            'kategori_id' => 1
        ]);
        Golongan::create([
            'nama' => 'V',
            'slug' => 'v',
            'kategori_id' => 1
        ]);

        Unit::create([
            'nama' => 'Unit 19',
            'slug' => 'unit-19'
        ]);
        Unit::create([
            'nama' => 'Unit 18',
            'slug' => 'unit-18'
        ]);

        Fungsional::create([
            'nama' => 'Fungsional',
            'slug' => 'fungsional'
        ]);
        Fungsional::create([
            'nama' => 'Non Fungsional',
            'slug' => 'non-fungsional'
        ]);

        //
        JCuti::create([
            'nama' => 'Cuti Tahunan',
            'slug' => 'cuti-tahunan'
        ]);
        JCuti::create([
            'nama' => 'Cuti Besar',
            'slug' => 'cuti-besar'
        ]);
        JCuti::create([
            'nama' => 'Cuti Sakit',
            'slug' => 'cuti-sakit'
        ]);
        JCuti::create([
            'nama' => 'Cuti Melahirkan',
            'slug' => 'cuti-melahirkan'
        ]);
        JCuti::create([
            'nama' => 'Cuti Karena Alasan Penting',
            'slug' => 'cuti-karena-alasan-penting'
        ]);
        JCuti::create([
            'nama' => 'Cuti Diluar Tanggungan Negara',
            'slug' => 'cuti-diluar-tanggungan-negara'
        ]);

        //
        Cuti::create([
            'pegawai_id' => '1',
            'tgl_mulai' => '2016-09-14',
            'tgl_akhir' => '2016-09-15',
            'jcuti_id' => 1,
            'alasan' => 'Mau Liburan',
            'alamat_cuti' => 'Aceh Tamiang'

        ]);
        Cuti::create([
            'pegawai_id' => '4',
            'tgl_mulai' => '2016-09-11',
            'tgl_akhir' => '2016-09-15',
            'jcuti_id' => 2,
            'alasan' => 'malas kerja',
            'alamat_cuti' => 'Lhokseumawe'

        ]);

        //
        Surat::create([
            'pegawai_id' => 1,
            'tgl' => '2016-09-15',
            'jsurat_id' => 2
        ]);
        Surat::create([
            'pegawai_id' => 5,
            'tgl' => '2016-09-15',
            'jsurat_id' => 1
        ]);
        JSurat::create([
            'nama' => 'Surat Rekomendasi'
        ]);
        JSurat::create([
            'nama' => 'Surat Panggilan Tugas'
        ]);


        Pegawai::factory(10)->create();
    }
}
