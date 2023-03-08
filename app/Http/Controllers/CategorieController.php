<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::orderBy('id')->get();

        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'nom' => 'required|string|max:45|min:2'
        ])) {
            $nom = $request->input('nom');

            $categorie = new Categorie();
            $categorie->nom = $nom;
            $categorie->save();

            return redirect()->route('categories.show', $categorie->id);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categorie = Categorie::find($id);
        $articles = $categorie->articles;
        return view('categories.show', compact('categorie', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorie = Categorie::find($id);
        
        return view('categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->validate([
            'nom' => 'required|string|max:45|min:2'
        ])) {
            $nom = $request->input('nom');
            $categorie = Categorie::find($id);
            $categorie->nom = $nom;
            $categorie->save();
            return redirect()->route('categories.show', $categorie->id);
        } else {
            return redirect()->back();
        }
        die;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->articles()->detach(); // Supprime les articles associées à la categorie
        $categorie->delete(); // Supprime la categorie
        return redirect()->route('categories.index');
    }
}
