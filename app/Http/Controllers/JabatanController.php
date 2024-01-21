<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datamaster.jabatan.listjabatan',[
            'active' => 'datamaster',
            "jabatan" => Jabatan::all()
            ]
    );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('datamaster.jabatan.tambahjabatan',[
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
            'slug'    => 'required|unique:jabatans',
            'kategori_id' => 'required'

        ]);

        // $validatedData['id'] = auth()->user()->id; 

        jabatan :: create ($validatedData);
        return redirect('/jabatan')->with('success','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        return view('datamaster.jabatan.editjabatan',[
            'active' => 'datamaster',
            'jabatan' => $jabatan,
            'categories' => kategori::all()
       
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $rules =[
           
            'nama' => 'required|max:255',
            'kategori_id' => 'required'

        ];
        if($request->slug != $jabatan  ->slug){

            $rules['slug'] = 'required|unique:jabatans';

        } $validatedData = $request -> validate($rules);

        jabatan :: where ('id', $jabatan ->id)
                ->update($validatedData);

        return redirect('/jabatan')->with('success','data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    { 
        $jabatan->delete();
        return redirect('/jabatan')->with('success','data berhasil dihapus');
    }

    public function checkSlug(Request $request){

        $slug = SlugService::createSlug(jabatan::class, 'slug', $request->jabatan);
        return response()->json(['slug'=>$slug]);

    }
}
