<?php

namespace App\Http\Controllers;

use App\Models\Fungsional;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class FungsionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datamaster.fungsional.listfungsional',[
            'active' => 'datamaster',
            "fungsional" => Fungsional::all()
            ]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('datamaster.fungsional.tambahfungsional',[
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
            'slug'    => 'required|unique:fungsionals',
          

        ]);

        // $validatedData['id'] = auth()->user()->id; 

        fungsional :: create ($validatedData);
        return redirect('/fungsional')->with('success','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fungsional $fungsional)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fungsional $fungsional)
    {
        return view('datamaster.fungsional.editfungsional',[
            'active' => 'datamaster',
            'fungsional' => $fungsional
       
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fungsional $fungsional)
    {
        $rules =[
           
            'nama' => 'required|max:255',
        

        ];
        if($request->slug != $fungsional  ->slug){

            $rules['slug'] = 'required|unique:fungsionals';

        } $validatedData = $request -> validate($rules);

        fungsional :: where ('id', $fungsional ->id)
                ->update($validatedData);

        return redirect('/fungsional')->with('success','data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fungsional $fungsional)
    {
        $fungsional->delete();
        return redirect('/fungsional')->with('success','data berhasil dihapus');
    }

    public function checkSlug(Request $request){

        $slug = SlugService::createSlug(fungsional::class, 'slug', $request->fungsional);
        return response()->json(['slug'=>$slug]);

    }
}
