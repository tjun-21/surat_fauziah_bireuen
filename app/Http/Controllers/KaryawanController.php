<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Collection;

use App\Models\Cuti;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Kategori;
use App\Models\Rekomendasi;
use App\Models\CutiSetting;
use App\Models\Surat;
use App\Models\Bidang;

// load services 
use App\Services\HitungCutiTahunanService;
use App\Services\SettingDataCutiService;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;



class KaryawanController extends Controller
{
    public $hitungCutiTahunanService, $settingDataCutiService;
    public function __construct()
    {
        $this->hitungCutiTahunanService = new HitungCutiTahunanService;
        $this->settingDataCutiService = new SettingDataCutiService;
    }

    public function kategori(Kategori $kategori)
    {
        return view('dashboard.pegawai.listpegawai', [
            "title" => 'Karyawan',
            "sub_title" => $kategori->nama,
            "pegawais" => $kategori->pegawai,
            // "jabatan" => Jabatan :: all(),
            'active' => "karyawan"
        ]);
    }

    // public function jabatan(Jabatan $jabatan)
    // {
    //     return view('dashboard.karyawan', [
    //         "title" => $jabatan->nama,
    //         "pegawais" => $jabatan->pegawai,
    //         'active' => "karyawan"
    //     ]);
    // }

    public function detail(Pegawai $pegawai)
    {
        $paramater = $pegawai['id'];
        $jumlahCuti = $this->hitungCutiTahunanService->getData($paramater);
        return view('dashboard.pegawai.pns.detail', [
            "active" => "karyawan",
            'title' => "data pegawai",
            "pegawai" => $pegawai,
            "surat" => $pegawai->surat,
            "cuti" => $pegawai->cuti,
            "jumlah_cuti" => $jumlahCuti

        ]);
    }

    public function setting_cuti(Pegawai $pegawai)
    {
        // echo "Setting Cuti Karyawan Page";
        $paramater = $pegawai['id'];
        $dataSetting = $this->settingDataCutiService->getData($paramater);
        // dd($dataSetting);
        return view('dashboard.pegawai.pns.cuti_setting', [
            "active" => "karyawan",
            'title' => "Setting Data Cuti Pegawai",
            "pegawai" => $pegawai,
            "surat" => $pegawai->surat,
            "cuti" => $pegawai->cuti,
            "data" => $dataSetting,
            "params" => $paramater

        ]);
    }

    public function updateSettingCuti(Request $request, int $id)
    {

        $request->validate([
            'kuota_cuti_tahunan' => 'required|numeric',
            'cutiN_1' => 'required|numeric',
            'cutiN_2' => 'required|numeric',
            'kuota_cuti' => 'required|numeric',
        ]);

        // Langsung melakukan update data berdasarkan $request
        CutiSetting::where('id', $id)->update($request->only('kuota_cuti_tahunan', 'cutiN_1', 'cutiN_2', 'kuota_cuti'));

        return redirect('/karyawan/pns/setting_cuti/' . $request->input('id_pegawai'))->with('success', 'Data cuti berhasil diperbarui');
    }

    public function aktivasiCuti(Pegawai $pegawai)
    {
        $pegawai->hak_cuti = '1';
        $pegawai->save();

        $cutiSetting = new CutiSetting();
        $cutiSetting->pegawai_id = $pegawai->id;
        $cutiSetting->kuota_cuti_tahunan = 12;
        $cutiSetting->kuota_cuti = 12;
        $cutiSetting->save();

        return redirect()->back()->with('cuti_success', 'Status cuti berhasil diaktifkan');
    }

    public function print(Cuti $cuti)
    {
        $j = $cuti->pegawai->bidang->id;

        $kepala = DB::table('pegawais')
            ->join('bidangs', 'pegawais.bidang_id', '=', 'bidangs.id')
            ->join('jabatans', 'pegawais.jabatan_id', '=', 'jabatans.id')
            ->select('pegawais.*', 'bidangs.nama as bidang_nama', 'jabatans.nama as jabatan_nama')
            ->where('pegawais.bidang_id', '=', $j)
            ->where('jabatans.nama', '=', 'kepala')
            ->get();
        $data = [
            'cuti' => $cuti,
            'pegawais' => $cuti->pegawai::all(),
            'bidang' => $cuti->pegawai->bidang,
            'kabid' => $kepala


        ];

        $pdf = Pdf::loadView('surat.template.cuti', $data)->setPaper('a4', 'potrait');
        return $pdf->download('surat.pdf');

        // $mpdf = new \Mpdf\Mpdf();
        // $data = $cuti;
        // $mpdf->WriteHTML(view("surat.template.cuti"));
        // $mpdf->Output();
    }

    // public function cuti(Pegawai $pegawai)
    // {

    //     return view('surat.cuti', [
    //         'title' => "data pegawai",
    //         "pegawai" => $pegawai,

    //     ]);
    // }



    public function printcutikontrak(Cuti $cuti)
    {


        $j = $cuti->pegawai->bidang->id;

        $kepala = DB::table('pegawais')
            ->join('bidangs', 'pegawais.bidang_id', '=', 'bidangs.id')
            ->join('jabatans', 'pegawais.jabatan_id', '=', 'jabatans.id')
            ->select('pegawais.*', 'bidangs.nama as bidang_nama', 'jabatans.nama as jabatan_nama')
            ->where('pegawais.bidang_id', '=', $j)
            ->where('jabatans.nama', '=', 'kepala')
            ->get();
        $data = [
            'cuti' => $cuti,
            'pegawais' => $cuti->pegawai::all(),
            'bidang' => $cuti->pegawai->bidang,
            'kabid' => $kepala


        ];
        $pdf = Pdf::loadView('surat.template.cutikontrak', $data)->setPaper('a4', 'potrait');
        return $pdf->download('surat.pdf');

        // $mpdf = new \Mpdf\Mpdf();
        // $data = $cuti;
        // $mpdf->WriteHTML(view("surat.template.cuti"));
        // $mpdf->Output();
    }

    public function printrekomendasi(Rekomendasi $rekomendasi)
    {
        $j = $rekomendasi->pegawai->bidang->id;

        $kepala = DB::table('pegawais')
            ->join('bidangs', 'pegawais.bidang_id', '=', 'bidangs.id')
            ->join('jabatans', 'pegawais.jabatan_id', '=', 'jabatans.id')
            ->select('pegawais.*', 'bidangs.nama as bidang_nama', 'jabatans.nama as jabatan_nama')
            ->where('pegawais.bidang_id', '=', $j)
            ->where('jabatans.nama', '=', 'kepala')
            ->get();

        $currentDate = Carbon::now(); // Mengambil tanggal hari ini

        $data = [
            'rekom' => $rekomendasi,
            'pegawai' => $rekomendasi->pegawai::all(),
            'bidang' => $rekomendasi->pegawai->bidang,
            'kabid' => $kepala,
            't' => $currentDate->toDateString()
        ];



        $pdf = Pdf::loadView('surat.template.rekomendasi', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('suratrekomedasi.pdf');
    }

    public function destroy(Rekomendasi $rekomendasi)
    {
        $rekomendasi->delete();
        return redirect()->back()->with('success', 'data berhasil dihapus');
       
    }

}
