<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datamaster.golongan.listgolongan',[
            'active' => 'datamaster',
            "golongan" => Golongan::all()
            ]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('datamaster.golongan.tambahgolongan',[
            'active' => 'datamaster',
            'categories' => kategori::all()
       
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
           
            'nama' => 'required|max:255',
            'slug'    => 'required|unique:golongans',
            'kategori_id' => 'required'

        ]);

        // $validatedData['id'] = auth()->user()->id; 

        golongan :: create ($validatedData);
        return redirect('/golongan')->with('success','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Golongan $golongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Golongan $golongan)
    {
        return view('datamaster.golongan.editgolongan',[
            'active' => 'datamaster',
            'golongan' => $golongan,
            'categories' => kategori::all()
       
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Golongan $golongan)
    {
        $rules =[
           
            'nama' => 'required|max:255',
            'kategori_id' => 'required'

        ];
        if($request->slug != $golongan  ->slug){

            $rules['slug'] = 'required|unique:golongans';

        } $validatedData = $request -> validate($rules);

        golongan :: where ('id', $golongan ->id)
                ->update($validatedData);

        return redirect('/golongan')->with('success','data berhasil di ubah ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Golongan $golongan)
    {
        $golongan->delete();
        return redirect('/golongan')->with('success','data berhasil dihapus');
    }

    public function checkSlug(Request $request){

        $slug = SlugService::createSlug(golongan::class, 'slug', $request->golongan);
        return response()->json(['slug'=>$slug]);

    }
    
}
