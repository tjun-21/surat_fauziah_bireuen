<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Services\LiburNasionalService;

use App\Models\LiburNasional;


class LiburNasionalController extends Controller
{
    public $liburNasionalService;

    public function __construct()
    {
        $this->liburNasionalService = new LiburNasionalService;
    }

    public function index()
    {
        $data = $this->liburNasionalService->getData();
        // dd($data);
        return view('datamaster.libur.index', [
            "title" => 'Libur Nasional',
            "data_libur" => $data,
            'active' => "datamaster",
            "key_old" => ''
        ]);
    }
    public function proses(Request $request)
    {
        $req = $request->all();
        // dd($req);
        // Proses data atau validasi lebih lanjut
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'keterangan_slug' => 'required|string|max:255',
        ]);

        DB::beginTransaction(); // Memulai transaksi
        $pesan = [];
        $link_back_param = [];

        // Pesan default untuk sukses dan error
        $message_default = [
            'success' => 'Data berhasil disimpan',
            'error' => 'Data gagal disimpan'
        ];

        try {
            // Cek apakah tanggal sudah ada di dalam libur nasional
            if (!$req['key_old']) {
                $cek_data = LiburNasional::where('tanggal', '=', $request['tanggal'])->count();
                if ($cek_data > 0) {
                    return redirect()->back()->with(['error' => 'Tanggal ' . $request['tanggal'] . ' sudah ada dalam libur nasional']);
                }
            }


            // Jika data baru, buat instance baru
            $model = (new \App\Models\LiburNasional())->where('id', '=', $req['key_old'])->first();
            if (!$model) {
                $model = new LiburNasional();
            }


            // Set data yang akan disimpan
            $data_save = [
                'tanggal' => $req['tanggal'],
                'keterangan' => $req['keterangan'],
                'keterangan_slug' => $req['keterangan_slug'],
            ];

            $model->fill($data_save);

            // Simpan data ke database
            $is_save = 0;
            if ($model->save()) {
                $is_save = 1;
            }

            // Commit atau Rollback sesuai dengan hasil simpan
            if ($is_save) {
                DB::commit(); // Commit transaksi jika berhasil
                $pesan = ['success', $message_default['success'], 2];
            } else {
                DB::rollBack(); // Rollback transaksi jika gagal
                $pesan = ['error', $message_default['error'], 3];
            }
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack(); // Rollback jika terjadi error query
            $pesan = ['error', $message_default['error'], 3];
        } catch (\Throwable $e) {
            DB::rollBack(); // Rollback jika terjadi error lain
            $pesan = ['error', $message_default['error'], 3];
        }

        // Kembali ke halaman sebelumnya dengan pesan sukses atau error
        return redirect()->route('libur_nasional.index', $link_back_param)->with([$pesan[0] => $pesan[1]]);
    }

    public function delete($id)
    {
        try {
            $libur = LiburNasional::findOrFail($id);
            $libur->delete();

            // Redirect with success message
            return redirect()->route('libur_nasional.index')->with('success', 'Data hari libur berhasil dihapus.');
        } catch (\Exception $e) {
            // If an error occurs, you can handle it and show an error message
            return redirect()->route('libur_nasional.index')->with('error', 'Gagal menghapus data');
        }
    }




    // public function kategori(Kategori $kategori)
    // {
    //     return view('surat.listsurat', [
    //         "title" => 'Surat',
    //         "sub_title" => $kategori->nama,
    //         "pegawais" => $kategori->pegawai,
    //         // "jabatan" => Jabatan :: all(),
    //         'active' => "surat"


    //     ]);
    // }

    // public function cuti(Pegawai $pegawai)
    // {
    //     return view('surat.cuti.formcuti', [
    //         "title" => 'Form Cuti',
    //         "sub_title" => "PNS",
    //         "surat" => $pegawai->surat,
    //         "cuti" => $pegawai->cuti()->where('status', 1)->get(),
    //         "pegawai" => $pegawai,
    //         "pegawais" => Pegawai::all(),
    //         "j_cuti" => JCuti::all(),
    //         // "jabatan" => Jabatan :: all(),
    //         'active' => "surat_cuti"


    //     ]);
    // }


    // // public function cuti( Pegawai $pegawai)
    // // {
    // //     return view('surat.cuti.formcuti', [
    // //         "title" => 'Form Cuti',
    // //         "sub_title" => "PNS",
    // //         "pegawai" => $pegawai,
    // //         "j_cuti" => JCuti::all(),
    // //         // "jabatan" => Jabatan :: all(),
    // //         'active' => "surat_cuti"
    // //     ]);
    // // }

    // public function rekom(Pegawai $pegawai)
    // {
    //     return view('surat.rekomendasi.formrekomendasi', [
    //         "title" => 'Form Surat Rekomendasi',
    //         "sub_title" => "PNS",
    //         "surat" => $pegawai->surat,
    //         "rekom" => $pegawai->rekomendasi,
    //         "pegawai" => $pegawai,
    //         'active' => "surat"
    //     ]);
    // }

    // // public function detail(Pegawai $pegawai)
    // // {
    // //     return view('dashboard.detail', [
    // //         "active" => "Surat Cuti",
    // //         'title' => "data pegawai",
    // //         "pegawai" => $pegawai,


    // //     ]);
    // // }


    // public function lihat(Rekomendasi $rekomendasi)
    // {

    //     $currentDate = Carbon::now();

    //     return view('surat.template.rekomendasi', [
    //         "rekom" => $rekomendasi,
    //         "pegawai" => $rekomendasi->pegawai,
    //         't' => $currentDate->toDateString()



    //     ]);
    // }

    // // public function cuti(Pegawai $pegawai)
    // // {

    // //     return view('surat.cuti', [
    // //         'title' => "data pegawai",
    // //         "pegawai" => $pegawai,

    // //     ]);
    // // }
}
