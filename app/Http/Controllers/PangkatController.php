<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datamaster.pangkat.listpangkat', [
            'active' => 'datamaster',
            "pangkat" => Pangkat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('datamaster.pangkat.tambahpangkat', [
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
            'slug'    => 'required|unique:pangkats',


        ]);

        // $validatedData['id'] = auth()->user()->id; 

        pangkat::create($validatedData);
        return redirect('/pangkat')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pangkat $pangkat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pangkat $pangkat)
    {
        return view('datamaster.pangkat.editpangkat', [
            'active' => 'datamaster',
            'pangkat' => $pangkat

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pangkat $pangkat)
    {
        $rules = [

            'nama' => 'required|max:255',


        ];
        if ($request->slug != $pangkat->slug) {

            $rules['slug'] = 'required|unique:pangkats';
        }
        $validatedData = $request->validate($rules);

        pangkat::where('id', $pangkat->id)
            ->update($validatedData);

        return redirect('/pangkat')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pangkat $pangkat)
    {
        $pangkat->delete();
        return redirect('/pangkat')->with('success', 'data berhasil dihapus');
    }

    public function checkSlug(Request $request)
    {

        $slug = SlugService::createSlug(pangkat::class, 'slug', $request->pangkat);
        return response()->json(['slug' => $slug]);
    }
}
