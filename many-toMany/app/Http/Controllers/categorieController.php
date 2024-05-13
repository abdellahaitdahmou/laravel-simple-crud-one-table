<?php

namespace App\Http\Controllers;

use App\Models\Catégorie;
use Illuminate\Http\Request;

class categorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catégories = Catégorie::all();
        return view('catégorie.index', compact('catégories'));
    }


    public function create()
    {
        return view('catégorie.create');
    }


    public function edit($id)
    {
        $catégorie = Catégorie::find($id);
        return view('catégorie.edit',compact('catégorie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' =>'required|max:255',
            'description'=>'required'
        ]);

        Catégorie::create($request->all());
        return redirect()->route('catégorie.index')->with('success', 'Catégorie created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' =>'required|max:255',
            'description'=>'required'
        ]);

        $catégorie = Catégorie::find($id);
        $catégorie->update($request->all());
        return redirect()->route('catégorie.index')->with('success', 'Catégorie created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $catégorie = Catégorie::find($id);
        $catégorie->delete();
        return redirect()->route('catégorie.index')->with('success','catégorie deleted successfully');
    }
}
