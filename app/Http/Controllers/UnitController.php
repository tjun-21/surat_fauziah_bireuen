<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datamaster.unit.listunit',[
            'active' => 'datamaster',
            "unit" => Unit::all()
            ]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('datamaster.unit.tambahunit',[
            'active' => 'datamaster',
       
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
           
            'nama' => 'required|max:255',
            'slug'    => 'required|unique:units',
           

        ]);

        // $validatedData['id'] = auth()->user()->id; 

        unit :: create ($validatedData);
        return redirect('/unit')->with('success','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('datamaster.unit.editunit',[
            'active' => 'datamaster',
            'unit' => $unit
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $rules =[
           
            'nama' => 'required|max:255',
           

        ];
        if($request->slug != $unit  ->slug){

            $rules['slug'] = 'required|unique:units';

        } $validatedData = $request -> validate($rules);

        unit :: where ('id', $unit ->id)
                ->update($validatedData);

        return redirect('/unit')->with('success','data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect('/unit')->with('success','data berhasil dihapus');
    }

    public function checkSlug(Request $request){

        $slug = SlugService::createSlug(unit::class, 'slug', $request->unit);
        return response()->json(['slug'=>$slug]);

    }
}
