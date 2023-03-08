<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use Illuminate\Http\Request;

class CouleurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $couleurs = Couleur::orderBy('id')->get();

        return view('couleurs.index', ['couleurs' => $couleurs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $couleurs = Couleur::all();
        return view('couleurs.create', compact('couleurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'nom_couleur' => 'required|string|max:45|min:2'
        ])) {
            $nom_couleur = $request->input('nom_couleur');

            $couleur = new Couleur();
            $couleur->nom_couleur = $nom_couleur;
            $couleur->save();

            return redirect()->route('couleurs.show', $couleur->id);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $couleur = Couleur::find($id);
        $articles = $couleur->articles;
        return view('couleurs.show', compact('couleur', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $couleur = Couleur::find($id);
        
        return view('couleurs.edit', compact('couleur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->validate([
            'nom_couleur' => 'required|string|max:45|min:2'
        ])) {
            $nom_couleur = $request->input('nom_couleur');

            $couleur = Couleur::find($id);
            $couleur->nom_couleur = $nom_couleur;
            $couleur->save();

            return redirect()->route('couleurs.show', $couleur->id);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $couleur = Couleur::findOrFail($id);
        $couleur->delete();
        return redirect()->route('couleurs.index');
    }
}
