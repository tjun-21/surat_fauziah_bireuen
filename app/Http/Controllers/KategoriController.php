<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datamaster.kategori.listkategori',[
            'active' => 'datamaster',
            "kategori" => Kategori::all()
            ]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('datamaster.kategori.tambahkategori',[
            'active' => 'datamaster'
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
           
            'nama' => 'required|max:255',
            'slug'    => 'required|unique:kategoris',
  

        ]);

        // $validatedData['id'] = auth()->user()->id; 

        kategori :: create ($validatedData);
        return redirect('/kategori')->with('success','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('datamaster.kategori.editkategori',[
            'active' => 'datamaster',
            'kategori' => $kategori,
          
       
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $rules =[
           
            'nama' => 'required|max:255',
            
        ];
        if($request->slug != $kategori  ->slug){

            $rules['slug'] = 'required|unique:kategoris';

        } $validatedData = $request -> validate($rules);

        kategori :: where ('id', $kategori ->id)
                ->update($validatedData);

        return redirect('/kategori')->with('success','data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect('/kategori')->with('success','data berhasil dihapus');
    }

    public function checkSlug(Request $request){

        $slug = SlugService::createSlug(kategori::class, 'slug', $request->kategori);
        return response()->json(['slug'=>$slug]);

    }
}
