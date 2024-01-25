<?php

namespace App\Http\Controllers;
use App\Models\Jabatan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\bidang;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datamaster.bidang.listbidang',[
            'active'=>'datamaster',
            'bidang'=>bidang::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('datamaster.bidang.tambahbidang',[
            'active'=>'datamaster',
            'bidang'=>bidang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData =$request->validate([
            'nama'=>'required|max:255',
            'slug'=>'required|unique:bidangs'

        ]);
        bidang::create($validateData);
        return redirect('/bidang')->with('Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(bidang $bidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bidang $bidang)
    {
        return view('datamaster.bidang.editbidang',[
            'active' => 'datamaster',
            'bidang' => $bidang,
       
       
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bidang $bidang)
    {
        $rules =[
           
            'nama' => 'required|max:255',
           

        ];
        if($request->slug != $bidang->slug){

            $rules['slug'] = 'required|unique:bidangs';

        } $validatedData = $request -> validate($rules);

        bidang :: where ('id', $bidang ->id)
                ->update($validatedData);

        return redirect('/bidang')->with('success','Data Berhasi Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bidang $bidang)
    {
        $bidang->delete();
        return redirect('/bidang')->with('success','data berhasil dihapus');
    }

    public function checkSlug(Request $request){

        $slug = SlugService::createSlug(bidang::class, 'slug', $request->bidang);
        return response()->json(['slug'=>$slug]);

    }
}
