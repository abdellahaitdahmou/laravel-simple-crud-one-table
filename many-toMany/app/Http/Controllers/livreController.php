<?php

namespace App\Http\Controllers;

use App\Models\Catégorie;
use App\Models\Livre;
use Illuminate\Http\Request;

class livreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = Livre::all();
        return view('livres.index',compact('livres'));
    }

    public function create(){
        $catégories = Catégorie::all();
        return view('livres.create',compact('catégories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         "titre"=>"required|max:255",
    //         "catégorie_id"=>"required",
    //         "pages"=>"required",
    //         "description"=>"required",
    //         "image"=>"required|image|mimes:jpeg,png,jpg,gif|max:2048"
    //     ]);

    //     Livre::create($request->all());
    //     return redirect()->route('livres.index')->with('success','livre is added successfully');
    // }
    public function store(Request $request)
{
    $request->validate([
        "titre" => "required|max:255",
        "catégorie_id" => "required",
        "pages" => "required",
        "description" => "required",
        "image" => "required|image|mimes:jpeg,png,jpg,gif|max:2048"
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        
        // Move the uploaded file to the desired directory
        $file->move('uploads/livres/', $filename);
        // Update the 'image' field in your data array
        $imagePath = 'uploads/livres/' . $filename;
    }

    Livre::create([
        'titre' => $request->titre,
        'catégorie_id' => $request->catégorie_id,
        'pages' => $request->pages,
        'description' => $request->description,
        'image' => $imagePath,
    ]);

    return redirect()->route('livres.index')->with('success', 'Livre added successfully');
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
            "titre"=>"required|max:255",
            "pages"=>"required",
            "description"=>"required",
            "image"=>"required",
            "catégorie_id"=>"required",
        ]);
        $livre = Livre::find($id);
        $livre->update($request->all());
        return redirect()->route('livres.index')->with('success','livre updated successfully');

    }

    public function edit($id){
        $livre = Livre::find($id);
        return view('livre.edit',compact('livre'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livre = Livre::find($id);
        $livre->delete();
        return redirect()->route('livres.index')->with('success','livre deleted seccessfully');
    }
}
